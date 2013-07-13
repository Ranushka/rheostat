jQuery(document).ready(function()
{
	// Globel varibale for searching 
	var searchString = [];

	// get base url from interface (footer.php)
	base_url = jQuery('#base_url').val();


	//event cancle button
	$('#addNewEventCancle').click(function(event)
	{	
		event.preventDefault();

		jQuery('#Select_event').val("");
		jQuery('#Event_date').val("");
		jQuery('#Event_croud').val("");
		jQuery('#Event_description').val("");
		jQuery('#NOof_employees').val("");
		jQuery('#Event_comments').val("");
		jQuery('#Event_type').val("");
		jQuery('#Lightning').val("");
		jQuery('#Light_arrangement').val("");
		jQuery('#Lightning_description').val("");
		jQuery('#Liquor').val("");
		jQuery('#Liquor_description').val("");
		jQuery('#Menu_id').val("");
		jQuery('#Menu_items').val("");
		jQuery('#Special_comments').val("");
		jQuery('#Hall_id').val("");
		jQuery('#Hall_arrangement').val("");
		jQuery('#Arrangement_description').val("");
		jQuery('#Air_condition').val("");
		jQuery('#SpecialHall_comments').val("");
		jQuery('#event_band').val("");
		jQuery('#band_type').val("");
		jQuery('#event_status').val("");
		jQuery('#Customer_id').val("");

	});

	//menu cancel button
$('#menuClearButton').click(function(e)
	{
		e.preventDefault();

		jQuery('#Menu_title').val("");
		jQuery('#Food_id').val("");
		jQuery('#Desserst_id').val("");
		jQuery('#Menu_items').val("");
		jQuery('#Menu_comments').val("");
		jQuery('#Menu_price').val("");
		
	});

	//menu items cancel button
$('#menuItemsCancle').click(function(e)
	{
		e.preventDefault();

		jQuery('#Food_id').val("");
		jQuery('#Desserst_id').val("");		
	});


	//PDF cancel button
$('#cancleAddNewHallButton').click(function(e)
	{
		e.preventDefault();

		jQuery('#hall_title').val("");
		jQuery('#hall_capacity').val("");
		jQuery('#hall_status').val("");
		jQuery('#aircondition').val("");
		jQuery('#hall_arrangements').val("");
		jQuery('#hall_description').val("");

	});	
	
	
	// remove content on change of tab
 $('#librarySearch').click(function () {
  // alert('jk 2ds')
  $('.categoryPageSearchResutlFullDetailsMainContainer').html('');
  $('.categoryPageSearchResutlPreviewMainContainer').html('');
 })
 $('#googleBookSearch').click(function () {
  // alert('jk ')
  $('.categoryPageSearchResutlFullDetailsMainContainer').html('');
  $('.categoryPageSearchResutlPreviewMainContainer').html('');
 })

	//date datepicker
	$('#Mem_birthDay').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#Mem_birthDay').datepicker('hide')});
	$('#Event_date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#Event_date').datepicker('hide')});
    $('#today_event_date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#today_event_date').datepicker('hide')});	
	$('#date_paid').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#date_paid').datepicker('hide')});
	$('#latestadd_Start_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#latestadd_Start_Date').datepicker('hide')});
    $('#latestadd_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#latestadd_End_Date').datepicker('hide')});	
    $('#FastMovingSlowMoving_Started_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#FastMovingSlowMoving_Started_Date').datepicker('hide')});	
    $('#FastMovingSlowMoving_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#FastMovingSlowMoving_End_Date').datepicker('hide')});		
    $('#mostreservedhall_Start_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#mostreservedhall_Start_Date').datepicker('hide')});		
    $('#mostreservedhall_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#mostreservedhall_End_Date').datepicker('hide')});		
    $('#mostactivecustomers_Start_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#mostactivecustomers_Start_Date').datepicker('hide')});		
    $('#mostactivecustomers_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#mostactivecustomers_End_Date').datepicker('hide')});		
    $('#highlycreatedevents_Start_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#highlycreatedevents_Start_Date').datepicker('hide')});		
    $('#highlycreatedevents_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#highlycreatedevents_End_Date').datepicker('hide')});		
    $('#calculateAmount_Started_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#calculateAmount_Started_Date').datepicker('hide')});		
    $('#calculateAmount_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#calculateAmount_End_Date').datepicker('hide')});		

    $('#Booksinout_End_Date').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#Booksinout_End_Date').datepicker('hide')});	
    $('#Mem_regdate').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#Mem_regdate').datepicker('hide')});		
    
/** on change user type display corosponding member type
 *  user registration
 */
$('#Event_type').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Night')
	{
		$('#Event_lightningParent').removeClass('hide');
	}
	else
	{
		$('#Event_lightningParent').addClass('hide');
	}
});

$('#Event_lightningParent').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Yes')
	{
		$('#lightningParent').removeClass('hide');
	}
	else
	{
		$('#lightningParent').addClass('hide');
	}
});

$('#lightningParent').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Cusomized')
	{
		$('#lightningDescription').removeClass('hide');
	}
	else
	{
		$('#lightningDescription').addClass('hide');
	}
});

$('#Liquor').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Yes')
	{
		$('#liquorParent').removeClass('hide');
	}
	else
	{
		$('#liquorParent').addClass('hide');
	}
});

$('#Hall_arrangement').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Yes')
	{
		$('#hallArrangementParent').removeClass('hide');
	}
	else
	{
		$('#hallArrangementParent').addClass('hide');
	}
});

$('#Arrangement').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Cusomized')
	{
		$('#arrangementParent').removeClass('hide');
	}
	else
	{
		$('#arrangementParent').addClass('hide');
	}
});

$('#event_band').change(function()
{
	var selectedvalue = $(this).find('option:selected').text();
	if (selectedvalue == 'Yes')
	{
		$('#eventBandParent').removeClass('hide');
	}
	else
	{
		$('#eventBandParent').addClass('hide');
	}
});
jQuery('#getlatestadditions').click(function(event)
{

    var startDate =  $('#latestadd_Start_Date').val();
    var endDate   =  $('#latestadd_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
      event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }   
    
});

jQuery('#getinandoutbooks').click(function(event)
{

    var startDate =  $('#Booksinout_Started_Date').val();
    var endDate   =  $('#Booksinout_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
       event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }    
});

jQuery('#getfastmovingslowmovingbooks').click(function(event)
{

    var startDate =  $('#FastMovingSlowMoving_Started_Date').val();
    var endDate   =  $('#FastMovingSlowMoving_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
       event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }    
});

jQuery('#getbooksborrowingefficiency').click(function(event)
{

    var startDate =  $('#booksborrowingefficiency_Start_Date').val();
    var endDate   =  $('#booksborrowingefficiency_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
       event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }    
});

jQuery('#getmostactivememberdetails').click(function(event)
{

    var startDate =  $('#mostactivemembers_Start_Date').val();
    var endDate   =  $('#mostactivemembers_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
       event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }    
});

jQuery('#gethighlydemandedbooks').click(function(event)
{

    var startDate =  $('#highlydemandedbooks_Start_Date').val();
    var endDate   =  $('#highlydemandedbooks_End_Date').val();
    
   returnmsg = validateFunction(startDate,endDate);    
   
   if(returnmsg != '1')
    {
       event.preventDefault();
        $('.successMsages').slideDown();
        $('.successMsages').addClass('alert-error');
        $('.successMsages .successMsagesContainer').html(returnmsg);
        $(document).scrollTop(0);
        $('.successMsages').delay(4000).slideUp();

    }    
});

function validateFunction(startDate,endDate)
{
    var successMessage = null;
    
    if(startDate >= endDate)
    {
        successMessage = 'End date should be greater than start Date!';
    }
    else
    {
        successMessage = '1';
    }
            
     return (successMessage);     
}


jQuery('#exporttopdf').click(function(event)
{
    
             
               var header = Array();

                        $("table tr th").each(function(i, v){
                                header[i] = $(this).text();
                        })

                
                  
                  var data = Array();

                $("table tr").each(function(i, v){
                    data[i] = Array();
                    $(this).children('td').each(function(ii, vv){
                        data[i][ii] = $(this).text();
                    }); 
                })
                
              var doc = new jsPDF();
              doc.cellInitialize();
              doc.setFontSize(8)
          
                  for (var i=0; i<data.length; i++)
                  {
                      
                        for(var k=0;k<data[i].length;k++)
                        {
                           if((i==1)&&(k==0))
                           {
                              for(var m=0;m<header.length;m++)
                              {
                                     
                                  doc.cell(10, 40, 45, 10,header[m],i);
                              }
                           }
                           else
                           {
                               var tempValue = i;
                               var temp =++i;
                                i = tempValue;
                              
                                if((k==1)&&(temp==2))
                                {
                                        doc.cell(10, 40, 45, 10,data[i][0],temp);
                                        doc.cell(10, 40, 45, 10,data[i][k],temp);
                                }
                                else
                                {
                                       doc.cell(10, 40, 45, 10,data[i][k],temp); 
                                }
                              
                           }
                          
                        }
               
                    }
         
           doc.output('datauri'); 

 
});
// display the search resalt box
$('#findUserSearchBox').keypress(function ()
{
	$('.SearchResalt').css('display','block');
});

// call the user details when chahge the input
$("#findUserSearchBox").on("change", function(event)
{
	getUserDetailsRecord();
});





function getUserDetailsRecord()
{

	var testvalue = $("#findUserBox .typeahead.dropdown-menu").find('li.active').data('value');
	//split to get value username and its 0th index value
	var searchedUserName = testvalue.split(' | ')[0];
	var formData = {
			searchedUserName: searchedUserName,
			submitMode  : "ajax"
		};

	var dataSentUrl = base_url+'index.php/manageUser/getSpacificUserDetails';

	jQuery.ajax(
	{
		type			: 'POST',
		url				: dataSentUrl,
		dataType		: 'json',
		data			: formData,
		success  : function (searchedUserDetails)
		{
			
			// var listAllContentsDetails;
			// alert('hi')
			$("#personalDetails").html('<div class="userDiscriptionDetails"><p> '+searchedUserDetails.userDetails.Title+' '+searchedUserDetails.userDetails.First_name+' '+searchedUserDetails.userDetails.Last_name+'</p> <p>'+searchedUserDetails.userDetails.Email+'</p> <p>'+searchedUserDetails.userDetails.User_type+'</p><img src="'+base_url+searchedUserDetails.userDetails.User_profile_image+'" alt="User profile image"/> </div>');
			

		}
	});

}// function getUserDetailsRecord () {










// render the table
$('#OP_adimnContentDetails').dataTable();





//##############################  Add new Econtetn Tab Start #############################
/************************************ addNewMenu()*******************************************/
	// Ajax form submit from ManageContent view
	//@ type : 
	//#return type : alert when error occuring
	function addNewMenu () 
	{
		// get form data values
		var formData = {

			Menu_title             	: jQuery('#Menu_title').val(),
			Menu_items             	: jQuery('#Menu_items').val(),
			Menu_comments			: jQuery('#Menu_comments').val(),
			Menu_price				: jQuery('#Menu_price').val(),
			pdfContentSubmitMode	: "ajax"
			
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageEvents/addMenu/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!="error")
				{


					$('.successMsagesAddNewMenu').addClass('alert-success');
					$('.successMsagesAddNewMenu').slideDown();
					$('.successMsagesAddNewMenu span').html('Menu Successfully Created');
					$(document).scrollTop(0);
					$('.successMsagesAddNewMenu').delay(4000).slideUp();
					

					jQuery('#Menu_title').val("");
					jQuery('#Menu_items').val("");
					jQuery('#Menu_comments').val("");
					jQuery('#Menu_price').val("");
					jQuery('#Food_id').val("");
					jQuery('#Desserst_id').val("");

					if(window.top==window)
                    {
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }

				}
				else
				{
					// alert(responce.msg);
					// $('.successMsages').removeClass('alert-success');
					$('.unsuccessMsagesAddNewMenu').addClass('alert-danger');
					$('.unsuccessMsagesAddNewMenu').slideDown();
					$('.unsuccessMsagesAddNewMenu span').html(responce.msg);
					$(document).scrollTop(0);
					$('.unsuccessMsagesAddNewMenu').delay(4000).slideUp();
					// $('.successMsages').removeClass('alert-danger');
				}
			}
		});
	}//Function End addPDF()------------------------------------------------------FUNEND






/************************************ addNewBanquetHall()***************************************/
	// Ajax form submit from ManageContent view
	// Add media file to system and update data base
	//@ type : 
	//#return type : alert when error occuring
	function addNewBanquetHall() 
	{

		
		// get form data values
		var formData = {

			hall_title          : jQuery('#hall_title').val(),
			hall_capacity		: jQuery('#hall_capacity').val(),
			hall_status			: jQuery('#hall_status').val(),
			aircondition		: jQuery('#aircondition').val(),
			hall_arrangements	: jQuery('#hall_arrangements').val(),
			hall_description	: jQuery('#hall_description').val(),
			submitMode		    : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageEvents/addBanquetHall/';
		
		// Ajax funtion
		jQuery.ajaxFileUpload({
			url			    : dataSentUrl,
			secureuri		: false,
			fileElementId	: 'mediaContent_path',
			dataType		: 'json',
			data			: formData,

			success  : function (responce, status)
			{
				if(responce.status!="error")
				{

					$('.successMsagesAddHall').addClass('alert-success');
					$('.successMsagesAddHall').slideDown();
					$('.successMsagesAddHall span').html('Successfully Added a New Media.');
					$(document).scrollTop(0);
					$('.successMsagesAddHall').delay(4000).slideUp();
					

					jQuery('#hall_title').val("");
			        jQuery('#hall_capacity').val("");
			        jQuery('#hall_status').val("");
			        jQuery('#aircondition').val("");
			        jQuery('#hall_arrangements').val("");
			        jQuery('#hall_description').val("");

			        if(window.top==window)
                    {
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }

				}
				else
				{	
					$('.unsuccessMsagesAddHall').addClass('alert-danger');
					$('.unsuccessMsagesAddHall').slideDown();
					$('.unsuccessMsagesAddHall span').html(responce.msg);
					$(document).scrollTop(0);
					$('.unsuccessMsagesAddHall').delay(4000).slideUp();
					
				}
			}
		});
	}//Function End addNewBanquetHall()--------------------------------------------------FUNEND





/***************************** addNewEvent()**************************************/
	// Ajax form submit from ManageEvent view
	// create a new event in system and update data base
	//@ type : 
	//#return type : alert when error occuring
	function addNewEvent()
	{

		// get form data values
		var formData = {
			Select_event			: jQuery('#Select_event').val(),
			Event_date			    : jQuery('#Event_date').val(),
			Event_croud		        : jQuery('#Event_croud').val(),
			Event_description		: jQuery('#Event_description').val(),
			NOof_employees			: jQuery('#NOof_employees').val(),
			Event_comments	        : jQuery('#Event_comments').val(),
			Event_type	            : jQuery('#Event_type').val(),
			Lightning	            : jQuery('#Lightning').val(),
			Light_arrangement	    : jQuery('#Light_arrangement').val(),
			Lightning_description	: jQuery('#Lightning_description').val(),
			Liquor	                : jQuery('#Liquor').val(),
			Liquor_description	    : jQuery('#Liquor_description').val(),
			Menu_id	                : jQuery('#Menu_id').val(),			
			Special_comments	    : jQuery('#Special_comments').val(),
			Hall_id	                : jQuery('#Hall_id').val(),
			Hall_arrangement	    : jQuery('#Hall_arrangement').val(),
			Arrangement	            : jQuery('#Arrangement').val(),
			Arrangement_description	: jQuery('#Arrangement_description').val(),
			Air_condition	        : jQuery('#Air_condition').val(),
			SpecialHall_comments	: jQuery('#SpecialHall_comments').val(),
			event_band	            : jQuery('#event_band').val(),
			band_type	            : jQuery('#band_type').val(),
			event_status	        : jQuery('#event_status').val(),
			Customer_id	            : jQuery('#Customer_id').val(),
			submitMode	: "ajax"
		};


		// create data sent url
		dataSentUrl = base_url +'index.php/manageEvents/addNewEvent/';


		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				// alert(responce)
				if(responce.status!="error")
				{

					$('.successMsagesAddNewEvent').slideDown();
				    $('.successMsagesAddNewEvent span').html('Event Successfully Created');
				    $(document).scrollTop(0);
				    $('.successMsagesAddNewEvent').delay(4000).slideUp();
					
					jQuery('#Select_event').val("");
					jQuery('#Event_date').val("");
					jQuery('#Event_croud').val("");
					jQuery('#Event_description').val("");
					jQuery('#NOof_employees').val("");
					jQuery('#Event_comments').val("");
					jQuery('#Event_type').val("");
					jQuery('#Lightning').val("");
					jQuery('#Light_arrangement').val("");
					jQuery('#Lightning_description').val("");
					jQuery('#Liquor').val("");
					jQuery('#Liquor_description').val("");
					jQuery('#Menu_id').val("");
					jQuery('#Menu_items').val("");
					jQuery('#Special_comments').val("");
					jQuery('#Hall_id').val("");
					jQuery('#Hall_arrangement').val("");
					jQuery('#Arrangement_description').val("");
					jQuery('#Air_condition').val("");
					jQuery('#SpecialHall_comments').val("");
					jQuery('#event_band').val("");
					jQuery('#band_type').val("");
					jQuery('#event_status').val("");
					jQuery('#Customer_id').val("");
					if(window.top==window)
                    {
                                        // you're not in a frame so you reload the site
                                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }
				}
				else
				{
					// alert(responce.msg);
					$('.unsuccessMsagesAddNewEvent').slideDown();
				    $('.unsuccessMsagesAddNewEvent span').html(responce.msg);
				    $(document).scrollTop(0);
				    $('.unsuccessMsagesAddNewEvent').delay(4000).slideUp();
				}
			}
		});


	}//Function End addPhysicalBook()----------------------------------------------------FUNEND()
//##############################  Add new Econtetn Tab END ####################################




/*******************************Start Function getUserDetails()**************************************/
// some Searching for auto complete funtionality
//@var type :
//#return type :
	function getUserDetails()
	{
		// get form data values
		var formData = {
			findUserSearchBox	:jQuery('#findUserSearchBox').val(),
			submitMode  : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/user/searchUserDetails/';
		//alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!="error")
				{

				
					// get user list 
					usersListArray= [];
					for (var i = 0; i < responce.users.length; i++)
					{
						// alert();
						usersListArray[usersListArray.length] = responce.users[i]['userName']+' | '+ responce.users[i]['firstName'] +' '+ responce.users[i]['lastName'];

					}
					setSearchString(usersListArray);
				}
				else
				{
					jQuery('#dataSearch').html('No more records Found');
				}
			}
		});

	}//Function End getUserDetails()---------------------------------------------------FUNEND()


/*******************************Start Function getUserDetails()**************************************/
// some Searching for auto complete funtionality
//@var type :
//#return type :
	function searchContentDetailsAutoComplete(searchValue)
	{
		// get form data values
		var formData = {
			findContentSearchBox	:searchValue,
			submitMode				: "ajax"};


		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/searchContentDetailsAutoComplete/';
		//alert(dataSentUrl);

		if(null != searchValue && searchValue != '')
		{

			// Ajax funtion
			jQuery.ajax({
				type		: 'POST',
				url			: dataSentUrl,
				dataType	: 'json',
				data		: formData,
				success		: function (responce)
				{
					if(responce.status!="error")
					{					
						// alert(responce.status);
						// alert(responce.msg);
						// get user list 
						contentDetailsListArray= [];
						contentDescriptionString="";
						for (var i = 0; i < responce.eContents.length; i++)
						{
							// contentDetailsListArray[contentDetailsListArray.length]=responce.eContents[i]['contentId']+"\n "+responce.eContents[i]['title']+"\n "+responce.eContents[i]['author']+"\n "+responce.eContents[i]['publisher']+"\n "+responce.eContents[i]['price']+"\n "+responce.eContents[i]['registeredTime']+"\n "+responce.eContents[i]['description']+"\n "+responce.eContents[i]['edition']+"\n "+responce.eContents[i]['ISBN']+"\n "+responce.eContents[i]['contentType'];
							// alert(responce.eContents[i]['contentId']+"\n "+responce.eContents[i]['title']+"\n "+responce.eContents[i]['author']+"\n "+responce.eContents[i]['publisher']+"\n "+responce.eContents[i]['price']+"\n "+responce.eContents[i]['registeredTime']+"\n "+responce.eContents[i]['description']+"\n "+responce.eContents[i]['edition']+"\n "+responce.eContents[i]['ISBN']+"\n "+responce.eContents[i]['contentType']);
							contentDetailsListArray[contentDetailsListArray.length]= responce.eContents[i]['Content_id'] +" | "+responce.eContents[i]['Content_title'];
							// contentDescriptionArray[contentDescriptionArray.length] = '<p>'+responce.eContents[i]['Content_id']+'</p> <p>'+responce.eContents[i]['Content_title']+'</p> <p>'+responce.eContents[i]['Content_author']+'</p> <p>'+responce.eContents[i]['Content_description']+'</p> <p>'+responce.eContents[i]['Content_publisher']+'</p> <p>'+responce.eContents[i]['Content_ISBN']+'</p> <p>'+responce.eContents[i]['Content_edition']+'</p> <p>'+responce.eContents[i]['Category_id']+'</p> <p>'+responce.eContents[i]['Content_status']+'</p> <p>'+responce.eContents[i]['FineType_id']+'</p> <p>'+responce.eContents[i]['Comments']+'</p> <p>'+responce.eContents[i]['Content_mode']+'</p> <p>'+responce.eContents[i]['Content_price']+'</p> <p>'+responce.eContents[i]['Content_copies']+'</p> <p>'+responce.eContents[i]['Floor_id']+'</p> <p>'+responce.eContents[i]['Section_id']+'</p> <p>'+responce.eContents[i]['Rack_id']+'</p> <p>'+responce.eContents[i]['Square_id']+'</p> <p>'+responce.eContents[i]['Content_category']+'</p> <p>'+responce.eContents[i]['Fine_type']+'</p> <p>'+responce.eContents[i]['Floor_name']+'</p> <p>'+responce.eContents[i]['Section_name']+'</p> <p>'+responce.eContents[i]['Rack_name']+'</p> <p>'+responce.eContents[i]['Square_name']+'</p>';
							contentDescriptionString = contentDescriptionString +'<hr><div class="media"> <a class="pull-left" href="#"> <img class="media-object" src="'+base_url+responce.eContents[i]['Content_first_page']+'"/> </a> <div class="media-body bookContentDetails"> <h4 class="media-heading">'+responce.eContents[i]['Content_title']+'</h4> <h5>Author : '+responce.eContents[i]['Content_author']+'<br> <p>'+responce.eContents[i]['Content_description']+'</p> <input type="hidden" class="contentId" value="'+responce.eContents[i]['Content_id']+'"> <br> <button class="btn userMakeReserveBook" type="button"><i class="icon-folder-open"></i>&nbsp;Reserve</button> </div> </div> <hr>';
							//display the content status
							jQuery('#contentStatusLable').text(responce.eContents[i]['Content_status']);
							jQuery('#Res_IRcode').val(responce.eContents[i]['Content_ISBN']);
						}
						// alert(contentDescriptionArray);
						// alert(contentDetailsListArray);
						setSearchString(contentDetailsListArray);
						jQuery('#contentDescriptionForSearch').html(contentDescriptionString);
					}
					else
					{
						jQuery('#dataSearch').html('No more records Found');
					}
				}
			});
		}
		else
		{			
				//display the content status
				jQuery('#contentStatusLable').text('');

		}			//if(null != searchValue && searchValue != '')

	}//Function End getUserDetails()---------------------------------------------------FUNEND()


// ########################## DISPLAY ALL ECONTENT LIST START############################################

/*******************************Start getAllEventDetails(eventID)**************************************/
// get events 
//@eContentID type : string : event id
//#return type :
	function getAllEventDetails(eventID)
	{
		
		// get form data values
		var formData = {
			EventID     : eventID,
			submitMode  : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageEvents/aJaxGetEventsToUpdate/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce)
			{
				console.log(responce.events);
                            if(responce.status!="error")
                            {                                
                                /*var categoryDropdown = "";
                                
                                categoryDropdown = '<select disabled class="disabledFeald" id="manageContent_Category_id_dropdown">';
                                for(var i = 0; i < responce.category.length; i++)
                                {
                                    categoryDropdown+= '<option value="'+responce.category[i].Category_id+'">'+responce.category[i].Category_name+'</option>';
                                    
                                }
                                categoryDropdown += '</select>';*/                                                          
                                
                                for (var i = 0; i < responce.events.length; i++)
                                {
                                    contenTable =   '<tr><td>Event Id</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_id"                    value="'+responce.events[i].Event_id+'">          </td> </tr>'+
                                                    '<tr><td>Title</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_title"                    value="'+responce.events[i].Event_title+'">       </td> </tr>'+
                                                    '<tr><td>Event Date</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_date"                value="'+responce.events[i].Event_date+'">        </td> </tr>'+
                                                    '<tr><td>Event Crowd</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_crowd"              value="'+responce.events[i].Event_crowd+'">       </td> </tr>'+
                                                    '<tr><td>Event Description</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_description"  value="'+responce.events[i].Event_description+'"> </td> </tr>'+
                                                    '<tr><td>Employees</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_No_of_employees"            value="'+responce.events[i].No_of_employees+'">        </td> </tr>'+
                                                    '<tr><td>Event Comments</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_comments"       value="'+responce.events[i].Event_comments+'">     </td> </tr>'+
                                                    //'<tr id="manageContent_Category_id_inputbox"><td>Category Name </td> <td><input type="text" disabled class="disabledFeald" id="manageContent_Category_id"        value="'+responce.categoryName[i].Category_name+'">    </td> </tr>'+                                                    
                                                    //'<tr class="hide" id="manageContent_Category_id_select"><td>Category Name </td> <td>'+categoryDropdown+'</td></tr>'+
                                                    '<tr><td>Event Type</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_type"                value="'+responce.events[i].Event_type+'">      </td> </tr>'+
                                                    '<tr><td>Event Lightning</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_lightnint"      value="'+responce.events[i].Event_lightnint+'">         </td> </tr>'+
                                                    '<tr><td>Light Arrangement</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Light_arrangement"  value="'+responce.events[i].Light_arrangement+'">            </td> </tr>'+
                                                    '<tr><td>Light Description</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Light_description"  value="'+responce.events[i].Light_description+'">        </td> </tr>'+
                                                    '<tr><td>Liquor</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Liquor"                        value="'+responce.events[i].Liquor+'">       </td> </tr>'+
                                                    '<tr><td>Liquor Description</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Liquor_description"value="'+responce.events[i].Liquor_description+'">      </td> </tr>'+
                                                    '<tr><td>Menu</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Menu_id"                         value="'+responce.events[i].Menu_id+'">            </td> </tr>'+
                                                    '<tr><td>Menu Comments</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Menu_comments"          value="'+responce.events[i].Menu_comments+'">          </td> </tr>'+
                                                    '<tr><td>Hall</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Hall_id"                         value="'+responce.events[i].Hall_id+'">             </td> </tr>'+
                                                    '<tr><td>Hall Arrangement</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Hall_arrangements"   value="'+responce.events[i].Hall_arrangements+'">           </td> </tr>'+
                                                    '<tr><td>Arrangement Type</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Arrangement_type"    value="'+responce.events[i].Arrangement_type+'">           </td> </tr>'+
                                                    '<tr><td>Arrangement Description</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Arrangement_description" value="'+responce.events[i].Arrangement_description+'">  </td> </tr>'+
                                                    '<tr><td>Hall Aircondition</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Hall_ac"                       value="'+responce.events[i].Hall_ac+'">     </td> </tr>'+
                                                    '<tr><td>Special Comments</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Special_comments"               value="'+responce.events[i].Special_comments+'">     </td> </tr>'+
                                                    '<tr><td>Band</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Band"                                       value="'+responce.events[i].Band+'">     </td> </tr>'+
                                                    '<tr><td>Band Type</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Band_type"                             value="'+responce.events[i].Band_type+'">     </td> </tr>'+
                                                    '<tr><td>Event Status</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Event_status"                       value="'+responce.events[i].Event_status+'">     </td> </tr>'+
                                                    '<tr><td>Customer</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Customer_id"                            value="'+responce.events[i].Customer_id+'">     </td> </tr>'+
                                                    '<tr><td>Date Created</td> <td><input type="text" disabled class="disabledFeald" id="manageEvent_Date_create"                        value="'+responce.events[i].Date_create+'">     </td> </tr>';
                                    $('#viewEventDetails table').find('tbody').html(contenTable);
                                    $('#viewMainEventDetails').modal('show');
                                }
                            }
                            else
                            {
                                console.log(responce.msg);
                            }
                          }                            			
		});

	}//Function End geteContentDetails()---------------------------------------------------FUNEND()

// ########################## DISPLAY ALL ECONTENT LIST START############################################



/*******************************Start viewContentDetails()**************************************/
// getEcontent only special Econtent id only
//@eContentID type : string : Content_id
//#return type :
	function viewDownloadContentDetails(eContentID)
	{
		// get form data values
		var formData = {
			eContentID : eContentID,
			submitMode  : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/aJaxGetSpecialBookDetails/';
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
				if(responce.status!="error")
				{
					console.log(responce.eContents);
					nameString="";
					// alert('success');
					// alert(responce.Title);
					// alert(responce.users[0]['firstName']);					
					for (var i = 0; i < responce.eContents.length; i++)
					{
						contenTable = '<tr> <td>Content ID</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_contentId" value="'+responce.eContents[i].Content_id+'" ></td> </tr> <tr> <td>Title</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_title" value="'+responce.eContents[i].Content_title+'" ></td> </tr> <tr> <td>Author</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_author" value="'+responce.eContents[i].Content_author+'" ></td> </tr> <tr> <td>Publisher</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_publisher" value="'+responce.eContents[i].Content_publisher+'" ></td> </tr><tr> <td>Edition</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_edition" value="'+responce.eContents[i].Content_edition+'" ></td> </tr> <tr> <td>ISBN</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_isbn" value="'+responce.eContents[i].Content_ISBN+'" ></td> </tr> <tr> <td>Rack number</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_rackNumber" value="'+responce.eContents[i].Rack_id+'" ></td> </tr> <tr> <td>Status</td> <td><input type="text" disabled class="disabledFeald" id="contentEdit_status" value="'+responce.eContents[i].Content_status+'" ></td> </tr> <tr> <td>Description</td> <td><div disabled class="disabledFeald contentDescriptionMore" id="contentEdit_description" >'+responce.eContents[i].Content_description+'</div></td></tr><tr> <td>Book firts page</td> <td><img alt="Book Firs page" src="'+base_url+responce.eContents[i].Content_first_page+'"/></td></tr><hr/>';
						// alert(contenTable);
						$('#contentPreviewContainer table').find('tbody').html(contenTable);
						// if(responce.eContents[i].Path=="")
						// {
						// 	$('#contentViewButton').html("Reserve");
							
						// 	// remove url when it's contain
						// 	$('#contentViewButton').attr('href','#');
							
						// 	$('#contentViewButton').attr('target','');
						// }
						// else
						// {
						// 	// add url when it's pdf to download
						// 	url = base_url+((responce.eContents[i].Path).substring(2))+responce.eContents[i].File_name;

						// 	$('#contentViewButton').attr('href',url);
							
						// 	$('#contentViewButton').attr('target','_blank');
						// }

						// $('#viewContentDetails').modal();						

						//alert('title value='+responce.eContents[i].Title);

					}
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});

	}//Function End viewContentDetails()---------------------------------------------------FUNEND()

$('#makeEditableFelds').click(function ()
{
	$(this).removeClass('makeDisabledFelds');        
        $('#manageContent_Category_id_select').removeClass('hide');
        $('#manageContent_Category_id_inputbox').addClass('hide');
})


/******************************saveEditedEventDetails(eventID)*******************************************/
	
	function saveEditedEventDetails(eventID)
	{

		// get form data values
		var editedEventDetails = {		
			Event_id                   : jQuery('#manageEvent_Event_id').val(),
			Event_title                : jQuery('#manageEvent_Event_title').val(),
			Event_date                 : jQuery('#manageEvent_Event_date').val(),
			Event_crowd                : jQuery('#manageEvent_Event_crowd').val(),
			Event_description          : jQuery('#manageEvent_Event_description').val(),
			No_of_employees            : jQuery('#manageEvent_No_of_employees').val(),
			Event_comments             : jQuery('#manageEvent_Event_comments').val(),
			Event_lightnint            : jQuery('#manageEvent_Event_lightnint').val(),
			Light_arrangement          : jQuery('#manageEvent_Light_arrangement').val(),
			Light_description          : jQuery('#manageEvent_Light_description').val(),
			Liquor                     : jQuery('#manageEvent_Liquor').val(),
			Liquor_description         : jQuery('#manageEvent_Liquor_description').val(),
			Menu_id                    : jQuery('#manageEvent_Menu_id').val(),
			Menu_comments              : jQuery('#manageEvent_Menu_comments').val(),
			Hall_id                    : jQuery('#manageEvent_Hall_id').val(),
			Hall_arrangements          : jQuery('#manageEvent_Hall_arrangements').val(),
			Arrangement_type           : jQuery('#manageEvent_Arrangement_type').val(),
			Arrangement_description    : jQuery('#manageEvent_Arrangement_description').val(),
			Hall_ac                    : jQuery('#manageEvent_Hall_ac').val(),
			Special_comments           : jQuery('#manageEvent_Special_comments').val(),
			Band                       : jQuery('#manageEvent_Band').val(),
			Band_type                  : jQuery('#manageEvent_Band_type').val(),
			Event_status               : jQuery('#manageEvent_Event_status').val(),
			Customer_id                : jQuery('#manageEvent_Customer_id').val(),
			Date_create                : jQuery('#manageEvent_Date_create').val(),
		};

		var formData = {
			editedEventDetails  :editedEventDetails,
			Event_ID			: eventID,
			submitMode  		: "ajax"
		}

		// create data sent url
		dataSentUrl = base_url+'index.php/manageEvents/saveEditedEventDetails/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				
				if(responce.status!=="error")
				{					
					$('.manageEventsSaveEvent').removeClass('alert-danger');					
					$('.manageEventsSaveEvent').addClass('alert-success');					
					$('.manageEventsSaveEvent').slideDown();
					$('.manageEventsSaveEvent span').html('Event Details Successfully Updated');
					$(document).scrollTop(0);
					$('.manageEventsSaveEvent').delay(4000).slideUp();
					if(window.top==window)
                    {
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }
				}
				else
				{
					$('.manageEventsSaveEvent').removeClass('alert-success');
					$('.manageEventsSaveEvent').addClass('alert-danger');
					$('.manageEventsSaveEvent').slideDown();
					$('.manageEventsSaveEvent span').html('Event Details Not Updated');
					$(document).scrollTop(0);
					$('.manageEventsSaveEvent').delay(4000).slideUp();			
				}
				
			}
		});
	}//Function End editContentsDetails();





/******************************contentStatusChangerDeactiveAndActive()*******************************************/
	// Content status change using parameter
	// @var type :
	//#return type :
	function contentStatusChangerDeactiveAndActive(eContentId,statusType)
	{
		// alert(eContentId)
		// get form data values
		formData = {
			eContentId	: eContentId,
			submitMode  : "ajax",
			statusType  : statusType
		};

		// Create data sent url
		dataSentUrl = base_url+'index.php/manageContent/contentStatusChangerDeactiveAndActive/';
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
				if(responce.status=="error")
				{
					// if error massage display
					// alert(responce.msg);
					$('.manageContentDeactivate').addClass('alert-danger');
					$('.manageContentDeactivate').slideDown();
					$('.manageContentDeactivate span').html('Already Deactivated.');
					$(document).scrollTop(0);
					$('.manageContentDeactivate').delay(4000).slideUp();
				}
				else
				{
					// alert('success'+responce.msg);
					$('.manageContentDeactivate').addClass('alert-success');
					$('.manageContentDeactivate').slideDown();
					$('.manageContentDeactivate span').html('Successfully Deactivate.');
					$(document).scrollTop(0);
					$('.manageContentDeactivate').delay(4000).slideUp();
				}
			}
		});
	}//Function End contentStatusChangerDeactiveAndActive()


	function addItemsToMenu()
	{
		foodName = jQuery('#Food_id').val();
		alert(foodName);
	}


/*******************************setNameString()**************************************/
	//	update nameString globale varibale
	//@var type :
	//#return type :
	//setSearchUserString oldfnname
	function setSearchString(values)
	{
		// console.log(values);
		searchString = values;

	}//Function End setNameString()---------------------------------------------------FUNEND

/*******************************getNameString()**************************************/
	//	update nameString globale varibale
	//@var type :
	//#return type :
	function getSearchString()
	{
		tempSearchString = searchString;
		searchString ='';
		return tempSearchString;

	}//Function End getNameString()---------------------------------------------------FUNEND


/*******************************Start Function callers()**************************************/
	
	// Media file upload using ajax and upadate data base
	jQuery('#addNewMenuButton').click(function()
	{

		$('#addNewMenuForm').validate({
			submitHandler: function()
			{
				addNewMenu();
				// Stop php the form submit  
				return false;
			}
		});
	});	

	// Media file upload using ajax and upadate data base
	jQuery('#addNewHallButton').click(function()
	{

		$('#addNewHallForm').validate({
			submitHandler: function()
			{
				addNewBanquetHall();
				// Stop php the form submit  
				return false;
			}
		});
	});

	// Add phicisal book and upadate data base
	jQuery('#addNewEventButton').click(function()
	{

		$('#addNewEvent').validate(
		{
			submitHandler: function()
			{
				addNewEvent();
				// Stop php the form submit  
				return false;
			}
		});
	});

	
	// create Latest latestadditions in reports 
	jQuery('#getlatestadditions').click(function()
	{
		// alert('hi submit')
		$('#laestAddition').validate(
		{
			submitHandler: function(form)
			{
				form.submit();
			}
		});
	});

	// create bookinoutmovements in reports 
	jQuery('#getinandoutbooks').click(function()
	{
		// alert('hi submit')
		$('#booksinoutmovements').validate(
		{
			submitHandler: function(form)
			{
				form.submit();
			}
		});
	});



	// Ajax auto complete user Details (Search user)
	jQuery('#findUserSearchBox').keypress(function(event)
	{
		// alert('keyu re')
		getUserDetails();
	});

	// serch box typing event 
	jQuery('#findUserSearchBox').typeahead({
		// note that "value" is the default setting for the property option
		// source: [{value: 'Charlie'}, {value: 'Gudbergur'}],
		source: getSearchString
	});


	// Remove the Content in book library
	jQuery(document).on('click','.manageContent-delete', function(event)
	{
		contentId = $('#viewContentDetails').find('#editContent_id').val();
		
		contentStatusChangerDeactiveAndActive(contentId,"NotAvailable");
	});

	// Edit the Content in book profile
	jQuery(document).on('click','.manageEvent-edit', function(event)
	{
		//alert('save button')
		eventID = $('#manageEvent_Event_id').val();
		saveEditedEventDetails(eventID);

	});

	// Display content profile page
	jQuery(document).on('click','.manageEvent-view', function(event)
	{
		eventID = $(this).closest('tr').find('td:first-child').html();
		getAllEventDetails(eventID);
	});

	// List all content details reload by ajaxs
	jQuery('#listAllContents').click(function(event)
	{
		getAllEContentDetails();
	});

	$('.btn').click(function ()
	{
		$('.manageEvent-edit').css( "visibility", "hidden" );
	});
	//display text box on click edit, on editing user
	$('#makeEditableFelds').click(function ()
	{
		$(this).removeClass('makeDisabledFelds');
		$('.manageEvent-edit').css( "visibility", "visible" );
		$('.btn').css( "visibility", "visible" );
		$('.disabledFeald').removeAttr('disabled');
	});


	// Ajax auto complete content Details (Search content)
	jQuery('#findContentSearchBox').keypress(function(event)
	{
		//alert('keyu re')
		if(null != $(this).val() && $(this).val() != '')
		{

			searchContentDetailsAutoComplete($(this).val());
		}
		else
		{			
				//display the content status
				jQuery('#contentStatusLable').text('');

		}
	});

	// serch box typing event 
	jQuery('#findContentSearchBox').typeahead({
		// note that "value" is the default setting for the property option
		// source: [{value: 'Charlie'}, {value: 'Gudbergur'}],
		source: getSearchString
		// ,onselect:function(obj) {alert('hi') /* $('input[id="MessageUserId"]').val(obj.id);*/ }
	});


	// call the user details when chahge the input
	$("#findContentSearchBox").on("change", function(event)
	{
		// alert('viewDownloadContentDetails')
		var fullContent = $("#findContents .typeahead.dropdown-menu").find('li.active').data('value');

		//split to get value username and its 0th index value
		var contentId = jQuery.trim(fullContent.split(' | ')[0]);

		viewDownloadContentDetails(contentId);
	});

/*******************************End Function callers()**************************************/







/**********************************Catogory Page Start**********************************************************/

/*************************Start Function searchBoxForGetEcontentDetailForCategoryPage()*************************/
//Owner : Madhuranga Senadheera
// location category page/content search/ preview and more
// 
function searchBoxForGetEcontentDetailForCategoryPage(contentId,retunType,tableName)
{
	// get form data values
		var formData = {
			eContentID : contentId,
			submitMode  : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/ajaxSearchBoxForGetContentDetailForCategoryPage/';
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
					if(retunType=="fullDetail")
					{
						console.log('econten fullDetail');
						/*eContentHTML="";
						for (var i = 0; i < responce.eContents.length; i++)
						{
							eContentHTML = 	'<tr><td> Title      </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_title"     value="'+responce.eContents[i].Econtent_title     +'" >  </td></tr>'+
											'<tr><td> Type       </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_type"      value="'+responce.eContents[i].Econtent_type      +'" >  </td></tr>'+
											'<tr><td> Author     </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_author"    value="'+responce.eContents[i].Econtent_author    +'" >  </td></tr>'+
											'<tr><td> Publisher  </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_publisher" value="'+responce.eContents[i].Econtent_publisher +'" >  </td></tr>'+
											'<tr><td> ISBN_No    </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_ISBN_No"   value="'+responce.eContents[i].Econtent_ISBN_No   +'" >  </td></tr>'+
											'<tr><td> Edition    </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_edition"   value="'+responce.eContents[i].Econtent_edition   +'" >  </td></tr>'+
											'<tr><td> Status     </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_status"    value="'+responce.eContents[i].Econtent_status    +'" >  </td></tr>'+
											'<tr><td> Comments   </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_Comments"  value="'+responce.eContents[i].Comments           +'" >  </td></tr>'+
											'<tr><td> Copies     </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_copies"    value="'+responce.eContents[i].Econtent_copies    +'" >  </td></tr>'+
											'<tr><td> Size       </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_size"      value="'+responce.eContents[i].Econtent_size 	 +'KB"> </td></tr>'+
											'<tr><td> Price      </td><td><input type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_price"     value="'+responce.eContents[i].Econtent_price     +'" >  </td></tr>'+
											'<tr><td>		     </td><td><a class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((responce.eContents[i].Econtent_path).substring(2))+responce.eContents[i].Econtent_filename+'" >Download link</></td></tr>'+
											'<tr><td>Cover       </td><td><img type="text" disabled class="disabledFeald" id="categoryPageSearchResutlViewer_Econtent_coverImage" src="img/Book-icon.gif" >									</td></tr>'+
											'<input type="hidden" id="categoryPageSearchResutlViewer_Econtent_id" value="'+responce.eContents[i].Econtent_id+'" >';

							$('#categoryPageSearchResutlViewer table').find('tbody').html(eContentHTML);
						}*/
						$.each(responce.eContents, function(i, obj)
						{
							eContentHTMLMORE ='<section>'+
										'<!-- Display content previwer-->'+
										'<div class="row well">	'+
											'<!-- side-Left First page / Cover page -->'+
											'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"> </div>'+
											'<!-- table side-Right -->'+
											'<div class="span8">'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"><strong>Title</strong></div>'+
													'<!-- td2 -->'+
													'<div class="span6"><divt class="categoryPageSearchResutlViewer_Econtent_title">'+obj.Econtent_title+'</div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Type</small></strong></strong> </div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_type"><divt>'+obj.Econtent_type+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 --> '+
													'<div class="span1"> <strong><small>Author</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_author"><divt>'+obj.Econtent_author+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>ISBN_No</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_ISBN_No"><divt>'+obj.Econtent_ISBN_No+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Edition</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_edition"><divt>'+obj.Econtent_edition+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Size</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_size"><small>'+obj.Econtent_size+'KB</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Link</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div><a class="btn btn-info btn-small" class="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((obj.Econtent_path).substring(2))+obj.Econtent_filename+'"><i class="icon-download icon-white"></i>&nbsp;Download link</a></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<input class="categoryPageSearchResutlViewer_Econtent_id" value="1" type="hidden">'+
											'<!-- /table -->'+
											'</div>'+
										'</div>'+
										'<!-- /Display content previwer-->'+
									'</section>'+
									'<hr>';

							$('.categoryPageSearchResutlPreviewMainContainer').html(eContentHTMLMORE);
							$('.categoryPageSearchResutlPreviewMainContainer').fadeIn();

						}); //each AFUNEND()
					}
					else
					{
						console.log('econtent preview deitil');
						$.each(responce.eContents, function(i, obj)
						{
							eContentHTMLPRV ='<section>'+
										'<!-- Display content previwer-->'+
										'<div class="row well">	'+
											'<!-- side-Left First page / Cover page -->'+
											'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"> </div>'+
											'<!-- table side-Right -->'+
											'<div class="span8">'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"><strong>Title</strong></div>'+
													'<!-- td2 -->'+
													'<div class="span6"><divt class="categoryPageSearchResutlViewer_Econtent_title">'+obj.Econtent_title+'</div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Type</small></strong></strong> </div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_type"><small>'+obj.Econtent_type+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 --> '+
													'<div class="span1"> <strong><small>Author</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_author"><small>'+obj.Econtent_author+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>ISBN_No</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_ISBN_No"><small>'+obj.Econtent_ISBN_No+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Edition</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_edition"><small>'+obj.Econtent_edition+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Size</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_size"><small>'+obj.Econtent_size+'KB</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Link</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div><a class="btn btn-info btn-small" class="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((obj.Econtent_path).substring(2))+obj.Econtent_filename+'"><i class="icon-download icon-white"></i>&nbsp;Download link</a></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<input class="categoryPageSearchResutlViewer_Econtent_id" value="1" type="hidden">'+
											'<!-- /table -->'+
											'</div>'+
										'</div>'+
										'<!-- /Display content previwer-->'+
									'</section>'+
									'<hr>';

							$('.categoryPageSearchResutlPreviewMainContainer').append(eContentHTMLPRV);

						}); //each AFUNEND()
						/*for (var i = 0; i < responce.eContents.length; i++)
						{							
							eContentHTMLPRV ='<section>'+
										'<!-- Display content previwer-->'+
										'<div class="row well">	'+
											'<!-- side-Left First page / Cover page -->'+
											'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="img/Book-icon.gif"> </div>'+
											'<!-- table side-Right -->'+
											'<div class="span8">'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"><strong>Title</strong></div>'+
													'<!-- td2 -->'+
													'<div class="span6"><divt class="categoryPageSearchResutlViewer_Econtent_title">'+responce.eContents[i].Econtent_title+'</div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Type</small></strong></strong> </div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_type"><divt>'+responce.eContents[i].Econtent_type+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 --> '+
													'<div class="span1"> <strong><small>Author</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_author"><divt>'+responce.eContents[i].Econtent_author+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>ISBN_No</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_ISBN_No"><divt>'+responce.eContents[i].Econtent_ISBN_No+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Edition</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_edition"><divt>'+responce.eContents[i].Econtent_edition+'</divt></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Size</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_size"><small>'+responce.eContents[i].Econtent_size+'KB</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Link</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div><a class="btn btn-info btn-small" class="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((responce.eContents[i].Econtent_path).substring(2))+responce.eContents[i].Econtent_filename+'"><i class="icon-download icon-white"></i>&nbsp;Download link</a></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<input class="categoryPageSearchResutlViewer_Econtent_id" value="1" type="hidden">'+
											'<!-- /table -->'+
											'</div>'+
										'</div>'+
										'<!-- /Display content previwer-->'+
									'</section>'+
									'<hr>';

							$('.categoryPageSearchResutlPreviewMainContainer').append(eContentHTMLPRV);
						}*/

					}
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});
	
}//Function End searchBoxForGetEcontentDetailForCategoryPage()---------------------------------------------------FUNEND()



/*************************Start Function getEcontentDetailForSearchPage()***********************************/
//Owner : Madhuranga Senadheera
// location category page content search preview and Deail page
// for get content detail 
//#return type :
function searchBoxForGetPContentDetailForCategoryPage(contentId,retunType,tableName)
{

	// get form data values
		var formData = {
			pContentId : contentId,
			submitMode  : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/ajaxSearchBoxForGetContentDetailForCategoryPage/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'JSON',
			data			: formData,
			success  : function (responce, status)
			{

				// console.log(responce);
				if(responce.status!=="error")
				{
					if(retunType=="fullDetail")
					{
						// console.log('PBOOK  fullDetail');
						$.each(responce.pContent,function(i,obj){
							// console.log(obj);
							contentHTMLMORE ='<section>'+
											'<!-- Display content previwer-->'+
											'<div class="row eachPbook well">'+
												'<!-- side-Left First page / Cover page -->'+
												'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"> </div>'+
												'<!-- table side-Right -->'+
												'<div class="span8">'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 searchresultText"><strong>Title</strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6  categoryPageSearchResutlViewer_Content_title"> '+obj.Content_title+'</div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Author</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_author"><small> '+obj.Content_author+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Publisher</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_publisher"><small> '+obj.Content_publisher+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>ISBN</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_ISBN"><small> '+obj.Content_ISBN+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Edition</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_edition"><small> '+obj.Content_edition+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Description</small></strong></div>'+
														'<!-- td2 -->'+														
														'<div class="span6 categoryPageSearchResutlViewer_Content_description"><small>'+obj.Content_description+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Comments</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Comments"> '+obj.Comments+' </div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Price</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_price"> '+obj.Content_price+' </div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>&nbsp;</small></strong></div>'+
														'<!-- td2 -->'+														
														'<div class="span6 categoryPageSearchResutlViewer_Content_price"><a class="btn btn-info btn-small userMakeReserveBook"><i class="  icon-white icon-folder-open"></i>&nbsp;&nbsp;Reserve</a></div>'+
													'</div>'+
													'<!-- tr -->'+
													
													'<!--hidden value --><input type="hidden" class="contentId" value="'+obj.Content_id+'">'+
												'<!-- /table -->'+
												'</div>'+
											'</div>'+
											'<!-- /Display content previwer-->'+
										'</section>'+
										'<hr>';
										// console.log('hi');
								$('.categoryPageSearchResutlFullDetailsMainContainer').html(contentHTMLMORE);
								$('.categoryPageSearchResutlFullDetailsMainContainer').fadeIn();
						}); // EACH AFUNEND()
					}
					else
					{
						$.each(responce.pContent,function(i,obj){
							// console.log('PBOOOK preview deitials');
							// console.log(obj);
							contentHTMLPRV ='<section>'+
											'<!-- Display content previwer-->'+
											'<div class="row eachPbook well">'+
												'<!-- side-Left First page / Cover page -->'+
												'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"> </div>'+
												'<!-- table side-Right -->'+
												'<div class="span8">'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 searchresultText"><strong>Title</strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6  categoryPageSearchResutlViewer_Content_title"> '+obj.Content_title+'</div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Author</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_author"><small> '+obj.Content_author+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Type</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 muted categoryPageSearchResutlViewer_Content_publisher"><small> Book</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>ISBN</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_ISBN"><small> '+obj.Content_ISBN+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Edition</small></strong></div>'+
														'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_edition"><small> '+obj.Content_edition+'</small></div>'+
													'</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>Description</small></strong></div>'+
														'<!-- td2 -->'+														
														'<div class="span6 categoryPageSearchResutlViewer_Content_description"><small>'+obj.Content_description+'</small></div>'+
													'</div>'+
													// '<!-- tr -->'+
													// '<div class="row">'+
													// 	'<!-- td1 -->'+
													// 	'<div class="span1 "><strong><small>Comments</small></strong></div>'+
													// 	'<!-- td2 -->'+														
													// 		'<div class="span6 categoryPageSearchResutlViewer_Comments"> '+obj.Comments+' </div>'+
													// '</div>'+
													// '<!-- tr -->'+
													// '<div class="row">'+
													// 	'<!-- td1 -->'+
													// 	'<div class="span1 "><strong><small>Price</small></strong></div>'+
													// 	'<!-- td2 -->'+														
													// 		'<div class="span6 categoryPageSearchResutlViewer_Content_price"> '+obj.Content_price+' </div>'+
													// '</div>'+
													'<!-- tr -->'+
													'<div class="row">'+
														'<!-- td1 -->'+
														'<div class="span1 "><strong><small>&nbsp;</small></strong></div>'+
														'<!-- td2 -->'+														
														'<div class="span6 categoryPageSearchResutlViewer_Content_price"><a class="btn btn-info btn-small userMakeReserveBook"><i class="  icon-white icon-folder-open"></i>&nbsp;&nbsp;Reserve</a></div>'+
													'</div>'+
													'<!-- tr -->'+
													
													'<!--hidden value --><input type="hidden" class="contentId" value="'+obj.Content_id+'">'+
												'<!-- /table -->'+
												'</div>'+
											'</div>'+
											'<!-- /Display content previwer-->'+
										'</section>'+
										'<hr>';
										// console.log('hi');
								$('.categoryPageSearchResutlPreviewMainContainer').append(contentHTMLPRV);
						}); // EACH AFUNEND()
						
					} //IFEND()
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});
	
}//Function End getEcontentDetailForSearchPage()------------------------------------------------------FUNEND()


function getValueForCategoryPageSearch()
{
	contentsType = [];
	categoryType = [];
	$('.categoryPageFilterBook').hasClass('active')  ?  contentsType.push('PBOOK') : null;
	$('.categoryPageFilterPdf').hasClass('active')   ?  contentsType.push('PDF') 	: null;
	$('.categoryPageFilterVideo').hasClass('active') ?  contentsType.push('VIDEO') : null;
	$('.categoryPageContentCategory option:selected').text()!=="-Please Select-"? categoryType.push($('.categoryPageContentCategory option:selected').attr('value')): null;
	return {contentsType : contentsType, categoryType : categoryType};
	
}//Function End getValueForCategoryPageSearch()---------------------------------------------------------FUNEND()

/*----------------------------------Catogory Page Search Helper functions-------------------------------------*/

// var categoriesFindContentSearchRequestSourceFlag = 1;
// var categoriesFindContentSearchRequestMatcherFlag = 1;

// function categoriesFindContentSearchRequestSourceFlagReseter()
// {
// 	if(categoriesFindContentSearchRequestSourceFlag == 0)
// 	{

// 		setTimeout(function()
// 		{
// 			categoriesFindContentSearchRequestSourceFlag = 1;
// 		}, 2000)
// 	}
	
// }
// function categoriesFindContentSearchRequestSMatcherFlagReseter()
// {
// 	if(categoriesFindContentSearchRequestSourceFlag == 0)
// 	{

// 		setTimeout(function()
// 		{
// 			categoriesFindContentSearchRequestMatcherFlag = 1;
// 		}, 2000)
// 	}
	
// }

// /*----------------------------------Catogory Page Search Start------------------------------------------------*/
// // Owner Madhuranga
// // Don't change any thing with out inform owner of this functionalities
// // find Content Search box in Catogory page
// // serch box typing event 
// 	jQuery('#categoriesFindContentSearchBox').typeahead({		
// 		// get the Book names source from ajax
// 		source: function (query, process)
// 		{
			
// 			if(categoriesFindContentSearchRequestSourceFlag==1)
// 			{
// 				categoriesFindContentSearchRequestSourceFlag = 0;

// 				var dataSentUrl = base_url+'index.php/manageContent/AutoCompleteSearchForCategoryPage/';
// 				var sourceData = [];
// 				var formData = {
// 					contentsType         : getValueForCategoryPageSearch().contentsType,
// 					categoryType         : getValueForCategoryPageSearch().categoryType,
// 					findContentSearchBox : query,
// 					submitMode           : "ajax"
// 				};

// 				// Ajax funtion
// 				// get the content detials 
// 				jQuery.ajax({
// 					type		: 'POST',
// 					url			: dataSentUrl,
// 					async		: false,
// 					dataType	: 'JSON',
// 					data		: formData,
// 					success		: function (responce)
// 					{
// 						console.log(responce);
// 						// get the all books type as JSON object
// 						// each Type has it's own JSON object
// 						if(responce.status!=='error')
// 						{
// 							// if return Physical book content detial
// 							if((responce.PBOOK!=="noData")&&(jQuery.type(responce.PBOOK)!=='undefined'))
// 							{
// 								sourceData.push(responce.PBOOK);
// 							}
// 							// if return PDF content detial
// 							if((responce.PDF!=="noData")&&(jQuery.type(responce.PDF)!=='undefined'))
// 							{
// 								sourceData.push(responce.PDF);
// 							}
// 							// if return Vedio content detial
// 							if((responce.VIDEO!=="noData")&&(jQuery.type(responce.VIDEO)!=='undefined'))
// 							{
// 								sourceData.push(responce.VIDEO);
// 							}
// 							categoriesFindContentSearchRequestFlag = 1;
// 						} // ENDIF()
// 						// when data getinng errror
// 						else
// 						{

// 						}
// 					}
						
// 				});
				


// 				map = {};
// 				contents=[];
// 				// check JSON object is set
// 				if(sourceData.length > 0)
// 				{
// 					// Typeahead can't read JSON object and so get the Title and creat a 
// 					// Typeahead readable array
// 					$.each(sourceData, function (i, sourceData2)
// 					{				
// 						$.each(sourceData2, function (i, obj2)
// 						{
// 							// identify which table JSON object is this
// 							// This content table JSON object
// 							if(jQuery.type(obj2.Content_title)!=="undefined")
// 							{
// 								// Pussh the table name later identity
// 								obj2.tableName = "content";
// 								// get the title for display it's name can identity table fields
// 								map[obj2.Content_title] = obj2;
// 								contents.push(obj2.Content_title);
// 							}
// 							// Econtent JSON object
// 							else if(jQuery.type(obj2.Econtent_title)!=="undefined")
// 							{
// 								// Pussh the table name later identity
// 								obj2.tableName = "econtent";
// 								map[obj2.Econtent_title] = obj2;
// 								// get the title for display it's name can identity table fields
// 								contents.push(obj2.Econtent_title);
// 							}

// 						});

// 					});	
// 					// Displable titles push to typeahead process
// 					process(contents);

// 				}
// 				else
// 				{
// 					// $('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
// 					// $('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
// 					$('.categoryPageSearchResutlPreviewMainContainer').html('<div class="well well-large">No result</div>');
// 					$('.categoryPageSearchResutlPreviewMainContainer').fadeIn();
// 				}
// 			}// End if of if(categoriesFindContentSearchRequestFlag==1)

// 			categoriesFindContentSearchRequestSourceFlagReseter();
// 		} 
			
// 		// When click the selecter this @title Para give selected title
// 		// ,updater: function (title)
// 		// {
// 		// 	// when select the content clear the preview list
// 		// 	if(!jQuery.isEmptyObject(map))
// 		// 	{

// 		// 		$('.categoryPageSearchResutlPreviewMainContainer').fadeOut();
// 		// 		$('.categoryPageSearchResutlPreviewMainContainer').html('');

// 		// 		// get the current title's table name
// 		// 		tableName = map[title].tableName;
// 		// 		// When econtent table
// 		// 		if (tableName==="econtent")
// 		// 		{
// 		// 			// get the Econtent id for get to content more details
// 		// 			contentId = map[title].Econtent_id;
// 		// 			searchBoxForGetEcontentDetailForCategoryPage(contentId,"fullDetail",tableName)
// 		// 		}
// 		// 		// When content table 
// 		// 		else
// 		// 		{
// 		// 			// get the Content id for get to content more details
// 		// 			contentId = map[title].Content_id;
// 		// 			searchBoxForGetPContentDetailForCategoryPage(contentId,"fullDetail",tableName)
					
// 		// 		}
// 		// 		// if want title want to change from current to new
// 		// 		// get bellow title and add some text and return  new title value
// 		// 		return title;
// 		// 	}
// 		// }// AFUNEND updater ()


// 		// when typing the search bar drop down list showen list are the matcher's of the typing word's
// 		// @title para get the drop down list title one by one it should have return @title;
// 		,matcher:function(title)
// 		{
// 			if(categoriesFindContentSearchRequestMatcherFlag==1)
// 			{
// 				console.log('title'+title);
// 				categoriesFindContentSearchRequestMatcherFlag = 0;

// 				$('.categoryPageSearchResutlPreviewMainContainer').html('');
// 				$('.categoryPageSearchResutlPreviewMainContainer').fadeIn('slow');
// 				// get the current title's table name
// 				if(!jQuery.isEmptyObject(map))
// 				{
	
// 					tableName = map[title].tableName;
// 					// When econtent table
// 					if (tableName==="econtent")
// 					{
// 						// get the Econtent id for get to content more details
// 						contentId = map[title].Econtent_id;
// 						// console.log(contentId+"preview"+tableName);
// 						searchBoxForGetEcontentDetailForCategoryPage(contentId,"preview",tableName);
	
// 					}
// 					// When content table 
// 					else
// 					{
// 						// get the Content id for get to content more details
// 						contentId = map[title].Content_id;
// 						searchBoxForGetPContentDetailForCategoryPage(contentId,"preview",tableName);
// 					}
					
// 					// return title; // @title must return

// 				} // End if(!jQuery.isEmptyObject(map))
					
// 			} //if(categoriesFindContentSearchRequestFlag==0)
// 			categoriesFindContentSearchRequestSMatcherFlagReseter();

// 		} // End AFUN matcher:function(title)

// 	});
	
	


// 	//Owner : Madhuranga Senadheera
// 	//cleaer the search result when empty
// 	$('#categoriesFindContentSearchBox').keypress(function(e)
// 	{
// 		if()
// 		// console.log(e);
// 		if (e.keyCode==8)
// 		{
// 			// clear the search resutl when coming new result
// 			// $('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').fadeOut();
// 			$('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
// 			$('.categoryPageSearchResutlFullDetailsMainContainer').fadeOut('slow');
// 			$('.categoryPageSearchResutlFullDetailsMainContainer').html('');

// 		}
// 	});


	// function categoriesFindContentSearchRequestSourceFlagReseter()
	// {
	// 	if((categoriesFindContentSearchRequestSourceFlag == 1)&&(activeSetTime = 0))
	// 	{
	// 		activeSetTime =1;

	// 		setTimeout(function()
	// 		{
	// 			categoriesFindContentSearchRequestSourceFlag = 1;
	// 		}, 2000)
	// 	}
		
	// }
	// var categoriesFindContentSearchRequestSourceFlag = 1;

	var categoriesFindContentSearchRequestMatcherFlag = 1;
	var activeSetTime = 0;

	function categoriesFindContentSearchRequestSMatcherFlagReseter()
	{
		if((categoriesFindContentSearchRequestMatcherFlag == 0)&&(activeSetTime == 0))
		{
			activeSetTime = 1;	

			setTimeout(function()
			{
				console.log('hi');
				categoriesFindContentSearchRequestMatcherFlag = 1;
				activeSetTime = 0;
				setDataForCategoryPageSearchContent()
			}, 1000)
		}
		// break;
	}

		




	function setDataForCategoryPageSearchContent ()
	{
		console.log('ajax')
		var dataSentUrl = base_url+'index.php/manageContent/AutoCompleteSearchForCategoryPage/';
			var sourceData = [];
			var formData = {
				contentsType         : getValueForCategoryPageSearch().contentsType,
				categoryType         : getValueForCategoryPageSearch().categoryType,
				findContentSearchBox : $('#categoriesFindContentSearchBox').val(),
				submitMode           : "ajax"
			};

			// Ajax funtion
			// get the content detials 
			jQuery.ajax({
				type		: 'POST',
				url			: dataSentUrl,
				// async		: false,
				dataType	: 'JSON',
				data		: formData,
				success		: function (responce)
				{
					
					$('.categoryPageSearchResutlPreviewMainContainer').html('');
					// $('.categoryPageSearchResutlPreviewMainContainer').addClass('hide');
					console.log(responce);
					// get the all books type as JSON object
					// each Type has it's own JSON object
					if(responce.status!=='error')
					{
						// if return Physical book content detial
						if((responce.PBOOK!=="noData")&&(jQuery.type(responce.PBOOK)!=='undefined'))
						{
							noData = 1;
							$.each(responce.PBOOK,function(i,obj){
								// console.log('PBOOOK preview deitials');
								// console.log(obj);
								contentHTMLPRV ='<section>'+
												'<!-- Display content previwer-->'+
												'<div class="row eachPbook well">'+
													'<!-- side-Left First page / Cover page -->'+
													'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"> </div>'+
													'<!-- table side-Right -->'+
													'<div class="span8">'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 searchresultText"><strong>Title</strong></div>'+
															'<!-- td2 -->'+														
																'<div class="span6  categoryPageSearchResutlViewer_Content_title"> '+obj.Content_title+'</div>'+
														'</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>Author</small></strong></div>'+
															'<!-- td2 -->'+														
																'<div class="span6 categoryPageSearchResutlViewer_Content_author"><small> '+obj.Content_author+'</small></div>'+
														'</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>Type</small></strong></div>'+
															'<!-- td2 -->'+														
																'<div class="span6 muted categoryPageSearchResutlViewer_Content_publisher"><small> Book</small></div>'+
														'</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>ISBN</small></strong></div>'+
															'<!-- td2 -->'+														
																'<div class="span6 categoryPageSearchResutlViewer_Content_ISBN"><small> '+obj.Content_ISBN+'</small></div>'+
														'</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>Edition</small></strong></div>'+
															'<!-- td2 -->'+														
																'<div class="span6 categoryPageSearchResutlViewer_Content_edition"><small> '+obj.Content_edition+'</small></div>'+
														'</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>Description</small></strong></div>'+
															'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_description"><small>'+obj.Content_description+'</small></div>'+
														'</div>'+
														// '<!-- tr -->'+
														// '<div class="row">'+
														// 	'<!-- td1 -->'+
														// 	'<div class="span1 "><strong><small>Comments</small></strong></div>'+
														// 	'<!-- td2 -->'+														
														// 		'<div class="span6 categoryPageSearchResutlViewer_Comments"> '+obj.Comments+' </div>'+
														// '</div>'+
														// '<!-- tr -->'+
														// '<div class="row">'+
														// 	'<!-- td1 -->'+
														// 	'<div class="span1 "><strong><small>Price</small></strong></div>'+
														// 	'<!-- td2 -->'+														
														// 		'<div class="span6 categoryPageSearchResutlViewer_Content_price"> '+obj.Content_price+' </div>'+
														// '</div>'+
														'<!-- tr -->'+
														'<div class="row">'+
															'<!-- td1 -->'+
															'<div class="span1 "><strong><small>&nbsp;</small></strong></div>'+
															'<!-- td2 -->'+														
															'<div class="span6 categoryPageSearchResutlViewer_Content_price"><a class="btn btn-info btn-small userMakeReserveBook"><i class="  icon-white icon-folder-open"></i>&nbsp;&nbsp;Reserve</a></div>'+
														'</div>'+
														'<!-- tr -->'+
														
														'<!--hidden value --><input type="hidden" class="contentId" value="'+obj.Content_id+'">'+
													'<!-- /table -->'+
													'</div>'+
												'</div>'+
												'<!-- /Display content previwer-->'+
											'</section>'+
											'<hr>';
											// console.log('hi');
									$('.categoryPageSearchResutlPreviewMainContainer').append(contentHTMLPRV);
							}); // EACH AFUNEND()
						}
						// if return PDF content detial
						if((responce.PDF!=="noData")&&(jQuery.type(responce.PDF)!=='undefined'))
						{
							noData = 1;

							$.each(responce.PDF, function(i, obj)
							{
								console.log('url:'+(obj.Cover_page_path).substring(2)+obj.Cover_page);
								imgSrc = 'img/Book-icon.gif';
								
								if(obj.Cover_page!='')
								{
									imgSrc = ((obj.Cover_page_path).substring(2)+obj.Cover_page);
								}
								eContentHTMLPRV ='<section>'+
										'<!-- Display content previwer-->'+
										'<div class="row well">	'+
											'<!-- side-Left First page / Cover page -->'+
											'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+imgSrc+'"> </div>'+
											'<!-- table side-Right -->'+
											'<div class="span8">'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"><strong>Title</strong></div>'+
													'<!-- td2 -->'+
													'<div class="span6"><divt class="categoryPageSearchResutlViewer_Econtent_title">'+obj.Econtent_title+'</div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Type</small></strong></strong> </div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_type"><small>'+obj.Econtent_type+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 --> '+
													'<div class="span1"> <strong><small>Author</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_author"><small>'+obj.Econtent_author+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>ISBN_No</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_ISBN_No"><small>'+obj.Econtent_ISBN_No+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Edition</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_edition"><small>'+obj.Econtent_edition+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Size</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_size"><small>'+obj.Econtent_size+'KB</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Link</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div><a class="btn btn-info btn-small" class="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((obj.Econtent_path).substring(2))+obj.Econtent_filename+'"><i class="icon-download icon-white"></i>&nbsp;Download link</a></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<input class="categoryPageSearchResutlViewer_Econtent_id" value="1" type="hidden">'+
											'<!-- /table -->'+
											'</div>'+
										'</div>'+
										'<!-- /Display content previwer-->'+
									'</section>'+
									'<hr>';

								$('.categoryPageSearchResutlPreviewMainContainer').append(eContentHTMLPRV);

							}); //each AFUNEND()
						}
						// if return Vedio content detial
						if((responce.VIDEO!=="noData")&&(jQuery.type(responce.VIDEO)!=='undefined'))
						{
							noData = 1;

							$.each(responce.VIDEO, function(i, obj)
							{
								eContentHTMLPRV ='<section>'+
										'<!-- Display content previwer-->'+
										'<div class="row well">	'+
											'<!-- side-Left First page / Cover page -->'+
											'<div class="span3"> <img type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/vedioFlipIcon.png"> </div>'+
											'<!-- table side-Right -->'+
											'<div class="span8">'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"><strong>Title</strong></div>'+
													'<!-- td2 -->'+
													'<div class="span6"><divt class="categoryPageSearchResutlViewer_Econtent_title">'+obj.Econtent_title+'</div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Type</small></strong></strong> </div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_type"><small>'+obj.Econtent_type+'</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 --> '+
													'<div class="span1"> <strong><small>Author</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_author"><small>'+obj.Econtent_author+'</small></div>'+
												'</div>'+
												// '<!-- tr -->'+
												// '<div class="row">'+
												// 	'<!-- td1 -->'+
												// 	'<div class="span1"> <strong><small>ISBN_No</small></strong></strong></div>'+
												// 	'<!-- td2 -->'+
												// 	'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_ISBN_No"><small>'+obj.Econtent_ISBN_No+'</small></div>'+
												// '</div>'+
												// '<!-- tr -->'+
												// '<div class="row">'+
												// 	'<!-- td1 -->'+
												// 	'<div class="span1"> <strong><small>Edition</small></strong></strong></div>'+
												// 	'<!-- td2 -->'+
												// 	'<div class="span3" class="categoryPageSearchResutlViewer_Econtent_edition"><small>'+obj.Econtent_edition+'</small></div>'+
												// '</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Size</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div class="span3 muted" class="categoryPageSearchResutlViewer_Econtent_size"><small>'+obj.Econtent_size+'KB</small></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<div class="row">'+
													'<!-- td1 -->'+
													'<div class="span1"> <strong><small>Link</small></strong></strong></div>'+
													'<!-- td2 -->'+
													'<div><a class="btn btn-info btn-small" class="categoryPageSearchResutlViewer_Econtent_downloadlink" href="'+base_url+((obj.Econtent_path).substring(2))+obj.Econtent_filename+'"><i class="icon-download icon-white"></i>&nbsp;Download link</a></div>'+
												'</div>'+
												'<!-- tr -->'+
												'<input class="categoryPageSearchResutlViewer_Econtent_id" value="1" type="hidden">'+
											'<!-- /table -->'+
											'</div>'+
										'</div>'+
										'<!-- /Display content previwer-->'+
									'</section>'+
									'<hr>';

								$('.categoryPageSearchResutlPreviewMainContainer').append(eContentHTMLPRV);

							}); //each AFUNEND()
						}

					} // ENDIF()
					// when data getinng errror
					else
					{

					}
					//  when no data Dispaly a massage
					if (noData==0)
					{
						// $('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
						// $('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
						$('.categoryPageSearchResutlPreviewMainContainer').html('');
						$('.categoryPageSearchResutlPreviewMainContainer').html('<div class="well well-large">No result</div>');
						$('.categoryPageSearchResutlPreviewMainContainer').fadeIn('slow');
					}
					else if(($('#categoriesFindContentSearchBox').val()).length !== 0)
					{
						$('.categoryPageSearchResutlPreviewMainContainer').fadeIn('slow');
					}
				}
					
			});
			
	}


	//Owner : Madhuranga Senadheera
	//cleaer the search result when empty
	$('#categoriesFindContentSearchBox').keyup(function(e)
	{		
		// console.log(e);
		if(($('#categoriesFindContentSearchBox').val()).length == 0)
		{
			// alert('value'+($('#categoriesFindContentSearchBox').val()).length);

			// clear the search resutl when coming new result
			// $('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').fadeOut();
			$('.categoryPageSearchResutlPreviewMainContainer').fadeOut('slow');
			// $('.categoryPageSearchResutlPreviewMainContainer').html('');
			// $('.categoryPageSearchResutlFullDetailsMainContainer').fadeOut('slow');
		}
		else if((categoriesFindContentSearchRequestMatcherFlag ==1)&&(($('#categoriesFindContentSearchBox').val()).length !== 0))
		{			
			categoriesFindContentSearchRequestMatcherFlag = 0;
			categoriesFindContentSearchRequestSMatcherFlagReseter();
			// setDataForCategoryPageSearchContent();
			
		}

		// if(activeSetTime==0)
		// {
		// 	categoriesFindContentSearchRequestSMatcherFlagReseter();
		// }
		
		noData=0		
	});



/*---------------------------------Catogory Page Search END--------------------------------------------------*/
/**********************************Catogory Page END**********************************************************/

// Owner 
// find Content Search box in Catogory page->listAllContent
// serch box typing event 
jQuery('#categoriesFindContentSearchInListAllTabSearchBox').typeahead({		
		// get the Book names source from ajax
		source: function (query, process)
		{
			var contentsType = [];

			contentsType[0] = "PBOOK";

			var dataSentUrl = base_url+'index.php/manageContent/AutoCompleteSearchForCategoryPage/';
			var sourceData = [];
			var formData = {
				contentsType         : getValueForCategoryPageSearch().contentsType,
				categoryType         : getValueForCategoryPageSearch().categoryType,
				findContentSearchBox : query,
				submitMode           : "ajax"
			};

			// Ajax funtion
			// get the content detials 
			jQuery.ajax({
				type		: 'POST',
				url			: dataSentUrl,
				async		: false,
				dataType	: 'JSON',
				data		: formData,
				success		: function (responce)
				{
					// get the all books type as JSON object
					// each Type has it's own JSON object
					if(responce.status!=='error')
					{
						// if return Physical book content detial
						if((responce.PBOOK!=="noData")&&(jQuery.type(responce.PBOOK)!=='undefined'))
						{
							sourceData.push(responce.PBOOK);
						}
						// if return PDF content detial
						if((responce.PDF!=="noData")&&(jQuery.type(responce.PDF)!=='undefined'))
						{
							sourceData.push(responce.PDF);
						}
						// if return Vedio content detial
						if((responce.VIDEO!=="noData")&&(jQuery.type(responce.VIDEO)!=='undefined'))
						{
							sourceData.push(responce.VIDEO);
						}
					} // ENDIF()
					// when data getinng errror
					
				}
					
			});
			


			map = {};
			contents=[];
			// check JSON object is set
			if(sourceData.length > 0)
			{
				// Typeahead can't read JSON object and so get the Title and creat a 
				// Typeahead readable array
				$.each(sourceData, function (i, sourceData2)
				{				
					$.each(sourceData2, function (i, obj2)
					{
						// identify which table JSON object is this
						// This content table JSON object
						if(jQuery.type(obj2.Content_title)!=="undefined")
						{
							// Pussh the table name later identity
							obj2.tableName = "content";
							// get the title for display it's name can identity table fields
							map[obj2.Content_title] = obj2;
							contents.push(obj2.Content_title);
						}
						// Econtent JSON object
						else if(jQuery.type(obj2.Econtent_title)!=="undefined")
						{
							// Pussh the table name later identity
							obj2.tableName = "econtent";
							map[obj2.Econtent_title] = obj2;
							// get the title for display it's name can identity table fields
							contents.push(obj2.Econtent_title);
						}

					});

				});	
				// Displable titles push to typeahead process
				process(contents);

			} //END if()
		}
		// When click the selecter this @title Para give selected title
		,updater: function (title)
		{
			// when select the content clear the preview list
			$('.categoryPageSearchResutlPreviewMainContainer').html('');

			// get the current title's table name
			tableName = map[title].tableName;
			// When econtent table
			if (tableName==="econtent")
			{
				// get the Econtent id for get to content more details
				contentId = map[title].Econtent_id;
				searchBoxForGetEcontentDetailForCategoryPage(contentId,"fullDetail",tableName)
			}
			// When content table 
			else
			{
				// get the Content id for get to content more details
				contentId = map[title].Content_id;
				searchBoxForGetPContentDetailForCategoryPage(contentId,"fullDetail",tableName)
				
			}
			// if want title want to change from current to new
			// get bellow title and add some text and return  new title value
			return title;
		}// AFUNEND updater ()


		// when typing the search bar drop down list showen list are the matcher's of the typing word's
		// @title para get the drop down list title one by one it should have return @title;
		// ,matcher:function(title)
		// {
		// 	// get the current title's table name
		// 	tableName = map[title].tableName;
		// 	// When econtent table
		// 	if (tableName==="econtent")
		// 	{
		// 		// get the Econtent id for get to content more details
		// 		contentId = map[title].Econtent_id;
		// 		// console.log(contentId+"preview"+tableName);
		// 		searchBoxForGetEcontentDetailForCategoryPage(contentId,"preview",tableName)

		// 	}
		// 	// When content table 
		// 	else
		// 	{
		// 		// get the Content id for get to content more details
		// 		contentId = map[title].Content_id;
		// 		searchBoxForGetPContentDetailForCategoryPage(contentId,"preview",tableName)
				
		// 	}
			
		// 	return title; // @title must return 
		// }

	});
	
/**********************************Admin Page Start**********************************************************/
/*************************Start Function searchBoxForGetPContentDetailForAdminPage()***********************************/
//Owner : Madhuranga Senadheera
// location category page content search preview and Deail page
// for get content detail 
//#return type :
function searchBoxForGetPContentDetailForAdminPage(contentId,retunType,tableName)
{

	// get form data values
		var formData = {
			pContentId : contentId,
			submitMode  : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/ajaxSearchBoxForGetContentDetailForCategoryPage/';
		// alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'JSON',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!="error")
				{
					if(retunType=="fullDetail")
					{
						console.log('ADMIN panle PBOOOK  fullDetail');					
						$.each(responce.pContent,function(i,obj){
							console.log(obj);
							contentHTMLMORE ='<!-- Display content previwer-->'+
													'<tr>'+
														'<td colspan="2" class="span3"><img  align="left" type="text" alt="Cover page" class="categoryPageSearchResutlViewer_Econtent_coverImage" src="'+base_url+'img/Book-icon.gif"></td>'+
													'</tr>'+
													'<tr>'+
														'<td class="searchresultText"><strong>Title</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Content_title"> '+obj.Content_title+'</td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Author</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Content_author"><small>'+obj.Content_author+'</small></td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Publisher</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Content_publisher"><small> '+obj.Content_publisher+'</small></td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>ISBN</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Content_ISBN"><small> '+obj.Content_ISBN+'</small></td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Edition</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Content_edition"><small> '+obj.Content_edition+'</small></td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Description</strong></td>'+
														'<td class="ca5egoryPageSearchResutlViewer_Content_description"><small>'+obj.Content_description+'</small></td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Comments</strong></td>'+
														'<td class="categoryPageSearchResutlViewer_Comments"> '+obj.Comments+'</td>'+
													'</tr>'+
													'<tr>'+
														'<td class=""><strong>Price</strong></td>'+
														'<td class="muted categoryPageSearchResutlViewer_Content_price"> '+obj.Content_price+' </td>'+
													'</tr>'+
													// '<tr>'+
													// 	'<td class=""><strong>&nbsp;</strong></td>'+
													// 	'<td class='' categoryPageSearchResutlViewer_Content_price"><a class="btn btn-info btn-small userMakeReserveBook"><i class="  icon-white icon-folder-open"></i>&nbsp;&nbsp;Reserve</a></td>'+
													// </tr>'+													
													'<tr>'+														
														'<td class=""><strong>Status</strong></td>'+																											
														'<td class="muted categoryPageSearchResutlViewer_Content_price"><small>'+obj.Content_status+'</small></td>'+
														'<!--hidden value --><input type="hidden" class="contentId" value="'+obj.Content_id+'">'+
													'</tr>';													
								jQuery('#Res_IRcode').val(obj.Content_ISBN);
								$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html(contentHTMLMORE);
								$('.adminPageSearchResutlFullDetailsMainContainer').fadeIn();
						}); // EACH AFUNEND()
					}
					else
					{
						console.log('PBOOK admin panel previwer trigger this not support for this page');
						
					} //IFEND()
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});
	
}//Function End searchBoxForGetPContentDetailForAdminPage()------------------------------------------------------FUNEND()

// important -- this function not want in admin page
// function getValueForCategoryPageSearch()
// {
// 	contentsType = [];
// 	categoryType = [];
// 	$('.categoryPageFilterBook').hasClass('active')  ?  contentsType.push('PBOOK') : null;
// 	$('.categoryPageFilterPdf').hasClass('active')   ?  contentsType.push('PDF') 	: null;
// 	$('.categoryPageFilterVideo').hasClass('active') ?  contentsType.push('VIDEO') : null;
// 	$('.categoryPageContentCategory option:selected').text()!=="-Please Select-"? categoryType.push($('.categoryPageContentCategory option:selected').attr('value')): null;
// 	return {contentsType : contentsType, categoryType : categoryType};
	
// }//Function End getValueForCategoryPageSearch()---------------------------------------------------------FUNEND()


/*----------------------------------ADMIN Page content Search helper functions------------------------------------------------*/
	var adminPanelFindContentRequestMatchFlag = 1;
	var adminPanelContentsActiveSetTime = 0;
	var adminPanelContentsSearchSourceData = [];
	var adminPanelContentsObject = {};
	
	var adminPanelContentSearchNameArray = [];

	function adminPanelFindContentRequestMatchFlagReseter()
	{
		if((adminPanelFindContentRequestMatchFlag == 0)&&(adminPanelContentsActiveSetTime == 0))
		{
			adminPanelContentsActiveSetTime = 1;	

			setTimeout(function()
			{
				// console.log('hi');
				adminPanelContentsActiveSetTime = 0;
				setDataForAdminPageContentSearch()
				adminPanelFindContentRequestMatchFlag = 1;
			}, 1000)
		}

	}


/*----------------------------------/ADMIN Page content Search helper functions------------------------------------------------*/


/*----------------------------------ADMIN Page conetent Search BOX Start------------------------------------------------*/
// Owner Madhuranga
// Don't change any thing with out inform owner of this functionalities
// find Content Search box in admin page
// serch box typing event


	function setDataForAdminPageContentSearch ()
	{
		// test{contentsType : "PBOOK", categoryType : categoryType}
		var contentsType = [];

		contentsType[0] = "PBOOK";
		var dataSentUrl = base_url+'index.php/manageContent/AutoCompleteSearchForCategoryPage/';
		var sourceData = [];
		var formData = {
			contentsType         : contentsType,
			// categoryType         : ''
			findContentSearchBox : jQuery('#adminPanelFindContentSearch').val(),
			submitMode           : "ajax"
		};

		// Ajax funtion
		// get the content detials 
		jQuery.ajax({
			type		: 'POST',
			url			: dataSentUrl,
			async		: false,
			dataType	: 'JSON',
			data		: formData,
			success		: function (responce)
			{
				// get the all books type as JSON object
				// each Type has it's own JSON object
				if(responce.status!=='error')
				{
					// if return Physical book content detial
					if((responce.PBOOK!=="noData")&&(jQuery.type(responce.PBOOK)!=='undefined'))
					{
						adminPanelContentsSearchSourceData.push(responce.PBOOK);
					}
					// if return PDF content detial
					if((responce.PDF!=="noData")&&(jQuery.type(responce.PDF)!=='undefined'))
					{
						adminPanelContentsSearchSourceData.push(responce.PDF);
					}
					// if return Vedio content detial
					if((responce.VIDEO!=="noData")&&(jQuery.type(responce.VIDEO)!=='undefined'))
					{
						adminPanelContentsSearchSourceData.push(responce.VIDEO);
					}
				} // ENDIF()
				// when data getinng errror
				else
				{

				}
			}
				
		});
	} 


	jQuery('#adminPanelFindContentSearch').typeahead({		
		// get the Book names source from ajax
		source: function (query, process)
		{	
			// map = {};
			// contents=[];
			// check JSON object is set
			if(adminPanelContentsSearchSourceData.length > 0)
			{
				// Typeahead can't read JSON object and so get the Title and creat a 
				// Typeahead readable array
				$.each(adminPanelContentsSearchSourceData, function (i, sourceData2)
				{				
					$.each(sourceData2, function (i, obj2)
					{
						// identify which table JSON object is this
						// This content table JSON object
						if(jQuery.type(obj2.Content_title)!=="undefined")
						{
							// Pussh the table name later identity
							obj2.tableName = "content";
							// get the title for display it's name can identity table fields
							if(adminPanelContentSearchNameArray.indexOf(obj2.Content_title)==(-1))
							{
								adminPanelContentsObject[obj2.Content_title] = obj2;
								adminPanelContentSearchNameArray.push(obj2.Content_title);
							}
						}
						// Econtent JSON object
						else if(jQuery.type(obj2.Econtent_title)!=="undefined")
						{
							// Pussh the table name later identity
							obj2.tableName = "econtent";

							if(adminPanelContentSearchNameArray.indexOf(obj2.Econtent_title)==(-1))
							{
								adminPanelContentsObject[obj2.Econtent_title] = obj2;
								// get the title for display it's name can identity table fields
								adminPanelContentSearchNameArray.push(obj2.Econtent_title);

							}
						}

					});

				});	
				// Displable titles push to typeahead process
				process(adminPanelContentSearchNameArray);

			} //END if()
		}
		// When click the selecter this @title Para give selected title
		,updater: function (title)
		{
			// when select the content clear the preview list
			if(!jQuery.isEmptyObject(adminPanelContentsObject))
			{
				// get the current title's table name
				tableName = adminPanelContentsObject[title].tableName;
				// When econtent table
				if (tableName==="econtent")
				{
					// alert('eContents table')
					// get the Econtent id for get to content more details
					contentId = adminPanelContentsObject[title].Econtent_id;				
					searchBoxForGetPContentDetailForAdminPage(contentId,"fullDetail",tableName)
				}
				// When content table 
				else
				{
					// get the Content id for get to content more details
					contentId = adminPanelContentsObject[title].Content_id;
					$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
					// $('.adminPageSearchResutlFullDetailsMainContainer').addClass('hide');
					searchBoxForGetPContentDetailForAdminPage(contentId,"fullDetail",tableName)
					
				}
				// if want title want to change from current to new
				// get bellow title and add some text and return  new title value
				return title;
			}
			// When content table 
			else
			{
				$('.successMsages').removeClass('alert-success');
				$('.successMsages').addClass('alert-danger');
				$('.successMsages').slideDown();
				$('.successMsages').find('span').html("Please select a search listed book")
				$('.successMsages').delay('4000').slideUp();
			}
		}// AFUNEND updater ()

		// !import -- this function not want in the admin page
		// when typing the search bar drop down list showen list are the matcher's of the typing word's
		// @title para get the drop down list title one by one it should have return @title;
		// ,matcher:function(title)
		// {
		// 	// get the current title's table name
		// 	tableName = map[title].tableName;
		// 	// When econtent table
		// 	if (tableName==="econtent")
		// 	{
		// 		// get the Econtent id for get to content more details
		// 		contentId = map[title].Econtent_id;
		// 		// console.log(contentId+"preview"+tableName);
		// 		searchBoxForGetEcontentDetailForCategoryPage(contentId,"preview",tableName)

		// 	}
		// 	// When content table 
		// 	else
		// 	{
		// 		// get the Content id for get to content more details
		// 		contentId = map[title].Content_id;
		// 		searchBoxForGetPContentDetailForCategoryPage(contentId,"preview",tableName)
				
		// 	}
			
		// 	return title; // @title must return 
		// }

	});

	// //Owner : Madhuranga Senadheera
	// //cleaer the search result when empty
	// $('#adminPanelFindContentSearch').keyup(function(e)
	// {
	// 	// console.log(e);
	// 	if (e.keyCode==8)
	// 	{
	// 		// clear the search resutl when coming new result
	// 		// $('.adminPageSearchResutlPreviewMainContainer').html('');
	// 		$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut('slow');	
	// 		// $('.adminPageSearchResutlFullDetailsMainContainer').html('');
	// 		// $('.adminPageSearchResutlFullDetailsMainContainer').addClass('hide');

	// 	}
	// });

	$('#adminPanelFindContentSearch').keyup(function(e)
	{
		// alert('hi')
		if(($('#adminPanelFindContentSearch').val()).length==0)
		{
			// clear the search resutl when coming new result
			$(".adminPageSearchResutlFullDetailsMainContainer").fadeOut('slow');
			$(".adminPageSearchResutlFullDetailsMainContainer").find('.contentId').val();
			$('#Res_IRcode').val('');
		}
		// ESC button click clear the search box and fadeout the resutl
		else if(e.keyCode == 27)
		{
			// clear the search resutl when coming new result
			$(".adminPageSearchResutlFullDetailsMainContainer").fadeOut('slow');
			$(".adminPageSearchResutlFullDetailsMainContainer").find('.contentId').val();
			$('#Res_IRcode').val('');
			$(this).val('');
		}
		else if((adminPanelFindContentRequestMatchFlag==1)&&($('#adminPanelFindContentSearch').val()).length !==0)
		{
			adminPanelFindContentRequestMatchFlag=0;
			adminPanelFindContentRequestMatchFlagReseter();

		}		
	});

/*---------------------------------ADMIN Page content Search BOX END--------------------------------------------------*/
/*************************Start Function capitalizeFirstLatter()***********************************/
//Owner : Madhuranga Senadheera
//
//@ type :
//#return type :
function capitalizeFirstLatter(words)
{
	if(jQuery.type(words)!=='null')
	{
		wordArray = words.split(" ");
		firstLatterCapitaledLetterArray = [];
		for (i = 0; i < wordArray.length; i++)
		{
			// firstLatterCapitaledLetterArray.push(((wordArray[i].toLowerCase()).charAt(0).toUpperCase()).wordArray[i].slice(1));
			lowercase = (wordArray[i].toLowerCase());
			firstLatterCapitaledLetterArray.push((lowercase.charAt(0).toUpperCase())+lowercase.slice(1));
		}
		return firstLatterCapitaledLetterArray.join(' ');		
	}
	else
	{
		return '';
	}
}//Function End capitalizeFirstLatter()---------------------------------------------------FUNEND()

/*----------------------------------/ADMIN Page user Search helper functions------------------------------------------------*/

function getUserDetailsRecordForAdminPageSearch(searchedUserName,viewType)
{
	
	var formData = {
			searchedUserName: searchedUserName,
			submitMode  : "ajax"
		};

	var dataSentUrl = base_url+'index.php/manageUser/getSpacificUserDetails';
	jQuery.ajax(
	{
		type			: 'POST',
		url				: dataSentUrl,
		dataType		: 'json',
		data			: formData,
		success  : function (searchedUserDetails)
		{
			capitalizeFirstLatter('madhuranga SENADHEERA');
			// <img src="'+base_url+''+(searchedUserDetails.userDetails.Image_path).substring(3)+'" alt="User profile image"/>
			$("#personalDetails").html('<div class="userDiscriptionDetails well"><img src="'+base_url+(searchedUserDetails.userDetails.Image_path).substring(2)+searchedUserDetails.userDetails.User_profile_image+'" alt="User profile image"/>'+
    			'<div> '+searchedUserDetails.userDetails.Title+' '+capitalizeFirstLatter(searchedUserDetails.userDetails.First_name)+' '+capitalizeFirstLatter(searchedUserDetails.userDetails.Last_name)+
				'</p> <p>Email :'+searchedUserDetails.userDetails.Email+
				'</p> <p class="muted">Member Type : '+searchedUserDetails.userDetails.User_type+
				'</p><input type="hidden" class="userName" value="'+searchedUserDetails.userDetails.User_name+'"/></div>');
			$("#personalDetails").fadeIn();
		}
	});

}// function getUserDetailsRecord () {


	var adminPanelFindUserRequestMatchFlag = 1;
	var adminPanelUsersActiveSetTime = 0;
	var adminPanelUsersSearchSourceData = [];
	var map = {};
	
	var adminPanelUsersSearchAllUsers = [];

	function adminPanelFindUserRequestMatchFlagReseter()
	{
		if((adminPanelFindUserRequestMatchFlag == 0)&&(adminPanelUsersActiveSetTime == 0))
		{
			adminPanelUsersActiveSetTime = 1;	

			setTimeout(function()
			{
				// console.log('hi');
				adminPanelUsersActiveSetTime = 0;
				setDataForAdminPageUserSearch()
				adminPanelFindUserRequestMatchFlag = 1;
			}, 1000)
		}
		// break;
	}

/*----------------------------------/ADMIN Page user Search helper functions------------------------------------------------*/

/*----------------------------------ADMIN Page user Search BOX Start------------------------------------------------*/
// Owner Madhuranga
// Don't change any thing with out inform owner of this functionalities
// find user Search box in admin page
// serch box typing event 
	function setDataForAdminPageUserSearch()
	{
		dataSentUrl = base_url+'index.php/user/searchUserDetails/';
		var formData = {
			// contentsType         : contentsType,
			// categoryType         : ''
			findUserSearchBox : $('#adminPanelFindUserSearch').val(),
			submitMode           : "ajax"
		};

		// Ajax funtion
		// get the content detials 
		jQuery.ajax({
			type		: 'POST',
			url			: dataSentUrl,
			async		: false,
			dataType	: 'JSON',
			data		: formData,
			success		: function (responce)
			{
				// get the all books type as JSON object
				// each Type has it's own JSON object
				if(responce.status!=='error')
				{
					adminPanelUsersSearchSourceData = [];
					for ( i = 0;  i<responce.users.length; i++)
					{
						adminPanelUsersSearchSourceData.push(responce.users[i]);
					};
				} // ENDIF()
				// when data getinng errror
				else
				{

				}
			}
				
		});


		if(adminPanelUsersSearchSourceData.length > 0)
		{
			// value resetter
			// adminPanelUsersSearchAllUsers = [];

			// Typeahead can't read JSON object and so get the Title and creat a 
			// Typeahead readable array
			for (var i = 0; i < adminPanelUsersSearchSourceData.length; i++)
			{
				// identify which table JSON object is this
				// This content table JSON object
				if(jQuery.type(adminPanelUsersSearchSourceData[i].userName)!=="undefined")
				{
					// Pussh the table name later identity
					adminPanelUsersSearchSourceData[i].tableName = "users";
					
					// get the title for display it's name can identity table fields
					userFullName = (capitalizeFirstLatter(adminPanelUsersSearchSourceData[i].firstName)+' '+capitalizeFirstLatter(adminPanelUsersSearchSourceData[i].lastName));
					// // userFullName = 'anoj';
					// console.log(userFullName);
					// var a = fruits.indexOf("Apple");
					if(adminPanelUsersSearchAllUsers.indexOf(userFullName)==(-1))
					{
						// console.log(userFullName)
						map[userFullName] = adminPanelUsersSearchSourceData[i];
						adminPanelUsersSearchAllUsers.push(userFullName)
					}
					else
					{
						// console.log('value equealed')
					}
				}
			}
		}

	}


	// alert('setDataForAdminPageUserSearch')
	$('#adminPanelFindUserSearch').typeahead({

		// get the Book names source from ajax
		source: function (query, process)
		{
			// console.log('hi');
			// console.log('source');


			// check JSON object is set
			if(adminPanelUsersSearchSourceData.length > 0)
			{
				
				// Displable titles push to typeahead process
				process(adminPanelUsersSearchAllUsers);

			} //END if()
		}
		// When click the selecter this @title Para give selected title
		,updater: function (title)
		{
			if(!jQuery.isEmptyObject(map))
			{
				// console.log(map)
				// when select the content clear the preview list
				$("#personalDetails").fadeOut();
				// console.log(map);
				if(jQuery.type(tableName = map[title].tableName)!=="undefined")
				{

					// get the current title's table name
					tableName = map[title].tableName;
					// When users table
					if (tableName==="users")
					{
						// alert('eContents table')
						// get user data per user name full detials
						userName = map[title].userName;
						$("#personalDetails").fadeOut();
						getUserDetailsRecordForAdminPageSearch(userName,"AdminPanelUserProfile");
					}
					// if want title want to change from current to new
					// get bellow title and add some text and return  new title value
					return title;
				}
			}
			else
			{
					return title;
				console.clear();
				console.log('---------------------------------------------------')
				console.log(map)
				$('.successMsages').removeClass('alert-success');
				$('.successMsages').addClass('alert-danger');
				$('.successMsages').slideDown();
				$('.successMsages').find('span').html("Please select a search listed book")
				$('.successMsages').delay('4000').slideUp();
			}

		}// AFUNEND updater ()

		// !import -- this function not want in the admin page
		// when typing the search bar drop down list showen list are the matcher's of the typing word's
		// @title para get the drop down list title one by one it should have return @title;
		// ,highlighter:function(title)
		// {
		// 	// when select the content clear the preview list
		// 	if(!jQuery.isEmptyObject(map))
		// 	{
		// 		// when select the content clear the preview list
		// 		$("#personalDetails").fadeOut();
		// 		// get the current title's table name
		// 		tableName = map[title].tableName;
		// 		// When users table
		// 		if (tableName==="users")
		// 		{
		// 			// alert('eContents table')
		// 			// get user data per user name full detials
		// 			userName = map[title].userName;
		// 			$("#personalDetails").fadeOut();
		// 			getUserDetailsRecordForAdminPageSearch(userName,"AdminPanelUserProfile");
		// 		}
		// 		// if want title want to change from current to new
		// 		// get bellow title and add some text and return  new title value
		// 		return title;
		// 	}
		// 	else
		// 	{
		// 		$('.successMsages').removeClass('alert-success');
		// 		$('.successMsages').addClass('alert-danger');
		// 		$('.successMsages').slideDown();
		// 		$('.successMsages').find('span').html("Please select a search listed book")
		// 		$('.successMsages').delay('4000').slideUp();
		// 	}
		// }

	});

	//Owner : Madhuranga Senadheera
	//cleaer the search result when empty
	$('#adminPanelFindUserSearch').keyup(function(e)
	{
		// console.log(e);
		// if (e.keyCode==8)
		if(($('#adminPanelFindUserSearch').val()).length == 0)
		{
			// clear the search resutl when coming new result
			$("#personalDetails").fadeOut('slow');
			$('#personalDetails').find('.userName').val('')
			// $('.personalDetails').html('');
		}
		else if((adminPanelFindUserRequestMatchFlag==1)&&($('#adminPanelFindUserSearch').val()).length !==0)
		{
			adminPanelFindUserRequestMatchFlag=0;
			adminPanelFindUserRequestMatchFlagReseter();

		}
		adminPanelFindUserSearchNodata = 0;
	});



// //Owner : Madhuranga Senadheera
// 	//cleaer the search result when empty
// 	$('#adminPanelFindContentSearch').bind('keyup', function(event)
// 	{
// 		// console.log(e);
// 		if (event.keyCode==13)
// 		{	
// 			searchBoxForGetPContentDetailForAdminPage(($(this).val()),"fullDetail");
// 			// clear the search resutl when coming new result
// 			// $('.adminPageSearchResutlPreviewMainContainer').html('');
// 			// $('.adminPageSearchResutlFullDetailsMainContainer').fadeOut('slow');	
// 			// $('.adminPageSearchResutlFullDetailsMainContainer').html('');
// 			// $('.adminPageSearchResutlFullDetailsMainContainer').addClass('hide');

// 		}
// 		else if (event.keyCode==8)
// 		{
// 			$(this).val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
// 	    	jQuery('#Res_IRcode').val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html('');	
// 		}

// 		else if (event.keyCode==27)
// 		{
// 			$(this).val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
// 	    	jQuery('#Res_IRcode').val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html('');	
// 		}
// 		else if(event.keyCode==46)
// 	    {
// 	    	$(this).val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
// 	    	jQuery('#Res_IRcode').val('');
// 	    	$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html('');
	    	
// 	    }
// 	});



	//clear values in Search content in admin panel
	/*$("#adminPanelFindContentSearch").on("focus",function(event)
	{
		$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut('slow');
		$(this).val("");

	});*/

/*---------------------------------ADMIN Page user Search BOX END--------------------------------------------------*/

/**********************************ADMIN Page END**********************************************************/


/*---------------------------------ADMIN Panel Barcode start------------------------------------------------*/


	$('#bookBarcodeValues').bind('keyup', function(event) {
	    if(event.keyCode==13)
	    {
	    	searchBoxForGetPContentDetailForAdminPage(($(this).val()),"fullDetail");
	    }
	    else if(event.keyCode==27)
	    {
	    	$(this).val('');
	    	$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
	    	jQuery('#Res_IRcode').val('');
	    	$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html('');	
	    	

	    }
	    else if(event.keyCode==46)
	    {
	    	$(this).val('');
	    	$('.adminPageSearchResutlFullDetailsMainContainer').fadeOut();
	    	jQuery('#Res_IRcode').val('');
	    	$('.adminPageSearchResutlFullDetailsMainContainer').find('tbody').html('');
	    	
	    }	
	});

/*---------------------------------ADMIN Panel Barcode end------------------------------------------------*/

}); // End document.ready() function


