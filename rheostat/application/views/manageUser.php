
	<?php $this->load->view('template/logo'); ?>
	

<div class="container-fluid">
	<nav style="width: 15%;text-align: right; float: left;">
	  <ul class="nav nav-list">
	    <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/manageEvents"><span>Manage Events</span></a></li>
            <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
	  </ul>
	</nav>
<div id="wraper" >
    <div id="wraperInner">

    	<div class="row-fluid resent-activites-title">
                <span class="span6"><h4 class='lead' style="margin-bottom: 0;">User Management</h4></span>

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
			<li class="active"><a href="#tab1" data-toggle="tab"><b class="icon-list"></b>&nbsp; List ALL Members</a></li>
			<li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp;Members Registration</a></li>
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
				    #OP_adimnContentDetails tbody td:last-child{
				        background-color: #3690c1;
				        position: absalute;
				        position: absolute;
				        right: 20px;

				    }

				    #OP_adimnContentDetails tbody td:last-child:hover{


				    }
				</style>
				

				<table class="table table-hover table-bordered" id="OP_adimnContentDetails">
					<thead>
						<tr>
							<th>Title</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>User Name</th>
							<th>NIC No</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Birth Day</th>							
							<th>Email</th>
							<th>Tel Number</th>
							<th>User Type</th>							
							<th>Registered Date</th>							
                                                        <th>Status</th>
							<th>Action</th>							
						</tr>
					</thead>
					<tbody>
						
						<?php if(isset($usersRecords)) : foreach($usersRecords->result() as $row): ?>
						<?php echo "<tr>";?>
							<?php echo "<td class='Title'>".$row->Title."</td>";?>
							<?php echo "<td class='First_name'>".$row->First_name."</td>";?>
							<?php echo "<td class='Last_name'>".$row->Last_name."</td>";?>
							<?php echo "<td class='User_name'>".$row->User_name."</td>";?>
							<?php echo "<td class='NIC_No'>".$row->NIC_No."</td>";?>
							<?php echo "<td class='Address'>".$row->Address."</td>";?>
							<?php echo "<td class='Gender'>".$row->Gender."</td>";?>
							<?php echo "<td class='Date_of_birth'>".$row->Date_of_birth."</td>";?>
							<?php echo "<td class='Email'>".$row->Email."</td>";?>
							<?php echo "<td class='Contact_No'>".$row->Contact_No."</td>";?>
							<?php echo "<td class='User_type'>".$row->User_type."</td>";?>							
							<?php echo "<td class='Date_of_register'>".$row->Date_of_register."</td>";?>
                                                        <?php echo "<td class='Date_of_register'>".$row->User_status."</td>";?>
							<?php echo "<td><a href='#' class='btn btn-mini  editUserDetailsPop-view' role='button' data-toggle='modal'>Edit/Deactivate</a></td>";?>
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
		$attributes = array('class' => 'form-horizontal', 'id' => 'ManageUserCreate'));
		?>
		<fieldset>
			<legend>Members Registration</legend>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_title">Title</label>
				<div class="controls">
					<?php 
					$Mem_title = array(						
						''		=> '- Please Select -',
						'Mr'	=> 'Mr',
						'Mrs'	=> 'Mrs',
						'Miss'	=> 'Miss',
						'Other'	=> 'Other',
						);
					echo form_dropdown('Mem_title" class="input-xlarge required" id="Mem_title',$Mem_title);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_firstname">First Name</label>
				<div class="controls">
					<?php 
					$Mem_firstname = array(
						'type'        => 'text',
						'name'        => 'Mem_firstname',
						'id'          => 'Mem_firstname',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg:-johon',
						);
					echo form_input($Mem_firstname);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mem_lastName">Last Name</label>
				<div class="controls">
					<?php 
					$Mem_lastName = array(
						'type'        => 'text',
						'name'        => 'Mem_lastName',
						'id'          => 'Mem_lastName',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'eg:- Doe',
						);
					echo form_input($Mem_lastName);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_userName">User Name</label>
				<div class="controls">
					<?php 
					$Mem_userName = array(
						'type'        => 'text',
						'name'        => 'Mem_userName',
						'id'          => 'Mem_userName',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg:-johon',
						);
					echo form_input($Mem_userName);
					?>
				<label id="Mem_userNameAvalable" class="error" for="Mem_userNameAvalable"></label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mem_nicNumber">NIC Number</label>
				<div class="controls">
					<?php 
					$Mem_nicNumber = array(
						'type'        => 'text',
						'name'        => 'Mem_nicNumber',
						'id'          => 'Mem_nicNumber',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'eg:-johon',
						);
					echo form_input($Mem_nicNumber);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mem_address">Address</label>
				<div class="controls">
					<?php 
					$Mem_address = array(
						'type'        => 'textarea',
						'name'        => 'Mem_address',
						'id'          => 'Mem_address',
						'class'       => 'input-xlarge',
						'maxlength'   => '256',
						'placeholder' => 'eg:- 123/1, some Plase, some town.',
						);
					echo form_textarea($Mem_address);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mem_Gender">Gender</label>
				<div class="controls">
					<?php 
						$Mem_Gender = array(
		                  //''  		=> '- Please Select -',
		                  'Male'    => 'Male',
		                  'Female ' => 'Female',
		                );
						echo form_dropdown('Mem_Gender" class="input-xlarge" id="Mem_Gender', $Mem_Gender);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mem_birthDay">Birthday</label>
				<div class="controls">
					<?php 
					$Mem_birthDay = array(
						'type'        => 'text',
						'name'        => 'Mem_birthDay',
						'id'          => 'Mem_birthDay',
						'class'       => 'input-xlarge dateISO',
						'maxlength'   => '100',
						'placeholder' => 'yyyy-mm-dd',
						);
					echo form_input($Mem_birthDay);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_email">Email</label>
				<div class="controls">
					<?php 
					$Mem_email = array(
						'type'        => 'Email',
						'name'        => 'Mem_email',
						'id'          => 'Mem_email',
						'class'       => 'input-xlarge required email',
						'maxlength'   => '100',
						'placeholder' => 'eg:- openlib@somename.lk',
						);
					echo form_input($Mem_email);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_telNumber">Mobile Number</label>
				<div class="controls">
					<?php 
					$Mem_telNumber = array(
						'type'        => 'tel',
						'name'        => 'Mem_telNumber',
						'id'          => 'Mem_telNumber',
						'class'       => 'input-xlarge required number',
						'maxlength'   => '10',
						'placeholder' => 'eg:- 725555555',
						);
					echo form_input($Mem_telNumber);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label r-label" for="Mem_usertype">User Type</label>
				<div class="controls">
					<?php 
						$Mem_usertype = array(
		                  ''  		      => '- Please Select -',
		                  'Administrator' => 'Administrator',
		                  'Manager' 	  => 'Manager',
                                  'Receptionist'  => 'Receptionist',		                 
		                );
						echo form_dropdown('Mem_usertype" class="input-xlarge required" id="Mem_usertype', $Mem_usertype);
					?>
				</div>
			</div>			

                        <div class="control-group">
				<label class="control-label r-label" for="Mem_regdate">Register Date</label>
				<div class="controls">
					<?php 
					$Mem_regdate = array(
						'type'      => 'text',
                                                'name'      => 'Mem_regdate',
                                                'id'        => 'Mem_regdate',
                                                'class'     => 'input-xlarge required',
                                                'maxlength' => '100',
                                                'value'     => date('Y-m-d'),
						);
					echo form_input($Mem_regdate);
					?>
				</div>
			</div>
                        
			<div class="form-actions">
				<button type="submit" id="createUser" name="createUser" class="btn btn-primary">&nbsp;Save&nbsp;</button>
				<button class="btn" id="cancelCreateUser">Cancel</button>
			</div>

		</fieldset>
	</form>

	<!-- Add new Contents -->
			</div>
		</div>
	</div>
</div>

	</div><!-- <div id="wraperInner"> -->
</div><!-- <div id="wraper" > -->


<!-- editUserDetailsPop Model -->
<div id="editUserDetailsPop" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editUserDetailsPopModal" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="editUserDetailsPopModal">Edit User Details</h3>
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
			<!-- <a href="#" role="button" aria-hidden="true" class="text-error editUserDetailsPop-deactivate hide" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span> -->
			<a href="#" role="button" id="makeEditableFelds">Edit</a>
		</span>
		<a href="#" role="button" aria-hidden="true" style="visibility: hidden" class="btn btn-primary editUserDetailsPop-save" >Save</a>
		<a class="btn" id='editUserDetailsPopContainerFotter' data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div> 

