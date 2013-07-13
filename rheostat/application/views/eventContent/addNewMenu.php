<?php 
	echo form_open('',
    $attributes = array('class' => 'form-horizontal', 'id' => 'addNewMenuForm' , 'name' => "addNewMenu"));
?>


	
	<!-- This is a save information alert --> 
	 <div class="alert alert-success hide successMsagesAddNewMenu popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>

	  <!-- unsuccessMsagesAddPhysicalBook alert --> 
	 <div class="alert alert-danger hide unsuccessMsagesAddNewMenu popupmsg">
	  <a class="close" data-dismiss="alert">&times;</a>
	  <span id=""></span>
	 </div>
	

	<fieldset>
		<legend>Add Menus'</legend>

		<div class="control-group">
			<label class="control-label r-label" for="Menu_title">Menu Title</label>
			<div class="controls">
				<?php 
					$Menu_title = array(
						'type'        => 'text',
						'name'        => 'Menu_title',
						'id'          => 'Menu_title',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg: Indian',
						);
					echo form_input($Menu_title);
				?>
			</div>
		</div>		

		<div class="control-group">
			<label class="control-label" for="Food_id">Menu Foods</label>
			<div class="controls">
				<?php 

					$food_id = array();
		            $food_id[''] = "-Please Select-";
					if(isset($foods))
					{
						foreach ($foods->result() as $key => $food)
						{
						
							$food_id[$food->food_id] = $food->Food_name;
							
						}

					}
					echo form_dropdown('Food_id" class="input-xlarge" id="Food_id', $food_id);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Desserst_id">Menu Desserts</label>
			<div class="controls">
				<?php 

					$Dessert_id = array();
		            $Dessert_id[''] = "-Please Select-";
					if(isset($desserts))
					{
						foreach ($desserts->result() as $key => $dessert)
						{
						
							$Dessert_id[$dessert->Dessert_id] = $dessert->Dessert_name;
							
						}

					}
					echo form_dropdown('Desserst_id" class="input-xlarge" id="Desserst_id', $Dessert_id);
				?>
			</div>
		</div>

		<div class="form-actions">			
			<button id="addItemstoMenu" name="addItemstoMenu" class="btn btn-primary">Add To Menu</button>
			<button class="btn" id="menuItemsCancle" name="menuItemsCancle">Cancel</button>
		</div>

		<div class="control-group">
			<label class="control-label r-label" for="Menu_items">Menu Items</label>
			<div class="controls">
				<?php 
					$Menu_items = array(
						'type'        => 'textarea',
						'name'        => 'Menu_items',
						'id'          => 'Menu_items',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'eg: Items',						
						);
					echo form_textarea($Menu_items);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Menu_comments">Menu Comments</label>
			<div class="controls">
				<?php 
					$Menu_comments = array(
						'type'        => 'textarea',
						'name'        => 'Menu_comments',
						'id'          => 'Menu_comments',
						'class'       => 'input-xlarge',
						'maxlength'   => '100',
						'placeholder' => 'eg: Menu_comments',
						);
					echo form_textarea($Menu_comments);
				?>
			</div>
		</div>		

		<div class="control-group">
			<label class="control-label r-label" for="Menu_price">Menu Price</label>
			<div class="controls">
				<?php 
					$Menu_price = array(
						'type'        => 'text',
						'name'        => 'Menu_price',
						'id'          => 'Menu_price',
						'class'       => 'input-xlarge required',
						'maxlength'   => '100',
						'placeholder' => 'Eg:$10',
						);
					echo form_input($Menu_price);
				?>
			</div>
		</div>

		<div class="form-actions">			
			<button type="submit" id="addNewMenuButton" class="btn btn-primary">Add New</button>
			<button class="btn" id="menuClearButton" name="menuClearButton">Cancel</button>
		</div>
	</fieldset>
</form>

		