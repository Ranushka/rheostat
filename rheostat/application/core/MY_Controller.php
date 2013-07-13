<?php
// This is custom controller
class MY_Controller extends CI_controller 
{

    function __construct()
    {

            parent::__construct();
            $this->load->library('google');
    }


   /*--------------------isLoggedIn() function------------------------*/
	// check the session status for current user
	// return 1 when user is login system
	// return 0 when user not logi nto system
	public function isLoggedIn()
	{
	
		if($this->session->userdata('loginStatus'))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	

	/*-------------------------getUserType() function---------------*/
	// return 0 when not session create for user (not logged)
	// return 1 when user has create loged system and create session
	public function getUserType()
	{
		$userType = $this->session->userdata('userType');
		if(isset($userType))
		{
			return $userType;
		}
		else
		{
			return 0;
		}
	}


	/*-------------------------getUserId() function---------------*/
	// return 0 when not session create for user (not logged)
	// return 1 when user has create loged system and create session
	public function getUserId()
	{
		$userId = $this->session->userdata('userId');
		if(isset($userId))
		{
			return $userId;
		}
		else
		{
			return 0;
		}
	}

	/*-------------------------getUserName() function---------------*/ 
	// return UserNane to corosponding session is made for.
	// return 0 if not a user or session time out
	public function getUserName()
	{
		$userName = $this->session->userdata('userName');
		if(isset($userName))
		{
			return $userName;
		}
		else
		{
			return 0;
		}
	}

	
	/*----------------------defaultPageLoadForUser() function--------------*/
	// Page select for particular user LOAD DEFAULT USER'S PAGES
	// return none;
	public function defaultPageLoadForUser()
	{

								// check usre logged status
		if($this->isLoggedIn() == 1)
		{

			if(null != $this->getUserType() && $this->getUserType() != '')
			{				
				switch ($this->getUserType())
				{
									// Admin for adminpage
					case 'Administrator':
						header('Location: '.base_url().'index.php/adminPanal');
						break;

					case 'Librarian':	// Librarian  for home page
						header('Location: '.base_url().'index.php/adminPanal');
						break;

					case 'Manager':	// Visitor  for home page
						header('Location: '.base_url().'index.php/adminPanal');
						break;

					case 'Members':	// Members  for home page
						header('Location: '.base_url().'index.php/home/index');
						break;

					default:			// Geuss user
						header('Location: '.base_url()."index.php/user/login");				
						break;

				}				//switch ($this->getUserType())

			}					
			else
			{
					header('Location: '.base_url()."index.php/user/login");		

			}				//if(null != $this->getUserType() && $this->getUserType() != '')
			
		}
								// if user not logged to system redirect to login page
		else
		{
			header('Location: '.base_url()."index.php/user/login");
		}
	}


	/******************************getTodayDate()*******************************************/
	// To get today date
	//@var type :
	//#return type : date ->2013-05-13
	public function getTodayDate()
	{
		$this->load->helper('date');
        // get time stamp
        $time = time();
        
        $dateString = "%Y-%m-%d";
        return mdate($dateString, $time);
		
	}//Function End getTodayDate()-----------------------------------------------------FUNEND()



	/******************************getTodayDateWithTime()*******************************************/
	// To get today date
	//@var type :
	//#return type : date ->2013-05-13-12-00
	public function getTodayDateWithTime()
	{
		$this->load->helper('date');
        // get time stamp
        $time = time();
        
        $dateString = "%Y-%m-%d-%h-%i";
        return mdate($dateString, $time);
		
	}//Function End getTodayDateWithTime()-----------------------------------------------------FUNEND()



	/******************************unixToMysql()*******************************************/
	// TimeStamp convert to date format
	//@var type : 
	//#return type : 1368396000->2013-05-13
	public function unixToMysql($unix)
	{
		$dateString = "%Y-%m-%d";                        
        return mdate($dateString, $unix);
		
	}//Function End unixToMysql()-------------------------------------------------------FUNEND()


	/*******************************curlWithSms()********************************/
    //sending sms
    //@ type       :
    //#return type :
    public function curlWithSms($phoneNumber, $smsCotent)
    {
    	//get cURL resource
		$curl = curl_init();
		//set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'http://sms.openarc.lk/api.do?type=SMS:TEXT:INDIVIDUAL&action=SEND&priority=2&username=openlib&password=iaTeQTKFh7KD3FR&recipient=94-'.$phoneNumber.'&messagedata='.$smsCotent.'&signature=1',
		    CURLOPT_USERAGENT => 'Openlib sysem massage'
		));
		//send the request & save response to $resp
		$resp = curl_exec($curl);
		// close request to clear up some resources
		curl_close($curl);

		//get the xml curl result
		$xml_object = simplexml_load_string($resp);

		$xml_array  = $this->object2array($xml_object);

		//check the json result is true or false
		if(isset($xml_array['code']) && ($xml_array['code']=='000'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }

    function object2array($object)
    {
    	return @json_decode(@json_encode($object),1);
    }//Function End curlWithSms()------------------------------------------FUNEND()


	/********************* createEmail()****************************/
	//sending email
	//@var type :
	//#return type :
	function createEmail($toEmail,$subject,$emailContent)
	{
            $config = Array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'localhost',
                            'smtp_port' =>  25,
                            'smtp_user' => 'anojsarangachandrara@gmail.com',
                            'smtp_pass' => 'nalanda123',
                            'charset'   => 'utf-8',
                            'wordwrap'  => TRUE,
                            'mailtype'  => 'html'
                            );

            $this->load->library('email',$config);


            $this->email->set_newline("\r\n");
            $this->email->from('anojsarangachandrara@gmail.com');
            $this->email->to($toEmail);
            $this->email->subject($subject);
            $this->email->message($emailContent);

	    //check the email is send or not
	    if($this->email->send())
	    {
			$returnValues['statuss'] = 'success';
			$returnValues['msgs']    = 'Your email was sent.';
	    }
	    else
	    {		     
			$returnValues['statuss'] ="error";
			$returnValues['msgs']    = show_error($this->email->print_debugger());
	    }
	    	return $returnValues;
		
	}//Function End createEmail()------------------------------------------FUNEND()



	/*************************Start Function wordLimit()***********************************/
	//Owner : Madhuranga Senadheera
	//
	//$string == input String 
	//$word_limit =  how many word want to return 
	public function wordsLimit($string,$word_limit)
	{

		$words = explode(' ', $string, ($word_limit));
		if(count($words) > $word_limit)
		{
			array_pop($words);
		}
		else
		{
			return implode(' ', $words).'..';		
		}
	}//Function End wordLimit()---------------------------------------------------FUNEND()

} // My contoller class end {}----------------------------------------------------------CLSEND{}

?>