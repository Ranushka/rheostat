<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/logo'); ?>
<div class="container">
    
    <nav class="navigateContainer row-fluid">
	        <div class="span6">
		        <?php if(!$this->session->userdata('loginStatus')){ echo '<a class="navigate" href="'. base_url() .'index.php/user/login"><span>Login</span></a>';} ?>
				<?php if($this->session->userdata('loginStatus')){ echo '<a class="navigate" href="home"><span>Home</span></a>';} ?>
				<a class="navigate" href="<?php echo base_url();?>index.php/categories"><span>Search</span></a>
				<a class="navigate" href="<?php echo base_url();?>index.php/help"><span>Help</span></a>
	    	</div>
	        <div class="span6" style="line-height: 42px;">
	            <span id="digital-clock" class="digital pull-right">
	                <em>
	                    <?php 
	                    // Return date/time info of a timestamp; then format the output
	                        $mydate=getdate(date("U"));
	                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
	                     ?>
	                </em>&nbsp;|&nbsp;
	              <em class="hour"></em>
	              <em class="min"></em>
	              <em class="sec"></em>
	              <em class="meridiem"></em>
	            </span>
	        </div>
	    </nav>  
     <table width="671" cellspacing="20" border="0">
        <tbody>
            <tr>
                <td style="vertical-align: top;">
                    <strong>Address</strong>
                    <p></p>
                    <p>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>                       
                    </p>                     
                    <p>Chance Palace,</p>
                    <p>Kottala,</p>
                    <p>Veyangoda,</p>
                    <p>Sri Lanka</p>
                </td>
                <td style="vertical-align: top;">
                   <strong>Telephone</strong>
                   <p></p>
                   <p>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                            <strong></strong>
                        +94(0)33 228 7580
                    <br>
                  <strong></strong>
                  </p>
                  <p>
                  <strong>Mobile</strong>
                  </p>
                  <p>+94(0)77 970 4200</p>                  
            </td>
            <td style="vertical-align: top;">
                    <strong>Email</strong>
                    <p></p>
                    <p>
                        info@chance.lk
                    </p>
                    <strong>Skype</strong>
                    <p></p>
                    <p>
                        chanceln
            </td>
            <td style="vertical-align: top;">
                    <strong>Social Media</strong>
                    <p></p>
                    <p>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                    <strong></strong>
                        <a href="https://www.facebook.com/Hotel.Chance.Palace.Sri.Lanka?ref=ts&fref=ts">Facebook</a>
                        </p>
                        
            </td>
            </tr>
        </tbody>
    </table>
    <h3>Contact Us</h3>
    <hr class="blue">
      <!-- successMsg -->
          <div class="alert alert-success hide" id="sendSuccessMsg">
                <a class="close" data-dismiss="alert">&times;</a>
                <span></span>
         </div>
    <?php
    
    echo form_open('',
		$attributes = array('class' => 'form-horizontal', 'id' => 'ContactUsCreate'));
		?>
    
    <fieldset>
                        <div class="control-group">
				<label class="control-label r-label" for="Your_Name">Your Name</label>
				<div class="controls">
					<?php 
					$Your_name = array(
						'type'        => 'text',
						'name'        => 'Your_Name',
						'id'          => 'Your_Name',
						'class'       => 'input-xlarge required',
						'maxlength'   => '200',
						'placeholder' => 'eg:-johon Peterson',
						);
					echo form_input($Your_name);
					?>
				</div>
			</div>
                        <div class="control-group">
				<label class="control-label r-label" for="Your_Email">Your Email</label>
				<div class="controls">
					<?php 
					$Your_email = array(
						'type'        => 'Email',
						'name'        => 'Your_Email',
						'id'          => 'Your_Email',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg:- abc@somename.lk',
						);
					echo form_input($Your_email);
					?>
				</div>
			</div>
                        <div class="control-group">
				<label class="control-label r-label" for="Your_Subject">Subject</label>
				<div class="controls">
					<?php 
					$Your_sub = array(
						'type'        => 'text',
						'name'        => 'Your_Subject',
						'id'          => 'Your_Subject',
						'class'       => 'input-xlarge required',
						'maxlength'   => '200',
						'placeholder' => 'eg:-subject',
						);
					echo form_input($Your_sub);
					?>
				</div>
			</div>
                        <div class="control-group">
				<label class="control-label r-label" for="Your_Message">Your Message</label>
				<div class="controls">
					<?php 
					$Your_mess = array(
						'type'        => 'textarea',
						'name'        => 'Your_Message',
						'id'          => 'Your_Message',
						'class'       => 'input-xlarge required',
						'maxlength'   => '500',
						'placeholder' => 'eg:-message',
						);
					echo form_textarea($Your_mess);
					?>
				</div>
			</div>
        <div class="form-actions">
				<button type="submit" id="createContact" name="createContact" class="btn btn-primary">Send</button>
				
        </div>
    </fieldset>
</div>
<?php $this->load->view("template/footer"); ?>