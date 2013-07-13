<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Policy extends MY_Controller {

	public function index($page = 'policy')
	{
		
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->load->view($page);

	}//public function index($page = 'home')





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */