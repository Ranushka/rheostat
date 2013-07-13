<style type="text/css" media="screen">

.personalDetails img{
	padding-bottom: 5px;
	
}

.UserSearchImage{
	padding: 10px;
	border-right: 1px solid rgba(204, 204, 204, 0.31);
}
.userDiscriptionDetails{
	padding: 10px 10px 10px 0;
}

textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {
  border-color: #3690C1;
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */

  -webkit-box-shadow: 0;
  -moz-box-shadow: 0;
  box-shadow: inset 0;
}
/*.personalDetails {
	background-image: 
}*/


</style>
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
        <span class="span6"><h4 class="lead" style="margin-bottom: 0;">Most Reserved Banquet Hall</h4></span> 
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
			<div class="tab-pane active" id="tab1">
				<?php echo form_open('index.php/reportsGenerator/mostreservedhall', $attributes = array('id' => 'mostreservedhall')); ?>
                                <label class="control-label r-label" for="Start_Date">Start Date</label>
                                <div class="controls">
                                        <?php 
                                        $Start_Date = array(
                                                'type'        => 'text',
                                                'name'        => 'mostreservedhall_Start_Date',
                                                'id'          => 'mostreservedhall_Start_Date',
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
                                                'name'        => 'mostreservedhall_End_Date',
                                                'id'          => 'mostreservedhall_End_Date',
                                                'class'       => 'input-xlarge required dateISO',
                                                'maxlength'   => '100',
                                                'placeholder' => 'yyyy-mm-dd',
                                                );
                                        echo form_input($End_Date);
                                        ?>
                                </div>
                                <label class="control-label r-label" for="Hall_id">Select Hall</label>

                                    <div class="controls">
                                                          <?php 

                                                                  $Hall_id = array();
                                                                  $Hall_id[''] = "All";
                                                                  if(isset($halls))
                                                                  {
                                                                          foreach ($halls->result() as $key => $hall)
                                                                          {

                                                                                  $Hall_id[$hall->Hall_id] = $hall->Hall_name;

                                                                          }

                                                                  }
                                                                  echo form_dropdown('Hall_id" class="input-xlarge" id="Hall_id', $Hall_id);
                                                          ?>
                                                  </div>
                                 <div class="control-group">
                                <div class="controls">
                                    <button type="submit" id="mostreservedhall" name="mostreservedhall" class="btn btn-primary">Submit</button>
                                </div>
                    			</div>
                           <?php echo form_close(); ?>

				<style type="text/css" media="screen">
				</style>
            <table class="table table-hover table-bordered" id="borrowingefficiency">
            <?php if(isset($hallReservationDetails)) : ?>
            <?php echo '<h4>Most Reserved Banquet Hall Details</h4>'; ?>
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
						
						<?php foreach($hallReservationDetails as $key=>$value): ?>
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
                                            <!--No records were returned.-->
				<?php echo "No Reservations For The Selected Hall"; ?>

    </tbody>
                        <?php endif; ?>                        
                                </table>
			
                        </div>

                    <br>

            </div>
	</div>
</div>

</div>
