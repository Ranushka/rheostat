<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageEvents extends MY_Controller {

	public function index($page = 'manageEvent')
	{
		
		if ( ! file_exists('application/views/'.$page.'.php'))
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
                $data['menus'] = $this->getAllMenuDetails("PHP");//get all menu details

                $data['halls'] = $this->getAllHallDetails("PHP");//get all hall details

                $data['customers'] = $this->getAllCustomerDetails("PHP");//get all customer detials

                $data['events'] = $this->getAllEventDetails("PHP");     //get all event details
               
                $data['foods'] = $this->getAllFoodDetails("PHP");//get all food details

                $data['desserts'] = $this->getAllDessertsDetails("PHP");//get all desserts details
                
                $data['title'] = ucfirst("Manage Events"); // Capitalize the first letter

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



/****************************** addMenu()******************************************************/
    // Add content data to data base using ajax
    //@var type :
    #return type :
    public function addMenu()
    {

        $returnValues           = array();        
        $formData               = "";

        // Get form data and check empty
        
        isset($_POST['Menu_title'])         ? $formData['Menu_name']           = $_POST['Menu_title']           : $formData['Menu_name']         = 'nodata';
        isset($_POST['Menu_items'])         ? $formData['Menu_items']          = $_POST['Menu_items']           : $formData['Menu_items']        = 'nodata';
        isset($_POST['Menu_comments'])      ? $formData['Description']         = $_POST['Menu_comments']        : $formData['Description']       = "nodata";
        isset($_POST['Menu_price'])         ? $formData['Menu_price']          = $_POST['Menu_price']           : $formData['Menu_price']        = "nodata";
        $formData['Date_create'] = date('Y-m-d');

        if(isset($_POST['Menu_title']))
        {

            $this->load->model('menu_model');

            $result = $this->menu_model->insert_record($formData);
                                // check data base updated :(
            if($result != 1)
            {
                $returnValues['status'] = "error";

                $returnValues['msg'] = "Menu not created";
            }
                                // file was uploaded successfully :)

            $returnValues['status'] = "success";

            $returnValues['msg']    = "Menu created";
        }        
                                // return value to Ajax js fucnton
        echo json_encode($returnValues);      
        
    }//Function End addMenu()




/****************************** addBanquetHall()******************************************************/
    // Add content data to data base using ajax
    //@var type :
    #return type :
    public function addBanquetHall()
    {

        $returnValues           = array();
        $formData               = "";
        // Get form data and check empty
        
        isset($_POST['hall_title'])         ? $formData['Hall_name']           = $_POST['hall_title']         : $formData['Hall_name']         = 'nodata';
        isset($_POST['hall_capacity'])      ? $formData['Hall_capacity']       = $_POST['hall_capacity']      : $formData['Hall_capacity']     = 'nodata';
        isset($_POST['hall_status'])        ? $formData['Hall_status']         = $_POST['hall_status']        : $formData['Hall_status']       = "nodata";
        isset($_POST['aircondition'])       ? $formData['Hall_aircondition']   = $_POST['aircondition']       : $formData['Hall_aircondition'] = "nodata";
        isset($_POST['hall_arrangements'])  ? $formData['Hall_arrangements']   = $_POST['hall_arrangements']  : $formData['Hall_arrangements'] = "nodata";
        isset($_POST['hall_description'])   ? $formData['Description']         = $_POST['hall_description']   : $formData['Description']       = "nodata";
        $formData['Date_create'] = date('Y-m-d');

        if(isset($_POST['hall_title']))
        {

            $this->load->model('hall_model');

            $result = $this->hall_model->insert_record($formData);
                                // check data base updated :(
            if($result != 1)
            {
                $returnValues['status'] = "error";

                $returnValues['msg'] = "Hall not added";
            }                                

            $returnValues['status'] = "success";

            $returnValues['msg']    = "Hall added";
        }
                                // return value to Ajax js fucnton
        echo json_encode($returnValues);       
        
    }//Function End addBanquetHall()

/********************* addNewEvent()****************************/
//
//@var type :
//#return type :
    public function addNewEvent()
    {   
        $returnValues           = array();
        $formData               = array();

         // Get form data and check empty
        isset($_POST['Select_event'])            ? $formData['Event_title']               = $_POST['Select_event']              : $formData['Event_title']              = 'noTitle';
        isset($_POST['Event_date'])              ? $formData['Event_date']                = $_POST['Event_date']                : $formData['Event_date']               = "noDate";
        isset($_POST['Event_croud'])             ? $formData['Event_crowd']               = $_POST['Event_croud']               : $formData['Event_crowd']              = "0";
        isset($_POST['Event_description'])       ? $formData['Event_description']         = $_POST['Event_description']         : $formData['Event_description']        = "null";
        isset($_POST['NOof_employees'])          ? $formData['No_of_employees']           = $_POST['NOof_employees']            : $formData['No_of_employees']          = "0";
        isset($_POST['Event_comments'])          ? $formData['Event_comments']            = $_POST['Event_comments']            : $formData['Event_comments']           = "noDesc";
        isset($_POST['Event_type'])              ? $formData['Event_type']                = $_POST['Event_type']                : $formData['Event_type']               = "noType";
        isset($_POST['Lightning'])               ? $formData['Event_lightnint']           = $_POST['Lightning']                 : $formData['Event_lightnint']          = "no";
        isset($_POST['Light_arrangement'])       ? $formData['Light_arrangement']         = $_POST['Light_arrangement']         : $formData['Light_arrangement']        = "defauld";
        isset($_POST['Lightning_description'])   ? $formData['Light_description']         = $_POST['Lightning_description']     : $formData['Light_description']        = "noDesc";
        isset($_POST['Liquor'])                  ? $formData['Liquor']                    = $_POST['Liquor']                    : $formData['Liquor']                   = "no";
        isset($_POST['Liquor_description'])      ? $formData['Liquor_description']        = $_POST['Liquor_description']        : $formData['Liquor_description']       = "noDesc";
        isset($_POST['Menu_id'])                 ? $formData['Menu_id']                   = $_POST['Menu_id']                   : $formData['Menu_id']                  = "0";
        isset($_POST['Special_comments'])        ? $formData['Menu_comments']             = $_POST['Special_comments']          : $formData['Menu_comments']            = "noComment";
        isset($_POST['Hall_id'])                 ? $formData['Hall_id']                   = $_POST['Hall_id']                   : $formData['Hall_id']                  = "0";
        isset($_POST['Hall_arrangement'])        ? $formData['Hall_arrangements']         = $_POST['Hall_arrangement']          : $formData['Hall_arrangements']        = "no";
        isset($_POST['Arrangement'])             ? $formData['Arrangement_type']          = $_POST['Arrangement']               : $formData['Arrangement_type']         = "default";
        isset($_POST['Arrangement_description']) ? $formData['Arrangement_description']   = $_POST['Arrangement_description']   : $formData['Arrangement_description']  = "noDesc";
        isset($_POST['Air_condition'])           ? $formData['Hall_ac']                   = $_POST['Air_condition']             : $formData['Hall_ac']                  = "noac";
        isset($_POST['SpecialHall_comments'])    ? $formData['Special_comments']          = $_POST['SpecialHall_comments']      : $formData['Special_comments']         = "noComment";
        isset($_POST['event_band'])              ? $formData['Band']                      = $_POST['event_band']                : $formData['Band']                     = "no";
        isset($_POST['band_type'])               ? $formData['Band_type']                 = $_POST['band_type']                 : $formData['Band_type']                = "no";
        isset($_POST['event_status'])            ? $formData['Event_status']              = $_POST['event_status']              : $formData['Event_status']             = "active";
        isset($_POST['Customer_id'])             ? $formData['Customer_id']               = $_POST['Customer_id']               : $formData['Customer_id']              = "0";
        $formData['Date_create'] = date('Y-m-d');                    

        $this->load->model('event_model');

        $getEventDetails = $this->event_model->getAllCurrentDateEventsToValidate($_POST['Event_date']);

        if (null != $getEventDetails && $getEventDetails != '')     //if event has for the pertcular date?
        {
                        //yes, then check the event details
            $newEventDetails = array();
            for($index=0; $index<sizeof($getEventDetails); $index++)
            {                    
                $newEventDetails[$index] = get_object_vars($getEventDetails[$index]);
            }

            $newIndex = 0;
            if ($newEventDetails[$newIndex]['Event_type'] == $_POST['Event_type'] && $newEventDetails[$newIndex]['Hall_id'] == $_POST['Hall_id'])
            {
                $returnValues['status'] = "error";

                $returnValues['msg']    = "Event cannot be create. The Banquet hall is not available";

                $newIndex++;
            }
            else
            {
                $result = $this->event_model->insertEventData($formData);

                /*$this->load->model('payment_model');

                $dataArraytoInsert = array(

                                        );*/

                if($result != 0)
                {
                    $returnValues['status'] = "success";

                    $returnValues['msg']    = "Event added";
                }
                $newIndex++;
            }
        }
        else
        {
                        //no, then create a new event
            $result = $this->event_model->insertEventData($formData);

            if($result != 0)
            {
                $returnValues['status'] = "success";

                $returnValues['msg']    = "Event added";
            }
        }


         echo (json_encode ($returnValues));
         
    }           //Function End addPhysicalBook()---------------------------------------------------FUNEND()

    /******************************getAllMenuDetails()*****************************************/
    
    public function getAllMenuDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('menu_model');
        $queryMenuDetails = $this->menu_model->getAllMenus();
        
        if(!$queryMenuDetails==0)
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
            return $returnValues['menus'] = $queryMenuDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryMenuDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['menus']  = $queryMenuDetails;

            echo json_encode($returnValues);
        }

    }           //Function End getAllMenuDetails()---------------------------------------------------FUNEND()

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

    //function to get all food details.
    public function getAllFoodDetails($submitMode=null)
    {
        $this->load->model('food_model');

       $queryFinetypeDetails = $this->food_model->getAllFoods();
       
       if(!$queryFinetypeDetails==0)
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
            return $returnValues['foods'] = $queryFinetypeDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryFinetypeDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['foods']  = $queryFinetypeDetails->result();
            echo json_encode($returnValues);
        }

    }           ////function to get all food details.

    public function getAllDessertsDetails($submitMode=null)
    {
        $this->load->model('dessert_model');

       $querySquareDetails = $this->dessert_model->getAllDesserts();
       
       if(!$querySquareDetails==0)
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
            return $returnValues['desserts'] = $querySquareDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $querySquareDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['desserts']  = $querySquareDetails->result();
            echo json_encode($returnValues);
        }
    }

    public function getAllCustomerDetails($submitMode=null)
    {
        $this->load->model('customer_model');

       $queryCustomerDetails = $this->customer_model->getCustomerDatatoDisplay();
       
       if(!$queryCustomerDetails==0)
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
            return $returnValues['customers'] = $queryCustomerDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryCustomerDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['squares']  = $queryCustomerDetails->result();

            echo json_encode($returnValues);
        }
    }

        //function to get all event details
    public function getAllEventDetails($submitMode=null)
    {
        $this->load->model('event_model');

       $queryEventDetails = $this->event_model->getAllEvents();
       
       if(!$queryEventDetails==0)
        {   
            $returnValues['status']  = 'success';
            $returnValues['msg']     = 'Data return';
        }
        else
        {
            $returnValues['status'] = "error";
            $returnValues['msg']    = "No Events";
        }
        

        // if post request return as object
        if( isset($_POST['submitMode']) && $_POST['submitMode']=="POST" )
        {
            return $returnValues['events'] = $queryEventDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryEventDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['events']  = $queryEventDetails->result();

            echo (json_encode($returnValues));
        }

    }           //public function getAllEventDetails($submitMode=null)

    
    /*******************************Start Function aJaxGetEventsToUpdate()****************************/
    
    public function aJaxGetEventsToUpdate($phpRequest=null,$eContentIDphp=null)
    {
        $returnValues = array();

        $this->load->model('event_model');
        //$this->load->model('category_model');
        
        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode']=='ajax'))
        {
            if(isset($_POST['EventID']))
            {
                // get data from DB
                $qeuryEventResult = $this->event_model->get_specific_record("Event_id",$_POST['EventID']);

                $events = array();
                // convert object to json object
                foreach ($qeuryEventResult->result() as $key=> $event)
                {
                    $events[$key] = $event;
                }

                    $returnValues['events'] = $events;
                
                //get all caregories
                /*$getContentCategorys = $this->category_model->get_contentcategory_records();   
                
                $contentCategorys = array();                
                foreach ($getContentCategorys->result() as $key=> $contentCategory)
                {
                    $contentCategorys[$key] = $contentCategory;
                }
                
                    $returnValues['category'] = $contentCategorys;
                
                    //get category name
                $getCategoryName = $this->category_model->get_specific_record($eContent->Category_id);

                $categoryName = array();
                // convert object to json object
                foreach ($getCategoryName->result() as $key=> $categoryNames)
                {
                    $categoryName[$key] = $categoryNames;
                }

                     $returnValues['categoryName'] = $categoryName;*/

            }            
            echo (json_encode($returnValues));
            
        }
        else if($phpRequest=='php')
        {
            if($eContentIDphp!=null)
            { 
                // get data from DB
                $qeuryEventResult = $this->event_model->get_specific_record("Event_id",$_POST['EventID']);

                $events = array();

                // convert object to json object
                foreach ($qeuryEventResult->result() as $key => $event)
                {
                    $events[$key] = $event;
                }
                
                // return as array
                return $events;
            }
        }


    }//Function End getSpecialBookDetails()---------------------------------------------------FUNEND()



    



/******************************checkReservationExpired()*******************************************/
    //  If reservation not expired return remain count of return dates
    //@return 0  type : string  if not reserved content
    //@return integer  in remain some days return
    public function getRemainDateCount($startDate,$endDate)
    {
        // mysql date convert to timeStamp
        $startDateUnix  = mysql_to_unix($startDate);
        $endDateUnix    = mysql_to_unix($endDate);


        // check reservation expired
        if(($endDateUnix-$startDateUnix) > 0)
        {
            // get remain seconds
            $remainSeconds  = $endDateUnix-$startDateUnix;
            // get remain dates
            return ((($remainSeconds /24) /60) /60);
        }
        else
        {
            return false;
        }
        
    }//Function End checkReservationExpired()----------------------------------------------------------------FUNEND()





    /*******************************Start Function saveEditedEventDetails()**************************************/
    // save the COntent edited content details s
    //@phpRequest type:String
    //-accpet :PHP
    //@eContentIDphp type :String
    //-accept only content id
    //@editedData
    //-accpet : user Data array eg array ('Tile'=>$title);
    //#return type 
    //ajax : Json
    //PHP : aray
    public function saveEditedEventDetails($phpRequest=null,$contentIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('event_model');

        // check is this ajax caller
        if((isset($_POST['editedEventDetails'])) &&($_POST['submitMode']=='ajax'))
        { 
            // update Data base
            $result = $qeuryEcontentResult = $this->event_model->update_records($_POST['Event_ID'], $_POST['editedEventDetails']);

            // if update data base
            if ($result==1)
            {   
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            // not update data base
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }
            echo (json_encode($returnValues));
        }
        //  when php request
        elseif($phpRequest=='php')
        {            
            // update Data base
            $result = $qeuryEcontentResult = $this->event_model->update_records($contentIDphp, $editedDataphp);

            // if update data base
            if ($result==1)
            { 
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            // not update data base
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }
        
    }//Function End saveContentsEditedDetails()---------------------------------------------------FUNEND

    /*******************************Start Function contentStatusChangerDeactiveAndActive()**************************************/
    //  remove content(book) save in the data base
    // $_POST['rquestType']
    // - "1" = Content Available
    // - "0" = Content NotAvailable
    // - "D" = Content Deactive
    // $_POST['submitMode']
    // acceptable value : "ajax"
                
    //#return type :
    public function contentStatusChangerDeactiveAndActive($phpRequest=null,$contentIDphp=null,$statusType=null)
    {
        $returnValues = array();

        $this->load->model('content_model');
        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode']=='ajax'))
        {
            // get the form data submit by ajax
            if (isset($_POST['eContentId']))
            {
                // 1 = Content Available
                // 0 = Content NotAvailable
                // D = Content Deactive
                switch ($_POST['statusType'])
                {
                    case 'Available':
                        $dataBaseValue = array('Content_status' => 'Available');
                        break;
                    case 'Other':
                        $dataBaseValue = array('Content_status' => 'Other');
                        break;
                    case 'NotAvailable':
                        $dataBaseValue = array('Content_status' => 'NotAvailable');
                        break;
                    default:
                        $returnValues['status'] = 'error';
                        $returnValues['msg']    = 'Status Type Empty';
                        break;
                        
                }
                // update Data base
                $result = $qeuryEcontentResult = $this->content_model->update_records($_POST['eContentId'], $dataBaseValue);

                // if update data base (removed book)
                if ($result==1)
                {
                    $returnValues['status'] = 'success';
                    $returnValues['msg']    = 'Content removed from library';
                }
                // not update data base
                else
                {
                    $returnValues['status'] = "error";
                    $returnValues['msg']    = "Content didn't not update".$_POST['eContentId'];
                }                
            }
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Empty Content ID";
            }

            echo json_encode($returnValues);
        }
        //  when php request
        elseif($phpRequest=='php')
        {            
            switch ($_POST['statusType'])
            {
                case 'Available':
                    $dataBaseValue = array('Status' => 'Available');
                    break;
                case 'Other':
                    $dataBaseValue = array('Status' => 'Other');
                    break;
                case 'NotAvailable':
                    $dataBaseValue = array('Status' => 'NotAvailable');
                    break;
                default:
                    $returnValues['status'] = 'error';
                    $returnValues['msg']    = 'Status Type Empty';
                    break;
                    
            }
            // update Data base
            $result = $qeuryEcontentResult = $this->content_model->update_records($contentIDphp, $dataBaseValue);

            // if update data base
            if ($result==1)
            {
                $returnValues['status'] = 'success';
                $returnValues['msg']    = 'Data base updated';
            }
            // not update data base
            else
            {
                $returnValues['status'] = "error";
                $returnValues['msg']    = "Data base not updated";
            }

            return $returnValues;
        }  
    }//Function End contentStatusChangerDeactiveAndActive()---------------------------------------------------FUNEND()



	//functio to update close lends.
    public function closeLends()
    {
        $returnValues = array();

        $this->load->model('lending_model');

        // check is this ajax caller
        if((isset($_POST['submitMode'])) && ($_POST['submitMode']=='ajax'))
        {
            if(isset($_POST['LendId']))
            {
                $lendId = $_POST['LendId'];
                
                // get data from DB
                $lendDetails = $this->lending_model->getSpecificRecordForALend($lendId);

                $eContents = array();

                // convert object to json object
                foreach ($lendDetails->result() as $key=> $eContent)
                {
                    $eContents[$key] = $eContent;
                }

                $returnValues['eContents'] = $eContents;
            }

            echo json_encode($returnValues);
                //$lendDetailsArray = get_object_vars($lendDetails[0]);                           
        }

    }//Function End closeLends()---------------------------------------------------FUNEND()

	public function closeReserve()
    {
        $returnValues = array();

        $this->load->model('reservation_model');

        // check is this ajax caller
        if((isset($_POST['submitMode'])) && ($_POST['submitMode']=='ajax'))
        {
            if(isset($_POST['ReserveId']))
            {
                $reserveId = $_POST['ReserveId'];
                
                // get data from DB
                $reserveDetails = $this->reservation_model->getSpecificRecordForAReserve($reserveId);

                $eContents = array();

                // convert object to json object
                foreach ($reserveDetails->result() as $key=> $eContent)
                {
                    $eContents[$key] = $eContent;
                }

                $returnValues['reserve'] = $eContents;
            }

            echo json_encode($returnValues);
                //$lendDetailsArray = get_object_vars($lendDetails[0]);                           
        }

    }    

} // Eng MnageConetent Class{}-------------------------------------------------------------------------------CLSEND{}
