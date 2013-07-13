<?php


class Dessert_model extends MY_Model 
{
	public function getAllDesserts()
    {
        $this->db->select('*');
        $this->db->from('cp_dessert');

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

/* End of file square_model.php */
/* Location: ./application/models/square_model.php */

?>