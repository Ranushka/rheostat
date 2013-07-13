<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SystemSettings extends MY_Controller
{

    
    // Auto load the index funciton
    public function index($page = 'systemSettings')
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
                //$data['fineTypes'] = $this->getAllFineSettigsDetails("PHP");

                //$data['others'] = $this->getAllOtherSettigsDetails("PHP");
                
                //$data['categories'] = $this->getAllCategorySettigsDetails("PHP");



                $data['title'] = ucfirst("System Settings"); // Capitalize the first letter
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


    public function createSystemSettings()
    {
        
        
        $returnValues           = array();
        
        $formData               = array();

        // echo jason;

        // Get form data and check empty
        isset($_POST['ReserActivePeriod'])     ? $formData['Reservation_active_period']    = $_POST['ReserActivePeriod']   : $formData['Reservation_active_period']   = 'nodata';
        isset($_POST['LendingPeriod'])         ? $formData['Lending_period']               = $_POST['LendingPeriod']       : $formData['Lending_period']              = 'nodata';
        // isset($_POST['finePerday'])            ? $formData['For_adults']                   = $_POST['finePerday']          : $formData['     For_adults']              = 'nodata';


        $this->load->model('systemsettings_model');

        $result = $this->systemsettings_model->insert_record($formData);
                            // check data base updated :(
        if($result !== 1)
        {
            $returnValues['status'] = "error";

            $returnValues['msg'] = "not updated";

        }
        else
        {

                            // file was uploaded successfully :)
            $returnValues['status'] = "success";

            $returnValues['msg']    = "Save Datebase";

            
        }

                                // return value to Ajax js fucnton
        // echo json_encode($formData);
        echo json_encode($returnValues);
    }//Function End addPhysicalBook()---------------------------------------------------FUNEND()


    public function createFineTypeSettings()
    {
        
        
        $returnValues           = array();
        
        $formData               = array();

        // echo jason;

        // Get form data and check empty
        isset($_POST['FinePerday'])          ? $formData['Amount']               = $_POST['FinePerday']        : $formData['Amount']           = 'nodata';
        isset($_POST['ContentType'])         ? $formData['Content_type']         = $_POST['ContentType']       : $formData['Content_type']     = 'nodata';
        isset($_POST['Description'])         ? $formData['Description']          = $_POST['Description']       : $formData['Description']      = 'nodata';


        $this->load->model('systemSettings_model');

        $result = $this->systemSettings_model->insert_fineType_record($formData);
                            // check data base updated :(
        if($result !== 1)
        {
            $returnValues['status'] = "error";

            $returnValues['msg'] = "not updated";

        }
        else
        {

                            // file was uploaded successfully :)
            $returnValues['status'] = "success";

            $returnValues['msg']    = "Save Datebase";

            
        }

                                // return value to Ajax js fucnton
        // echo json_encode($formData);
        echo json_encode($returnValues);
    }//Function End addPhysicalBook()---------------------------------------------------FUNEND()

    public function getAllFineSettigsDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('systemsettings_model');
        $queryContentDetails = $this->systemsettings_model->listAllFineSettigsDetails();
        
        if(!$queryContentDetails==0)
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
            return $returnValues['fineTypes'] = $queryContentDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryContentDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['fineTypes']  = $queryContentDetails;
            echo json_encode($returnValues);
        }

    }//Function End getAllContentDetails()---------------------------------------------------FUNEND()


    //Modal FineType Settings Preview
    public function getAllFineTypeSettingsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['finetypeID']))&&(!is_null($_POST['finetypeID']))) 
        {
            // isset($_POST['finetypeID'])?$finetypeID= : $finetypeID = NULL;
            // if ($finetypeID!==NULL)
            // {
                $this->load->model('systemsettings_model');
                $fineTypeAllDetails = $this->systemsettings_model->getFineTypeValuesPreview(array('Finetype_id' => $_POST['finetypeID']));
                if ($fineTypeAllDetails!==0)
                {

                    $returnValues['fineTypeAllDetail'] = $fineTypeAllDetails->row();
                    $returnValues['status'] = 'success';
                    $returnValues['msg'] = 'User details return';
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg'] = 'Not existing user data base';
                }           

            // }
            // else
            // {
            //     $returnValues['status'] = 'error';
            //     $returnValues['msg'] = 'Plese No user name selected';
            // }
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }
        echo json_encode($returnValues);

    }//Function End getAllDetailsForSpecificUser()---------------------------------------------------FUNEND()


    public function getAllOtherSettigsDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('systemsettings_model');
        $queryContentDetails = $this->systemsettings_model->listAllOtherSettigsDetails();
        
        if(!$queryContentDetails==0)
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
            return $returnValues['others'] = $queryContentDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryContentDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['others']  = $queryContentDetails;
            echo json_encode($returnValues);
        }

    }//Function End getAllContentDetails()---------------------------------------------------FUNEND()


    //Modal FineType Settings Preview
    public function getAllOtherSettingsDetailsViewModal()
    {
        $returnValues = array();

        if(isset($_POST['SystemSettingsID'])) 
        {
            // isset($_POST['SystemSettingsID'])?$SystemSettingsID=$_POST['SystemSettingsID'] : $SystemSettingsID = NULL;
            // if ($SystemSettingsID!==NULL)
            // {
                $this->load->model('systemsettings_model');
                $OtherSettingsAllDetails = $this->systemsettings_model->getOtherValuesPreview(array('System_Settings_id' => $_POST['SystemSettingsID']));
                if ($OtherSettingsAllDetails!==0)
                {

                    $returnValues['OtherSettingsAllDetail'] = $OtherSettingsAllDetails->row();
                    $returnValues['status'] = 'success';
                    $returnValues['msg'] = 'User details return';
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg'] = 'Not existing user data base';
                }           

            // }
            // else
            // {
            //     $returnValues['status'] = 'error';
            //     $returnValues['msg'] = 'Plese No user name selected';
            // }
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }
        echo json_encode($returnValues);

    }//Function End getAllDetailsForSpecificUser()---------------------------------------------------FUNEND()


    //save FineType settings Preview details
    public function saveFineTypeEditedDetails($phpRequest=null,$contentIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('systemsettings_model');
        // check is this ajax caller
        if((isset($_POST['editedFineTypeDetails'])) &&($_POST['submitMode']=='ajax'))
        {
     
            // update Data base
            $result = $qeuryEcontentResult = $this->systemsettings_model->update_records($_POST['finetypeID'], $_POST['editedFineTypeDetails']);

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
            echo json_encode($returnValues);
        }
        //  when php request
        elseif($phpRequest=='php')
        {            
            // update Data base
            $result = $qeuryEcontentResult = $this->systemsettings_model->update_records($contentIDphp, $editedDataphp);

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


    //save other settings Preview details
    public function saveOtherSettingsEditedDetails($phpRequest=null,$contentIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('systemsettings_model');
        // check is this ajax caller
        if((isset($_POST['editedOtherDetails'])) &&($_POST['submitMode']=='ajax'))
        {
     
            // update Data base
            $result = $qeuryEcontentResult = $this->systemsettings_model->update_other_records($_POST['SystemSettingsID'], $_POST['editedOtherDetails']);

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
            echo json_encode($returnValues);
        }
        //  when php request
        elseif($phpRequest=='php')
        {            
            // update Data base
            $result = $qeuryEcontentResult = $this->systemsettings_model->update_other_records($contentIDphp, $editedDataphp);

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

    //save Categories in database
    public function saveCategoryDetails()
    {
        
        
        $returnValues           = array();
        
        $formData               = array();

        // echo jason;

        // Get form data and check empty
        isset($_POST['AddCategory'])            ? $formData['Category_name']      = $_POST['AddCategory']             : $formData['Category_name']   = 'nodata';
        isset($_POST['CategoryDescription'])    ? $formData['Description']        = $_POST['CategoryDescription']     : $formData['Description']     = 'nodata';
        // isset($_POST['finePerday'])            ? $formData['For_adults']                   = $_POST['finePerday']          : $formData['     For_adults']              = 'nodata';


        $this->load->model('systemsettings_model');

        $result = $this->systemsettings_model->insert_record_categories($formData);
                            // check data base updated :(
        if($result !== 1)
        {
            $returnValues['status'] = "error";

            $returnValues['msg'] = "not updated";

        }
        else
        {

                            // file was uploaded successfully :)
            $returnValues['status'] = "success";

            $returnValues['msg']    = "Save Datebase";

            
        }

                                // return value to Ajax js fucnton
        // echo json_encode($formData);
        echo json_encode($returnValues);
    }//Function End addPhysicalBook()---------------------------------------------------FUNEND()

    //table view in Category Settings
    public function getAllCategorySettigsDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('systemsettings_model');
        $queryContentDetails = $this->systemsettings_model->listAllCategorySettigsDetails();
        
        if(!$queryContentDetails==0)
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
            return $returnValues['categories'] = $queryContentDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryContentDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['categories']  = $queryContentDetails;
            echo json_encode($returnValues);
        }

    }//Function End getAllContentDetails()---------------------------------------------------FUNEND()

    //Modal Category Settings Preview
    public function getAllCategorySettingsDetailsViewModal()
    {
        $returnValues = array();

        if((isset($_POST['CategoryID']))&&(!is_null($_POST['CategoryID']))) 
        {
            // isset($_POST['finetypeID'])?$finetypeID= : $finetypeID = NULL;
            // if ($finetypeID!==NULL)
            // {
                $this->load->model('systemsettings_model');
                $categoryAllDetails = $this->systemsettings_model->getCategoryValuesPreview(array('Category_id' => $_POST['CategoryID']));
                if ($categoryAllDetails!==0)
                {

                    $returnValues['categoryAllDetail'] = $categoryAllDetails->row();
                    $returnValues['status'] = 'success';
                    $returnValues['msg'] = 'User details return';
                }
                else
                {
                    $returnValues['status'] = 'error';
                    $returnValues['msg'] = 'Not existing user data base';
                }           

            // }
            // else
            // {
            //     $returnValues['status'] = 'error';
            //     $returnValues['msg'] = 'Plese No user name selected';
            // }
            
        }
        else
        {
            $returnValues['status'] = 'error';
            $returnValues['msg'] = 'data not send';         
        }
        echo json_encode($returnValues);

    }//Function End getAllDetailsForSpecificUser()---------------------------------------------------FUNEND()

    //save Category settings Preview details
    public function saveCategoryEditedDetails($phpRequest=null,$contentIDphp=null,$editedDataphp=null)
    {
        $returnValues = array();

        $this->load->model('systemsettings_model');
        // check is this ajax caller
        if((isset($_POST['editedCategoryDetails'])) &&($_POST['submitMode']=='ajax'))
        {
     
            // update Data base
            $result = $qeuryCategoryResult = $this->systemsettings_model->update_category_records($_POST['CategoryID'], $_POST['editedCategoryDetails']);

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
            echo json_encode($returnValues);
        }
        //  when php request
        elseif($phpRequest=='php')
        {            
            // update Data base
            $result = $qeuryCategoryResult = $this->systemsettings_model->update_category_records($contentIDphp, $editedDataphp);

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
        
    }//Function End saveCategoryEditedDetails()---------------------------------------------------FUNEND


}

/* End of file systemSettings.php */
/* Location: ./application/controllers/systemSettings.php */