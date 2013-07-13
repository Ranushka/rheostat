
<div class="container-fluid" style="margin-bottom: 30px;">
  <div class="row-fluid">
    <span class="span4">
      <a href="<?php echo base_url(); ?>index.php"><img src="<?php echo base_url(); ?>img/eventImages/logo.png" alt="Rheostat_Logo"></a>
    </span>
    <span class="span8">
      <span class="pull-right">
        <div class="buyerLogo">
          <img src="<?php echo base_url(); ?>img/eventImages/companylogo.png" alt="Company_logo">
          <p>Event Management System</p>
        </div>
      </span>
      <P class="pull-right wellcom">Welcome 
        
          <?php
            if($this->session->userdata('loginStatus'))
            {
  
              echo('<a href="'.base_url().'" title="" >'.ucwords(strtolower($this->session->userdata('firstName'))).'</a>');
              echo('&nbsp;|&nbsp;<a href="'.base_url().'index.php/userAuthentication/userLogOut" title="">Logout</a>');
            }
            else
            {
              echo('Guest');
            }
          ?>
        !
      </P>
  
    </span>
  </div>
</div>