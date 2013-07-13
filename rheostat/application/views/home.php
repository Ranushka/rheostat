




<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/logo'); ?>





<style type="text/css" media="screen">
    #ProfileDetailsContainer table{
        font-size: 90%;
    }

    #ProfileDetailsContainer .table th, #ProfileDetailsContainer .table td{
        border: 0;
        padding: 0;
        padding-right: 10px;
    }

    #ProfileDetailsContainer .table td:nth-child(1){
        text-align: right;
        width: 118px;
        color: #777;
    }
</style>




<div class="container">

    <nav class="navigateContainer row-fluid">
        <div class="span6">
        <?php if (!$this->session->userdata('loginStatus')) {
            echo '<a class="navigate" href="' . base_url() . 'index.php/user/login"><span>Login</span></a>';
        } ?>
<?php if ($this->session->userdata('loginStatus')) {
    echo '<a class="navigate tabTopActive" href="home"><span>Home</span></a>';
} ?>
        <a class="navigate" href="<?php echo base_url(); ?>index.php/categories"><span>Search</span></a>
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


    <!-- This is a change password alert -->	
    <?php
    if (isset($passwordStatus) && $passwordStatus == 'success') {
        echo '<div class="alert alert-success passwordChange">
		<a class="close" data-dismiss="alert">&times;</a>
		<strong>' . $passwordStatuseMassage . '</strong>
		</div>';
    } else if (isset($passwordStatus) && $passwordStatus == 'error') {
        echo '<div class="alert alert-danger passwordChange">
		<a class="close" data-dismiss="alert">&times;</a>
		<strong>' . $passwordStatuseMassage . '</strong>
		</div>';
    }
    ?>

    <!-- <div class="alert alert-success popupmsg" id="alert alert-success">
            <a class="close" data-dismiss="alert">&times;</a>
            <strong><?php $passwordStatuse ?></strong>
        </div> -->
    <!-- successMsg -->
    <div class="alert alert-success hide msgDisplay" id="saveProfileDetails">
        <a class="close" data-dismiss="alert">&times;</a>
        <span></span>
    </div>


    <div class="row-fluid">

        <div class="span8">

         <div class="tabbable"> <!-- Only required for left/right tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab"><b class="icon-list"></b>&nbsp; My Borrowings</a></li>
            <li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp; Reservations</a></li>            
            <li><a href="#tab3" data-toggle="tab" id="listAllContents"><b class="icon-list"></b>&nbsp;Fines</a></li>            
          </ul>
            <div class="tab-content">
           
              <div class="tab-pane active" id="tab1">
                <table class="table table-striped" id="OP_userBrownigsDataTable">
                    <thead>
                        <tr>
                            <?php if (((isset($contentborrowingdetails)) && ($contentborrowingdetails !== FALSE)) || ((isset($contentborrowingdetails)) && ($contentborrowingdetails !== FALSE))) : ?>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Borrowed Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <!-- start crrent user reservation list -->
                            <?php if ((isset($contentborrowingdetails)) && ($contentborrowingdetails !== FALSE)): ?>

                                <?php foreach ($contentborrowingdetails->result() as $key => $contentborrowingdetail): ?>

                                    <?php echo "<tr>"; ?>
                                    <?php echo "<td>" . ($key + 1) . "</td>"; ?>
                                    <?php echo "<td>" . $contentborrowingdetail->Content_title. "</td>"; ?>
                                    <?php echo "<td>" . $contentborrowingdetail->Lend_date . "</td>"; ?>
                                    <?php echo "<td>" . $contentborrowingdetail->Lend_due_date . "</td>"; ?>
                                    <?php echo "<td>" . $contentborrowingdetail->Lend_status . "</td>"; ?>
                                    <?php echo "<td><span class='label label-info'>Reserved</span></td>"; ?>
                                    <?php echo "</tr>"; ?>                        
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <!-- end crrent user reservation list -->
                        <?php else: ?>
                             <?php echo "<p>You can borrow content by searching</p>"; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
              </div>
              <div class="tab-pane" id="tab2">
                <table class="table table-striped" id="OP_userBrownigsDataTable">
                    <thead>
                        <tr>
                            <?php if (((isset($currentUserReservations)) && ($currentUserReservations !== FALSE)) || ((isset($currentUserPendingReservations)) && ($currentUserPendingReservations !== FALSE))) : ?>
                                <th>#</th>
                                <th>Book name</th>
                                <th>Expire dates</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- start crrent user reservation list -->
                            <?php if ((isset($currentUserReservations)) && ($currentUserReservations !== FALSE)): ?>
                                <?php foreach ($currentUserReservations->result() as $key => $currentUserReservation): ?>
                                    <?php echo "<tr>"; ?>
                                    <?php echo "<td>" . ($key + 1) . "</td>"; ?>
                                    <?php echo "<td>" . $currentUserReservation->Content_title. "</td>"; ?>
                                    <?php echo "<td>" . $currentUserReservation->Reserve_expiration_date . "</td>"; ?>
                                    <?php echo "<td><span class='label label-info'>Reserved</span></td>"; ?>
                                    <?php echo "</tr>"; ?>                        
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <!-- end crrent user reservation list -->
                                    <!-- start crrent user pending reservation list -->
                                  <?php if((isset($currentUserPendingReservations))&&($currentUserPendingReservations!==FALSE)): ?>
                            <?php foreach($currentUserPendingReservations->result() as $key=> $currentUserPendingReservation): ?>
                                <?php echo "<tr>";?>
                                    <?php echo "<td>".($key+1)."</td>";?>
                                    <?php echo "<td>".$currentUserPendingReservation->Content_title."</td>";?>  
                                    <?php echo "<td>".$currentUserPendingReservation->Reserve_expiration_date."</td>";?>
                                    <?php echo "<td><span class='label'>Pending</span></td>";?>
                                <?php echo "</tr>";?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                    <!-- end crrent user pending reservation list -->
                                <?php else: ?>
                                    <?php echo "<p>You can reserve content by searching</p>"; ?>
                                <?php endif; ?>
                        </tbody>
                </table>
              </div>
              <div class="tab-pane" id="tab3">
                <table class="table table-striped" id="OP_userBrownigsDataTable">
                    <thead>
                        <tr>
                            <?php if (((isset($userFineDetails)) && ($userFineDetails !== FALSE)) || ((isset($userFineDetails)) && ($userFineDetails !== FALSE))) : ?>
                            <th>#</th>
                            <th>Content Name</th>
                            <th>No of Overdue Days</th>
                            <th>Total Amount</th>
                            <th>Due Date</th>
                            <th>Date Paid</th>
                            <th>Fine Status</th>
                            <th>Lend Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <!-- start current user fine list -->
                            <?php if ((isset($userFineDetails)) && ($userFineDetails !== FALSE)): ?>
                                <?php foreach ($userFineDetails->result() as $key => $userFineDetail): ?>
                                    <?php echo "<tr>"; ?>
                                    <?php echo "<td>" . ($key + 1) . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Content_title . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Numberof_overdue_days . "</td>"; ?> 
                                    <?php echo "<td>" . $userFineDetail->Total_amount . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Due_date . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Date_paid . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Fine_status . "</td>"; ?>
                                    <?php echo "<td>" . $userFineDetail->Lend_status . "</td>"; ?>
                                    <?php echo "</tr>"; ?>                      
                                <?php endforeach; ?>
                            <?php endif; ?>
                                                                 
                            <!-- end current user fine list -->
                        <?php else: ?>
                            <?php echo "<p>No Fines</p>"; ?>
                        <?php endif; ?>               
                    </tbody>
                </table>
              </div>     
            </div>    
        </div>            

        </div>
        <div class="span4" id="ProfileDetailsContainer">
            <h3 style="display: inline-block;">My profile</h3>
            <a href='#' style="margin-left: 10px;font-size: 10px;" class='editUserProfileDetailsPop-view' role='button' data-toggle='modal'>Edit Profile</a>
            <table class="table">
                <?php if (isset($userDetails)): ?>

                    <?php echo '<tr><td>Profile Image </td><td><img style ="width:60px; height:70px;"src="'.base_url().''.substr($userDetails->Image_path, 2).$userDetails->User_profile_image. '"/></td></tr>'; ?>
                    <?php echo '<tr><td>Title</td><td>' . $userDetails->Title . '</td></tr>' ?>
                    <?php echo '<tr><td >User Name</td><td class="User_name">' . $userDetails->User_name . '</td></tr>' ?>
                    <?php echo '<tr><td>First Name</td><td>'.ucwords(strtolower($userDetails->First_name)). '</td></tr>' ?>
                    <?php echo '<tr><td>Last Name</td><td>' .ucwords(strtolower($userDetails->Last_name)). '</td></tr>' ?>
                    <?php echo '<tr><td>Password</td><td><a href="#resetPassword" role="button" data-toggle="modal">Reset Password</a></td></tr>' ?>
                    <?php echo '<tr><td>NIC Number</td><td>' . $userDetails->NIC_No . '</td></tr>' ?>
                    <?php echo '<tr><td>Date Of Birth</td><td>' . $userDetails->Date_of_birth . '</td></tr>' ?>
                    <?php echo '<tr><td>Gender</td><td>' . $userDetails->Gender . '</td></tr>' ?>
                    <?php echo '<tr><td>Address</td><td>' . $userDetails->Address . '</td></tr>' ?>
                    <?php echo '<tr><td>Email</td><td>' . $userDetails->Email . '</td></tr>' ?>
                    <?php echo '<tr><td>Contact Number</td><td>' . $userDetails->Contact_No . '</td></tr>' ?>
                    <?php echo '<tr><td>Registered Date</td><td>' . $userDetails->Date_of_register . '</td></tr>' ?>
                <?php endif ?>

            </table>
        </div>


        <hr>
    </div>

</div> <!-- /container -->
<?php $this->load->view('template/footer'); ?>




<!-- Modal Posting Jobs Preview-->
<div id="resetPassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="resetPassword">Reset your Password</h3>
    </div>
    <div class="modal-body">
        <?php
        echo form_open('index.php/user/changePassword', $attributes = array('class' => 'form-horizontal', 'id' => 'ManageUserCreate'));
        ?>
        <fieldset>

            <div class="control-group">
                <label class="control-label" for="Mem_currentPassword">Current Password</label>
                <div class="controls">
                    <?php
                    $Mem_currentPassword = array(
                        'type' => 'Password',
                        'name' => 'Mem_currentPassword',
                        'id' => 'Mem_currentPassword',
                        'class' => 'input-xlarge',
                        'maxlength' => '100',
                        'required' => 'required',
                        'placeholder' => 'eg:-johon',
                    );
                    echo form_input($Mem_currentPassword);
                    ?>
                </div>
            </div>

            <hr>

            <div class="control-group">
                <label class="control-label" for="Mem_newPassword">New Password</label>
                <div class="controls">
                    <?php
                    $Mem_newPassword = array(
                        'type' => 'Password',
                        'name' => 'Mem_newPassword',
                        'id' => 'Mem_newPassword',
                        'class' => 'input-xlarge',
                        'maxlength' => '100',
                        'required' => 'required',
                        'placeholder' => 'eg:-johon',
                    );
                    echo form_input($Mem_newPassword);
                    ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Mem_ConfirmPassword">Confirm Password</label>
                <div class="controls">
                    <?php
                    $Mem_ConfirmPassword = array(
                        'type' => 'Password',
                        'name' => 'Mem_ConfirmPassword',
                        'id' => 'Mem_ConfirmPassword',
                        'class' => 'input-xlarge',
                        'maxlength' => '100',
                        'required' => 'required',
                        'placeholder' => 'eg:-johon',
                    );
                    echo form_input($Mem_ConfirmPassword);
                    ?>
                </div>
            </div>
        </fieldset>
    </div>

    <div class="modal-footer">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Change Password</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</form>
</div>


<!-- Preview of the content-->
<div id="viewContentDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewContentDetailsModal" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="viewContentDetailsModal">Book details</h3>
    </div>
    <div id="contentPreviewContainer" class="modal-body">

        <table class="table table-hover"> <!-- this  will display corrosponding user details managecontent.js --> <tbody>

            </tbody>
        </table>


    </div>
    <div class="modal-footer">
        <span class="pull-left">
            <a href="#" role="button" id="contentViewButton" data-toggle="modal">View / Download</a>
        </span>		
        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    </div>
</div>

<!-- Modal Edite Profile Preview-->

<!-- editeProfile Model -->
<div id="editeProfile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editeProfileModal" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="editeProfileModal">Edit User Details</h3>
    </div>
    <div id="editeProfileContainer" class="modal-body">

        <table class="table table-hover">
            <!-- this  will display corrosponding user details managecontent.js -->
            <tbody>
            </tbody>
        </table>


    </div>
    <div class="modal-footer">
        <span class="pull-left">
            <!-- <a href="#" role="button" data-dismiss="modal" aria-hidden="true" class="text-error editeProfile-deactivate" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span> -->
            <a href="#" role="button" id="makeEditableFelds" data-toggle="modal">Edit</a>
        </span>
        <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary editeProfile-save" data-toggle="modal">Save</a>
        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    </div>
</div> 
