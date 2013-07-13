  

<style type="text/css" media="screen">
    .footer a{
        margin-right: 10px;
    }
</style>

  <div class="footer row-fluid" style="bottom: 0;margin-bottom: 0;">
    <p class="span12" style="text-align:center">

    	<a href="" title="" style="padding-right: 10px;border-right: 1px solid #CCC;"><img src="<?php echo base_url(); ?>img/eventImages/companylogo.png" alt="Company_logo" style="width: 100px;margin-bottom: 10px;"></a>
    	<?php if($this->session->userdata('loginStatus')){ echo '<a href="home"><span>Home</span></a>';} ?>
        <a href="<?php echo base_url(); ?>index.php/aboutUs">About us</a>
        <a href="<?php echo base_url(); ?>index.php/contactUs">Contact us</a>
        <!-- <a href="<?php echo base_url(); ?>index.php/donateBooks">Donate books</a> -->
        <!-- <a href="<?php echo base_url(); ?>index.php/policy">Policy</a> -->

    </p>
  </div>
  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url(); ?>js/validate.min.js"></script>
 
    <!-- google book search -->
    <script src="<?php echo base_url(); ?>js/googleBooks.js"></script>  


    <script src="<?php echo base_url(); ?>js/jqueryDataTables.js"></script>
     
    <script src="<?php echo base_url(); ?>js/DT_bootstrap.js"></script>

    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap/bootstrap-typeahead.js"></script>

    <!-- Type : library  usage : ajax file upload -->
    <script src="<?php echo base_url(); ?>js/ajaxfileupload.js"></script>
    
    <!-- Type : custome jQuety file usage :   -->
    <script src="<?php echo base_url(); ?>js/manageEvent.js"></script>
    <script src="<?php echo base_url(); ?>js/manageUser.js"></script>
    <script src="<?php echo base_url(); ?>js/adminPanel.js"></script>
    <script src="<?php echo base_url(); ?>js/manageCustomer.js"></script>
    <script src="<?php echo base_url(); ?>js/login.js"></script>
    <script src="<?php echo base_url(); ?>js/custom.js"></script>
    <script src="<?php echo base_url(); ?>js/managePayment.js"></script>
    <script src="<?php echo base_url(); ?>js/manageReports.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.clock.js"></script>


    <!-- System Settings-->
    <script src="<?php echo base_url(); ?>js/systemSettings.js"></script>
	 <!-- Contact us-->
    <script src="<?php echo base_url(); ?>js/contactUs.js"></script>


    <!--Generate PDF-->
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.from_html.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.PLUGINTEMPLATE.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.addimage.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.autoprint.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.cell.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.ie_below_9_shim.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.javascript.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.sillysvgrenderer.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.split_text_to_size.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/jspdf.plugin.standard_fonts_metrics.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/libs/Blob.js/BlobBuilder.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/libs/Blob.js/Blob.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/libs/Blob.js/BlobBuilder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jsPDF/libs/FileSaver.js/FileSaver.js"></script>
    
    <input type="hidden" id="base_url" id="base_url" value="<?php echo(base_url()); ?>">



</body>
</html>