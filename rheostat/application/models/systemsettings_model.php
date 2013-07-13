<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SystemSettings_model extends MY_Model 
{

    public function insert_record($record)
    {      

        $this->db->insert('systemsettings',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    public function insert_fineType_record($record)
    {      

        $this->db->insert('finetype',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function getLendPeriod()
    {
        $this->db->select('Lending_period');
        $this->db->from('systemsettings');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $data = $query->result();
            return $data;
        }
        else
        {
            return 0;
        }
    }

    public function listAllFineSettigsDetails()
    {
        $this->db->select('*');
        
        $this->db->from('finetype');

        $query = $this->db->get();

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }
     //load values to FineType Settings Preview
    public function getFineTypeValuesPreview($where)
    {
        $this->db->select('*');
        
        $this->db->where($where);

        $query = $this->db->get('finetype');

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }
    //other Settings Table view
    public function listAllOtherSettigsDetails()
    {
        $this->db->select('*');
        
        $this->db->from('systemsettings');

        $query = $this->db->get();

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }
    //load values to Other Settings Preview
    public function getOtherValuesPreview($where)
    {
        $this->db->select('*');
        
        $this->db->where($where);

        $query = $this->db->get('systemsettings');

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }

    //save FineType Preview details
    public function update_records($update_id, $update_details)
    {
        $this->db->where('Finetype_id',$update_id);
        
        $this->db->update('finetype', $update_details);
        
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
    }

    //save Other Settings Preview details
    public function update_other_records($update_id, $update_details)
    {
        $this->db->where('System_Settings_id',$update_id);
        
        $this->db->update('systemsettings', $update_details);
        
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
    }

    //save Categories in database
    public function insert_record_categories($record)
    {      

        $this->db->insert('contentcategory',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Categories Table View
    public function listAllCategorySettigsDetails()
    {
        $this->db->select('*');
        
        $this->db->from('contentcategory');

        $query = $this->db->get();

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }

    //load values to category Settings Preview
    public function getCategoryValuesPreview($where)
    {
        $this->db->select('*');
        
        $this->db->where($where);

        $query = $this->db->get('contentcategory');

        if($query->num_rows > 0)
        {
            return $query;
            
        }
        else
        {
            return 0;
        }
    }

     //save Category Settings Preview details
    public function update_category_records($update_id, $update_details)
    {
        $this->db->where('Category_id',$update_id);
        
        $this->db->update('contentcategory', $update_details);
        
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
    }


}

/* End of file systemSettings_model.php */
/* Location: ./application/models/systemSettings_model.php */