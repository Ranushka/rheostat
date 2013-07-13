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
      <span class="span6">Fast and Slow Reserving Events</span>
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

          <?php echo form_open('index.php/reportsGenerator/mostlessreserving', $attributes = array('id' => 'mostlessreserving')); ?>
          <label class="control-label r-label" for="FastMovingSlowMoving_Started_Date">Start Date</label>
          
          <div class="controls">
            <?php 
              $FastMovingSlowMoving_Started_Date = array(
                                                          'type'        => 'text',
                                                          'name'        => 'FastMovingSlowMoving_Started_Date',
                                                          'id'          => 'FastMovingSlowMoving_Started_Date',
                                                          'class'       => 'input-xlarge required dateISO',
                                                          'maxlength'   => '100',
                                                          'placeholder' => 'yyyy-mm-dd',
              );
              echo form_input($FastMovingSlowMoving_Started_Date);
            ?>
          </div>
          <label class="control-label r-label" for="FastMovingSlowMoving_End_Date">End Date</label>
          <div class="controls">
          <?php 
          $FastMovingSlowMoving_End_Date = array(
          'type'        => 'text',
          'name'        => 'FastMovingSlowMoving_End_Date',
          'id'          => 'FastMovingSlowMoving_End_Date',
          'class'       => 'input-xlarge required dateISO',
          'maxlength'   => '100',
          'placeholder' => 'yyyy-mm-dd',
          );
          echo form_input($FastMovingSlowMoving_End_Date);
          ?>
          </div>          
          <div class="control-group">
            <div class="controls">
              <button type="submit" id="getfastmovingslowmovingMenus" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <?php echo form_close(); ?>

          <style type="text/css" media="screen">
          </style>
          <table class="table table-hover table-bordered"><!--Start Fast Moving Books Details-->
          <?php if(isset($fastmovingMenuDetails)) : ?>
          <?php echo '<h4>Less Reserved Menu Details</h4>'; ?>
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

          <?php foreach($fastmovingMenuDetails as $key=>$value): ?>
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
          <!--No records were returned.-->

          </tbody>
          <?php endif; ?>
          </table><!--End Fast Moving Books Details-->
          
          <table class="table table-hover table-bordered"><!--Start Slow Moving Books Details-->
          <?php if(isset($slowmovingMenuDetails)) :?>
          <?php echo '<h4>Most Reserved Menu Details</h4>'; ?>
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

          <?php foreach($slowmovingMenuDetails as $key=>$value): ?>
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
              
          <!--No records were returned.-->

          </tbody>
          <?php endif; ?>
          </table><!--End Slow Moving Books Details-->
        </div>
        <br>
      </div>
    </div>
  </div>
</div>