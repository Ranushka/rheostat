<?php $this->load->view('template/logo'); ?>

<div class="container-fluid"> 
    <nav style="width: 15%;text-align: right; float: left;">
      <ul class="nav nav-list">
        <li><a class="" href="<?php echo base_url(); ?>index.php/adminPanal"><span>Admin Panel</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageCustomer"><span>Manage Customer</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageContent"><span>Manage Events</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/manageUser"><span>Manage Users</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/managePayment"><span>Manage Payments</span></a></li>
        <li><a class="activeNav" href="<?php echo base_url(); ?>index.php/systemSettings"><span>System Settings</span></a></li>
        <li><a class="" href="<?php echo base_url(); ?>index.php/reports"><span>Reports</span></a></li>
      </ul>
    </nav>
    <div id="wraper" >
      <div id="wraperInner">
         <div class="row-fluid resent-activites-title">
        <span class="span6"><h4 class='lead' style="margin-bottom: 0;">System Settings</h4></span>
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
        <div class="alert alert-success hide" id="saveSystemSettings">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>
        <!-- save FineType Edited settings -->
        <div class="alert alert-success hide" id="saveFineTypeEditedSystemSettings">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

        <div class="alert alert-danger hide" id="notSaveFineTypeEditedSystemSettings">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

         <!-- save Other Settings Edited settings -->
        <div class="alert alert-success hide" id="saveOtherSettingsEdited">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

        <div class="alert alert-danger hide" id="notSaveOtherSettingsEdited">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

         <!-- save Category Display messages -->
        <div class="alert alert-success hide" id="saveAddCategoryDetails">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

        <div class="alert alert-danger hide" id="notAddCategoryDetails">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

         <!-- save Category Settings Edited settings -->
        <div class="alert alert-success hide" id="saveCategorySettingsEdited">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>

        <div class="alert alert-danger hide" id="notSaveCategorySettingsEdited">
          <a class="close" data-dismiss="alert">&times;</a>
          <span></span>
        </div>
      
        <div class="tabbable"> <!-- Only required for left/right tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab3" data-toggle="tab"><b class="icon-list"></b>&nbsp; General Settings</a></li>
            <li><a href="#tab4" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp; Add New Settings</a></li>            
            <li><a href="#tab1" data-toggle="tab" id="listAllContents"><b class="icon-list"></b>&nbsp;Fine Types</a></li>
            <li><a href="#tab2" data-toggle="tab"><b class="icon-plus-sign"></b>&nbsp; Add New Fine Type</a></li>
            <li><a href="#tab5" data-toggle="tab"><b class="icon-th-large"></b>&nbsp; Categories</a></li>            
          </ul>
          <div class="tab-content">
            <!-- <div class="tab-content"> -->
              <!-- List ALL FineType settings -->
              <div class="tab-pane" id="tab1">
                <legend>Fine Types Configuration Settings Table</legend>
                 <table class="table table-hover table-bordered" id="OP_adimnContentDetails">
                      <thead>
                          <!-- Header of the Table -->
                          <tr>
                              <th>Finetype ID</th>       
                              <th>Content Type</th>     
                              <th>Description</th>     
                              <th>Amount</th>     
                              <th>Actions</th>          
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Content of the Table -->
                        <?php if ((isset($fineTypes)) && ($fineTypes !== 0)) : foreach ($fineTypes->result() as $fineType): ?>
                            <?php echo "<tr>"; ?>
                                  <?php echo "<td class='finetypeID'>" .$fineType->Finetype_id."</td>"; ?>
                                  <?php echo "<td>" .$fineType->Content_type."</td>"; ?>
                                  <?php echo "<td>" .$fineType->Description."</td>"; ?>     
                                  <?php echo "<td>" .$fineType->Amount."</td>"; ?>     
                                  <?php echo "<td><a href='#' class='btn btn-mini  fineTypeSettingsDetails-view' role='button' data-toggle='modal'>Edit/Save</a></td>"; ?>

                              <?php endforeach; ?>
                            <?php echo "</tr>"; ?>
                          <?php else: ?>
                              No records were returned.
                          <?php endif; ?>

                      </tbody>
                  </table>
              </div>
              <div class="tab-pane" id="tab2">
                <form id="saveSystemSettingsDetails" class="form-horizontal">
                    <fieldset>
                      <legend>Fine Types Configuration Settings</legend>
                      <div class="control-group">
                        <label class="control-label r-label" for="finePerday">Fine Perday</label>
                        <div class="controls">
                          <input type="text" id="finePerday" name="finePerday" class="required" placeholder="$10">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label r-label" for="contentType">Content Type</label>
                        <div class="controls">
                          <input type="text" id="contentType" name="contentType" class="required" placeholder="Books">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="description">Description</label>
                        <div class="controls">
                          <textarea id="description" name="description" placeholder="Fines (Per Day) For Overdue Materials"></textarea>
                        </div>
                      </div>

                      <div class="form-actions">
                        <button type="submit" id="save" class="btn btn-primary">&nbsp;Save&nbsp;</button>
                        <button class='btn' id='SystemSettingCancel'>Cancel</button>
                      </div>                    
                    </fieldset>
                  </form>
              </div>

              <!-- List ALL other settings -->
              <div class="tab-pane active" id="tab3">
                <legend>General Configuration Settings Table</legend>
                 <table class="table table-hover table-bordered" id="OP_adimnContentDetails">
                      <thead>
                          <!-- Header of the Table -->
                          <tr>
                              <th>System Settings ID</th>       
                              <th>Reservation Active Period</th>     
                              <th>Lending Period</th>     
                              <th>Actions</th>          
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Content of the Table -->
                        <?php if ((isset($others)) && ($others !== 0)) : foreach ($others->result() as $other): ?>
                            <?php echo "<tr>"; ?>
                                  <?php echo "<td class='SystemSettingsID'>" .$other->System_Settings_id ."</td>"; ?>
                                  <?php echo "<td>" .$other->Reservation_active_period  ."</td>"; ?>
                                  <?php echo "<td>" .$other->Lending_period."</td>"; ?>   
                                  <?php echo "<td><a href='#' class='btn btn-mini otherSettingsDetails-view' role='button' data-toggle='modal'>Edit/Save</a></td>"; ?>

                              <?php endforeach; ?>
                            <?php echo "</tr>"; ?>
                          <?php else: ?>
                              No records were returned.
                          <?php endif; ?>

                      </tbody>
                  </table>
              </div>  
            <!-- end other settings -->
            <!-- Add other settings -->
              <div class="tab-pane" id="tab4">
                <form id="saveReserSettingsDetails" class="form-horizontal">
                   <legend>Reservation and Lending Configuration Settings</legend>
                    <div class="control-group">
                      <label class="control-label r-label" for="description">Reservation Active Period</label>
                      <div class="controls">
                        <input type="text" id="reserActivePeriod" name="reserActivePeriod" class="required" placeholder="20 days">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label r-label" for="lendingPeriod">Lending Period</label>
                      <div class="controls">
                        <input type="text" id="lendingPeriod" name="lendingPeriod" class="required" placeholder="20 days">
                      </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" id="saveReserActivePeriod" class="btn btn-primary">&nbsp;Save&nbsp;</button>
                      <button class='btn' id='OtherSettingCancel'>Cancel</button>
                    </div>  
                </form>
              </div>
              <!-- end Add other settings -->
               <!-- Add Category settings -->  
              <div class="tab-pane" id="tab5">
                <form id="saveManageContentCategory" class="form-horizontal">
                  <legend>Categories Configuration Settings</legend>
                    <div class="control-group">
                      <label class="control-label r-label" for="addCategory">Add Category</label>
                      <div class="controls">
                        <input type="text" id="addCategory" name="addCategory" class="required" placeholder="Information Technology">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="categoryDescription">Category Description</label>
                      <div class="controls">
                        <textarea id="categoryDescription" name="categoryDescription" class="" placeholder="Description"></textarea>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" id="saveAddCategory" class="btn btn-primary">&nbsp;Save&nbsp;</button>
                      <button class='btn' id='cancelAddCategory'>Cancel</button>
                    </div>  
                </form>
                <div>
                  <legend>Categories Configuration Settings Table</legend>
                   <table class="table table-hover table-bordered" id="OP_adimnContentDetails">
                      <thead>
                          <!-- Header of the Table -->
                          <tr>
                              <th>Category ID</th>       
                              <th>Category Name</th>     
                              <th>Description</th>     
                              <th>Actions</th>          
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Content of the Table -->
                        <?php if ((isset($categories)) && ($categories !== 0)) : foreach ($categories->result() as $category): ?>
                            <?php echo "<tr>"; ?>
                                  <?php echo "<td class='CategoryID'>" .$category->Category_id ."</td>"; ?>
                                  <?php echo "<td>" .$category->Category_name  ."</td>"; ?>
                                  <?php echo "<td>" .$category->Description."</td>"; ?>   
                                  <?php echo "<td><a href='#' class='btn btn-mini categorySettingsDetails-view' role='button' data-toggle='modal'>Edit/Save</a></td>"; ?>

                              <?php endforeach; ?>
                            <?php echo "</tr>"; ?>
                          <?php else: ?>
                              No records were returned.
                          <?php endif; ?>

                      </tbody>
                  </table>
                </div>
              </div>
              <!-- end Add Category settings --> 
          


              <!--   <div class="tab-pane" id="tab4">
                  <form id="saveLendingSettingsDetails" class="form-horizontal">
                                           
                      <div class="form-actions">
                        <button type="submit" id="saveLendingPeriod" class="btn btn-primary">&nbsp;Save&nbsp;</button>
                        <button class='btn' id='SystemSettingCancel'>Cancel</button>
                      </div>  
                  </form>
              </div> -->
            </div>    
          </div>
        </div>  
    </div>   
</div>


<!-- Modal FineType Settings Preview-->
<div id="viewFineTypeSettingsDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewFineTypeSettingsDetailsModal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="viewFineTypeSettingsDetailsModal">Edit FineType Settings</h3>
  </div>
  <div id="viewFineTypeSettingsDetailsContainer" class="modal-body">
    
    <table class="table table-hover">
        <!-- this  will display corrosponding user details managecontent.js -->
      <tbody>
      </tbody>
    </table>


  </div>
  <div class="modal-footer">
    <span class="pull-left">
      <!-- <a href="#" role="button" data-dismiss="modal" aria-hidden="true" class="text-error viewFineTypeSettingsDetails-deactivate" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span> -->
      <a href="#" role="button" id="makeEditableFelds" data-toggle="modal">Edit</a>
    </span>
    <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary viewFineTypeSettingsDetails-save" data-toggle="modal">Save</a>
    <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
  </div>
</div> 


<!-- Modal Other Settings Preview-->
<div id="viewOtherSettingsDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewOtherSettingsDetailsModal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="viewOtherSettingsDetailsModal">Edit General Settings</h3>
  </div>
  <div id="viewOtherSettingsDetailsContainer" class="modal-body">
    
    <table class="table table-hover">
        <!-- this  will display corrosponding user details managecontent.js -->
      <tbody>
      </tbody>
    </table>


  </div>
  <div class="modal-footer">
    <span class="pull-left">
      <!-- <a href="#" role="button" data-dismiss="modal" aria-hidden="true" class="text-error viewOtherSettingsDetails-deactivate" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span> -->
      <a href="#" role="button" id="makeOtherSettingsEditableFelds" data-toggle="modal">Edit</a>
    </span>
    <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary viewOtherSettingsDetails-save" data-toggle="modal">Save</a>
    <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
  </div>
</div> 

<!-- Modal Category Settings Preview-->
<div id="viewCategorySettingsDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="viewCategorySettingsDetailsModal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="viewCategorySettingsDetailsModal">Edit Category Settings</h3>
  </div>
  <div id="viewCategorySettingsDetailsContainer" class="modal-body">
    
    <table class="table table-hover">
        <!-- this  will display corrosponding user details managecontent.js -->
      <tbody>
      </tbody>
    </table>


  </div>
  <div class="modal-footer">
    <span class="pull-left">
      <!-- <a href="#" role="button" data-dismiss="modal" aria-hidden="true" class="text-error viewOtherSettingsDetails-deactivate" data-toggle="modal">Deactivate</a><span>&nbsp;/&nbsp;</span> -->
      <a href="#" role="button" id="makeCategorySettingsEditableFelds" data-toggle="modal">Edit</a>
    </span>
    <a href="#" role="button" data-dismiss="modal" aria-hidden="true" style="visibility: hidden" class="btn btn-primary viewCategorySettingsDetails-save" data-toggle="modal">Save</a>
    <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
  </div>
</div> 
