<?php
class Hall_model extends MY_Model 
{
    public function insert_record($record)
    {
        $this->db->insert('cp_hall',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
	  
    public function getAllHalls()
    {
        $this->db->select('*');
        $this->db->from('cp_hall');

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

	

}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */

?>