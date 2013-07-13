<?php
class Customer_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        parent::__construct();
    }

    /*------------insert_record() function----------------------*/
    // @recodes type:associate Array
    // return 1     : when success full the insert data
    // return 0     : not insert data

    public function insert_record($record)
    {      

        $this->db->insert('cp_customer',$record);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    

    /*------------get_all_record() function--------------------*/
    // @Para : none
    // return $query: all recordes in the table as array
    // return 0     : when data base data is empty return 0.
    public function get_all_record()
    {
        $this->db->select('*');
        $this->db->from('cp_customer');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return 0;
        }
        // return $query;
    }


    /*------------getAllDetailsForSpecificCustomer() function--------------------*/
    // get all uesr detail per wher conditon
    // return 0     : when data base data is empty return 0.
    public function getAllDetailsForSpecificCustomer($NICNumber)
    {
        $this->db->select('*');        

        $this->db->where('NIC_no',$NICNumber);
        
        $this->db->from('cp_customer');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return 0;
        }
        // return $query;
    }
    

    /*------------getCustomerBasicDetails function-----------------*/
    /*returns result set of a specific record(s) depend on the passed*/
    // @record_id  type : associate Array
    // return $query    : return user detail array return
    // return 0         : no filetered result to return
    public function getCustomerBasicDetails($nicNo)
    {
       
        $this->db->select('*');
        $this->db->where('NIC_no',$nicNo);
        $this->db->from('cp_customer');


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
    

    /*------------update_records function---------------------*/
    // this function use to update speciale record
    // @update_id       : type integer, 
    // @update_details  : selected update_id detials
    // return 0         : when update record
    // return 1         : not update record
    
    public function update_record($CustomerId, $update_details)
    {
        $this->db->where('Customer_id',$CustomerId);
        
        $query = $this->db->update('cp_customer', $update_details);

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
    }

    /*------------userNamePasswordValidate() function--------------*/ 
    // @userName  type : String 
    // @password type : String
    //  return 1 valide user
    //  return 0 user name and password invalid
    public function userNamePasswordAuthonticate($userName, $password)
    {
        $this->db->where('User_name', $userName);
        $this->db->where('Password', $password);
        $this->db->from('users');
        $result = $this->db->get();
        
        if ($result->num_rows() == 1)
        {
            return 1;
        } 
        else
        {
            return 0;
        }
        
   }



    /*------------delete_record() function------------------------*/
    // This function use to delete record depend on $delete_id para meter
    // @delete_id   : type integer,
    // return 1     : when deleted record in data base
    // return 0     : not deleted record
    public function delete_record($delete_id)
    {
        $result = $this->db->delete('users', array('id' => $delete_id));

        if($this->db->affected_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    
    /*getUserData() fucntion*/
    // @userName  type:String
    // return 0 userName invalid
    // return type:ARRAY data:User First_name, Last_name
    public function getUserData($userName)
    {
        // Query the user
        $this->db->select('First_name,Last_name,Email,User_type');
        $this->db->where('User_name', $userName);
        $query = $this->db->get('users');

                                // return the data
        if($query->num_rows()==1)
        {
            $userDetails =  array();
            $result =  $query->result();
            
            $userDetails['firstName']  = $result[0]->First_name;
            $userDetails['lastName']   = $result[0]->Last_name;
            $userDetails['email']      = $result[0]->Email;
            $userDetails['userType']   = $result[0]->User_type;

            return $userDetails;

        }
        else
        {
                                // user invalid
            return 0;
        }
    }



    /******************************searchUserDetails()*******************************************/
    //
    //@var type :
    //#return type :
    public function searchUserDetailsUsingMysqlLike($searchValue)
    {
        $this->db->select('User_name,First_name,Last_name');        
        $this->db->or_like('First_name', $searchValue,'after');
        $this->db->or_like('Last_name', $searchValue,'after');
        $this->db->or_like('User_name', $searchValue,'after');
        $this->db->or_like('Email', $searchValue,'after');
        $query = $this->db->get('users',10);

        if($query->num_rows > 0)
        {
            return $query;
        }
        else
        {
            return 0;
        }

    }//Function End searchUserDetails()

    /*------------changePassword function---------------------*/
    // this function use to update speciale record
    // @update_id       : type integer, 
    // @update_details  : selected update_id detials
    // return 0         : when update record
    // return 1         : not update record
    public function changePassword($userName, $updateDetails)
    {
        $this->db->where('User_name', $userName);
        
        $this->db->update('users', $updateDetails);
        
        $query = $this->db->get('users');

        if($query->num_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }   
    }

	public function getContactDetails($userName)
    {
        $this->db->select('Contact_No,Email');
        $this->db->where('User_name',$userName);
        $this->db->from('users');


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

    public function getContactNumberSecond($userName)
    {
        $this->db->select('Contact_No');
        $this->db->where('User_name',$userName);
        $this->db->from('users');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {                    
                return $row->Contact_No;
            }
        }

    }

    public function getEmail($userName)
    {
        $this->db->select('Email');
        $this->db->where('User_name',$userName);
        $this->db->from('users');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {                    
                return $row->Email;
            }
        }	
    }
	
	public function getUserDetails($userName)
    {       
        $this->db->select('User_status');
        $this->db->where('User_name',$userName);
        $this->db->from('users');


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


     public Function getUserNameForSpecificUser($userName)
        {
            $this->db->select('User_name');
            $this->db->where('User_name',$userName);
            $this->db->from('users');

            $query = $this->db->get();

            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {                    
                    return $row->User_name;
                }
            }
        }//Function End getUserNameForSpecificReserve()
        
    public function getCustomerDatatoDisplay()
    {
        $this->db->select('Customer_id,First_name');
        
        $this->db->from('cp_customer');

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
    
    public function updateCustomerStatusToDeactivate($NICNumber)
    {
        $data = array(
            'Customer_status' => 'deactivate'
        );
        
        $this->db->where('NIC_no', $NICNumber);
        $this->db->update('cp_customer', $data);            

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
?>