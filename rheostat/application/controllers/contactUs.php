<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContactUs extends MY_Controller {

	public function index()
	{
		$this->load->view('contactUs');
              
	}
        
        public function emailmessage()
        {
            $returnValues = array();
            if( (isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax' )
            {
                $name    = $_POST['name'];
                $email   = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                
                $receiptemail = 'info@chance.lk';
                $returnValues = $this->createEmail($receiptemail, $subject, $message);
                echo json_encode($returnValues);
                
                
            }
        }

}
