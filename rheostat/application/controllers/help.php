<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class help extends MY_Controller
{
    public function index($page = 'help')
	{
        $this->load->view('help.php');
     
    }

	public function displayHelp()
    {
    	$this->load->view('displayHelp.php');
    }
}
