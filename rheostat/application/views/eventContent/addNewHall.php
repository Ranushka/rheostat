<?php 
	echo form_open('',
    $attributes = array('class' => 'form-horizontal', 'id' => 'addNewHallForm' , 'name' => "addNewHall"));
?>

	<!-- This is a save information alert --> 
	 <div class="alert alert-success hide successMsagesAddHall popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>

	  <!-- unsuccessMsagesAddPhysicalBook alert --> 
	 <div class="alert alert-danger hide unsuccessMsagesAddHall popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>


	<fieldset>
		<legend>Add Banquet Halls'</legend>

		<div class="control-group">
			<label class="control-label r-label" for="hall_title">Hall Title</label>
			<div class="controls">
				<?php 
					$hall_title = array(
						'type'        => 'text',
						'name'        => 'hall_title',
						'id'          => 'hall_title',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg: Chance palace',
						);
					echo form_input($hall_title);
				?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="hall_capacity">Hall Capacity</label>
			<div class="controls">
				<?php 
					$hall_capacity = array(
						'type'        => 'text',
						'name'        => 'hall_capacity',
						'id'          => 'hall_capacity',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'eg: 300',
						);
					echo form_input($hall_capacity);
				?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label r-label" for="hall_status">Hall Status</label>
			<div class="controls">
				<?php 
					$hall_status = array(
	                  ''  		        => '- Please Select -',
	                  'Available'    	=> 'Available',
	                  'Not Available' 	=> 'Not Available',
	                );
					echo form_dropdown('hall_status" class="input-xlarge required" id="hall_status', $hall_status);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label r-label" for="aircondition">Aircondition</label>
			<div class="controls">
				<?php 
					$aircondition = array(
	                  ''  		        => '- Please Select -',
	                  'Available'    	=> 'Available',
	                  'Not Available' 	=> 'Not Available',
	                );
					echo form_dropdown('aircondition" class="input-xlarge required" id="aircondition', $aircondition);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label r-label" for="hall_arrangements">Hall Arrangements</label>
			<div class="controls">
				<?php 
					$hall_arrangements = array(
	                  ''  		        => '- Please Select -',
	                  'Available'    	=> 'Available',
	                  'Not Available' 	=> 'Not Available',
	                );
					echo form_dropdown('hall_arrangements" class="input-xlarge required" id="hall_arrangements', $hall_arrangements);
				?>
			</div>
		</div>

		
		<div class="control-group">
			<label class="control-label" for="hall_description">Hall Description</label>
			<div class="controls">
				<?php 
					$hall_description = array(
						'type'        => 'textarea',
						'name'        => 'hall_description',
						'id'          => 'hall_description',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'eg: Description',
						);
					echo form_textarea($hall_description);
				?>
			</div>
		</div>

		<div class="form-actions">
			<input type="hidden" name="mediaContentSubmitMode" value="POST" id="submitMode">
			<button type="submit" id="addNewHallButton" class="btn btn-primary">Add New</button>
			<button class="btn" id="cancleAddNewHallButton" name="mediaContentButton">Cancel</button>
		</div>
	</fieldset>
</form>