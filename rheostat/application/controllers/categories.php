<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller
{

	public function index($page = 'categories')
	{
		//$this->load->view('home');

		
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

        /*$data['eContents'] = $this->getAllContentDetails("PHP");

		$data['contentcategories'] = $this->getAllCategoryDetails("PHP");//category
		$data['booksdetails']         = $this->getbooksdetails("PHP");
        $data['econtentdetails']      = $this->getecontentdetails("PHP");
        $data['mediadetails']         = $this->getmediadetails("PHP");*/
		$this->load->view($page);

		
	}




/******************************getAllContentDetails()*****************************************/
    // Get all content details using for PHP
    //@var type :
    //#return type : ajax for json object
    //#return type : PHP for arrray
    // calling url : http://HOST/openLib/manageContent/getAllContentDetails/
    public function getAllContentDetails($submitMode=null)
    {
        $returnValues['status'] = "";
        $returnValues['msg']    = "";

        $this->load->model('content_model');
        $queryContentDetails = $this->content_model->listAllContentDetails();
        
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
            return $returnValues['eContents'] = $queryContentDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryContentDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['eContents']  = $queryContentDetails;
            echo json_encode($returnValues);
        }

    }//Function End getAllContentDetails()---------------------------------------------------FUNEND()




	public function getAllCategoryDetails($submitMode=null)
    {
        $this->load->model('category_model');

       $queryCategoryDetails = $this->category_model->get_contentcategory_records();
       
       if(!$queryCategoryDetails==0)
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
            return $returnValues['contentcategories'] = $queryCategoryDetails;
        }
        // if post request return as object
        else if( isset($submitMode) && $submitMode=="PHP" )
        {
            return $queryCategoryDetails;
        }
        // if ajax request return json encoded data array
        else if( isset($_POST['submitMode']) && $_POST['submitMode']=="ajax" )
        {
            $returnValues['contentcategories']  = $queryCategoryDetails->result();
            echo json_encode($returnValues);
        }
    }

	public function getbooksdetails($submitMode=null)
    {
          $this->load->model('category_model');
          $querybooksDetails = $this->category_model->get_books_details();
          return $querybooksDetails;
    }
	
	public function getecontentdetails($submitMode=null)
    {
          $this->load->model('category_model');
          $queryecontentsDetails = $this->category_model->get_econtent_details();
          return $queryecontentsDetails;
    }
	public function getmediadetails($submitMode=null)
    {
          
          $this->load->model('category_model');
          $querymediaDetails = $this->category_model->get_media_details();
          return $querymediaDetails;
    }

      /*************************Start Function googleBooksSearch()***********************************/
    //Owner : Suren Shanaka
    //
    //@ type : PHP
    //# Search Available books in the google

    public function googleBooksSearch()
    {
       
        

          $results = array();
       
        if (isset($_POST['searched_qury']))
        {
           
            $results['search'] = $this->google->books($_POST['searched_qury']);
            $results['status'] = 'success';
            $results['msg'] = 'value set';
            
        }
        else
        {
            $results['status'] = 'error';
            $results['msg'] = 'Not set search value';
        
        }
        
        echo json_encode($results);

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */