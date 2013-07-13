<?php
/**
* 
*/
class Payment_model extends MY_Model
{
	public function insertPaymentData($formData)
	{
		$this->db->insert('cp_payments',$formData);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }

	}

	public function get_all_record()
	{
		$this->db->select('*');

        $this->db->from('cp_payments');

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

    public function get_specific_record($colomnName,$PaymentID)
    {
        $this->db->select('*');
        $this->db->from('cp_payments');

        $this->db->where($colomnName,$PaymentID);

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

    public function update_records($PaymentId,$editedPaymentDetails)
    {
        $this->db->where('Payment_id',$PaymentId);
        
        $this->db->update('cp_payments', $editedPaymentDetails);
        
        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }

    public function getDetailstoCalculate($PaymentID)
    {
        $this->db->select('For_ac,For_lights,Other_amount,Due_amound');
        
        $this->db->where('Payment_id', $PaymentID);

        $this->db->from('cp_payments');

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
?>