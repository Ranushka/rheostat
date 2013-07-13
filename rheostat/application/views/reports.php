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
    <div id="wraper" >
        <div id="wraperInner">
          <div class="row-fluid resent-activites-title">  
            <span class="span6"><h4 class="lead" style="margin-bottom: 0;">View Reports</h4></span>
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
    		<hr class="blue" style="margin-top: 0;">
                <table class="table">
                <!--<div class="row-fluid">-->
                    <div class="span4">               
                      <ul class="nav nav-list">
                          <li style="text-align:left;"><a class=""  href="<?php echo base_url(); ?>index.php/reportsGenerator/categoryWiseEvents">Category Wise Events In The System</a></li>
                          <li style="text-align:left;"><a class=""  href="<?php echo base_url(); ?>index.php/reportsGenerator/latestCreations"><span>Latest Created Items</span></a></li>
                          <li style="text-align:left;"><a class="" href="<?php echo base_url(); ?>index.php/reportsGenerator/mostlessreserving"><span>Most Reserving and Less Reserving Menus</span></a></li>
                          <li style="text-align:left;"><a class="" href="<?php echo base_url(); ?>index.php/reportsGenerator/gettodayeventdetails"><span>Get Details of Events for Specific Day</span></a></li>
                          <li style="text-align:left;"><a class="" href="<?php echo base_url(); ?>index.php/reportsGenerator/mostreservedhall"><span>Get The Most Reserved Banquet Hall</span></a></li>
                          <li style="text-align:left;"><a class="" href="<?php echo base_url(); ?>index.php/reportsGenerator/mostactivecustomers"><span>Most Active Customers</span></a></li>
                          <li style="text-align:left;"><a class="" href="<?php echo base_url(); ?>index.php/reportsGenerator/categorywisetotalincome"><span>Category Wise Total Income</span></a></li>
                      </ul>              
                    </div>
                </table> 
        </div>
    </div>
</div>

