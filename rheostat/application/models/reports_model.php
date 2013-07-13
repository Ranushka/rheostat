<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reports_model
 *
 * @author dinelka
 */
class reports_model extends CI_Model{
    
    function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
  
      
    public function eventDetails($eventType)
    {

        if ($eventType != '')
        {

            $eventDate = array();
            $this->db->select('*');
            $this->db->from('cp_events');
            $this->db->where('Event_title',$eventType);

            $query = $this->db->get();

            if ($query->num_rows > 0)
            {
                $data = $query->result();

                for( $i=0; $i<sizeof($data); $i++)
                {
                    $eventDate[] = array('Event_title'=>$data[$i]->Event_title,'Event_date'=>$data[$i]->Event_date,'Event_crowd'=>$data[$i]->Event_crowd,'No_of_employees'=>$data[$i]->No_of_employees,'Event_type'=>$data[$i]->Event_type,'Menu_id'=>$data[$i]->Menu_id,'Hall_id'=>$data[$i]->Hall_id,'Event_status'=>$data[$i]->Event_status,'Customer_id'=>$data[$i]->Customer_id,'Date_create'=>$data[$i]->Date_create);

                }

            }             

            if (sizeof($eventDate) > 0)
            {
                return $eventDate;
            }
            else
            {
                return 0;
            }
        }
        else
        {

            return ("No Events");
        }
    }           //public function eventDetails($eventType)
      
      function latestEvents($startDate,$endDate,$eventType)
        {
        
          if($eventType!='')
          {
                    $eventdata = array();
                    $this->db->select('*');
                    $this->db->from('cp_events');
                    $this->db->where('Date_create >=',$startDate);
                    $this->db->where('Date_create <=',$endDate);
                    $this->db->where('Date_create <=',date('Y-m-d'));
                    $this->db->where('Event_title',$eventType);

                    $query = $this->db->get();
                    if($query->num_rows > 0)
                    {
                        $data = $query->result();
                        for($i=0;$i<sizeof($data);$i++)
                        {
                            $eventdata[] = array('Event_title'=>$data[$i]->Event_title,'Event_date'=>$data[$i]->Event_date,'Event_crowd'=>$data[$i]->Event_crowd,'No_of_employees'=>$data[$i]->No_of_employees,'Event_type'=>$data[$i]->Event_type,'Menu_id'=>$data[$i]->Menu_id,'Hall_id'=>$data[$i]->Hall_id,'Event_status'=>$data[$i]->Event_status,'Customer_id'=>$data[$i]->Customer_id,'Date_create'=>$data[$i]->Date_create);
                        }
                    }
                    
                    if(sizeof($eventdata)>0)
                    {
                        return $eventdata;
                    }else
                    {
                        return 0;
                    }
          }
          else
          {
                    $eventdata = array();
                    $this->db->select('*');
                    $this->db->from('cp_events');
                    $this->db->where('Date_create >=',$startDate);
                    $this->db->where('Date_create <=',$endDate);
                    $this->db->where('Date_create <=',date('Y-m-d'));
                    $query = $this->db->get();
                    if($query->num_rows > 0)
                    {
                        $data = $query->result();
                        for($i=0;$i<sizeof($data);$i++)
                        {
                            $eventdata[] = array('Event_title'=>$data[$i]->Event_title,'Event_date'=>$data[$i]->Event_date,'Event_crowd'=>$data[$i]->Event_crowd,'No_of_employees'=>$data[$i]->No_of_employees,'Event_type'=>$data[$i]->Event_type,'Menu_id'=>$data[$i]->Menu_id,'Hall_id'=>$data[$i]->Hall_id,'Event_status'=>$data[$i]->Event_status,'Customer_id'=>$data[$i]->Customer_id,'Date_create'=>$data[$i]->Date_create);
                        }
                    }
                    
                    if(sizeof($eventdata)>0)
                    {
                        return $eventdata;
                    }else
                    {
                        return 0;
                    }
          }
        }
        
         public function latestMenu($startDate,$endDate)
         {
             if((null != $startDate && $startDate!= '') && (null != $endDate && $endDate!= ''))
             {
                $menudata = array();
                $this->db->select('*');
                $this->db->from('cp_menu');
                $this->db->where('Date_create >=',$startDate);
                $this->db->where('Date_create <=',$endDate);
                $this->db->where('Date_create <=',date('Y-m-d'));
                
                $query = $this->db->get();
                if($query->num_rows > 0)
                {
                    $data = $query->result();
                    for($i=0;$i<sizeof($data);$i++)
                    {
                        $menudata[] = array('Menu_id'=>$data[$i]->Menu_id,'Menu_name'=>$data[$i]->Menu_name,'Menu_items'=>$data[$i]->Menu_items,'Description'=>$data[$i]->Description,'Menu_price'=>$data[$i]->Menu_price,'Date_create'=>$data[$i]->Date_create);
                    }
                }
                
                if(sizeof($menudata)>0)
                {
                    return $menudata;
                }
                else
                {
                    return 0;
                }
            }
        }
        
        public function latestHalls($startDate,$endDate)
        {
            if((null != $startDate && $startDate!= '') && (null != $endDate && $endDate!= ''))
            {
                $halldata = array();
                $this->db->select('*');
                $this->db->from('cp_hall');
                $this->db->where('Date_create >=',$startDate);
                $this->db->where('Date_create <=',$endDate);
                $this->db->where('Date_create <=',date('Y-m-d'));
                
                $query = $this->db->get();
                if($query->num_rows > 0)
                {
                    $data = $query->result();
                    for($i=0;$i<sizeof($data);$i++)
                    {
                        $halldata[] = array('Hall_id'=>$data[$i]->Hall_id,'Hall_name'=>$data[$i]->Hall_name,'Hall_capacity'=>$data[$i]->Hall_capacity,'Hall_aircondition'=>$data[$i]->Hall_aircondition,'Hall_status'=>$data[$i]->Hall_status,'Hall_arrangements'=>$data[$i]->Hall_arrangements,'Description'=>$data[$i]->Description,'Date_create'=>$data[$i]->Date_create);
                    }
                }
                
                if(sizeof($halldata)>0)
                {
                    return $halldata;
                }else
                {
                    return 0;
                }                    
            }
            
        }

        public function fastmoving($startDate,$endDate)
        {   
            if((null != $startDate && $startDate!= '') && (null != $endDate && $endDate!= ''))
            {
                
                    $startDate = "'".$startDate."'";
                    $endDate   = "'".$endDate."'";
                    $menudata  = array();        

                    $query = $this->db->query('SELECT count(Menu_id),Menu_id FROM cp_events WHERE Date_create >='.$startDate.' AND Date_create <='.$endDate.'GROUP BY Menu_id ORDER BY COUNT( Menu_id )');

                   
                    if($query->num_rows > 0)
                    {
                        $maxdata  = $query->result();
                        $maxindex = sizeof($maxdata)-1;
                     
                       for($i=0; $i<=sizeof($maxdata)-1; $i++)
                        {
                          
                            if($i == $maxindex)
                            {
                               
                                $menuID = $maxdata[$i]->Menu_id;
                                $this->db->select('*');
                                $this->db->from('cp_menu');                                
                                $this->db->where('Menu_id', $menuID);

                                $menuDetails = $this->db->get();                                
                               
                                if($menuDetails->num_rows >0)
                                {
                                    $data = $menuDetails->result();
                                    for($j=0;$j<sizeof($data);$j++)
                                    {                                        
                                        $menudata[] = array('Menu_id'=>$data[$j]->Menu_id,'Menu_name'=>$data[$j]->Menu_name,'Menu_items'=>$data[$j]->Menu_items,'Description'=>$data[$j]->Description,'Menu_price'=>$data[$j]->Menu_price,'Date_create'=>$data[$j]->Date_create);
                                    }
                                }
                                
                                
                            }
                            
                           
                        }
                    }
                    if(sizeof($menudata)>0)
                    {
                        return $menudata;
                    }else
                    {
                        return 0;
                    }
        }  else {
           
                   $startDate = "'".$startDate."'";
                    $endDate   = "'".$endDate."'";
                    $menudata = array();        

                    $query = $this->db->query('SELECT count(Menu_id),Menu_id FROM cp_events WHERE Date_create >='.$startDate.' AND Date_create <='.$endDate.'GROUP BY Menu_id ORDER BY COUNT( Menu_id )');

                
                    if($query->num_rows > 0)
                    {
                        $maxdata = $query->result();
                        $maxindex = sizeof($maxdata)-1; 
                        for($i=0;$i<sizeof($maxdata);$i++)
                        {
                            if($i==$maxindex)
                            {
                                $menuID = $maxdata[$i]->Menu_id;
                                $this->db->select('*');
                                $this->db->from('cp_menu');                                
                                $this->db->where('Menu_id', $menuID);

                                $menuDetails = $this->db->get();

                                if($menuDetails->num_rows >0)
                                {
                                    $data = $menuDetails->result();
                                    for($j=0;$j<sizeof($data);$j++)
                                    {
                                        
                                        $menudata[] = array('Menu_id'=>$data[$j]->Menu_id,'Menu_name'=>$data[$j]->Menu_name,'Menu_items'=>$data[$j]->Menu_items,'Description'=>$data[$j]->Description,'Menu_price'=>$data[$j]->Menu_price,'Date_create'=>$data[$j]->Date_create);
                                    }
                                }
                                
                            }
                        }
                    }
                    if(sizeof($menudata)>0)
                    {
                        return $menudata;
                    }else
                    {
                        return 0;
                    }
        }
                    
        }
        
        public  function slowmoving($startDate,$endDate)
        {
            if((null != $startDate && $startDate!= '') && (null != $endDate && $endDate!= ''))
            {
              
                    $startDate = "'".$startDate."'";
                    $endDate   = "'".$endDate."'";
                    $menudata = array();        

                    $query = $this->db->query('SELECT count(Menu_id),Menu_id FROM cp_events WHERE Date_create >='.$startDate.' AND Date_create <='.$endDate.'GROUP BY Menu_id ORDER BY COUNT( Menu_id )');

                
                    if($query->num_rows > 0)
                    {
                        $mindata = $query->result();
                        
                        for($i=0;$i<sizeof($mindata);$i++)
                        {
                            if($i==0)
                            {
                                $Menu_id = $mindata[$i]->Menu_id;
                               
                                $this->db->select('*');
                                $this->db->from('cp_menu');                                
                                $this->db->where('Menu_id', $Menu_id);


                                $menuDetails = $this->db->get();

                                if($menuDetails->num_rows >0)
                                {
                                    $data = $menuDetails->result();
                                    for($j=0;$j<sizeof($data);$j++)
                                    {
                                        $menudata[] = array('Menu_id'=>$data[$j]->Menu_id,'Menu_name'=>$data[$j]->Menu_name,'Menu_items'=>$data[$j]->Menu_items,'Description'=>$data[$j]->Description,'Menu_price'=>$data[$j]->Menu_price,'Date_create'=>$data[$j]->Date_create);
                                    }
                                }
                            }
                        }
                    }
                    if(sizeof($menudata)>0)
                    {
                        return $menudata;
                    }else
                    {
                        return 0;
                    }
            }else
            {
               
                    $startDate = "'".$startDate."'";
                    $endDate   = "'".$endDate."'";
                    $menudata = array();        

                    $query = $this->db->query('SELECT count(Menu_id),Menu_id FROM cp_events WHERE Date_create >='.$startDate.' AND Date_create <='.$endDate.'GROUP BY Menu_id ORDER BY COUNT( Menu_id )');

                
                    if($query->num_rows > 0)
                    {
                        $mindata = $query->result();
                        
                        for($i=0;$i<sizeof($mindata);$i++)
                        {
                            if($i==0)
                            {
                                $Menu_id = $mindata[$i]->Menu_id;

                                $this->db->select('*');
                                $this->db->from('cp_menu');                                
                                $this->db->where('Menu_id', $Menu_id);

                                $menuDetails = $this->db->get();

                                if($menuDetails->num_rows >0)
                                {
                                    $data = $menuDetails->result();
                                    for($j=0;$j<sizeof($data);$j++)
                                    {
                                        $menudata[] = array('Menu_id'=>$data[$j]->Menu_id,'Menu_name'=>$data[$j]->Menu_name,'Menu_items'=>$data[$j]->Menu_items,'Description'=>$data[$j]->Description,'Menu_price'=>$data[$j]->Menu_price,'Date_create'=>$data[$j]->Date_create);
                                    }
                                }
                            }
                        }
                    }
                    if(sizeof($menudata)>0)
                    {
                        return $menudata;
                    }else
                    {
                        return 0;
                    }
            }
        }
        
        public function eventDetailsForDate($eventDate)
        {
            $eventDetails = array();
            $this->db->select('*');
            $this->db->from('cp_events');
            $this->db->where('Event_date =',$eventDate);            

            $query = $this->db->get();
            if($query->num_rows > 0)
            {
                  $data = $query->result();
                     for($i=0;$i<sizeof($data);$i++)
                     {
                         $eventDetails[] = array('Event_title'=>$data[$i]->Event_title,'Event_date'=>$data[$i]->Event_date,'Event_crowd'=>$data[$i]->Event_crowd,'No_of_employees'=>$data[$i]->No_of_employees,'Event_type'=>$data[$i]->Event_type,'Menu_id'=>$data[$i]->Menu_id,'Hall_id'=>$data[$i]->Hall_id);
                      }
                    }
                    
                    if(sizeof($eventDetails)>0)
                    {
                        return $eventDetails;
                    }else
                    {
                        return 0;
                    }
        }
        
        public function hallReservationDetails($start_Date,$end_Date,$Hall_id)
        {
            $hallReservationDetails = array();
            
            if($Hall_id != '')
            {
                $startDate = "'".$start_Date."'";
                $endDate   = "'".$end_Date."'";
                
                $query = $this->db->query('SELECT count(Hall_id),Hall_id FROM cp_events WHERE Date_create >='.$startDate.' AND Date_create <='.$endDate.'GROUP BY Hall_id ORDER BY COUNT( Hall_id )');
                
                    if($query->num_rows > 0)
                    {
                        $maxdata  = $query->result();
                        $maxindex = sizeof($maxdata)-1;
                     
                       for($i=0; $i<=sizeof($maxdata)-1; $i++)
                        {
                          
                            if($i == $maxindex)
                            {
                               
                                if($Hall_id == $maxdata[$i]->Hall_id)
                                {                                    
                                    $Hall_id = $maxdata[$i]->Hall_id;
                                    $this->db->select('*');
                                    $this->db->from('cp_hall');                                
                                    $this->db->where('Hall_id', $Hall_id);

                                    $hallDetails = $this->db->get();                                
                                   
                                    if($hallDetails->num_rows >0)
                                    {
                                        $data = $hallDetails->result();
                                        for($j=0;$j<sizeof($data);$j++)
                                        {                                        
                                            $hallReservationDetails[] = array('Hall_id'=>$data[$j]->Hall_id,'Hall_name'=>$data[$i]->Hall_name,'Hall_capacity'=>$data[$j]->Hall_capacity,'Hall_aircondition'=>$data[$j]->Hall_aircondition,'Hall_status'=>$data[$j]->Hall_status,'Hall_arrangements'=>$data[$j]->Hall_arrangements,'Description'=>$data[$j]->Description,'Date_create'=>$data[$j]->Date_create);
                                        }
                                    }
                                }
                                
                                
                            }
                            
                           
                        }
                    }
                    if(sizeof($hallReservationDetails)>0)
                    {
                        return $hallReservationDetails;
                    }else
                    {
                        return 0;
                    }
            }
            else
            {
                return $Hall_id.'no data';
            } 
            
        }
        
        public function findactivecustomer($startDate,$endDate)
        {
            $activecustomerdetails = array();
            $startDate             = "'".$startDate."'";
            $endDate               = "'".$endDate."'";
            
             $query = $this->db->query('SELECT count(cp_events.Customer_id) AS usereventcount, cp_customer.Title, cp_customer.First_name, cp_customer.Last_name, cp_customer.Address1, cp_customer.Email, cp_customer.Contact_no1, cp_customer.User_type FROM cp_events,cp_customer WHERE cp_events.Date_create >='.$startDate.' AND cp_events.Date_create <='.$endDate.' AND cp_events.Customer_id = cp_customer.Customer_id GROUP BY cp_events.Customer_id ORDER BY usereventcount DESC');
        
            if($query->num_rows >0)
            {
                $data = $query->result();
                
                for($i=0;$i<=sizeof($data)-1;$i++)
                {
                    $activecustomerdetails[] = array('Number_of_events'=>$data[$i]->usereventcount,'Title'=>$data[$i]->Title,'First_name'=>$data[$i]->First_name,'Last_name'=>$data[$i]->Last_name,'Address'=>$data[$i]->Address1,'Email'=>$data[$i]->Email,'Contact_No'=>$data[$i]->Contact_no1,'User_type'=>$data[$i]->User_type);
                }
            }
            
            if(sizeof($activecustomerdetails)>0)
            {
                return $activecustomerdetails;
            }  else {
                return 0;
            }
        }       
        
        public function getEventIdForCategory($start_Date,$end_Date,$categoryID)
        {
            $this->db->select('Event_id');
            $this->db->from('cp_events');
            $this->db->where('Event_title',$categoryID);
            $this->db->where('Date_create >=',$start_Date);
            $this->db->where('Date_create <=',$end_Date);
            $this->db->where('Date_create <=',date('Y-m-d'));
                        
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

        public function getPriceForSpeficiEvent($EventID)
        {
            $this->db->select('Event_id,Total_amount');
            $this->db->from('cp_payments');
            $this->db->where('Event_id',$EventID);
                        
            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                return $query->result();
            }

        }

        public function getallpayments($Started_Date,$End_Date)
        {
            $this->db->select('Total_amount');
            $this->db->from('cp_payments');            
            $this->db->where('Date_paid >=',$Started_Date);
            $this->db->where('Date_paid <=',$End_Date);
            $this->db->where('Date_paid <=',date('Y-m-d'));
                        
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