<?php


class Food_model extends MY_Model
{
	public function getAllFoods()
    {
        $this->db->select('*');
        $this->db->from('cp_foods');

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
	
public function getFoodNameforSpecificFoodid($FoodID)
    {
        $this->db->select('Food_name');
        $this->db->from('cp_foods');
        $this->db->where('food_id',$FoodID);

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

/* End of file fineType_model.php */
/* Location: ./application/models/fineType_model.php */

?>