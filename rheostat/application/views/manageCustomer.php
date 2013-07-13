
	<?php $this->load->view('template/logo'); ?>
	

<div class="container-fluid">
	<nav style="width: 15%;text-align: right; float: left;">
	  <ul class="nav nav-list">
	    <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
	    <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageEvents"><span>Manage Events</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
	  </ul>
	</nav>
<div id="wraper" >
    <div id="wraperInner">

    	<div class="row-fluid resent-activites-title">
                <span class="span6"><h4 class='lead' style="margin-bottom: 0;">Customer Management</h4></span>

                <div class="span6">
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
            </div>
		<hr class="blue">
		<div class="alert alert-success hide msgDisplay">
	        <a class="close" data-dismiss="alert">&times;</a>
	        <span></span>
    	</div>


	<div class="tabbable"> <!-- Only required for left/right tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><b class="icon-list"></b>&nbsp; List ALL Customers</a></li>
			<li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp;Customer Registration</a></li>
		</ul>
		<div class="tab-content">
			<!-- List ALL Contents -->
			<div class="tab-pane active" id="tab1">
				
					<!-- This is a DeactivateUser information alert -->	
					<div class="alert alert-success hide deactivateUser">
						<a class="close" data-dismiss="alert">&times;</a>
						<span id=""></span>
					</div>

				<style type="text/css" media="screen">
				    #OP_adimnCustomerDetails tbody td:last-child{
				        background-color: #3690c1;
				        position: absalute;
				        position: absolute;
				        right: 20px;

				    }

				    #OP_adimnCustomerDetails tbody td:last-child:hover{


				    }
				</style>
				

				<table class="table table-hover table-bordered" id="OP_adimnContentDetails">
					<thead>
						<tr>
							<th>Title</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>NIC No</th>
							<th>Gender</th>
							<th>Address1</th>
							<th>Address2</th>
							<th>Contact No1</th>							
							<th>Contact No2</th>							
							<th>Contact No3</th>							
							<th>Email</th>														
							<th style="width: 220px;display: block;padding-top: 30px;">Registered Date</th>							
                                                        <th>Status</th>
							<th>Action</th>							
						</tr>
					</thead>
					<tbody>
						
						<?php if(isset($customerRecords)) : foreach($customerRecords->result() as $row): ?>
						<?php echo "<tr>";?>
							<?php echo "<td class='Title'>".$row->Title."</td>";?>
							<?php echo "<td class='First_name'>".$row->First_name."</td>";?>
							<?php echo "<td class='Last_name'>".$row->Last_name."</td>";?>
							<?php echo "<td class='NIC_No'>".$row->NIC_no."</td>";?>
							<?php echo "<td class='Gender'>".$row->Gender."</td>";?>
							<?php echo "<td class='Address'>".$row->Address1."</td>";?>
							<?php echo "<td class='Address'>".$row->Address2."</td>";?>
							<?php echo "<td class='Contact_No'>".$row->Contact_no1."</td>";?>
							<?php echo "<td class='Contact_No'>".$row->Contact_no2."</td>";?>
							<?php echo "<td class='Contact_No'>".$row->Contact_no3."</td>";?>
							<?php echo "<td class='Email'>".$row->Email."</td>";?>														
							<?php echo "<td class='Date_of_register'>".$row->Date_of_register."</td>";?>
                                                        <?php echo "<td class='Date_of_register'>".$row->Customer_status."</td>";?>
							<?php echo "<td><a href='#' class='btn btn-mini  editCustomerDetailsPop-view' role='button' data-toggle='modal'>Edit/Deactivate</a></td>";?>
						<?php endforeach; ?>
					<?php echo "</tr>";?>

				<?php else: ?>
				<?php echo 'No records were returned.'; ?>
			<?php endif; ?>

		</tbody>
	</table>
	<!-- List ALL Contents -->
</div>

<br>
<div class="tab-pane" id="tab2">
	<!-- Add new Contents -->

	<!-- This is a save information alert -->	
	<div class="alert alert-success hide successMsages popupmsg">
		<a class="close" data-dismiss="alert">&times;</a>
		<span id=""></span>
	</div>
	
	<?php 

	echo form_open('',
		$attributes = array('class' => 'form-horizontal', 'id' => 'ManageCustomerCreate'));
		?>
		<fieldset>
			<legend>Customer Registration</legend>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_title">Title</label>
				<div class="controls">
					<?php 
					$Cus_title = array(						
						''	=> '- Please Select -',
						'Mr'	=> 'Mr',
						'Mrs'	=> 'Mrs',
						'Miss'	=> 'Miss',
						'Other'	=> 'Other',
						);
					echo form_dropdown('Cus_title" class="input-xlarge required" id="Cus_title',$Cus_title);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_firstname">First Name</label>
				<div class="controls">
					<?php 
					$Cus_firstname = array(
						'type'        => 'text',
						'name'        => 'Cus_firstname',
						'id'          => 'Cus_firstname',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'Eg:-johon',
						);
					echo form_input($Cus_firstname);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Cus_lastName">Last Name</label>
				<div class="controls">
					<?php 
					$Cus_lastName = array(
						'type'        => 'text',
						'name'        => 'Cus_lastName',
						'id'          => 'Cus_lastName',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'Eg:- Doe',
						);
					echo form_input($Cus_lastName);
					?>
				</div>
			</div>			

			<div class="control-group">
				<label class="control-label r-label" for="Cus_nicNumber">NIC Number</label>
				<div class="controls">
					<?php 
					$Cus_nicNumber = array(
						'type'        => 'text',
						'name'        => 'Cus_nicNumber',
						'id'          => 'Cus_nicNumber',
						'class'       => 'input-xlarge required',
						'maxlength'   => '10',
						'placeholder' => 'Eg:-893182500V',
						);
					echo form_input($Cus_nicNumber);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Cus_Gender">Gender</label>
				<div class="controls">
					<?php 
						$Cus_Gender = array(
		                  ''      => '- Please Select -',
		                  'Male'    => 'Male',
		                  'Female ' => 'Female',
		                );
						echo form_dropdown('Cus_Gender" class="input-xlarge" id="Cus_Gender', $Cus_Gender);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_address1">Address 1</label>
				<div class="controls">
					<?php 
					$Cus_address1 = array(
						'type'        => 'textarea',
						'name'        => 'Cus_address1',
						'id'          => 'Cus_address1',
						'class'       => 'input-xlarge required',
						'maxlength'   => '256',
						'placeholder' => 'Eg:- 123/1, some Plase, some town.',
						);
					echo form_textarea($Cus_address1);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Cus_address2">Address 2</label>
				<div class="controls">
					<?php 
					$Cus_address2 = array(
						'type'        => 'textarea',
						'name'        => 'Cus_address2',
						'id'          => 'Cus_address2',
						'class'       => 'input-xlarge',
						'maxlength'   => '256',
						'placeholder' => 'Eg:- 123/1, some Plase, some town.',
						);
					echo form_textarea($Cus_address2);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_telNumber1">Contact Number 1</label>
				<div class="controls">
					<?php 
					$Cus_telNumber1 = array(
						'type'        => 'tel',
						'name'        => 'Cus_telNumber1',
						'id'          => 'Cus_telNumber1',
						'class'       => 'input-xlarge required number',
						'maxlength'   => '10',
						'placeholder' => 'Eg:- 725555555',
						);
					echo form_input($Cus_telNumber1);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_telNumber2">Contact Number 2</label>
				<div class="controls">
					<?php 
					$Cus_telNumber2 = array(
						'type'        => 'tel',
						'name'        => 'Cus_telNumber2',
						'id'          => 'Cus_telNumber2',
						'class'       => 'input-xlarge required number',
						'maxlength'   => '10',
						'placeholder' => 'Eg:- 725555555',
						);
					echo form_input($Cus_telNumber2);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Cus_telNumber3">Contact Number 3</label>
				<div class="controls">
					<?php 
					$Cus_telNumber3 = array(
						'type'        => 'tel',
						'name'        => 'Cus_telNumber3',
						'id'          => 'Cus_telNumber3',
						'class'       => 'input-xlarge number',
						'maxlength'   => '10',
						'placeholder' => 'Eg:- 725555555',
						);
					echo form_input($Cus_telNumber3);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Cus_email">Email</label>
				<div class="controls">
					<?php 
					$Cus_email = array(
						'type'        => 'Email',
						'name'        => 'Cus_email',
						'id'          => 'Cus_email',
						'class'       => 'input-xlarge required email',
						'maxlength'   => '100',
						'placeholder' => 'Eg:- openlib@somename.lk',
						);
					echo form_input($Cus_email);
					?>
				</div>
			</div>
                        
                        <div class="control-group">
				<label class="control-label r-label" for="Cus_visitedDate">Date Visited</label>
				<div class="controls">
					<?php 
					$Cus_visitedDate = array(
						'type'      => 'text',
                                                'name'      => 'Cus_visitedDate',
                                                'id'        => 'Cus_visitedDate',
                                                'class'     => 'input-xlarge required',
                                                'maxlength' => '100',
                                                'value'     => date('Y-m-d'),
						);
					echo form_input($Cus_visitedDate);
					?>
				</div>
			</div>

			<div class="form-actions">
				<button type="submit" id="createCustomer" name="createCustomer" class="btn btn-primary">&nbsp;Save&nbsp;</button>
				<button class="btn" id="cancelCreateCustomer">Cancel</button>
			</div>

		</fieldset>
	</form>	
			</div>
		</div>
	</div>
</div>

	</div><!-- <div id="wraperInner"> -->
</div><!-- <div id="wraper" > -->


<!-- editcustomerDetailsPop Model -->
<div id="editUserDetailsPop" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editUserDetailsPopModal" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="editUserDetailsPopModal">Edit Customer Details</h3>
	</div>
	<div id="editUserDetailsPopContainer" class="modal-body">
		
		<table class="table table-hover">
				<!-- this  will display corrosponding user details managecontent.js -->
			<tbody>
			</tbody>
		</table>


	</div>
	<div class="modal-footer editUserDetailsPopContainerFotter">
		<span class="pull-left">
			<span id="editUserDetailsPopContainerActiveDeativeBTN" class='hide'> <a href="#" role="button" aria-hidden="true" class="text-error" ></a><span>&nbsp;/&nbsp;</span></span>			
			<a href="#" role="button" id="makeEditableFelds">Edit</a>
		</span>
		<a href="#" role="button" aria-hidden="true" style="visibility: hidden" class="btn btn-primary editCustomerDetailsPop-save" >Save</a>
		<a class="btn" id='editUserDetailsPopContainerFotter' data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div> 