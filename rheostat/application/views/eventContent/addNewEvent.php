<?php 
	echo form_open('',
    $attributes = array('class' => 'form-horizontal', 'id' => 'addNewEvent' , 'name' => "addNewEventForm"));
?>
	
	<!-- successMsagesAddPhysicalBook alert -->
	 <div class="alert alert-success hide successMsagesAddNewEvent popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>
	 <!-- unsuccessMsagesAddPhysicalBook alert --> 
	 <div class="alert alert-danger hide unsuccessMsagesAddNewEvent popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>
	

	<fieldset>
		 <div class="accordion" id="accordion">


		 	<div class="accordion-group">
		 		<div class="accordion-heading">
		 			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
		 				<h3>Add New Event</h3>
		 			</a>
		 		</div>
		 		<div id="collapseOne" class="accordion-body collapse in">
		 			<div class="accordion-inner">
						
		 				<!-- Add New Event -->
		 				<section class="span6">
		 					<div class="control-group">
								<label class="control-label r-label" for="Select_event">Select Event</label>
								<div class="controls">
									<?php 
										$Select_event = array(
											                    ''  		        => '- Please Select -',
						                                        'Wedding'    	        => 'Wedding',
						                                        'Home Comming' 	        => 'Home Comming',
						                                        'Birth Day Party' 	=> 'Birth Day Party',
						                                        'Conference Party' 	=> 'Conference Party',
						                                        'Special Occation' 	=> 'Special Occation',
						                                        'Meeting' 	        => 'Meeting',
											);
										echo form_dropdown('Select_event" class="input-xlarge required" id="Select_event', $Select_event);
									?>

								</div>
							</div>

							<div class="control-group">
					            <label class="control-label r-label" for="Event_date">Event Date</label>
					            <div class="controls">
					                <?php
					                $Event_date = array(
					                    'type'      => 'text',
					                    'name'      => 'Event_date',
					                    'id'        => 'Event_date',
					                    'class'     => 'input-xlarge required',
					                    'maxlength' => '20',
					                    'value'     => date('Y-m-d'),
					                );
					                echo form_input($Event_date);
					                ?>
					            </div>
					        </div>		

							<div class="control-group">
								<label class="control-label" for="Event_croud">Event Croud</label>
								<div class="controls">
									<?php 
										$Event_croud = array(
											'type'        => 'text',
											'name'        => 'Event_croud',
											'id'          => 'Event_croud',
											'class'       => 'input-xlarge',
											'maxlength'   => '100',
											'placeholder' => 'Eg: 100',
											);
										echo form_input($Event_croud);
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="Event_description">Event Description</label>
								<div class="controls">
									<?php 
										$Event_description = array(
											'type'        => 'textarea',
											'name'        => 'Event_description',
											'id'          => 'Event_description',
											'class'       => 'input-xlarge',
											'maxlength'   => '500',
											'placeholder' => 'Eg: Description',
											);
										echo form_textarea($Event_description);
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="NOof_employees">NO of Employees</label>
								<div class="controls">
									<?php 
										$NOof_employees = array(
											'type'        => 'text',
											'name'        => 'NOof_employees',
											'id'          => 'NOof_employees',
											'class'       => 'input-xlarge',
											'maxlength'   => '100',
											'placeholder' => 'Eg: 10'
											);
										echo form_input($NOof_employees);
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="Event_comments">Event Comments</label>
								<div class="controls">
									<?php 
										$Event_comments = array(
											'type'        => 'textarea',
											'name'        => 'Event_comments',
											'id'          => 'Event_comments',
											'class'       => 'input-xlarge',
											'maxlength'   => '100',
											'placeholder' => 'Eg: Comments',
											);
										echo form_textarea($Event_comments);
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label r-label" for="Event_type">Event Type</label>
								<div class="controls">
									<?php 
										$Event_type = array(
											''  		=> '- Please Select -',
						                  'Day'    	    => 'Day',
						                  'Night' 	    => 'Night',
						                  'Evening' 	=> 'Evening',
											);
										echo form_dropdown('Event_type" class="input-xlarge required" id="Event_type', $Event_type);
									?>

								</div>
							</div>		

							<div class="control-group hide" id="Event_lightningParent">
							<legend>Lightning</legend>
								<label class="control-label r-label" for="Lightning">Lightning</label>
								<div class="controls">
									<?php 
										$Lightning = array(
						                  ''  	 => '- Please Select -',
						                  'Yes'      => 'Yes',
						                  'No' 	     => 'No',	                  
						                );
										echo form_dropdown('Lightning" class="input-xlarge required" id="Lightning', $Lightning);
									?>
								</div>
							</div>

							<div class="control-group hide" id="lightningParent">
								<label class="control-label r-label" for="Light_arrangement">Light Arrangements</label>
								<div class="controls">
									<?php 
										$Light_arrangement = array(
						                  ''  	         => '- Please Select -',
						                  'Default'      => 'Default',
						                  'Cusomized' 	 => 'Cusomized',	                  
						                );
										echo form_dropdown('Light_arrangement" class="input-xlarge required" id="Light_arrangement', $Light_arrangement);
									?>
								</div>
							</div>

							<div class="control-group hide" id="lightningDescription">
								<label class="control-label" for="Lightning_description">Lightning Description</label>
								<div class="controls">
									<?php 
										$Lightning_description = array(
											'type'        => 'textarea',
											'name'        => 'Lightning_description',
											'id'          => 'Lightning_description',
											'class'       => 'input-xlarge',
											'maxlength'   => '500',
											'placeholder' => 'Eg: Description',
											);
										echo form_textarea($Lightning_description);
									?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label r-label" for="Liquor">Liquor</label>
								<div class="controls">
									<?php 
										$Liquor = array(
											''  		=> '- Please Select -',
						                  'Yes'    	    => 'Yes',
						                  'No' 	        => 'No',	                  
											);
										echo form_dropdown('Liquor" class="input-xlarge required" id="Liquor', $Liquor);
									?>
								</div>
							</div>

							<div class="control-group hide" id="liquorParent">
								<label class="control-label r-label required" for="Liquor_description">Description</label>
								<div class="controls">
									<?php 
										$Liquor_description = array(
											'type'        => 'textarea',
											'name'        => 'Liquor_description',
											'id'          => 'Liquor_description',
											'class'       => 'input-xlarge',
											'maxlength'   => '500',
											'placeholder' => 'Eg: Description',
											);
										echo form_textarea($Liquor_description);
									?>
								</div>
							</div>
						</section>	
						<!-- Add New Event -->
						<aside class="span6">
						 	<h3>No Evants on this date</h3>		
						</aside> 				
		 			</div><!-- <div class="accordion-inner"> -->
		 		</div>
		 	</div>
		 	<div class="accordion-group">
		 		<div class="accordion-heading">
		 			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
		 				<h3>Add Menu Details</h3>
		 			</a>
		 		</div>
		 		<div id="collapseTwo" class="accordion-body collapse">
		 			<div class="accordion-inner">
		 				<!-- Add Menu Details -->
		 				<div class="control-group">
							<label class="control-label r-label" for="Menu_id">Select Menu</label>
							<div class="controls">				
								<?php 	        

									$menu_id = array();
						            $menu_id[''] = "-Please Select-";
									if(isset($menus))
									{
										foreach ($menus->result() as $key => $menu)
										{
											$menu_id[$menu->Menu_id] = $menu->Menu_name;
											
										}

									}
									echo form_dropdown('Menu_id" class="input-xlarge required" id="Menu_id', $menu_id);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Menu_items">Menu Items</label>
							<div class="controls">
								<?php 
									$Menu_items = array(
										'type'        => 'textarea',
										'name'        => 'Menu_items',
										'id'          => 'Menu_items',
										'class'       => 'input-xlarge',
										'maxlength'   => '100',
										'placeholder' => 'Eg: Items list',
										);
									echo form_textarea($Menu_items);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Special_comments">Special Comments</label>
							<div class="controls">
								<?php 
									$Special_comments = array(
										'type'        => 'textarea',
										'name'        => 'Special_comments',
										'id'          => 'Special_comments',
										'class'       => 'input-xlarge',
										'maxlength'   => '100',
										'placeholder' => 'Eg: Special comments',
										);
									echo form_textarea($Special_comments);
								?>
							</div>
						</div>
						<!-- Add Menu Details -->
		 			</div><!-- <div class="accordion-inner"> -->
		 		</div>
		 	</div>
		 	<div class="accordion-group">
		 		<div class="accordion-heading">
		 			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
		 				<h3>Add Hall Details</h3>
		 			</a>
		 		</div>
		 		<div id="collapseThree" class="accordion-body collapse">
		 			<div class="accordion-inner">
		 				<!-- Add Hall Details -->
						<div class="control-group">
							<label class="control-label r-label" for="Hall_id">Select Hall</label>
							<div class="controls">
								
								<?php 
					                  
									$hall_id = array();
						            $hall_id[''] = "-Please Select-";
									if(isset($halls))
									{
										foreach ($halls->result() as $key => $hall)
										{
										
											$hall_id[$hall->Hall_id] = $hall->Hall_name;
											
										}

									}
									echo form_dropdown('Hall_id" class="input-xlarge required" id="Hall_id', $hall_id);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Hall_arrangement">Hall Arrangements</label>
							<div class="controls">
								<?php
								$Hall_arrangement = array(
					                  ''  		    => '- Please Select -',
					                  'Yes'         => 'Yes',
					                  'No' 	        => 'No',
					                );
									echo form_dropdown('Hall_arrangement" class="input-xlarge" id="Hall_arrangement', $Hall_arrangement);
								?>
							</div>
						</div>

						<div class="control-group hide" id="hallArrangementParent">
							<label class="control-label r-label" for="Arrangement">Arrangements</label>
							<div class="controls">
								<?php 
									$Arrangement = array(
					                  ''  	         => '- Please Select -',
					                  'Default'      => 'Default',
					                  'Cusomized' 	 => 'Cusomized',	                  
					                );
									echo form_dropdown('Arrangement" class="input-xlarge required" id="Arrangement', $Arrangement);
								?>
							</div>
						</div>

						<div class="control-group hide" id="arrangementParent">
							<label class="control-label r-label required" for="Arrangement_description">Description</label>
							<div class="controls">
								<?php 
									$Arrangement_description = array(
										'type'        => 'textarea',
										'name'        => 'Arrangement_description',
										'id'          => 'Arrangement_description',
										'class'       => 'input-xlarge',
										'maxlength'   => '500',
										'placeholder' => 'Eg: Description',
										);
									echo form_textarea($Arrangement_description);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Air_condition">Air Condition</label>
							<div class="controls">
								<?php
								$Air_condition = array(
					                  ''  		    => '- Please Select -',
					                  'Yes'         => 'Yes',
					                  'No' 	        => 'No',
					                );
									echo form_dropdown('Air_condition" class="input-xlarge" id="Air_condition', $Air_condition);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="SpecialHall_comments">Special Comments</label>
							<div class="controls">
								<?php 
									$SpecialHall_comments = array(
										'type'        => 'textarea',
										'name'        => 'SpecialHall_comments',
										'id'          => 'SpecialHall_comments',
										'class'       => 'input-xlarge',
										'maxlength'   => '100',
										'placeholder' => 'Eg: Special comments',
										);
									echo form_textarea($SpecialHall_comments);
								?>
							</div>
						</div>
						<!-- Add Hall Details -->


		 			</div><!-- <div class="accordion-inner"> -->
		 		</div>
		 	</div>

		 	<div class="accordion-group">
		 		<div class="accordion-heading">
		 			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapsefour">
		 				<h3>Add Band Details</h3>
		 			</a>
		 		</div>
		 		<div id="collapsefour" class="accordion-body collapse">
		 			<div class="accordion-inner">
		 				<!-- Add Band Details -->
		 				<div class="control-group">
							<label class="control-label" for="event_band">Band</label>
							<div class="controls">
								<?php
								$event_band = array(
					                  ''  		    => '- Please Select -',
					                  'Yes'         => 'Yes',
					                  'No' 	        => 'No',
					                );
									echo form_dropdown('event_band" class="input-xlarge" id="event_band', $event_band);
								?>
							</div>
						</div>

						<div class="control-group hide" id="eventBandParent">
							<label class="control-label r-label" for="band_type">Select Band Type</label>
							<div class="controls">
								<?php 
									$band_type = array(
					                  ''  	         => '- Please Select -',
					                  'One Man'      => 'One Man',
					                  'Dj' 	 		 => 'Dj',	                  
					                  'Full Band' 	 => 'Full Band',	                  
					                  '3Ps' 	 	 => '3Ps',	                  
					                  'Calypso' 	 => 'Calypso',	                  
					                );
									echo form_dropdown('band_type" class="input-xlarge required" id="band_type', $band_type);
								?>
							</div>
						</div>
				                
				                <div class="control-group">
							<label class="control-label r-label" for="event_status">Event Status</label>
							<div class="controls">
								<?php 
									$event_status = array(
				                                              ''  	     => '- Please Select -',
				                                              'Active'       => 'Active',
				                                              'Temporary'    => 'Temporary',	                  
				                                              'In-Active'    => 'In-Active',	                                                                
				                                            );  
									echo form_dropdown('event_status" class="input-xlarge required" id="event_status', $event_status);
								?>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label r-label" for="Customer_id">Select Customer</label>
							<div class="controls">
								
								<?php
					                 
									$Customer_id = array();
						            $Customer_id[''] = "-Please Select-";
									if(isset($customers))
									{
										foreach ($customers->result() as $key => $customers)
										{
										
											$Customer_id[$customers->Customer_id] = $customers->First_name;
											
										}

									}
									echo form_dropdown('Customer_id" class="input-xlarge required" id="Customer_id', $Customer_id);
								?>
							</div>
						</div>

		 				<!-- Add Band Details -->
		 			</div><!-- <div class="accordion-inner"> -->
		 		</div>
		 	</div>
		 

		</div>
		
		
		<div class="form-actions">
			<button type="submit" id="addNewEventButton" class="btn btn-primary">Save Changes</button>
			<button class="btn" id="addNewEventCancle">Cancel</button>
		</div>
		

	</fieldset>
</form>