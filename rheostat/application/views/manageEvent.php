
<?php $this->load->view('template/logo'); ?>

<style type="text/css" media="screen">
    .nav-list li{
        text-align: right;
        line-height: 30px;
    }

    .activeNav{
        background-image: url(<?php echo base_url();?>img/pointer.png);
        background-repeat: no-repeat;
        background-position: right;
        background-color: #efefef;
        border-bottom: 1px dashed rgb(218, 218, 218);
    }
</style>
<!-- pointer.png -->
<div class="container-fluid">
    <nav style="width: 15%;text-align: right; float: left;">
        <ul class="nav nav-list">
            <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
            <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/manageEvents"><span>Manage Events</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
            <li><a class="" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
        </ul>
    </nav>



    <div id="wraper" >
        <div id="wraperInner">
            <div class="row-fluid resent-activites-title">
                <span class="span6"><h4 class='lead' style="margin-bottom: 0;">Event Management</h4></span>
                
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

            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab" id="listAllContents"><b class="icon-list"></b>&nbsp; List All Events</a></li>
                    <li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp; Create New Event</a></li>
                </ul>
                <div class="tab-content">
                    <!-- List ALL Contents -->
                    <div class="tab-pane active" id="tab1">
				
    				<!-- This is notification unsuccess alert alert -->	
    				<div class="alert alert-success hide MsagesForReservation popupmsg">
    					<a class="close" data-dismiss="alert">&times;</a>
    					<span id=""></span>
    				</div>
                    
                    <!-- This is a Deactivate information alert -->   
                    <div class="alert alert-success hide manageContentDeactivate popupmsg">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <span id=""></span>
                    </div>    
                    
                     <!-- This is a Save success information alert -->   
                    <div class="alert alert-success hide manageEventsSaveEvent popupmsg">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <span id=""></span>
                    </div>
                    
                    <div id="contentPreviewContainer">
                        <table class="table table-hover"><!-- this  will display corrosponding user details managecontent.js -->
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div id="contentDescriptionForSearch">

                    </div>

                        <br>

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
                                <!-- Header of the Table -->
                                <tr>
                                    <th class="contentID">ID</th>				
                                    <th style="width: 220px;display: block;padding-top: 30px;">Title</th>
                                    <th>Date</th>		                                    	
                                    <th style="width: 320px;display: block;padding-top: 30px;">Description</th>		
                                    <th>Crowd</th>	
                                    <th>Allocated Employees</th>
                                    <th>Type</th>	
                                    <th>Menu</th>                                    										
                                    <th>Hall</th>										
                                    <th>Hall Arrangements</th>				
                                    <th>Band Type</th>				
                                    <th>Status</th>				
                                    <th>Customer</th>				
                                    <th>Actions</th>					
                                </tr>
                            </thead>
                            <tbody>                                
                                <!-- Content of the Table -->
                                <?php if ((isset($events)) && ($events !== 0)) : foreach ($events->result() as $event): ?>
                                        <?php echo "<tr>"; ?>
                                        <?php echo "<td>" . $event->Event_id . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_title . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_date . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_description . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_crowd . "</td>"; ?>
                                        <?php echo "<td>" . $event->No_of_employees . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_type . "</td>"; ?>	
                                        <?php echo "<td>" . $event->Menu_id . "</td>"; ?>
                                        <?php echo "<td>" . $event->Hall_id . "</td>"; ?>
                                        <?php echo "<td>" . $event->Hall_arrangements . "</td>"; ?>
                                        <?php echo "<td>" . $event->Band_type . "</td>"; ?>
                                        <?php echo "<td>" . $event->Event_status . "</td>"; ?>
                                        <?php echo "<td>" . $event->Customer_id . "</td>"; ?>                                        
                                        <?php echo "<td><a href='#' class='btn btn-mini  manageEvent-view' role='button' data-toggle='modal'>Edit/Deactivate</a></td>"; ?>
                                    <?php endforeach; ?>
    							<?php echo "</tr>"; ?>

                                <?php else: ?>
                                <?php echo 'No events were found.'; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <!-- List ALL Contents -->
                    </div> <!-- <div class="tab-pane active" id="tab1"> -->
                    <div class="tab-pane" id="tab2">
                        <!-- Add new Contents -->

                        <style type="text/css" media="screen">

                            .contentIcon{
                                float: left;
                                margin-left: 20px;

                            }
                            .contentIcon:hover{
                            }
                            .contentIcon:active,
                            .contentIcon:focus{

                            }

                            #OL_addContentTabs .nav-tabs > li img{
                                opacity: 0.7;
                            }

                            #OL_addContentTabs .active{
                                opacity: 1;
                            }
                        </style>

                        <div class="clearfix" id="OL_addContentTabs">
                            <ul class="nav nav-tabs">
                                <li class="contentIcon active">
                                    <a href="#addNewEventForm" data-toggle="tab">
                                        <img src="<?php echo base_url(); ?>img/eventImages/addEvent.png" alt="">
                                        <!-- <P>Add Books</P> -->
                                    </a>
                                </li>
                                <li class="contentIcon">
                                    <a href="#addNewMenu" data-toggle="tab">
                                        <img src="<?php echo base_url(); ?>img/eventImages/addMenu.png" alt="">
                                        <!-- <P>PDF Content</P> -->
                                    </a>
                                </li>
                                <li class="contentIcon">
                                    <a href="#addNewHall" data-toggle="tab">
                                        <img src="<?php echo base_url(); ?>img/eventImages/addHall.png" alt="">
                                        <!-- <P>Media Content</P> -->
                                    </a>
                                </li>

                            </ul>	
                        </div>	

                        <div class="tab-content">
                            <div class="tab-pane" id="addNewMenu">
			                    <?php $this->load->view('eventContent/addNewMenu'); ?>
                            </div>

                            <div class="tab-pane" id="addNewHall">
                                <?php $this->load->view('eventContent/addNewHall'); ?>
                            </div>

                            <div class="tab-pane active" id="addNewEventForm">
                                <?php $this->load->view('eventContent/addNewEvent'); ?>
                            </div>
                        </div>
                        <!-- Add new Contents -->
                    </div>
                </div>
            </div>
        </div><!-- <div id="wraperInner"> -->
    </div><!-- <div id="wraper" > -->
</div>






<!-- Modal Posting Jobs Preview-->
<div id="viewMainEventDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewMainContentDetails" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Edit Event</h3>
    </div>
    <div id="viewEventDetails" class="modal-body">

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
        <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary manageEvent-edit" data-toggle="modal">Save</a>
        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    </div>
</div> 



