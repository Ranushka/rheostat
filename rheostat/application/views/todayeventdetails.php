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
        <span class="span6"><h4 class="lead" style="margin-bottom: 0;">Today Event</h4></span>        
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
			<div class="" id="">
                            <?php echo form_open('index.php/reportsGenerator/gettodayeventdetails', $attributes = array('id' => 'gettodayeventdetails')); ?>
                                <label class="control-label r-label" for="today_event_date">Enter Date</label>
                                <div class="controls">
                                        <?php 
                                        $today_event_date = array(
                                                'type'        => 'text',
                                                'name'        => 'today_event_date',
                                                'id'          => 'today_event_date',
                                                'class'       => 'input-xlarge required dateISO',
                                                'maxlength'   => '100',
                                                'placeholder' => 'yyyy-mm-dd',
                                                );
                                        echo form_input($today_event_date);
                                        ?>
                                </div>                                
                                 <div class="control-group">
                                <div class="controls">
                                    <button type="submit" id="getEventDetails" class="btn btn-primary">Submit</button>
                                </div>
                    			</div>
                           <?php echo form_close(); ?>
				<style type="text/css" media="screen">
				</style>					
                                <table class="table table-hover table-bordered" id="newreturnsbook"> <!-- Start New Arrivals -->
					<?php if(isset($getEventDetails)) : ?>
                    <?php echo '<h4>Today Event Details</h4>'; ?>
					<thead>
						<tr>
                            <th>Event Title</th>
							<th>Event Date</th>
							<th>Event Crowd</th>
							<th>No of Employees</th>
							<th>Event Type</th>
							<th>Menu ID</th>
							<th>Hall ID</th>																			
						</tr>
					</thead>
					<tbody>
						
						<?php foreach($getEventDetails as $key=>$value): ?>
						<?php echo "<tr>";?>
                        <?php echo "<td class='Event_title'>".$value['Event_title']."</td>";?>
						<?php echo "<td class='Event_date'>".$value['Event_date']."</td>";?>
						<?php echo "<td class='Event_crowd'>".$value['Event_crowd']."</td>";?>
						<?php echo "<td class='No_of_employees'>".$value['No_of_employees']."</td>";?>
						<?php echo "<td class='Event_type'>".$value['Event_type']."</td>";?>
						<?php echo "<td class='Menu_id'>".$value['Menu_id']."</td>";?>
						<?php echo "<td class='Hall_id'>".$value['Hall_id']."</td>";?>
						<?php endforeach; ?>
					<?php echo "</tr>";?>

				<?php else: ?>
                                    <?php echo "No Events Available For Selected Date"; ?><!-- No records were returned. -->

		</tbody>
                <?php endif; ?>
	</table>
</div>
<br>
		</div>
	</div>
</div>

</div>