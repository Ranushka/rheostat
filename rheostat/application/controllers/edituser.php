<?php
	class Edituser extends CI_Controller
	{
		public function index($data=false)
		{
			if(isset($data))
			{
				$details['record'] = $data;
			}
			
			$this->load->view('update_view',$details);
		}

		public function getUser()
		{

			$user_id = $_POST['searchid'];

			//echo($user_id);exit();

			$record = array('user_id'=>$user_id);
		    
		    $data   = $this->user_model->get_specific_record($record);

		    $this->index($data);
		}

		function update()
	    {
	    		isset($_POST['editid'])?$update_id['user_id'] = $_POST['editid']:$update_id['user_id']='NULL';
	    		isset($_POST['editedname'])?$data['first_name'] = $_POST['editedname']:$data['first_name']='NULL';
	    		

		 //    $user_id   = $_POST['editid'];
		 //    $user_name = $_POST['editedname'];

			// //update id
			// $update_id = array(
   //              'user_id'=>$user_id
			// 	);

   //          //update data
			// $data = array(
			// 	'first_name'=>$user_name
			// 	);

			$this->user_model->update_record($update_id,$data);
			$this->index();	
	    }
	}
?> 