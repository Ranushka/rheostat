<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index($page = 'home')
	{
		
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		
		// check user is logged in to system.
	    if($this->isLoggedIn())
	    {
	        // user log and profile view
	        if($this->getUserType()=="Members")
	        {

	        	$data = array();

	        	$currentUser = $this->getUserName();
	        	//echo $currentUser;
	        	$data['userFineDetails'] = $this->getUserFineDetails();	
	        	//print_r($currentUser);

	        	$this->load->model('users_model');

				if($query = $this->users_model->getUserBasicDetails($currentUser)->result())
				{
					// print_r($query->result());

					$data['userDetails'] = $query[0];
				}

	           
	            
	           // $data['title'] = ucfirst("Manage Content Panel"); // Capitalize the first letter
	            $data['currentUserReservations']        = $this->getCurrentReservationStatus();
	            $data['currentUserPendingReservations'] = $this->getCurrentPendingReservationStatus();
				$data['contentborrowingdetails']        = $this->getborrowing();
				$this->load->view($page, $data,$currentUser);

	        }
	        // when other logged user try to direct acess to redirect to other pages
	        else
	        {
	            $this->defaultPageLoadForUser();
	        }
	    }//if($this->isLoggedIn())
		


	}//public function index($page = 'home')

	/*************************Start Function getCurrentReservationStatus()***********************************/
	//Owner : Madhuranga Senadheera
	//
	//Display in the front end page:
	public function getCurrentReservationStatus()
	{
		$this->load->model('reservation_model');

		$currentReservation = $this->reservation_model->allPendingContentRequestList(array('reservation.User_name'=>$this->getUserName(),'reservation.Reserve_status'=>'R'));


		if($currentReservation!==FALSE)
		{
			return $currentReservation;
		}
		else
		{
			return FALSE;
		}

	}//Function End getCurrentReservationStatus()---------------------------------------------------FUNEND()

	
    //User Profile Fine
    public function getUserFineDetails()
	{
           
        $this->load->model('lending_model');
        $queryUserFinedetails = $this->lending_model->getUserFineDetails(array('lending.User_name'=>$this->getUserName()));
        if($queryUserFinedetails!==FALSE)
		{

			return $queryUserFinedetails;
		}
		else
		{

			return FALSE;
		}
            		
	}    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */