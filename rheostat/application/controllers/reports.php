<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller
{
    public function index($page = 'reports')
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
        
                $this->load->model('reports_model');
                
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
   
}
?>
