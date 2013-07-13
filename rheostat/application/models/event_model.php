<?php
/**
* 
*/
class Event_model extends MY_Model
{
	
	public function insertEventData($record)
	{
		$this->db->insert('cp_events',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }

	}

	public function getAllEvents()
	{
		$this->db->select('*');
        $this->db->from('cp_events');

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

	public function get_specific_record($colomnName,$EventID)
	{
		$this->db->select('*');
        $this->db->from('cp_events');

        $this->db->where($colomnName,$EventID);

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

	public function update_records($Event_ID,$editedEventDetails)
	{
		$this->db->where('Event_id',$Event_ID);
        
        $this->db->update('cp_events', $editedEventDetails);
        
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
	}

    public function getAllCurrentDateEventsToValidate($Event_date)
    {
        $this->db->select('*');

        $this->db->where('Event_status', "Active");
        $this->db->where('Event_date', $Event_date);

        $this->db->from('cp_events');

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

    public function getAllTemporaryEvents()
    {
        $this->db->select('*');

        $this->db->where('Event_status', "Temporary");        

        $this->db->from('cp_events');

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

    public function getSpecificEventDetails($EventID)
    {
        $this->db->select('Event_crowd,Menu_id,Hall_id,Customer_id,Event_date');
        
        $this->db->where('Event_id', $EventID);

        $this->db->from('cp_events');

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

    public function updateSpecificEvent($Event_id)
    {
        $data = array(
               'Event_status' => "Active"
            );

        $this->db->where('Event_id', $Event_id);
        $this->db->update('cp_events', $data); 
    }
}

?>