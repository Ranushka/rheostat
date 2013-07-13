<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePayment extends MY_Controller
{

    public function index($page = 'ManagePayment')
    {

        if (!file_exists('application/views/' . $page . '.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

         // check user is logged in to system and load admin panel
        if($this->isLoggedIn())
        {
            // user log and admin panel acces only for admin user
            if($this->getUserType() == "Administrator")
            {
                $data = array();
        
                $data['events']   = $this->getAllEventDetails("PHP");
                
                $this->load->model('payment_model');

                if ($paymentRecords = $this->payment_model->get_all_record()) 
                {
                    $data['paymentRecords'] = $paymentRecords;
                }
                       

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

    public function getAllEventDetails($submitMode=null)
    {
       $this->load->model('event_model');

       $queryEventDetails = $this->event_model->getAllTemporaryEvents();
       
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

    }     

    public function addNewPayment()
    {
        $this->load->model('event_model');
        $this->load->model('menu_model');
        $this->load->model('payment_model');

        $returnValues           = array();
        $formData               = array();

        if (isset($_POST['advance_amount']))
        {
            $advaceAmount   = str_replace( ',', '',$_POST['advance_amount'])+0;
        }
        if (isset($_POST['number_of_lights']))
        {
            $numberofLights = str_replace( ',', '',$_POST['number_of_lights'])+0;        
        }
        
        $formData['Numberof_lights']    = $numberofLights;
        $formData['Advance_amount']     = $advaceAmount;

        isset($_POST['Event_id'])            ? $formData['Event_id']           = $_POST['Event_id']          : $formData['Event_id']           = "noAmount";
        isset($_POST['amount_paid'])         ? $formData['Amount_paid']        = $_POST['amount_paid']       : $formData['Amount_paid']        = "0";
        isset($_POST['date_paid'])           ? $formData['Date_paid']          = $_POST['date_paid']         : $formData['Date_paid']          = "0";
        isset($_POST['additional_charges'])  ? $formData['Other_description']  = $_POST['additional_charges']: $formData['Other_description']  = "0";
        

        $getEventDetails = $this->event_model->getSpecificEventDetails($_POST['Event_id']);

        if (null != $getEventDetails && $getEventDetails != '')         //If there is an event for perticula id?
        {
                        //yes, then extract stdClassObject to array()
            $newEventDetails = array();
            for($index=0; $index<sizeof($getEventDetails); $index++)
            {                    
                $newEventDetails[$index] = get_object_vars($getEventDetails[$index]);
            }

            $getMenuPrice = $this->menu_model->getMenuPriceForSpecificMenu($newEventDetails[0]['Menu_id']);

            $newPaymentDetails = array();
            for($index=0; $index<sizeof($getMenuPrice); $index++)
            {                    
                $newPaymentDetails[$index] = get_object_vars($getMenuPrice[$index]);
            }

            if (isset($_POST['rate_per_hour']) && (isset($_POST['ac_hours'])))          //if the user has asked for A/C?
            {
                            //yes, then calculate the total ac amount.
                $totalAmountForAc = $this->calculateAmountForAc($_POST['rate_per_hour'],$_POST['ac_hours']);
            }

            if (isset($_POST['number_of_lights']))  //if the user has requested for the  lights?
            {                
                            //yes, then get the perticular amount.
                $amountForLights = null;
                if ($_POST['number_of_lights'] == '10,000')
                {
                    $amountForLights = $_POST['light_amount10000'];
                }

                if ($_POST['number_of_lights'] == '15,000')
                {
                    $amountForLights = $_POST['light_amount20000'];
                }

                if ($_POST['number_of_lights'] == '>20,000')
                {
                    $amountForLights = $_POST['light_amountabove20000'];  
                }
            }

            if (isset($_POST['other_prices']))
            {
                $other_prices = $_POST['other_prices'];
            }
                    //calculate the total amount for the selected menu.
               $totalAmountForPlates = $this->calculateTotalPriceForPlates($newEventDetails[0]['Event_crowd'],$newPaymentDetails[0]['Menu_price']);
            
                        //if user has gto the ac, light and other poducts.
            if ((null != $totalAmountForAc && $totalAmountForAc != '') || (null != $amountForLights && $amountForLights != '') || (null != $totalAmountForPlates && $totalAmountForPlates != '') || (null != $other_prices && $other_prices != ''))
            {
                            //yes, then calculate the final amount
                $finalTotalAmount = $this->calculateFinalAmount($totalAmountForAc,$amountForLights,$totalAmountForPlates,$other_prices);
            }


            $dueAmount = $this->calculateDueAmount($finalTotalAmount,$_POST['advance_amount'],$_POST['amount_paid']);            

            //get the due date
            $dueDate   = $this->calculateDueDate($newEventDetails[0]['Event_date']);
                        
            $formData['Total_amount']         = $finalTotalAmount;
            $formData['Due_amound']           = $dueAmount['dueAmount'];
            
            if ( null != $dueAmount['dueAdvanceAmount'] && $dueAmount['dueAdvanceAmount'] != '')
            {                
                $formData['Due_advance_amount']   = $dueAmount['dueAdvanceAmount'];
            }
            
            $formData['Due_date']             = $dueDate;
            $formData['Customer_id']          = $newEventDetails[0]['Customer_id'];
            $formData['For_ac']               = $totalAmountForAc;
            $formData['For_lights']           = (str_replace( ',', '',$amountForLights)+0);
            $formData['Other_amount']         = $other_prices;
            $formData['Payment_status']       = 'Active';

            $result = $this->payment_model->insertPaymentData($formData);

            if($result != 0)
            {
                $this->event_model->updateSpecificEvent($_POST['Event_id']);

                $returnValues['status'] = "success";

                $returnValues['msg']    = "Payment added";
            }            

        }
        else
        {
                        //no, then return the error message.
            $returnValues['status'] = "error";

            $returnValues['msg']    = "Incorrect Payment ID";

        }        
        
        echo json_encode($returnValues);       
    }

    //function to calculate total prices for menu
    public function calculateTotalPriceForPlates($Event_crowd,$Menu_price)
    {
        $totalAmount = (($Event_crowd+0) * ($Menu_price+0));

        return $totalAmount;
    }

    //function to calculate ac amount.
    public function calculateAmountForAc($RatePerHour,$NumberofHours)
    {
        $totalAmountForAc = (str_replace( ',', '',$RatePerHour)+0) * ($NumberofHours+0);

        return $totalAmountForAc;
    }

    //function to calculate the due amount
    public function calculateDueAmount($totalAmount,$AdvanceAmount,$amount_paid)
    {

        if (($amount_paid+0) >= str_replace( ',', '',$AdvanceAmount)+0)       //if the customer has padid the full advance or more than?
        {             
                        //yes, then reduce the amount paid form total amount and return the due amount.
            $totalDueAmount = array(
                                'dueAmount'         => (($totalAmount+0) - ($amount_paid+0)),
                                 'dueAdvanceAmount' => ''
                                ); 
        }
        else
        {           // no, then calculate the due advance, return the due advance amount totaln amount.
           $totalDueAmount   = array(
                            'dueAmount'        => (($totalAmount+0) - ($amount_paid+0)),
                            'dueAdvanceAmount' => ((str_replace( ',', '',$AdvanceAmount)+0) - ($amount_paid+0))
                            );            
        }


        return $totalDueAmount;
    }


    //function to calculate the final amount
    public function calculateFinalAmount($totalAmountForAc,$amountForLights,$totalAmountForPlates,$other_prices)
    {
        $finalAmount = (($totalAmountForAc+0) + (str_replace( ',', '',$amountForLights)+0) + ($totalAmountForPlates+0) + ($other_prices+0));
        
        return $finalAmount;
    }

    //function to calculate the due date
    public function calculateDueDate($Event_date)
    {
        $paymentDueDate = date('Y-m-d', strtotime($Event_date) - 86400*7);

        return $paymentDueDate;
    }

    //function to get payment details to update
    public function aJaxGetPaymentsToUpdate($phpRequest=null,$paymentIDphp=null)
    {
        $returnValues = array();

        $this->load->model('payment_model');
        //$this->load->model('category_model');
        
        // check is this ajax caller
        if((isset($_POST['submitMode'])) &&($_POST['submitMode']=='ajax'))
        {
            if(isset($_POST['PaymentID']))
            {
                // get data from DB
                $qeuryPaymentResult = $this->payment_model->get_specific_record("Payment_id",$_POST['PaymentID']);

                $payments = array();
                // convert object to json object
                foreach ($qeuryPaymentResult->result() as $key=> $payment)
                {
                    $payments[$key] = $payment;
                }

                    $returnValues['payments'] = $payments;
            }            
            echo (json_encode($returnValues));
            
        }
        else if($phpRequest=='php')
        {
            if($paymentIDphp!=null)
            { 
                // get data from DB
                $qeuryPaymentResult = $this->event_model->get_specific_record("Event_id",$_POST['EventID']);

                $payments = array();

                // convert object to json object
                foreach ($qeuryPaymentResult->result() as $key => $payment)
                {
                    $payments[$key] = $payment;
                }
                
                // return as array
                return $payments;
            }
        }
    }

    //function to save edited payments details
    public function saveEditedPaymentDetails($phpRequest=null,$paymentIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('payment_model');

        // check is this ajax caller
        if((isset($_POST['editedPaymentDetails'])) &&($_POST['submitMode']=='ajax'))
        { 
            // update Data base
            $result = $qeuryPaymentResult = $this->payment_model->update_records($_POST['PaymentId'], $_POST['editedPaymentDetails']);

            // if update data base
            if ($result==1)
            {   
                $returnValues['status']       = 'success';
                $returnValues['msg']          = 'Data base updated';
                $returnValues['PaymentId']    = $_POST['PaymentId'];
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
            $result = $qeuryPaymentResult = $this->payment_model->update_records($paymentIDphp, $editedDataphp);

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

    }

    public function calculateTotalAmountAfterUpdatePaymentDetails()
    {
        if (isset($_POST['PaymentID']))
        {
            
            $this->load->model('payment_model');

            $updatedDetails = $this->payment_model->getDetailstoCalculate($_POST['PaymentID']);

            if (null != $updatedDetails && $updatedDetails != '')
            {
                $newUpdatedPaymentDetails = array();
                for($index=0; $index<sizeof($updatedDetails); $index++)
                {                    
                    $newUpdatedPaymentDetails[$index] = get_object_vars($updatedDetails[$index]);
                }

                $newFinalTotalAmounToPay = $this->calculateFinalAmount($newUpdatedPaymentDetails[0]['For_ac'],$newUpdatedPaymentDetails[0]['For_lights'],$newUpdatedPaymentDetails[0]['Due_amound'],$newUpdatedPaymentDetails[0]['Other_amount']);
                
                $returnValues['newTotalAmount'] = $newFinalTotalAmounToPay;
            }

            echo json_encode($returnValues);
        }
    }


}

/* End of file barcode.php */
/* Location: ./application/controllers/barcode.php */

?>