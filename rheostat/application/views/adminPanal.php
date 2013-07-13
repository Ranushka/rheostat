
<?php $this->load->view('template/logo'); ?>


<!-- loading relevent files for calender-->
<link href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' rel='stylesheet' />
<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.min.js'></script>



<div class="container-fluid">
    <nav style="width: 15%;text-align: right; float: left;">
      <ul class="nav nav-list">
        <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
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
                <span class="span6"><h4 class='lead' style="margin-bottom: 0;">Plan Your Events</h4></span>

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
            </div><!-- <div class="row-fluid resent-activites-title"> -->

            <hr class="blue">

            <div class="row-fluid">

                
<script>

    $(document).ready(function() {
    
        //init the calender to the ui
        $('#calendar').fullCalendar(
        {
        
            editable: false,
            
            events: "<?php echo base_url(); ?>index.php/adminPanal/getCalenderData",
            
            eventDrop: function(event, delta) {
                alert(event.title + ' was moved ' + delta + ' days\n' +
                    '(should probably update your database)');
            },
            
            loading: function(bool) {
                if (bool) $('#loading').show();
                else $('#loading').hide();
            }
            
        });
        //init the calender to the ui


        //loding the modle to addEvant
        $('.fc-day').click(function()
        {
            var clickedDate = $(this).attr('data-date');
            // alert(clickedDate);

            //add date to modle header
            $('#addEvantModalDate .muted').html(clickedDate);
            
            //add clicked date to evant date
            $('#Event_date').val(clickedDate);
            
            //display modle
            $('#addEvant').modal('show');
        })

        
    });

</script>
<style>

        
    #loading {
        position: absolute;
        top: 5px;
        right: 5px;
        }

    #calendar {
        /*width: 700px;*/
        margin: 0 auto;
        }

        #addEvant{
            left: 0;
            margin-left: 0;
            width: 90%;
            margin: 0 5%;
            height: 80%;

        }

        #addEvant .modal-body{
            max-height: none;
            height: 80%;

        }

</style>


<!-- fullcalender -->
<div id='loading' style='display:none'>loading...</div>
<div id='calendar'></div>
<!-- fullcalender -->

<!-- addEvant modle -->

<div id="addEvant" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addEvantModal" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="addEvantModalDate">Add evant on - <span class="muted">yyyy-mm-dd</span></h3>
    </div>
    <div id="" class="modal-body">
        <?php $this->load->view('eventContent/addNewEvent'); ?>
    </div>
</div>
<!-- addEvant modle -->






            </div>
<hr>


        </div>
    </div>
</div>

