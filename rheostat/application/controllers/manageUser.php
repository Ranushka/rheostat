<?php

if (!defined('BASEPATH'))   exit('No direct script access allowed');

class ManageUser extends MY_Controller {

    public function index($page = 'manageUser')
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
        
                $this->load->model('users_model');

                if ($usersRecords= $this->users_model->get_all_record()) 
                {
                    $data['usersRecords'] = $usersRecords;
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

    // function createMember() {
    //     //GLOBAL $name;

    //     isset($_POST['Mem_userName']) ? $data['first_name']     = $_POST['Mem_userName'] : $data['first_name']      = 'NULL';
    //     isset($_POST['Mem_lastName']) ? $data['last_name']      = $_POST['Mem_lastName'] : $data['last_name']       = 'NULL';
    //     isset($_POST['Mem_birthDay']) ? $data['birth_day']      = $_POST['Mem_birthDay'] : $data['birth_day']       = 'NULL';
    //     isset($_POST['Mem_Gender']) ? $data['gender']           = $_POST['Mem_Gender'] : $data['gender']            = 'NULL';
    //     isset($_POST['Mem_address']) ? $data['address']         = $_POST['Mem_address'] : $data['address']          = 'NULL';
    //     isset($_POST['Mem_usertype']) ? $data['user_type']      = $_POST['Mem_usertype'] : $data['user_type']       = 'NULL';
    //     isset($_POST['Mem_email']) ? $data['e_mail']            = $_POST['Mem_email'] : $data['e_mail']             = 'NULL';
    //     isset($_POST['Mem_telNumber']) ? $data['tel_number']    = $_POST['Mem_telNumber'] : $data['tel_number']     = 'NULL';
    //     isset($_POST['Mem_regDate']) ? $data['registered_date'] = $_POST['Mem_regDate'] : $data['registered_date']  = 'NULL';


    //     $result = $this->user_model->add_record($data);
    //     header('Location: ' . base_url() . "manageUser");
    // }

   public function getUser() 
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

   }

   
   
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */