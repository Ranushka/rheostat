<?php $this->load->view('template/logo'); ?>

<div class="container-fluid">
	<nav style="width: 15%;text-align: right; float: left;">
	  <ul class="nav nav-list">
	    <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageEvents"><span>Manage Events</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
        <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
	  </ul>
	</nav>


<style type="text/css" media="screen">
	#OP_adimnContentDetails_length label select{
		width: 100px;
	}
        
</style>

<div id="wraper" >
	<div id="wraperInner">
		<div class="row-fluid resent-activites-title">  
			<span class="span6"><h4 class="lead" style="margin-bottom: 0;">Latest Created</h4></span>        
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
		<div class="alert alert-success hide successMsages">		
			<span class="successMsagesContainer"></span>
		</div>
		<div class="tabbable"> <!-- Only required for left/right tabs -->
			<div class="tab-content">
				<!-- List ALL Contents -->
				<div class="" id="tab1">
					<?php echo form_open('index.php/reportsGenerator/latestCreations', $attributes = array('id' => 'latestCreations')); ?>
					<label class="control-label r-label" for="Start_Date">Start Date</label>
					<div class="controls">
						<?php 
							$Start_Date = array(
											'type'        => 'text',
											'name'        => 'latestadd_Start_Date',
											'id'          => 'latestadd_Start_Date',
											'class'       => 'input-xlarge required dateISO',
											'maxlength'   => '100',
											'placeholder' => 'yyyy-mm-dd',
											);
							echo form_input($Start_Date);
						?>
					</div>
					<label class="control-label r-label" for="End_Date">End Date</label>
					<div class="controls">
						<?php 
							$End_Date = array(
											'type'        => 'text',
											'name'        => 'latestadd_End_Date',
											'id'          => 'latestadd_End_Date',
											'class'       => 'input-xlarge required dateISO',
											'maxlength'   => '100',
											'placeholder' => 'yyyy-mm-dd',
							);
							echo form_input($End_Date);
						?>
					</div>
					<label class="control-label r-label" for="Select_event">Event Type</label>
					<div class="controls">
						<?php 
						$Select_event = array(
											''  		        => '- Please Select -',
											'Wedding'    	    => 'Wedding',
											'Home Comming' 	    => 'Home Comming',
											'Birth Day Party' 	=> 'Birth Day Party',
											'Conference Party' 	=> 'Conference Party',
											'Special Occation' 	=> 'Special Occation',
											'Meeting' 	        => 'Meeting',
						);
						echo form_dropdown('Select_event" class="input-xlarge required" id="Select_event', $Select_event);
						?>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="getlatestadditions" name="getlatestadditions" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<?php echo form_close(); ?>
					<style type="text/css" media="screen"></style>
					<table class="table table-hover table-bordered" id="latestbook">
                                            <?php if(isset($latestEventDetails)) : ?>
						<!-- Start List ALL Events -->			
						<?php echo '<h4>Latest Events Details</h4>'; ?>
						<thead>
							<tr>
								<th>Event Title</th>
								<th>Event Date</th>
								<th>Event Crowd</th>
								<th>No of Employees</th>
								<th>Event Type</th>
								<th>Menu ID</th>
								<th>Hall ID</th>
								<th>Event Status</th>
								<th>Customer ID</th>
								<th>Date Created</th>											
							</tr>
						</thead>
						<tbody>						
							<?php foreach($latestEventDetails as $key=>$value): ?>
							<?php echo "<tr>";?>
							<?php echo "<td class='Event_title'>".$value['Event_title']."</td>";?>
							<?php echo "<td class='Event_date'>".$value['Event_date']."</td>";?>
							<?php echo "<td class='Event_crowd'>".$value['Event_crowd']."</td>";?>
							<?php echo "<td class='No_of_employees'>".$value['No_of_employees']."</td>";?>
							<?php echo "<td class='Event_type'>".$value['Event_type']."</td>";?>
							<?php echo "<td class='Menu_id'>".$value['Menu_id']."</td>";?>
							<?php echo "<td class='Hall_id'>".$value['Hall_id']."</td>";?>
							<?php echo "<td class='Event_status'>".$value['Event_status']."</td>";?>
							<?php echo "<td class='Customer_id'>".$value['Customer_id']."</td>";?>
							<?php echo "<td class='Date_create'>".$value['Date_create']."</td>";?>
							<?php endforeach; ?>
							<?php echo "</tr>";?>
							<?php else: ?>				<!--No records were returned.-->
						</tbody>
                                        <?php endif; ?>
					</table>
					<!-- End List ALL Menus -->            
					
					<table class="table table-hover table-bordered" id="latestMenu">  <!-- Start List ALL Menus -->			
                                            <?php if(isset($latestMenu)) : ?>
                                            <?php echo '<h4>Latest Menu Details</h4>'; ?>
						<thead>
							<tr>
								<th>Menu ID</th>
								<th>Menu Name</th>
								<th>Menu Items</th>
								<th>Menu Description</th>
								<th>Menu Price</th>
								<th>Date Created</th>													
							</tr>
						</thead>
						<tbody>				
							<?php foreach($latestMenu as $key=>$value): ?>
							<?php echo "<tr>";?>
							<?php echo "<td class='Menu_id'>".$value['Menu_id']."</td>";?>
							<?php echo "<td class='Menu_name'>".$value['Menu_name']."</td>";?>
							<?php echo "<td class='Menu_items'>".$value['Menu_items']."</td>";?>
							<?php echo "<td class='Description'>".$value['Description']."</td>";?>
							<?php echo "<td class='Menu_price'>".$value['Menu_price']."</td>";?>
							<?php echo "<td class='Date_create'>".$value['Date_create']."</td>";?>					
							<?php endforeach; ?>
							<?php echo "</tr>";?>
							<?php else: ?>
							<!-- No records were returned. -->
						</tbody>
                                                <?php endif; ?>	
					</table> <!-- End List ALL menus -->
					
					
					<table class="table table-hover table-bordered" id="latesHall">  <!-- Start List ALL halls -->					
                                            <?php if(isset($latestHalls)) : ?>
						<?php echo '<h4>Latest Hall Details</h4>'; ?>
						<thead>
                                                <tr>
                                                <th>Hall ID</th>
                                                <th>Hall Name</th>
                                                <th>Hall Capacity</th>
                                                <th>Air-condition</th>
                                                <th>Status</th>
                                                <th>Hall Arrangements</th>
                                                <th>Description</th>
                                                <th>Date Create</th>													
                                                </tr>
						</thead>
						<tbody>						
							<?php foreach($latestHalls as $key=>$value): ?>
							<?php echo "<tr>";?>
							<?php echo "<td class='Hall_id'>".$value['Hall_id']."</td>";?>
							<?php echo "<td class='Hall_name'>".$value['Hall_name']."</td>";?>
							<?php echo "<td class='Hall_capacity'>".$value['Hall_capacity']."</td>";?>
							<?php echo "<td class='Hall_aircondition'>".$value['Hall_aircondition']."</td>";?>
							<?php echo "<td class='Hall_status'>".$value['Hall_status']."</td>";?>
							<?php echo "<td class='Hall_arrangements'>".$value['Hall_arrangements']."</td>";?>
							<?php echo "<td class='Description'>".$value['Description']."</td>";?>
							<?php echo "<td class='Date_create'>".$value['Date_create']."</td>";?>
							<?php endforeach; ?>
							<?php echo "</tr>";?>
							<?php else: ?>
						<!-- No records were returned. -->
						</tbody>
                                                <?php endif; ?>         
					</table> <!-- End List ALL halls -->
					
				</div>
			</div>
		</div>
	</div>
</div>