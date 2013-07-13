<?php

// User Login, User logOut,  these functions are in the class
class UserAuthentication extends MY_Controller
{
	/*----------------------userLogin----------------------------*/
	// User authontication 
	public function userLogin()
	{
								// check session exist
		if($this->isLoggedIn()==1)
		{
			// check user type and load each user's page
			// eg:Admin for admin page
			$this->defaultPageLoadForUser();
		}

								// Chek user name & password empty
		else if(isset($_POST['OL_userName']) && isset($_POST['OL_userPassword']))
		{
			$userName = $_POST['OL_userName'];
			$password = $_POST['OL_userPassword'];

								// load model
			$this->load->model('users_model');

								// check user in data base
			$loginDetail = $this->users_model->userNamePasswordAuthonticate($userName,$password);

								// user valid create session for current user
			if($loginDetail == 1)
			{
								// get basic data for current user
				$userDetails = $this->users_model->getUserData($userName);

				$setUserCookies = array(					
					//'userId'  	=> $userId,
					'userName'  => $userName,
					'firstName'	=> $userDetails['firstName'],
					'lastName'	=> $userDetails['lastName'],
					'email'     => $userDetails['email'],
					'userType'	=> $userDetails['userType'],
					'loginStatus' => TRUE
				);

								// create sessin using basic data
				$this->session->set_userdata($setUserCookies);

								// check user type and load each user's page
								// eg:Admin for admin page
				$this->defaultPageLoadForUser();
			}
								//	invalid user name or password redirect to login page
			else
			{

				$data['title'] = " - Login";
				$data['errorMsgLogin'] = "User name and password do not match.";

								// check user type and load each user's page
								// eg:Admin for admin page
				
				$data['title'] = ucfirst('login'); // Capitalize the first letter				
				$this->load->view('template/header', $data);				
				$this->load->view('login', $data);
				$this->load->view('template/footer', $data);
				
			}
		}

								//  user name and password empty
								//  !import : user directly access the url
								//  when user has session redirect to home page
		else
		{
			//echo "not logged user";
			//  page load for each user
			$this->defaultPageLoadForUser();
		}
	}

	/*--------------------userLogOut() function------------------------*/
	// destroy all sessions and redirect to login page
	public function userLogOut()
	{
		$this->session->sess_destroy();  // Session destroy

								// redirect to login page
		// $data = array('title' => ' - Home' );
		// $this->pageLoader('home', $data);
		$this->defaultPageLoadForUser();
	}
	
}// class close here