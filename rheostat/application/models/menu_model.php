<?php 
		
	class Menu_model extends MY_Model
	{
		public function insert_record($formData)
		{
			$this->db->insert('cp_menu',$formData);

	        if($this->db->affected_rows()>0)
	        {
	            return 1;
	        }
	        else
	        {
	            return 0;
	        }
		}
	
		public function getAllMenus()
	    {
	        $this->db->select('*');
	        $this->db->from('cp_menu');

	        $query = $this->db->get();

	        if ($query->num_rows() > 0)
	        {
	            return $query;
	        }
	        else
	        {
	            return 0;
	        }
	    }

	    public function getMenuPriceForSpecificMenu($Menu_id)
	    {
	    	$this->db->select('Menu_price');
        
	        $this->db->where('Menu_id', $Menu_id);

	        $this->db->from('cp_menu');

	        $query = $this->db->get();

	        if ($query->num_rows() > 0)
	        {
	            return $query->result();
	        }
	        else
	        {
	            return 0;
	        }

	    }
	}
	
	/* End of file floor_model.php */
	/* Location: ./application/models/floor_model.php */
 ?>