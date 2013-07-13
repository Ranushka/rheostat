<?php  
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportsGenerator extends MY_Controller
{
   
   private $lateststartdate;
   private $latestenddate;
   
    public function index($page = 'reports') {
        // echo "hi";
        if (!file_exists('application/views/' . $page . '.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        // check user is logged in to system and load admin panel
        if($this->isLoggedIn())
        {
            // user log and admin panel acces only for admin user
            if($this->getUserType()=="Administrator")
            {
                
                    $data = array();
                    
                    //$this->load->model('reports_model');
                    
                    $data['title'] = ucfirst($page); // Capitalize the first letter
                    $this->load->view('template/header', $data);
                    $this->load->view($page, $data);
                    $this->load->view('template/footer', $data);
        
        
            }
            // when other logged user try to direct acess to redirect to other pages
            else
            {
                $this->defaultPageLoadForUser();
            }
        }

        // if not user logged in system redirect to the login page
        else
        {
            $data['title'] = ucfirst("Login"); // Capitalize the first letter           
            $this->load->view('template/header', $data);            
            $this->load->view('login', $data);
            $this->load->view('template/footer', $data);
        }
       
    }    
    
    public function categoryWiseEvents()
    {
       
        $data = array();
        
        $this->load->model('reports_model');

        if (isset($_POST['Select_event']))
        {
            $eventType = $_POST['Select_event'];

            if ($eventsDetailsforSpecificType= $this->reports_model->eventDetails($eventType)) 
            {
                $data['eventDetails'] = $eventsDetailsforSpecificType;
            }

        }
        $data['title'] = ucfirst("Category Wise Event Details"); // Capitalize the first letter
        $this->load->view('template/header', $data);
        $this->load->view("categorywiseevents", $data);
        $this->load->view('template/footer', $data);

    }


    public function latestCreations()
    {
        $data = array();
        
        if ((isset($_POST['latestadd_Start_Date'])&& isset($_POST['latestadd_End_Date']))&&(!empty($_POST['latestadd_Start_Date'])&&!empty($_POST['latestadd_End_Date'])))
        {
            $latestadd_Start_Date = $_POST['latestadd_Start_Date'];
            $latestadd_End_Date   = $_POST['latestadd_End_Date'];
            $eventType           = $_POST['Select_event'];

            $this->load->model('reports_model');

            if ($latestEventDetails= $this->reports_model->latestEvents($latestadd_Start_Date,$latestadd_End_Date,$eventType)) 
            {
                $data['latestEventDetails'] = $latestEventDetails;
            }
            if ($latestMenu= $this->reports_model->latestMenu($latestadd_Start_Date,$latestadd_End_Date)) 
            {
                $data['latestMenu'] = $latestMenu;
            }
            if ($latestHalls= $this->reports_model->latestHalls($latestadd_Start_Date,$latestadd_End_Date)) 
            {
                $data['latestHalls'] = $latestHalls;
            }

            $data['title'] ="Latest Creations";
            $this->load->view('template/header', $data);
            $this->load->view("latestadditions", $data);
            $this->load->view('template/footer', $data);
        }
        else
        {
            $data['title'] = "Latest Creations";         
            $this->load->view('template/header', $data);
            $this->load->view("latestadditions", $data);
            $this->load->view('template/footer', $data);
        }

     
    }
    
    
    public function mostlessreserving()
    {   
        $data = array();
        
        if (((isset($_POST['FastMovingSlowMoving_Started_Date']))&&(!empty($_POST['FastMovingSlowMoving_Started_Date'])))&&(((isset($_POST['FastMovingSlowMoving_End_Date']))&&(!empty($_POST['FastMovingSlowMoving_End_Date'])))))
        {
            $startDate  = $_POST['FastMovingSlowMoving_Started_Date'];
            $endDate    = $_POST['FastMovingSlowMoving_End_Date'];
            
            $this->load->model('reports_model');

            if ($fastmovingMenuDetails = $this->reports_model->fastmoving($startDate,$endDate)) 
            {
                $data['fastmovingMenuDetails'] = $fastmovingMenuDetails;
            }

            if ($slowmovingMenuDetails = $this->reports_model->slowmoving($startDate,$endDate)) 
            {
                $data['slowmovingMenuDetails'] = $slowmovingMenuDetails;
            }

            $data['title'] = ucfirst("Moset Reserve And Less Reserve Menus'"); // Capitalize the first letter
            $this->load->view('template/header', $data);
            $this->load->view("fastmovinglessmovingmenu", $data);
            $this->load->view('template/footer', $data);
        }
        else
        {
            $data['title'] = "Moset Reserve And Less Reserve Menus'"; 
            $this->load->view('template/header', $data);
            $this->load->view("fastmovinglessmovingmenu", $data);
            $this->load->view('template/footer', $data);
        }
    }
    
    public function gettodayeventdetails()
    {
        
        if (((isset($_POST['today_event_date']))&&(!empty($_POST['today_event_date']))))
        {
            $eventDate = $_POST['today_event_date'];            
            $data = array();
        
            $this->load->model('reports_model');
       
        if ($getEventDetails = $this->reports_model->eventDetailsForDate($eventDate)) 
        {
            $data['getEventDetails'] = $getEventDetails;
        }        
        
        $data['title'] = ucfirst("Event Details for Selected Date"); // Capitalize the first letter
        $this->load->view('template/header', $data);
        $this->load->view("todayeventdetails", $data);
        $this->load->view('template/footer', $data);
        }else
        {
            
             $data['title'] = ucfirst("Event Details for Selected Date"); // Capitalize the first letter
             $this->load->view('template/header', $data);
             $this->load->view("todayeventdetails", $data);
             $this->load->view('template/footer', $data);
        }
    }
    
    public function mostreservedhall()
    {
        $data = array();
        $data['halls'] = $this->getAllHallDetails("PHP");//get all hall details
        if (((isset($_POST['mostreservedhall_Start_Date']))&&(!empty($_POST['mostreservedhall_Start_Date'])))&&(((isset($_POST['mostreservedhall_End_Date']))&&(!empty($_POST['mostreservedhall_End_Date'])))))
        {
             $start_Date = $_POST['mostreservedhall_Start_Date'];
             $end_Date   = $_POST['mostreservedhall_End_Date'];
             $Hall_id    = $_POST['Hall_id'];

             $this->load->model('reports_model');
             
              if ($hallReservationDetails = $this->reports_model->hallReservationDetails($start_Date,$end_Date,$Hall_id)) 
              {
                  $data['hallReservationDetails'] = $hallReservationDetails;
              }
             $data['title'] = ucfirst("Most Reserved Banquet Hall Details"); // Capitalize the first letter
             $this->load->view('template/header', $data);
             $this->load->view("mostreservehall", $data);
             $this->load->view('template/footer', $data);
        }else
        {
             $data['title'] = ucfirst("Most Reserved Banquet Hall Details"); // Capitalize the first letter
             $this->load->view('template/header', $data);
             $this->load->view("mostreservehall", $data);
             $this->load->view('template/footer', $data);
        }
       
    }

    public function getAllHallDetails($submitMode=null)
    {
        $this->load->model('hall_model');

       $queryHallDetails = $this->hall_model->getAllHalls();
       
       if(!$queryHallDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No content";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['floors'] = $queryHallDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryHallDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['halls']  = $queryHallDetails->result();

            echo json_encode($returnValues);
        }

    }           //getAllHallDetails()
    
    public function mostactivecustomers()
    {
        $data = array();
        
        if (((isset($_POST['mostactivecustomers_Start_Date']))&&(!empty($_POST['mostactivecustomers_Start_Date'])))&&(((isset($_POST['mostactivecustomers_End_Date']))&&(!empty($_POST['mostactivecustomers_End_Date'])))))
        {
            $startDate  = $_POST['mostactivecustomers_Start_Date'];
            $endDate    = $_POST['mostactivecustomers_End_Date'];

            $this->load->model('reports_model');

            if ($findactivecustomer = $this->reports_model->findactivecustomer($startDate,$endDate)) 
              {
                  $data['findactivecustomer'] = $findactivecustomer;
              }
            
                $data['title'] = ucfirst("Most Active Customer Details"); // Capitalize the first letter
                $this->load->view('template/header', $data);
                $this->load->view("mostactivecustomers", $data);
                $this->load->view('template/footer', $data);
        }
        else
        {
                $data['title'] = ucfirst("Most Active Customer Details"); // Capitalize the first letter
                $this->load->view('template/header', $data);
                $this->load->view("mostactivecustomers", $data);
                $this->load->view('template/footer', $data);
        }
    } 
    
    public function categorywisetotalincome()
    {
        $data = array();
        
        $this->load->model('reports_model');
        
        if (isset($_POST['Select_event']))
        {
            $categoryID = $_POST['Select_event']; 

            if ($categoryID != "All")
            {
                $getEventId = $this->reports_model->getEventIdForCategory($_POST['calculateAmount_Started_Date'],$_POST['calculateAmount_End_Date'],$categoryID);
               
                if (null != $getEventId && $getEventId !='')
                {
                    $eventIdArray = array(); 
                    $getTotalPrice = array();               
                    for ($index=0; $index<sizeof($getEventId); $index++)
                    {
                        $eventIdArray[$index] = get_object_vars($getEventId[$index]);                    
                    }

                    for ($index=0; $index<sizeof($eventIdArray); $index++)
                    {
                        $getTotalPrice[$index] = $this->reports_model->getPriceForSpeficiEvent($eventIdArray[$index]['Event_id']);
                    }
                    
                    if (null != $getTotalPrice[0] && $getTotalPrice[0] != '')
                    {
                        $newGetPricedetails= $getTotalPrice[0];

                        $priceArray = array();
                        for ($index=0; $index<sizeof($newGetPricedetails); $index++)
                        {
                            $priceArray[$index] = get_object_vars($newGetPricedetails[$index]);                    
                        }

                        $totalAmount = 0;
                        for ($index=0; $index<sizeof($priceArray); $index++)
                        {
                            $totalAmount += $priceArray[$index]['Total_amount'];
                        }
                        
                        $returnValues = array(
                                            'EventId'     => $categoryID,
                                            'TotalAmount' => $totalAmount,
                                            'From'        => $_POST['calculateAmount_Started_Date'],
                                            'To'          => $_POST['calculateAmount_End_Date']
                                            );

                        $data['getEventId'] = $returnValues;                    
                    }                
                    else
                    {
                        $returnValues = array(
                                            'EventId'     => 'No',
                                            'TotalAmount' => 'No Payments',
                                            'From'        => $_POST['calculateAmount_Started_Date'],
                                            'To'          => $_POST['calculateAmount_End_Date']                                       
                                            );

                        $data['getEventId'] = $returnValues;
                    }
                    
                }
                else
                {
                    $returnValues = array(
                                            'EventId'     => 'No',
                                            'TotalAmount' => "No Events Under This Category",
                                            'From'        => $_POST['calculateAmount_Started_Date'],
                                            'To'          => $_POST['calculateAmount_End_Date']                                        
                                            );

                    $data['getEventId'] = $returnValues;
                }
            }
            else
            {
                $getEventId = $this->reports_model->getallpayments($_POST['calculateAmount_Started_Date'],$_POST['calculateAmount_End_Date']);

                $eventIdArray = array();
                if (null != $getEventId && $getEventId != '')
                {
                    for ($index=0; $index<sizeof($getEventId); $index++)
                    {
                        $eventIdArray[$index] = get_object_vars($getEventId[$index]);                    
                    }

                    $totalAmount = 0;
                    for ($index=0; $index<sizeof($eventIdArray); $index++)
                    {
                        $totalAmount += $eventIdArray[$index]['Total_amount'];
                    }

                    $returnValues = array(
                                        'EventId'     => $categoryID,
                                        'TotalAmount' => $totalAmount,
                                        'From'        => $_POST['calculateAmount_Started_Date'],
                                        'To'          => $_POST['calculateAmount_End_Date']
                                        );

                    $data['getEventId'] = $returnValues;
                }
            }
        
                $data['title'] = ucfirst("Total Inventory And Valuation Of Books"); // Capitalize the first letter
                $this->load->view('template/header', $data);
                $this->load->view("categorywisetotalincome", $data);
                $this->load->view('template/footer', $data);
        }else
        {
                $data['title'] = ucfirst("Total Inventory And Valuation Of Books"); // Capitalize the first letter
                $this->load->view('template/header', $data);
                $this->load->view("categorywisetotalincome", $data);
                $this->load->view('template/footer', $data);
        }
    }
    
    public function setLateststartdate($lateststartdate)
    {
        $this->lateststartdate = $lateststartdate;
    }
    
    public function getLateststartdate()
    {
        return $this->lateststartdate;
    }
    public function setLatestenddate($latestenddate)
    {
        $this->latestenddate = $latestenddate;
    }
    
    public function getLatestenddate()
    {
        return $this->latestenddate;
    }
}
?>
