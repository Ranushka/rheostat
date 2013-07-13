<?php $this->load->view('template/logo'); ?>
<div class="container-fluid"> 
    <nav style="width: 15%;text-align: right; float: left;">
      <ul class="nav nav-list">
        <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageContent"><span>Manage Events</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
        <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
      </ul>
    </nav>
    <div id="wraper">
      <div id="wraperInner">
         <div class="row-fluid resent-activites-title">
        <span class="span6"><h4 class='lead' style="margin-bottom: 0;">Payment Management</h4></span>
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
          <!-- This is a Save success information alert -->   
      <div class="alert alert-success hide managePaymentSavePayment popupmsg">
          <a class="close" data-dismiss="alert">&times;</a>
          <span id=""></span>
      </div>


  <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab"><b class="icon-list"></b>&nbsp; List ALL Payments</a></li>
      <li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp;Add New Payment</a></li>
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
              <th>Payment ID</th>
              <th>Event ID</th>
              <!--<th>Event Name</th>-->
              <th>For A/C</th>
              <th>For Lights</th>
              <th>Other</th>
              <th>Total Amount</th>              
              <th>Advance Amount</th>
              <th>Amount Paid</th>
              <th>Date Paid</th>
              <th>Total Due Amount</th>              
              <th>Advance Due Amount</th>              
              <th>Customer Id</th>              
              <th>Due Date</th>
              <th>Payment Status</th>
              <th>Action</th>             
            </tr>
          </thead>
          <tbody>            
            <?php if(isset($paymentRecords)) : foreach($paymentRecords as $row): ?>
            <?php echo "<tr>";?>
              <?php echo "<td class='Payment_id'>".$row->Payment_id."</td>";?>
              <?php echo "<td class='Event_id'>".$row->Event_id."</td>";?>
              <?php //echo "<td class='Event_title'>".$row->Event_title."</td>";?>
              <?php echo "<td class='For_ac'>".$row->For_ac."</td>";?>
              <?php echo "<td class='For_lights'>".$row->For_lights."</td>";?>
              <?php echo "<td class='Other_amount'>".$row->Other_amount."</td>";?>
              <?php echo "<td class='Total_amount'>".$row->Total_amount."</td>";?>              
              <?php echo "<td class='Advance_amount'>".$row->Advance_amount."</td>";?>
              <?php echo "<td class='Amount_paid'>".$row->Amount_paid."</td>";?>
              <?php echo "<td class='Date_paid'>".$row->Date_paid."</td>";?>
              <?php echo "<td class='Due_amound'>".$row->Due_amound."</td>";?>
              <?php echo "<td class='Due_advance_amount'>".$row->Due_advance_amount."</td>";?>
              <?php echo "<td class='Customer_id'>".$row->Customer_id."</td>";?>
              <?php echo "<td class='Due_date'>".$row->Due_date."</td>";?>              
              <?php echo "<td class='Payment_status'>".$row->Payment_status."</td>";?>              
              <?php echo "<td><a href='#' class='btn btn-mini  editPaymentsDetailsPop-view' role='button' data-toggle='modal'>Edit/Deactivate</a></td>";?>
            <?php endforeach; ?>
          <?php echo "</tr>";?>

        <?php else: ?>
        <?php echo 'No recordsreturned.'; ?>
      <?php endif; ?>

    </tbody>
  </table>
  <!-- List ALL Contents -->
</div>

<br>
<div class="tab-pane" id="tab2">
  <!-- Add new Contents -->

  <!-- This is a save information alert --> 
  <div class="alert alert-success hide successMsagesAddNewPayment popupmsg">
    <a class="close" data-dismiss="alert">&times;</a>
    <span id=""></span>
   </div>
   <!-- unsuccessMsagesAddPhysicalBook alert --> 
   <div class="alert alert-danger hide unsuccessMsagesAddNewPayment popupmsg">
    <a class="close" data-dismiss="alert">&times;</a>
    <span id=""></span>
   </div>
  
  <?php
  echo form_open('',
    $attributes = array('class' => 'form-horizontal', 'id' => 'managePayment', 'name' => "managePaymentForm"));?>
    <fieldset>
      <legend>Create Payment</legend>

      <div class="control-group">
      <label class="control-label r-label" for="Event_id">Select Event</label>
      <div class="controls">
        <?php 
                $Event_id = array();
                $Event_id[''] = "-Please Select-";

              if(isset($events))
              {
                foreach ($events as $key => $event)
                {
                
                  $Event_id[$event->Event_id] = $event->Event_id;
                  
                }

              }
          echo form_dropdown('Event_id" class="input-xlarge required" id="Event_id', $Event_id);
        ?>
      </div>
    </div>      

      <!--<div class="control-group">
        <label class="control-label r-label" for="total_amount">Total Amount</label>
        <div class="controls">
          <?php 
          $total_amount = array(
            'type'        => 'text',
            'name'        => 'total_amount',
            'id'          => 'total_amount',
            'class'       => 'input-xlarge required',
            'maxlength'   => '255',
            'placeholder' => 'Eg:-200,000',
            );
          echo form_input($total_amount);
          ?>
        </div>
      </div>-->

      <div class="control-group">
        <label class="control-label r-label " for="advance_amount">Advance Amount</label>
        <div class="controls">
          <?php 
          $advance_amount = array(
            'type'        => 'text',
            'name'        => 'advance_amount',
            'id'          => 'advance_amount',
            'class'       => 'input-xlarge required',
            'maxlength'   => '255',
            'value'       => '10,000',
            );
          echo form_input($advance_amount);
          ?>
        </div>
      </div>

      <legend>For A/C</legend>
      <div class="control-group">
        <label class="control-label" for="rate_per_hour">Rate Per Hour</label>
        <div class="controls">
          <?php 
          $rate_per_hour = array(
            'type'        => 'text',
            'name'        => 'rate_per_hour',
            'id'          => 'rate_per_hour',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'value'       => '2,500',
            );
          echo form_input($rate_per_hour);
          ?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="ac_hours">Total Hours</label>
        <div class="controls">
          <?php 
          $ac_hours = array(
            'type'        => 'text',
            'name'        => 'ac_hours',
            'id'          => 'ac_hours',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'placeholder' => 'Eg:- 6',
            );
          echo form_input($ac_hours);
          ?>
        </div>
      </div>

      <legend>For Light Decoration</legend>
      <div class="control-group">
        <label class="control-label" for="number_of_lights">Number of Lights</label>
        <div class="controls">
          <?php 
          $number_of_lights = array(
                    ''                   => '- Please Select -',
                    '10,000'             => '10,000',
                    '15,000'             => '15,000',
                    '>20,000'            => '>20,000',
            );
          echo form_dropdown('number_of_lights" class="input-xlarge" id="number_of_lights', $number_of_lights);
          ?>
        </div>
      </div>

      <div class="control-group hide" id="light10000Parent">
      <label class="control-label" for="light_amount10000">Amount</label>
      <div class="controls">
        <?php 
          $light_amount10000 = array(
            'type'        => 'text',
            'name'        => 'light_amount10000',
            'id'          => 'light_amount10000',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'value'       => '12,500',
            );
          echo form_input($light_amount10000);
        ?>
      </div>
    </div>   

    <div class="control-group hide" id="light20000Parent">
      <label class="control-label" for="light_amount20000">Amount</label>
      <div class="controls">
        <?php 
          $light_amount20000 = array(
            'type'        => 'text',
            'name'        => 'light_amount20000',
            'id'          => 'light_amount20000',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'value'       => '17,500',
            );
          echo form_input($light_amount20000);
        ?>
      </div>
    </div>

    <div class="control-group hide" id="lightabove20000Parent">
      <label class="control-label" for="light_amountabove20000">Amount</label>
      <div class="controls">
        <?php 
          $light_amountabove20000 = array(
            'type'        => 'text',
            'name'        => 'light_amountabove20000',
            'id'          => 'light_amountabove20000',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'value'       => '20,000',
            );
          echo form_input($light_amountabove20000);
        ?>
      </div>
    </div>

      <legend>Other</legend>

      <div class="control-group">
      <label class="control-label" for="additional_charges">Description</label>
      <div class="controls">
        <?php 
          $additional_charges = array(
            'type'        => 'textarea',
            'name'        => 'additional_charges',
            'id'          => 'additional_charges',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'placeholder' => 'Eg: additional_charges',
            );
          echo form_textarea($additional_charges);
        ?>
      </div>
    </div>

      <div class="control-group">
        <label class="control-label" for="other_prices">Amount</label>
        <div class="controls">
          <?php 
          $other_prices = array(
            'type'        => 'text',
            'name'        => 'other_prices',
            'id'          => 'other_prices',
            'class'       => 'input-xlarge',
            'maxlength'   => '255',
            'placeholder' => 'Eg:- 10,000',
            );
          echo form_input($other_prices);
          ?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label r-label" for="amount_paid">Amount Paid</label>
        <div class="controls">
          <?php 
          $amount_paid = array(
            'type'        => 'text',
            'name'        => 'amount_paid',
            'id'          => 'amount_paid',
            'class'       => 'input-xlarge required',
            'maxlength'   => '255',
            'placeholder' => 'Eg:- 10,000',
            );
          echo form_input($amount_paid);
          ?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label r-label" for="date_paid">Date Paid</label>
        <div class="controls">
          <?php 
          $date_paid = array(
            'type'      => 'text',
            'name'      => 'date_paid',
            'id'        => 'date_paid',
            'class'     => 'input-xlarge required',
            'maxlength' => '100',
            'value'     => date('Y-m-d'),
            );
          echo form_input($date_paid);
          ?>
        </div>
      </div>      

      <div class="form-actions">
        <button type="submit" id="addNewPaymentButton"  class="btn btn-primary">&nbsp;Save&nbsp;</button>
        <button class="btn" id="addNewPaymentCancelButton">Cancel</button>
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


<!-- hide section to get payment details to edit -->
<div id="viewMainPaymentDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewMainContentDetails" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Edit Payment</h3>
    </div>
    <div id="viewPaymentDetails" class="modal-body">

        <table class="table table-hover">
            <!-- this  will display corrosponding user details managecontent.js -->
            <tbody>

            </tbody>
        </table>


    </div>
    <div class="modal-footer">
        <span class="pull-left">
            <a href="#" role="button" data-dismiss="modal" aria-hidden="true" class="text-error manageContent-delete" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span>
            <a href="#" role="button" id="makeEditableFelds" data-toggle="modal">Edit</a>
        </span>
        <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary managePayment-edit" data-toggle="modal">Save</a>
        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    </div>
</div> 