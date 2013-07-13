<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminPanal extends MY_Controller 
{

	// Auto load the index funciton
	public function index($page = 'adminPanal')
	{		
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		// check user is logged in to system and load admin panel
		if($this->isLoggedIn())
		{
			// user log and admin panel acces only for admin user
			if($this->getUserType()=="Administrator" || $this->getUserType()=="Manager" || $this->getUserType()=="Receptionist")
			{


                $data['menus'] = $this->getAllMenuDetails("PHP");//get all menu details

                $data['halls'] = $this->getAllHallDetails("PHP");//get all hall details

                $data['customers'] = $this->getAllCustomerDetails("PHP");//get all customer detials

                $data['events'] = $this->getAllEventDetails("PHP");     //get all event details
               
                $data['foods'] = $this->getAllFoodDetails("PHP");//get all food details

                $data['desserts'] = $this->getAllDessertsDetails("PHP");//get all desserts details
                

				$data['title'] = ucfirst("Admin Panel"); // Capitalize the first letter
				$this->load->view('template/header', $data);
				$this->load->view($page, $data);
				$this->load->view('template/footer', $data);
			}
			// when other logged user try to direct acess to redirect to other pages
			else
			{
				$this->loadPageForUser();
			}
		}

		// if not user logged in system redirect to the login page
		else
		{
			$data['title'] = ucfirst("Login"); // Capitalize the first letter			
			$this->load->view('template/header', $data);			
			$this->load->view('login', $data);
			$this->load->view('template/footer', $data);
		}

	}


    public function getCalenderData()
    {
        
        // $year = date('Y');
        // $month = date('m');


         $this->load->model('event_model');

        $queryEventDetails = $this->event_model->getAllEvents();

        $allEvents = array();
        foreach ($queryEventDetails->result() as $key => $event)
        {
            $oneEvent = array();
            
            $oneEvent['id']            = $event->Event_id;
            $oneEvent['title']         = $event->Event_title;
            $oneEvent['start']         = $event->Event_date;

            $allEvents[sizeof($allEvents)] = $oneEvent;

        }
        echo json_encode($allEvents);

    }




    /******************************getAllMenuDetails()*****************************************/
    
    public function getAllMenuDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('menu_model');
        $queryMenuDetails = $this->menu_model->getAllMenus();
        
        if(!$queryMenuDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['menus'] = $queryMenuDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryMenuDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['menus']  = $queryMenuDetails;

            echo json_encode($returnValues);
        }

    }           //Function End getAllMenuDetails()---------------------------------------------------FUNEND()

    public function getAllHallDetails($submitMode=null)
    {
        $this->load->model('hall_model');

       $queryHallDetails = $this->hall_model->getAllHalls();
       
       if(!$queryHallDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['floors'] = $queryHallDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryHallDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['halls']  = $queryHallDetails->result();

            echo json_encode($returnValues);
        }

    }           //getAllHallDetails()

    //function to get all food details.
    public function getAllFoodDetails($submitMode=null)
    {
        $this->load->model('food_model');

       $queryFinetypeDetails = $this->food_model->getAllFoods();
       
       if(!$queryFinetypeDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['foods'] = $queryFinetypeDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryFinetypeDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['foods']  = $queryFinetypeDetails->result();
            echo json_encode($returnValues);
        }

    }           ////function to get all food details.

    public function getAllDessertsDetails($submitMode=null)
    {
        $this->load->model('dessert_model');

       $querySquareDetails = $this->dessert_model->getAllDesserts();
       
       if(!$querySquareDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['desserts'] = $querySquareDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $querySquareDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['desserts']  = $querySquareDetails->result();
            echo json_encode($returnValues);
        }
    }

    public function getAllCustomerDetails($submitMode=null)
    {
        $this->load->model('customer_model');

       $queryCustomerDetails = $this->customer_model->getCustomerDatatoDisplay();
       
       if(!$queryCustomerDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['customers'] = $queryCustomerDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryCustomerDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['squares']  = $queryCustomerDetails->result();

            echo json_encode($returnValues);
        }
    }

        //function to get all event details
    public function getAllEventDetails($submitMode=null)
    {
        $this->load->model('event_model');

       $queryEventDetails = $this->event_model->getAllEvents();
       
       if(!$queryEventDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No Events";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['events'] = $queryEventDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryEventDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['events']  = $queryEventDetails->result();

            echo (json_encode($returnValues));
        }

    }           //public function getAllEventDetails($submitMode=null)




	/*************************Start Function getAllPendingContentRequestList()***********************************/
	//Owner : Madhuranga Senadheera
	//
	// Get all pending content request list
	public function getAllPendingContentRequestList()
	{
		$this->load->model('reservation_model');		
		$allPendingContentRequestList = $this->reservation_model->allPendingContentRequestList(array('Reserve_status' => "P" ));

		if ($allPendingContentRequestList!==FALSE)
		{
			$data = array();
			foreach ($allPendingContentRequestList->result() as $key => $reserve)
			{

				$data[$key]['Full_content_title'] = $reserve->Content_title;
				$data[$key]['Content_title'] = substr($reserve->Content_title, 0, 20).'..&nbsp;';
				$data[$key]['First_name'] = $reserve->First_name;
				$data[$key]['Reserve_id'] = $reserve->Reserve_id;
				$data[$key]['Content_id'] = $reserve->Content_id;
				$data[$key]['Last_name'] = $reserve->Last_name;
			}

			return $data;
		}
		else
		{
			return FALSE;
		}
		
	}//Function End getAllPendingContentRequestList()---------------------------------------------------FUNEND()
        
/*************************Start Function getAllLendingDetails()***********************************/
	//Owner : Anoj Saranga
	//
	// Get all lending details
	public function getAllLendingDetails()
	{
            $this->load->model('lending_model');
            $this->load->model('content_model');
            $allLendingDetails = $this->lending_model->getLendDetails();

            if(null != $allLendingDetails && $allLendingDetails != "")
            {
                $newLendDetails = array();
                for($index=0; $index<sizeof($allLendingDetails); $index++)
                {                    
                    $newLendDetails[$index] = get_object_vars($allLendingDetails[$index]);
                }

                $getContentNames = array();
                for($index=0; $index<sizeof($newLendDetails); $index++)
                {   
                    $getContentNames[$index]= $this->content_model->getContentNameforSpecificId($newLendDetails[$index]['Content_id']);
                }

                $newLendContentNames = array();
                for($index=0; $index<sizeof($getContentNames); $index++)
                {
                    $newLendContentNames[$index] = get_object_vars($getContentNames[$index][0]);
                }

                for($index=0; $index<sizeof($newLendDetails); $index++)
                {
                    $finalArrayToReturn[$index] = array(
                                                        'Lend_id'       =>$newLendDetails[$index]['Lend_id'],
                                                        'User_name'     =>$newLendDetails[$index]['User_name'],
                                                        'Content_title' =>$newLendContentNames[$index]['Content_title'],
                                                        'Lend_date'     =>$newLendDetails[$index]['Lend_date'],
                                                        'Lend_due_date' =>$newLendDetails[$index]['Lend_due_date'],
                                                        'Lend_status'   =>$newLendDetails[$index]['Lend_status']                                                                                                                       
                                                        );
                } 
            }

            if ($finalArrayToReturn != FALSE)
            {
                    return $finalArrayToReturn;
            }
            else
            {
                    return FALSE;
            }
		
	}//Function End getAllLendingDetails()---------------------------------------------------FUNEND()
			//function to calculate lend due date.
			
	public function getAllReservedDetails()
	{
		$this->load->model('reservation_model');
                $this->load->model('content_model');
		$allreserveDetails = $this->reservation_model->getReserveDetails();
                
                if(null != $allreserveDetails && $allreserveDetails!='')
                {
                    $newReserveDetails = array();
                    for($index=0; $index<sizeof($allreserveDetails); $index++)
                    {                    
                        $newReserveDetails[$index] = get_object_vars($allreserveDetails[$index]);
                    }
                    
                    $getContentNames = array();
                    for($index=0; $index<sizeof($newReserveDetails); $index++)
                    {   
                        $getContentNames[$index]= $this->content_model->getContentNameforSpecificId($newReserveDetails[$index]['Content_id']);
                    }
                    
                    $newReserveContentNames = array();
                    for($index=0; $index<sizeof($getContentNames); $index++)
                    {
                        $newReserveContentNames[$index] = get_object_vars($getContentNames[$index][0]);
                    }
                    
                    for($index=0; $index<sizeof($newReserveContentNames); $index++)
                    {
                        $finalArrayToReturn[$index] = array(
                                                            'Reserve_id'       =>$newReserveDetails[$index]['Reserve_id'],
                                                            'Reserved_date'     =>$newReserveDetails[$index]['Reserved_date'],
                                                            'Reserve_expiration_date' =>$newReserveDetails[$index]['Reserve_expiration_date'],
                                                            'User_name'     =>$newReserveDetails[$index]['User_name'],
                                                            'Content_title' =>$newReserveContentNames[$index]['Content_title'],
                                                            'Reserve_status'   =>$newReserveDetails[$index]['Reserve_status']                                                                                                                       
                                                            );
                    }
                    if ($finalArrayToReturn != FALSE)
                    {
                            return $finalArrayToReturn;
                    }
                    else
                    {
                            return FALSE;
                    }
                }	
		
	}
        
        public function getAllOverdueDetails()
	{
            $this->load->model('fine_model');
            $this->load->model('lending_model');

            $allOverdueDetails = $this->fine_model->getAllRecords();

            if (null != $allOverdueDetails && $allOverdueDetails != "")
            {
                $newOverdueDetails = array();
                for($index=0; $index<sizeof($allOverdueDetails); $index++)
                {                    
                    $newOverdueDetails[$index] = get_object_vars($allOverdueDetails[$index]);
                }
                
                
                $getLendUserDetails = array();
                for($index=0; $index<sizeof($newOverdueDetails); $index++)
                {   
                    $getLendUserDetails[$index]= $this->lending_model->getUserDetailsForSpecificLend($newOverdueDetails[$index]['Lend_id']);
                }
                
                $newLendUserArray = array();
                for($index=0; $index<sizeof($getLendUserDetails); $index++)
                {
                    $newLendUserArray[$index] = get_object_vars($getLendUserDetails[$index][0]);
                }                
                
                for($index=0; $index<sizeof($newOverdueDetails); $index++)
                {
                    $finalArrayToReturn[$index] = array(
                                                        'userName'    =>$newLendUserArray[$index]['User_name'],
                                                        'contentID'   =>$newLendUserArray[$index]['Content_id'],
                                                        'overdueDays' =>$newLendUserArray[$index]['Numberof_overdue_days'],
                                                        'fineId'      =>$newOverdueDetails[$index]['Fine_id'],
                                                        'totalAmount' =>$newOverdueDetails[$index]['Total_amount'],
                                                        'dueDate'     =>$newOverdueDetails[$index]['Due_date'],
                                                        'fineStatus'  =>$newOverdueDetails[$index]['Fine_status']                                                            
                                                        );
                }                
		if ($finalArrayToReturn != FALSE)
		{
                        return $finalArrayToReturn;		
		}
		else
		{
			return FALSE;
		}
            }
                		
	} 
        
	public function calculateLendDueDate()
	{
		$this->load->model('systemsettings_model');

		$lendPeriod = $this->systemsettings_model->getLendPeriod();

		if (null != $lendPeriod && $lendPeriod != '')
		{
			$lendPerodArray = get_object_vars($lendPeriod[0]);

			$todayDate 		= date('Y-m-d');
			$lendPeriod     = $lendPerodArray['Lending_period'];
			
			$LendDueDate = date('Y-m-d',strtotime($todayDate) + (24*3600*$lendPeriod));					
			
			return ($LendDueDate);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */