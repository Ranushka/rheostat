<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class ManageCustomer extends MY_Controller {

    public function index($page = 'manageCustomer')
    {

        if (!file_exists('application/views/' . $page . '.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

         // check user is logged in to system and load admin panel
        if($this->isLoggedIn())
        {
            // user log and admin panel acces only for admin user
            if($this->getUserType()=="Administrator")
            {
                $data = array();
        
                $this->load->model('customer_model');

                if ($customerRecords = $this->customer_model->get_all_record()) 
                {
                    $data['customerRecords'] = $customerRecords;
                }

                $data['title'] = ucfirst($page); // Capitalize the first letter
                $this->load->view('template/header', $data);
                $this->load->view($page, $data);
                $this->load->view('template/footer', $data);
        
            }
            // when other logged user try to direct acess to redirect to other pages
            else
            {
                $this->defaultPageLoadForUser();
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
   

   /*public function getUser() 
   {
        $returnValues['user'] =  '';

       
        $userID =$this->input->post('code');

        $this->load->model('Lending_model');

        $queriedResult = $this->Lending_model->get_UserDeatils($userID);

        if ($queriedResult->num_rows() > 0)
        {
            // return $queriedResult->result();
            // print_r($queriedResult->result());
            $returnValues['user'] = $queriedResult->result();
        }

        echo json_encode($returnValues);

   }*/

   
   
   public function getSpacificUserDetails()
    {
        if (isset($_POST['searchedUserName']))
        {
            $getSpacificUser = $_POST['searchedUserName'];

            $searchedUserDetails = array();

            $this->load->model('users_model');

            if($query = $this->users_model->getUserBasicDetails($getSpacificUser)->result())
            {
                $searchedUserDetails['userDetails'] = $query[0];
                //searchedUserDetails
            }
            else
            {
                $searchedUserDetails['msg'] = "ELSE 2";

            }
        }


        else
        {
            $searchedUserDetails['msg'] = "Not set Data";
        }
        echo json_encode($searchedUserDetails);
       

    }// public function getSpacificUserDetails()

    /*******************************Start Function searchUserDetails()****************************/
    // Search user details and return First name and last and id
    //@var type :
    //#return type :
    public function searchUserDetails()
    {
        $returnValues =array();
        $searchValue ="";

        // get serch query
        isset($_POST['findUserSearchBox'])?$searchValue=$_POST['findUserSearchBox'] : $searchValue = 'false';
        //$returnValues['users'] = $searchValue;
        
        if($searchValue!='false')
        {
            // $returnValues['users'] = "hi0";
            $this->load->model('users_model');
            // send quety to data base and get values
            $result = $this->users_model->searchUserDetailsUsingMysqlLike($searchValue);
            //  data convert to object to array
            if(!$result==0)
            {
                
                $users = array();
                foreach ($result->result() as $key => $value)
                {
                    $users[$key] = array('firstName'    => $value->First_name,
                                         'lastName'     => $value->Last_name,                                         
                                         'userName'     => $value->User_name 
                                        );
                }
                $returnValues['status'] ="success";
                $returnValues['users'] = $users;
                // $returnValues['users'] = "hi2";
                // load view with user data
                // $this->load->view('upload', $users = array('data' => $users ));
                

            }
            else
            {
                
                $returnValues['status'] ="error";
                $returnValues['msg'] = 'No data';
            }
        }
        else
        {
            
            $returnValues['status'] ="error";
            $returnValues['msg'] = 'error';
        }

        echo json_encode($returnValues);
    }//Function End searchUserDetails()---------------------------------------------------FUNEND



    /*******************************checkExsistingUser()****************************************/
    // Check a user has exsiting or not
    //@var type    :
    //#return type :
    public function checkExsistingUser()
    {
        $returnValues = array();
        $userName     = $_POST['userName'];
        //load a model
        $this->load->model('users_model');
        $userQuery = $this->users_model->getUserBasicDetails($userName);
        //check a userName is available or not
        if($userQuery !== 0)
        {
            $returnValues['error']  = 'error';
            $returnvalues['msg']    = 'User name has alredy taken.';
        }
        else
        {           
            $returnValues['status'] = 'success';
            $returnvalues['msg']    = 'User name is availabile';
        }
        echo json_encode($returnValues);
    }//Function End checkExsistingUser()---------------------------------------------------FUNEND
    

    /**************************************create()************************************************/
    // create a new customer
    //@ type       :
    //#return type :
    public function create()
    {
        //define the array variable
        $returnValues = array();
        
        //get the nic number from the form field
        $nicNumber = $_POST['nicNumber'];
        
        //get the user details from database
        $this->load->model('customer_model');
        
        $userQuery = $this->customer_model->getCustomerBasicDetails($nicNumber);
        
        if($userQuery === 0)          //if the customer is tne new one?
        {
            //yes, then
            //check the submitMode is set && submitMode is equal to type is ajax
            if((isset($_POST['submitMode'])) && $_POST['submitMode'] =='ajax')
            {                    

                $data = "";     

                //get the form input in createCustomer ajax function form customerManagement.js 
                isset($_POST['title'])     ? $data['Title']             = $_POST['title']          : $data['Title']             = 'NULL';
                isset($_POST['firstName']) ? $data['First_name']        = $_POST['firstName']      : $data['First_name']        = 'NULL';
                isset($_POST['lastName'])  ? $data['Last_name']         = $_POST['lastName']       : $data['Last_name']         = 'NULL';
                isset($_POST['nicNumber']) ? $data['NIC_no']            = $_POST['nicNumber']      : $data['NIC_no']            = 'NULL';
                isset($_POST['gender'])    ? $data['Gender']            = $_POST['gender']         : $data['Gender']            = 'NULL';
                isset($_POST['address1'])  ? $data['Address1']          = $_POST['address1']       : $data['Address1']          = 'NULL';
                isset($_POST['address2'])  ? $data['Address2']          = $_POST['address2']       : $data['Address2']          = 'NULL';
                isset($_POST['telNumber1'])? $data['Contact_no1']       = $_POST['telNumber1']     : $data['Contact_no1']       = 'NULL';
                isset($_POST['telNumber2'])? $data['Contact_no2']       = $_POST['telNumber2']     : $data['Contact_no2']       = 'NULL';
                isset($_POST['telNumber3'])? $data['Contact_no3']       = $_POST['telNumber3']     : $data['Contact_no3']       = 'NULL';
                isset($_POST['email'])     ? $data['Email']             = $_POST['email']          : $data['Email']             = 'NULL';
                isset($_POST['RegDate'])   ? $data['Date_of_register']  = $_POST['RegDate']        : $data['Date_of_register']  = date('Y-m-d');
                
                $this->load->model('customer_model');                               
                $this->customer_model->insert_record($data);               
                
                $getCustomerDetails = $this->customer_model->getAllDetailsForSpecificCustomer($_POST['nicNumber']);
                                
                //get details from manageUser.js
                $toEmail        = $_POST['email'];
                $getFirstName   = $_POST['firstName'];                              
                
                //check the input record is availability 
                if(null != $getCustomerDetails && $getCustomerDetails != '')
                {

                    //get result user email from database
                    $this->load->model('customer_model');
                    $userDetails = $this->customer_model->getAllDetailsForSpecificCustomer($_POST['nicNumber'])->result();
                    $userDbEmail = $userDetails[0]->Email;

                     //check email availability
                    if($userDbEmail !== '')
                    {
                        //email content
                        $emailContent = 'Dear '.$getFirstName.',<br /> Your event has been create sucessfuly.<br />';
                     
                        //call fun createEmail() from MYController
                        $this->createEmail($userDbEmail,"Event Creation Verification",$emailContent); 
                        
                        $returnValues['status'] = "success";
                        $returnValues['msg']    = "User Added";
                    }
                                                                
                }
                //check the input record is unavailability 
                else
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "User not Added";
                }
            }
            else
            {           
                            
            }
        }
        //check the old user
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "Customer already exist";
        } 
        
        echo (json_encode($returnValues));
        
    }           //Function End createuser()---------------------------------------------------FUNEND


    /*************************** get_random_password()***********************************/
    //generate random password
    //@ type :
    //#return type :
    public function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=true, $include_special_chars=false)
    {
        $length    = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';

        if($include_numbers) 
        {
            $selection .= "1234567890";
        }
        if($include_special_chars) 
        {
            $selection .= "!@04f7c318ad0360bd7b04c980f950833f11c0b1d1quot;#$%&[]{}?|";
        }                               
        $password = "";
        for($i=0; $i<$length; $i++) 
        {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        return $password; 
        
    }//Function End get_random_password()---------------------------------------------------FUNEND

    /*******************************change_password()*********************************************/
    //change the user password
    //@ type       :
    //#return type :
    public function changePassword()
    {
        //chekc form submit
        if(isset($_POST['submit']))
        {   
            //load a model
            $this->load->model('users_model');
            //get user name from session, from My_conroller
            $userName = $this->getUserName();

            //check Current password is valid password
            $checkCurrentPassword = $this->users_model->userNamePasswordAuthonticate($userName, $_POST['Mem_currentPassword']);
                
            //valid user
            if($checkCurrentPassword==1)
            {
                
                    $data = array();

                    //get password details from form
                    $changeNewPassword  = $_POST['Mem_newPassword'];
                    $confirmNewPassword = $_POST['Mem_ConfirmPassword'];
                                                                                            
                    //chech the equalaty for new password and confirm password
                    if($changeNewPassword === $confirmNewPassword)
                    {
                        $userDetails = $this->users_model->getUserBasicDetails($userName)->result();

                        if($userDetails!==0)
                        {
                            $data['userDetails'] = $userDetails[0];

                            //update current password with new passowrd
                            $updateResult = $this->users_model->changePassword($userName, array( 'Password' => $_POST['Mem_newPassword'] ));
                            // data base updated
                            if($updateResult == 1)
                            {
                                if(($userDetails[0]->Email)!=='')
                                {
                                    //get email for relevant user
                                    $userEmail = $userDetails[0]->Email;

                                    // email content
                                    $emailContent  = 'Dear '.$userDetails[0]->First_name.
                                    ',<br /> Your password has successfully changed.';                                 
                                   
                                    //call fun createEmail() from MyController
                                    $this->createEmail($userEmail,"Change Password",$emailContent);     

                                    $data['passwordStatuseMassage'] = 'Your password has successfully changed';
                                    $data['passwordStatus']         = 'success';
                                }// if() check email is availabel
                                else
                                {
                                    $data['passwordStatuseMassage'] = 'Your password has successfully changed';
                                    $data['passwordStatus']         = 'success';
                                    
                                }
                            } // if() data base update 
                            //data base not update
                            else
                            {                                       
                                $data['passwordStatuseMassage'] = 'Password is not update please contact adminitrator';
                                $data['passwordStatus']         = 'error';

                                //$this->load->view('home', $data);                             
                            }

                        }//if()get user detail                      
                        
                    } //if($changeNewPassword === $confirmNewPassword)
                    else
                    {
                        
                        $data['passwordStatuseMassage'] = 'Please re-enter confirm password';
                        $data['passwordStatus']         = 'error';
                    }                                   
                
            } // chekc current user password is valid
            //invalid user
            else
            {
                // echo "wrong user name and password";
                //$data = array();
                                                    
                $data['passwordStatuseMassage'] = 'Please re-enter current passwords';
                $data['passwordStatus']         = 'error';
                // $this->load->view('home', $data);
                
            }
                  
        }// check data set  

        // load user login home page with status massage
        $currentUser = $this->getUserName();
        $this->load->model('users_model');

        if($query = $this->users_model->getUserBasicDetails($currentUser)->result())
        {                       
            $data['userDetails'] = $query[0];
            $this->load->view('home', $data);
        }   
    }//Function End changePassword()------------------------------------------FUNEND()
    

    /*************************Start Function getAllDetailsForSpecificCustomer()***********************************/
    //Owner : Anoj Saranga
    // get details for specific customer for edit and save
    //@ type :
    //#return type :
    public function getAllDetailsForSpecificCustomer()
    {
        $returnValues = array();

        if(isset($_POST['NicNumber'])) 
        {
            isset($_POST['NicNumber'])?$NICNumber=$_POST['NicNumber'] : $NICNumber = NULL;
            if ($NICNumber!==NULL)
            {
                $this->load->model('customer_model');
                $customerAllDetails = $this->customer_model->getAllDetailsForSpecificCustomer($_POST['NicNumber']);
                if ($customerAllDetails!==0)
                {

                    $returnValues['customerDetail'] = $customerAllDetails->row();
                    $returnValues['status'] = 'success';
                    $returnValues['msg'] = 'Customer details return';
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg'] = 'Not existing customer data base';
                }           

            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg'] = 'No customer name selected';
            }
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }
        
        echo (json_encode($returnValues));

    }//Function End getAllDetailsForSpecificCustomer()---------------------------------------------------FUNEND()




    /*************************Start Function saveDetailsForSpecificCustomer()***********************************/
    //Owner : Anoj Saranga
    //
    //@ type :
    //#return type :
    public function saveDetailsForSpecificCustomer()
    {
        $returnValues = array();
        
        // check adminitrator permission for this functionality
        if ($this->getUserType()=="Administrator")
        {

            // chcek data is set
            if (isset($_POST['Customer_id']))
            {
                $this->load->model('customer_model');
                
                // update user details
                if ($this->customer_model->update_record($_POST['Customer_id'],$_POST['userData']))
                {
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = "Customer Details Successfully Updated";
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg']    = "Customer's Details Not Updated";
                    
                }
                
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "NO customer select";
            }
        }
        else                            
        // false This user hasn't permission for this functionality.
        {
            
                $returnValues['status'] = "error";
                $returnValues['msg'] = "Access Denide \n This user hasn't permission for this functionality.";
        }// End if ()
        
        echo (json_encode($returnValues));
        
    }//Function End saveDetailsForSpecificCustomer()---------------------------------------------------FUNEND()


      /*************************Start Function saveUserProfileDetailsForSpecificUser()***********************************/
    //Owner : Suren Shanaka
    //
    //@ type :
    //#return type :
    public function saveUserProfileDetailsForSpecificUser()
    {
        $returnValues = array();
        
        // check Memebers permission for this functionality
        if ($this->getUserType()=="Members")
        {   
            // chcek data is set
            if (isset($_POST['User_name']))
            {
                $formData = array();
                
                // ------------------------------Ajax file Upload and data handle----------------------------------------------
        
                                // (html type : file) name of the form's file upload field
                $file_element_name = 'profileImage';
            
                                    // set the configure valuess
                                    // file upload path
                $config['upload_path']  = './uploads/ProfileImage/';
                                    // Accept file types
                $config['allowed_types']= 'gif|jpg|png';
                $config['max_size']     = 1024 * 500;
                                    // file save name in upload folder
                $config['file_name']    = 'openlib_Image_';

                                    // load uplod library andset cofigure values
                $this->load->library('upload', $config);
                $this->load->helper('date');
                
                                    // upload file using file name 
                if (!$this->upload->do_upload($file_element_name))
                {                   // if error return error
                    $returnValues['status'] = 'error';
                    $returnValues['msg']    = $this->upload->display_errors('', '');
                }
                else
                {
                                    // get uploded file's informations
                    $fileData = $this->upload->data();
                    
                                    // set some file properties to data base
                    $formData['User_profile_image'] = $fileData['file_name'];
                    $formData['Image_path']         = $config['upload_path'];
                    
                }

                @unlink($_FILES[$file_element_name]);

                //update user details               
                if(isset($_POST['Title']))             {$formData['Title']              = $_POST['Title'];} 
                if(isset($_POST['User_profile_image'])){$formData['User_profile_image'] = $_POST['User_profile_image'];} 
                if(isset($_POST['First_name']))        {$formData['First_name']         = $_POST['First_name'];} 
                if(isset($_POST['Last_name']))         {$formData['Last_name']          = $_POST['Last_name'];}  
                if(isset($_POST['NIC_No']))            {$formData['NIC_No']             = $_POST['NIC_No'];} 
                if(isset($_POST['Address']))           {$formData['Address']            = $_POST['Address'];} 
                if(isset($_POST['Gender']))            {$formData['Gender']             = $_POST['Gender'];} 
                if(isset($_POST['Date_of_birth']))     {$formData['Date_of_birth']      = $_POST['Date_of_birth'];} 
                if(isset($_POST['Email']))             {$formData['Email']              = $_POST['Email'];} 
                if(isset($_POST['Contact_No']))        {$formData['Contact_No']         = $_POST['Contact_No'];} 

                $this->load->model('users_model');

                if($this->users_model->update_record(array('User_name'=>$_POST['User_name']),$formData))
                {
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = "User Details updates";
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg']    = "User's Details not updated";         
                }               
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "NO user select";
            }
        }
        else                            
        // false This user hasn't permission for this functionality.
        {           
                $returnValues['status'] = "error";
                $returnValues['msg'] = "Access Denide \n This user hasn't permission for this functionality.";
        }// End if ()
        echo json_encode($returnValues);    
    }//Function End saveUserProfileDetailsForSpecificUser()---------------------------------------------------FUNEND()
    
    public function changeUserStatus()
    {
        $returnValues = array();
        
        // check adminitrator permission for this functionality
        if ($this->getUserType()=="Administrator")
        {

            if ((isset($_POST['NICNumber']))&&(!is_null($_POST['NICNumber'])))
            {
                $this->load->model('customer_model');

                // check current use active mode
                $isCustomerActive = $this->customer_model->getAllDetailsForSpecificCustomer($_POST['NICNumber']);
                
                $returnValues['status'] = "success";
                $returnValues['msg'] = "User in active mode";
                
                // User Deactive exsicute
                if ($this->customer_model->updateCustomerStatusToDeactivate($_POST['NICNumber']))
                {
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = "User deactivated successfuly.";
                }
                // not updated data base
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg']    = "User does not deactivated.";

                }                                    
            }
            else
            {
                $returnValues['status'] = 'error';
                $returnValues['msg']    = "User not selected.";
            }
            
        }
        else                            
        // false This user hasn't permission for this functionality.
        {
            
            $returnValues['status'] = "error";
            $returnValues['msg'] = "Access Denide \n This user does'not have permission for this functionality.";
        }// End if ()
        
        // chcek data is set
        echo json_encode($returnValues);

    }//Function End deactivateUser()---------------------------------------------------FUNEND()

    public function forgotLoginDetails()
    {
        //check submit button from forgotPassword form
        if(isset($_POST['forgotPasswordEmail']))
        {   
            $returnValues;
            $userEmail = $_POST['forgotPasswordEmail'];
            //load a users_model
            $this->load->model('users_model');
            //get form email and actual email details
            $userDetails = $this->users_model->getAllDetailsForSpecificUser(array('Email'=>$_POST['forgotPasswordEmail']));
            

            //check the email is match or not
            if($userDetails!==0 && $_POST['forgotPasswordEmail'] !== '')
            {
                //call the random function
                $randPassword = $this->get_random_password();
                //upDate password, regarding relevant user
                $upDatePassword = $this->users_model->update_record(array('Email'=>$userEmail),array('Password'=>$randPassword));
                //check the result update or not
                if($upDatePassword == 1)
                {
                    $returnValues['msg']    = "Your password has been successfuly changed.Check your emails for details.";
                    $returnValues['status'] = "success";

                    //get specific user name 
                    $userName     = $userDetails->row()->User_name; 
                    //get specific first name            
                    $firstName    = $userDetails->row()->First_name;                 
                    //get email for relevant user
                    $toEmail      = $userDetails->row()->Email;

                    //email content
                    $emailContent = 'Dear '.$firstName.',<br/> Your password has successfuly changed. Your may login with the following link.<br/>
                    <a href='.base_url().'index.php/user/login>Click Here</a><br />
                    User name: '.$userName.'<br />
                    Password: '.$randPassword.'<br />';  
 
                    //call fun createEmail() from MyController
                    $this->createEmail($toEmail,"Passsword Re-set",$emailContent);
                    
                    
                }
                else
                {
                    $returnValues['msg']    = "Your password is not change";
                    $returnValues['status'] = "error";
                }               
            }
            else
            {
                $returnValues['msg']    = "The email you entered is not registered.";
                $returnValues['status'] = "error";
            }
        }
        else
        {

        }
        echo json_encode($returnValues);
    }
    
}//CLASS End getAllDetailsForSpecificUser()---------------------------------------------------CLASSEND{}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */