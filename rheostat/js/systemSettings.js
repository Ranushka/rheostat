jQuery(document).ready(function($)
{

	// get base url from interface (footer.php)
	base_url = jQuery('#base_url').val();

		
	$('#SystemSettingCancel').click(function(e)
	{
		e.preventDefault();

		jQuery('#finePerday').val("");
		jQuery('#contentType').val("");
		jQuery('#description').val("");
		// jQuery('#reserActivePeriod').val("");
		// jQuery('#lendingPeriod').val("");

	});


	$('#OtherSettingCancel').click(function(e)
	{
		e.preventDefault();

		// jQuery('#finePerday').val("");
		// jQuery('#contentType').val("");
		// jQuery('#description').val("");
		jQuery('#reserActivePeriod').val("");
		jQuery('#lendingPeriod').val("");

	});



	jQuery('#save').click(function()
	{
		

		$('#saveSystemSettingsDetails').validate({
			submitHandler: function()
			{
				// saveSystemSettings();
				saveFineTypeSettings(); 
				return false;
			}
		});

	});

	jQuery('#saveReserActivePeriod').click(function()
	{
		
		$('#saveReserSettingsDetails').validate({
			submitHandler: function()
			{
				saveSystemSettings();
				// saveFineTypeSettings(); 
				return false;
			}
		});

	});

/*	jQuery('#saveLendingPeriod').click(function()
	{
		

		$('#saveLendingSettingsDetails').validate({
			submitHandler: function()
			{
				saveSystemSettings();
				// saveFineTypeSettings(); 
				return false;
			}
		});

	});*/



	function saveSystemSettings() 
	{
		// get form data values
		var formData = {
			
			ReserActivePeriod		     : jQuery('#reserActivePeriod').val(),
			LendingPeriod		         : jQuery('#lendingPeriod').val(),
		
			submitMode 			 : "ajax"
		};
		

		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/createSystemSettings/';
		// alert(dataSentUrl);
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{
					$('#saveSystemSettings').addClass('alert-success');
					$('#saveSystemSettings').slideDown();
					$('#saveSystemSettings span').html('Successfully Saved General Settings.');
					$(document).scrollTop(0);
					$('#saveSystemSettings').delay(4000).slideUp();

					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}

					jQuery('#reserActivePeriod').val("");
					jQuery('#lendingPeriod').val("");
				}
				else
				{
					$('#saveSystemSettings').addClass('alert-danger');
					$('#saveSystemSettings').slideDown();
					$('#saveSystemSettings span').html('Not Updated General Settings.');
					$(document).scrollTop(0);
					$('#saveSystemSettings').delay(4000).slideUp();
					console.log(responce.msg);					
				}
			}
		});
	}//Function End createUser()------------------------------------------------------FUNEND

	function saveFineTypeSettings() 
	{

		// get form data values
		var formData = {
			
			FinePerday		     	: jQuery('#finePerday').val(),
			ContentType		        : jQuery('#contentType').val(),
			Description		        : jQuery('#description').val(),
		
		
			submitMode 			 : "ajax"
		};

		
		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/createFineTypeSettings/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{
									
					$('#saveSystemSettings').addClass('alert-success');
					$('#saveSystemSettings').slideDown();
					$('#saveSystemSettings span').html('Successfully Saved FineType Settings.');
					$(document).scrollTop(0);
					$('#saveSystemSettings').delay(4000).slideUp();

					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}
					
					jQuery('#finePerday').val("");
					jQuery('#contentType').val("");
					jQuery('#description').val("");
					
				}
				else
				{
					$('#saveSystemSettings').addClass('alert-danger');
					$('#saveSystemSettings').slideDown();
					$('#saveSystemSettings span').html('Not Updated FineType Settings.');
					$(document).scrollTop(0);
					$('#saveSystemSettings').delay(4000).slideUp();
					// alert(responce.msg);					
				}
			}
		});
	}//Function End createUser()------------------------------------------------------FUNEND

	//fineType Settings Table view
	function getAllFineTypeSettings(finetypeID)
	{
		// alert('hi getall');
		// get form data values
		var formData = {
			submitMode  : "ajax",
			finetypeID  : finetypeID
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/getAllFineTypeSettingsDetailsViewModal/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{		


					var finetypeTable  = 	'<tr><td>Finetype ID   </td> <td><input type="text" disabled class="disabledFeald" id="Finetype_id"     value="'+responce.fineTypeAllDetail.Finetype_id+'"></td> </tr>'+
									'<tr><td>Content Type  </td> <td><input type="text" disabled class="disabledFeald" id="Content_type"    value="'+responce.fineTypeAllDetail.Content_type+'"> </td> </tr>'+
									'<tr><td>Description   </td> <td><input type="text" disabled class="disabledFeald" id="Description"     value="'+responce.fineTypeAllDetail.Description+'"></td> </tr>'+
									'<tr><td>Amount        </td> <td><input type="text" disabled class="disabledFeald" id="Amount"          value="'+responce.fineTypeAllDetail.Amount+'"></td> </tr>';
					$('#viewFineTypeSettingsDetails table').find('tbody').html(finetypeTable);
					$('#viewFineTypeSettingsDetails').modal('show');
								
				}
				else
				{
					// alert(responce.msg);
				}
			}
		});

	}//Function End getAllEContentDetails()---------------------------------------------------FUNEND

	

	// Display FineTypeSettings preview page
	jQuery(document).on('click','.fineTypeSettingsDetails-view', function(event)
	{
		finetypeID = $(this).closest('tr').find('.finetypeID').html();
		getAllFineTypeSettings(finetypeID)
	});

	jQuery(document).on('click','.viewFineTypeSettingsDetails-save', function(event)
	{
		// alert('save button')
		finetypeID = $('#Finetype_id').val();
		// alert('eContentID :'+contentId);
		saveFineTypeEditedDetails(finetypeID);

	});



	//Other Settings Table view
	function getAllOtherSettings(SystemSettingsID)
	{
		// alert('hi getall');
		// get form data values
		var formData = {
			submitMode  : "ajax",
			SystemSettingsID  : SystemSettingsID
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/getAllOtherSettingsDetailsViewModal/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{		


					var otherSettingsTable  = 	'<tr><td>System Settings ID  </td> <td><input type="text" disabled class="disabledFeald" id="System_Settings_id"     value="'+responce.OtherSettingsAllDetail.System_Settings_id+'"></td> </tr>'+
									'<tr><td>Reservation Active Period </td> <td><input type="text" disabled class="disabledFeald" id="Reservation_active_period"    value="'+responce.OtherSettingsAllDetail.Reservation_active_period+'"> </td> </tr>'+
									'<tr><td>Lending Period   </td> <td><input type="text" disabled class="disabledFeald" id="Lending_period"                        value="'+responce.OtherSettingsAllDetail.Lending_period+'"></td> </tr>';
									
					$('#viewOtherSettingsDetails table').find('tbody').html(otherSettingsTable);
					$('#viewOtherSettingsDetails').modal('show');
								
				}
				else
				{
					// alert(responce.msg);
				}
			}
		});

	}//Function End getAllEContentDetails()---------------------------------------------------FUNEND

	// Display OtherSettings preview page
	jQuery(document).on('click','.otherSettingsDetails-view', function(event)
	{
		SystemSettingsID = $(this).closest('tr').find('.SystemSettingsID').html();

		getAllOtherSettings(SystemSettingsID)
	});

	//Save button Preview Page in other settings
	jQuery(document).on('click','.viewOtherSettingsDetails-save', function(event)
	{
		// alert('save button')
		SystemSettingsID = $('#System_Settings_id').val();
		// alert('eContentID :'+contentId);
		saveOtherSettingsEditedDetails(SystemSettingsID);

	});

   	//display text box on click edit, Other Settings Preview
	$('#makeOtherSettingsEditableFelds').click(function ()
	{		
		$(this).closest('.modal').find('.btn').css( "visibility", "visible" );
		$(this).closest('.modal').find('.disabledFeald').removeAttr('disabled');		
	});


	//save fineType Settings Table view data
 	function saveFineTypeEditedDetails(finetypeID)
	{

		// get form data values
		var editedFineTypeDetails = {		
			Finetype_id          : jQuery('#Finetype_id').val(),
			Content_type         : jQuery('#Content_type').val(),
			Description          : jQuery('#Description').val(),
			Amount               : jQuery('#Amount').val()
		};

		var formData = {
			editedFineTypeDetails:editedFineTypeDetails,
			finetypeID			 : finetypeID,
			submitMode  		 : "ajax"
		}
		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/saveFineTypeEditedDetails/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{
					// if error massage display
					// alert(responce.msg);
					$('#saveFineTypeEditedSystemSettings').removeClass('alert-danger');					
					$('#saveFineTypeEditedSystemSettings').addClass('alert-success');					
					$('#saveFineTypeEditedSystemSettings').slideDown();
					$('#saveFineTypeEditedSystemSettings span').html('Successfully Saved Finetype Settings.');
					$(document).scrollTop(0);
					$('#saveFineTypeEditedSystemSettings').delay(4000).slideUp();

					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}
				}
				else
				{
					$('#notSaveFineTypeEditedSystemSettings').removeClass('alert-success');
					$('#notSaveFineTypeEditedSystemSettings').addClass('alert-danger');
					$('#notSaveFineTypeEditedSystemSettings').slideDown();
					$('#notSaveFineTypeEditedSystemSettings span').html('Not Saved Finetype Settings.');
					$(document).scrollTop(0);
					$('#notSaveFineTypeEditedSystemSettings').delay(4000).slideUp();			
				}
				
			}
		});
	}//Function End editContentsDetails();


	//save Other Settings Table view data
 	function saveOtherSettingsEditedDetails(SystemSettingsID)
	{

		// get form data values
		var editedOtherDetails = {		
			System_Settings_id              : jQuery('#System_Settings_id').val(),
			Reservation_active_period	    : jQuery('#Reservation_active_period').val(),
			Lending_period                  : jQuery('#Lending_period').val()
			
		};

		var formData = {
			editedOtherDetails   :editedOtherDetails,
			SystemSettingsID     : SystemSettingsID,
			submitMode  		 : "ajax"
		}
		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/saveOtherSettingsEditedDetails/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{
					// if error massage display
					// alert(responce.msg);
					$('#saveOtherSettingsEdited').removeClass('alert-danger');					
					$('#saveOtherSettingsEdited').addClass('alert-success');					
					$('#saveOtherSettingsEdited').slideDown();
					$('#saveOtherSettingsEdited span').html('Successfully Saved General Settings.');
					$(document).scrollTop(0);
					$('#saveOtherSettingsEdited').delay(4000).slideUp();
					
					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}
				}
				else
				{
					$('#notSaveOtherSettingsEdited').removeClass('alert-success');
					$('#notSaveOtherSettingsEdited').addClass('alert-danger');
					$('#notSaveOtherSettingsEdited').slideDown();
					$('#notSaveOtherSettingsEdited span').html('Not Saved General Settings.');
					$(document).scrollTop(0);
					$('#notSaveOtherSettingsEdited').delay(4000).slideUp();			
				}
				
			}
		});
	}//Function End editContentsDetails();



	function saveCategoryDetails() 
	{
		// get form data values
		var formData = {
			
			AddCategory		      : jQuery('#addCategory').val(),
			CategoryDescription	  : jQuery('#categoryDescription').val(),
		
			submitMode 			 : "ajax"
		};
		

		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/saveCategoryDetails/';
		// alert(dataSentUrl);
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{
					$('#saveAddCategoryDetails').addClass('alert-success');
					$('#saveAddCategoryDetails').slideDown();
					$('#saveAddCategoryDetails span').html('Successfully Saved Category Settings.');
					$(document).scrollTop(0);
					$('#saveAddCategoryDetails').delay(4000).slideUp();

					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}

					jQuery('#addCategory').val("");
					jQuery('#categoryDescription').val("");
				}
				else
				{
					$('#notAddCategoryDetails').addClass('alert-danger');
					$('#notAddCategoryDetails').slideDown();
					$('#notAddCategoryDetails span').html('Not Updated Category Settings.');
					$(document).scrollTop(0);
					$('#notAddCategoryDetails').delay(4000).slideUp();
					console.log(responce.msg);					
				}
			}
		});
	}//Function End createUser()------------------------------------------------------FUNEND



	$('#cancelAddCategory').click(function(e)
	{
		e.preventDefault();

		jQuery('#addCategory').val("");
		jQuery('#categoryDescription').val("");
		// jQuery('#reserActivePeriod').val("");
		// jQuery('#lendingPeriod').val("");

	});

	jQuery('#saveAddCategory').click(function()
	{		

		$('#saveManageContentCategory').validate({
			submitHandler: function()
			{
				saveCategoryDetails(); 
				return false;
			}
		});

	});



	//Category Settings Table view
	function getAllCategorySettings(CategoryID)
	{
		// alert('hi getall');
		// get form data values
		var formData = {
			submitMode  : "ajax",
			CategoryID  : CategoryID
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/getAllCategorySettingsDetailsViewModal/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{		


					var categorySettingsTable  = 	'<tr><td>Category ID </td> <td><input type="text" disabled class="disabledFeald" id="Category_id"   value="'+responce.categoryAllDetail.Category_id+'"></td> </tr>'+
									'<tr><td>Category Name </td> <td><input type="text" disabled class="disabledFeald" id="Category_name"           value="'+responce.categoryAllDetail.Category_name+'"> </td> </tr>'+
									'<tr><td>Description   </td> <td><input type="text" disabled class="disabledFeald" id="Description"             value="'+responce.categoryAllDetail.Description+'"></td> </tr>';
									
					$('#viewCategorySettingsDetails table').find('tbody').html(categorySettingsTable);
					$('#viewCategorySettingsDetails').modal('show');
								
				}
				else
				{
					// alert(responce.msg);
				}
			}
		});

	}//Function End getAllEContentDetails()---------------------------------------------------FUNEND

	//save Category Settings Table view data
 	function saveCategoryEditedDetails(CategoryID)
	{

		// get form data values
		var editedCategoryDetails = {		
			Category_id          : jQuery('#Category_id').val(),
			Category_name        : jQuery('#Category_name').val(),
			Description          : jQuery('#Description').val()
		};

		var formData = {
			editedCategoryDetails:editedCategoryDetails,
			CategoryID			 : CategoryID,
			submitMode  		 : "ajax"
		}
		// create data sent url
		dataSentUrl = base_url+'index.php/systemSettings/saveCategoryEditedDetails/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert('got responce');
				if(responce.status!=="error")
				{
					// if error massage display
					// alert(responce.msg);
					$('#saveCategorySettingsEdited').removeClass('alert-danger');					
					$('#saveCategorySettingsEdited').addClass('alert-success');					
					$('#saveCategorySettingsEdited').slideDown();
					$('#saveCategorySettingsEdited span').html('Successfully Saved Category Settings.');
					$(document).scrollTop(0);
					$('#saveCategorySettingsEdited').delay(4000).slideUp();

					if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					} else {
					    //you're inside a frame, so you stop reloading
					}
				}
				else
				{
					$('#notSaveCategorySettingsEdited').removeClass('alert-success');
					$('#notSaveCategorySettingsEdited').addClass('alert-danger');
					$('#notSaveCategorySettingsEdited').slideDown();
					$('#notSaveCategorySettingsEdited span').html('Not Saved Category Settings.');
					$(document).scrollTop(0);
					$('#notSaveCategorySettingsEdited').delay(4000).slideUp();			
				}
				
			}
		});
	}//Function End editContentsDetails();

	// Display OtherSettings preview page
	jQuery(document).on('click','.categorySettingsDetails-view', function(event)
	{
		CategoryID = $(this).closest('tr').find('.CategoryID').html();

		getAllCategorySettings(CategoryID)
	});

	//Save button Preview Page in other settings
	jQuery(document).on('click','.viewCategorySettingsDetails-save', function(event)
	{
		// alert('save button')
		CategoryID = $('#Category_id').val();
		// alert('eContentID :'+contentId);
		saveCategoryEditedDetails(CategoryID);
		

	});

   	//display text box on click edit, Other Settings Preview
	$('#makeCategorySettingsEditableFelds').click(function ()
	{		
		$(this).closest('.modal').find('.btn').css( "visibility", "visible" );
		$(this).closest('.modal').find('.disabledFeald').removeAttr('disabled');		
	});



});
