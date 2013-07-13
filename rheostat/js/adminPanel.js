jQuery(document).ready(function(){


//setInterval(function(){ test();}, 3600000*24);
//setInterval(function(){ test();}, 10000);
//test();
// Globel varibale for searching 
	var searchString = [];


	$('#pendingReservatinList').find('tr').each(function()
	{
		$(this).find('.Content_title').html();
	});

	$('.Content_title').hover(function()
	{
		$(this).tooltip('toggle');
	});


$('#lendingList').dataTable();
$('#reservecontents').hide();
$('#overduecontents').hide();

jQuery('#reservedcontentlist').click(function(event)
{
    $('#reservecontents').show();
});

jQuery('#overduecontentlist').click(function(event)
{
    $('#overduecontents').show();
});
/*******************************Start makeReserveBook()**************************************/
//
//@var type :
//#return type :
	function makeReserveBook()
	{
		eContentId = 1;

		// get form data values
		var formData = {
			eContentId	: eContentId,
			submitMode  : "ajax"
		};
		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/makeReserveBook/';
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
				if(responce.status!="error")
				{

				}
				else
				{
					console.log(responce.msg);
				}
			}
		});

	}//Function End makeReserveBook()-------------------------------------------------FUNEND()


/*******************************Start makeReserveBook(confirmAdminReserve()**************************************/
//
//@var type :
//#return type :
	function confirmAdminReserve(eContentId,confirmType,reserveId,removebleRowId)
	{

		// get form data values
		var formData = {
			eContentId	: eContentId,
			reserveId 	: reserveId,
			confirmType : confirmType,
			submitMode  : "ajax"
		};
		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/confirmationOfPendingRervedRquestList/';
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
				if(responce.status==="success")
				{
					// Remove pending reqeust from interface
					// alert(removebleRowId)
					$('#'+removebleRowId).remove();
					if($('#pendingReservatinList tbody').find('tr').length==0)
					{
						$('#pendingReservatinList').remove();						
						$('#pendingReservatinListContainer').append('<p class=" label label-info">No pending reservations.</p>');
					}

					$('.successMsages').removeClass('alert-danger');
					$('.successMsages').addClass('alert-success');
					$('.successMsages span').html(responce.msg);
					$('.successMsages').slideDown();
					$(document).scrollTop(0);
					$('.successMsages').delay(4000).slideUp();
                                        if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}

				}
				else
				{
					$('.successMsages').removeClass('alert-success');
					$('.successMsages').addClass('alert-danger');
					$('.successMsages').slideDown();
					$('.successMsages span').html(responce.msg);
					$(document).scrollTop(0);
					$('.successMsages').delay(4000).slideUp();
                                        if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
				}
			}
		});

	}//Function End confirmAdminReserve()-------------------------------------------------FUNEND()


/*******************************Start userMakeReserveBook()**************************************/
//
//Normal user 
//#return type :
	function userMakeReserveBook(eContentId)
	{

		// get form data values
		var formData = {
			eContentId	: eContentId,
			submitMode  : "ajax"
		};
		// create data sent url
		dataSentUrl = base_url+'index.php/manageContent/userMakeReservation/';
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
					// alert(responce.msg)
					$('.MsagesForReservation').removeClass('alert-success');
					$('.MsagesForReservation').addClass('alert-danger');
					$('.MsagesForReservation').slideDown();
					$('.MsagesForReservation span').html(responce.msg);
					$(document).scrollTop(0);
					$('.MsagesForReservation').delay(4000).slideUp();// alert(responce.msg)
                                        if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}

				}
				if(responce.status=="noLogin")
				{
					$('#loginPopup').modal();
				}
				else
				{
					if (responce.status=="success")
					{
						// alert(responce.msg)
						$('.MsagesForReservation').removeClass('alert-danger');
						$('.MsagesForReservation').addClass('alert-success');
						$('.MsagesForReservation').slideDown();
						$('.MsagesForReservation span').html(responce.msg);
						$(document).scrollTop(0);
						$('.MsagesForReservation').delay(4000).slideUp();
                                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}

					}
					// else
					// {

					// 	// alert(responce.msg)
					// 	$('.MsagesForReservation').addClass('alert-danger');						
					// 	$('.MsagesForReservation').slideDown();
					// 	$('.MsagesForReservation span').html(responce.msg);
					// 	$(document).scrollTop(0);
					// 	$('.MsagesForReservation').delay(4000).slideUp();
					// }
				}
			}
		});

	}//Function End userMakeReserveBook()-------------------------------------------------FUNEND()




/*******************************Start makeLendingBook()**************************************/
//
//@var type :
//#return type :

function makeLendingBook(userName,contentName,lendDate,lendDueDate,ISBN,contentId)
{
	// var contentId    = contentName.split("|");
	// var pureContenId = contentId;

	// // var userName     = userName.split("|");
	// var userName     = userName;   

	var contentData = {
		UserName:userName,
		ContentName:contentName,
		LendDate:lendDate,
		LendDueDate:lendDueDate,
		ISBNNumber:ISBN,
		PureContenId:contentId,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/makeLendingBook/';
	//alert("hello");

	jQuery.ajax({

		type: 'POST',
		url: dataUrl,
		data:contentData,
		success :function(responce)
		{
			//alert(responce);
			if (responce == 1)
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-success');
				$('.successMsages .successMsagesContainer').html('Lending successfully completed.');
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
			else
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-error');
				$('.successMsages .successMsagesContainer').html(responce);
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
			
		}
	});
}

// /*******************************Start Function getUserDetails()**************************************/
// // some Searching for auto complete funtionality
// //@var type :
// //#return type :
// 	function getContentDetails(searchValue)
// 	{
// 		// get form data values
// 		var formData = {
// 			findContentSearchBox	:searchValue,
// 			submitMode				: "ajax"};


// 		// create data sent url
// 		dataSentUrl = base_url+'manageContent/searchContentDetails/';
// 		//alert(dataSentUrl);

// 		// Ajax funtion
// 		jQuery.ajax({
// 			type		: 'POST',
// 			url			: dataSentUrl,
// 			dataType	: 'json',
// 			data		: formData,
// 			success		: function (responce)
// 			{
// 				if(responce.status!="error")
// 				{
// 					// alert(responce.status);
// 					// alert(responce.msg);
// 					// get user list 
// 					contentDetailsListArray= [];
// 					for (var i = 0; i < responce.eContents.length; i++)
// 					{
// 						// contentDetailsListArray[contentDetailsListArray.length]=responce.eContents[i]['contentId']+"\n "+responce.eContents[i]['title']+"\n "+responce.eContents[i]['author']+"\n "+responce.eContents[i]['publisher']+"\n "+responce.eContents[i]['price']+"\n "+responce.eContents[i]['registeredTime']+"\n "+responce.eContents[i]['description']+"\n "+responce.eContents[i]['edition']+"\n "+responce.eContents[i]['ISBN']+"\n "+responce.eContents[i]['contentType'];
// 						// alert(responce.eContents[i]['contentId']+"\n "+responce.eContents[i]['title']+"\n "+responce.eContents[i]['author']+"\n "+responce.eContents[i]['publisher']+"\n "+responce.eContents[i]['price']+"\n "+responce.eContents[i]['registeredTime']+"\n "+responce.eContents[i]['description']+"\n "+responce.eContents[i]['edition']+"\n "+responce.eContents[i]['ISBN']+"\n "+responce.eContents[i]['contentType']);
// 						contentDetailsListArray[contentDetailsListArray.length]=responce.eContents[i]['title'];
// 					}
// 					// alert(contentDetailsListArray);
// 					setSearchString(contentDetailsListArray);
// 				}
// 				else
// 				{
// 					jQuery('#dataSearch').html('No more records Found');
// 				}
// 			}
// 		});

// 	}//Function End getUserDetails()---------------------------------------------------FUNEND()



/*******************************Start Function getUserDetails()**************************************/
// some Searching for auto complete funtionality
//@var type :
//#return type :
	function getUserDetails(searchValue)
	{
		// get form data values
		var formData = {
			findUserSearchBox	:searchValue,
			submitMode			: "ajax"
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


/*******************************setNameString()**************************************/
	//	update nameString globale varibale
	//@var type :
	//#return type :
	function setSearchString(values)
	{
		// console.log(values);
		searchString = values;

	}//Function End setNameString()-------------------------------------------FUNEND()

/*******************************getNameString()**************************************/
	//	update nameString globale varibale
	//@var type :
	//#return type :
	function getSearchString()
	{
		// alert("nget :"+ myCars);
		return searchString;


	}//Function End getNameString()-------------------------------------------FUNEND()



/*******************************Start Function callers()************************************/
	//make reservation using ajax
	jQuery('#popupReservationMsgBoxBTN').click(function()
	{
			makeReserveBook();
	});
	//make reservation using ajax
	jQuery('#makeLendingBookBTN').click(function(event)
	{		

		event.preventDefault();
		
		if (jQuery.type($('.userDiscriptionDetails').find('.userName').val()) === "undefined")
		{
			var userName = "";
			
		}
		else
		{
			var userName     = $('.userDiscriptionDetails').find('.userName').val();			
		}					
		if (jQuery.type($('.adminPageSearchResutlFullDetailsMainContainer').find('.contentId').val()) === "undefined")
		{
			var contentId = "";
		}
		else
		{

			var contentId    = $('.adminPageSearchResutlFullDetailsMainContainer').find('.contentId').val();
		}

			var contentName  = $('#adminPanelFindContentSearch').val();			
			var lendDate     = $('#Con_Lending').val();
			var lendDueDate  = $('#Con_Lending_Due').val();
			var ISBN         = $('#Res_IRcode').val();
			var todayDate = $('#hiddenCurrentDate').val();

			returnmessage = validateFunction(userName,contentName,lendDate,lendDueDate,todayDate);				
		

		if(returnmessage == "1")
		{				
			makeLendingBook(userName,contentName,lendDate,lendDueDate,ISBN,contentId);
                        if(window.top==window)
                        {
                            // you're not in a frame so you reload the site
                            window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                        }
			/*if (lendDate < todayDate) 					
			{			
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-error');
				$('.successMsages .successMsagesContainer').html("Lend date should be greater than today date.");
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
				
				if(lendDueDate < todayDate)	
				{			
					$('.successMsages').slideDown();
					$('.successMsages').addClass('alert-error');
					$('.successMsages .successMsagesContainer').html("Lend due date should be greater than today date.");
					$(document).scrollTop(0);
					$('.successMsages').delay(4000).slideUp();
				}
			}*/
			/*else
			{
				// makeLendingBook(userName,contentName,lendDate,lendDueDate,ISBN,contentId)
				makeLendingBook(userName,contentName,lendDate,lendDueDate,ISBN,contentId);
			}*/
		}
		else
		{

			//alert(returnmessage);
			$('.successMsages').slideDown();
			$('.successMsages').addClass('alert-error');
			$('.successMsages .successMsagesContainer').html(returnmessage);
			$(document).scrollTop(0);
			$('.successMsages').delay(4000).slideUp();
                        if(window.top==window)
                        {
                            // you're not in a frame so you reload the site
                            window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                        }
		}
	});

	//make reservation using ajax
	jQuery(document).on('click','.userMakeReserveBook', function(event)
	{

		//to do resavatiuon on spacific search on catagry page
		if (jQuery.type($(this).closest('.eachPbook').find('.contentId').val())!=="undefined")
		{

			contentId = $(this).closest('.eachPbook').find('.contentId').val();
			userMakeReserveBook(contentId);

		}
		//to do resavatiuon on listall on catagry page
		else if(jQuery.type($(this).closest('tr').find('.contentId').val())!=="undefined")
		{
			contentId = $(this).closest('tr').find('.contentId').val();
			// alert(contentId)
			userMakeReserveBook(contentId);

		}

	});

	// Ajax auto complete content Details (Search content)
	jQuery('#findContentSearchBox').keypress(function(event)
	{
		getContentDetails($(this).val());
	});

	// serch box typing event 
	jQuery('#findContentSearchBox').typeahead({
		// note that "value" is the default setting for the property option
		// source: [{value: 'Charlie'}, {value: 'Gudbergur'}],
		source: getSearchString
	});

	// Ajax auto complete content Details (Search content)
	jQuery('#lendingResourceName').keypress(function(event)
	{
		//alert('keyu re')
		getContentDetails($(this).val());
	});

	// serch box typing event 
	jQuery('#lendingResourceName').typeahead({
		// note that "value" is the default setting for the property option
		// source: [{value: 'Charlie'}, {value: 'Gudbergur'}],
		source: getSearchString
	});

	// Ajax auto complete user Details (Search user)
	jQuery('#lendingUserName').keypress(function(event)
	{
		// alert('keyu re')
		getUserDetails($(this).val());
	});

	// serch box typing event 
	jQuery('#lendingUserName').typeahead({
		// note that "value" is the default setting for the property option
		// source: [{value: 'Charlie'}, {value: 'Gudbergur'}],
		source: getSearchString
	});

	// Admin accept reservation trigger
	jQuery('.pendingReservationAccept').click(function()
	{
		var contentId = $(this).closest('tr').find('.Content_id').val();
		var reserveId = $(this).closest('tr').find('.Reserve_id').val();
		var removebleRowId =  $(this).closest('tr').attr('id');
		confirmAdminReserve(contentId,'Accept',reserveId,removebleRowId);


	});

	/*$('#makeEditableFeldsofLending').click(function ()
	{
		$(this).removeClass('makeDisabledFelds');
		$("#editLend_content_return_date").datepicker();
	})*/

	jQuery(document).on('click','.CloseLend', function(event)
	{
		var lendId = $(this).closest('tr').find('td:first-child').html();				
		closeLendings(lendId);
	});
	// Edit the Content in book profile
	jQuery(document).on('click','.CloseLend-edit', function(event)
	{
		hiddenLendID = $('#hiddenLendID').val();				
		saveEditedLendDetails(hiddenLendID);
                if(window.top==window)
                {
                    // you're not in a frame so you reload the site
                    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                }

	});
	
	jQuery(document).on('click','.CloseReserve', function(event)
	{
           
		var reserveId = $(this).closest('tr').find('td:first-child').html();				
		closeReservings(reserveId);
	});
	// Edit the Content in book profile
	jQuery(document).on('click','.CloseReserve-edit', function(event)
	{
		hiddenReserveID = $('#hiddenReserveID').val();				
		saveEditedReserveDetails(hiddenReserveID);

		if(window.top==window) {
		    // you're not in a frame so you reload the site
		    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
		} else {
		    //you're inside a frame, so you stop reloading
		}

	});
        
        jQuery(document).on('click','.editFine', function(event)
	{            
                event.preventDefault();
		var fineId = $(this).closest('tr').find('.getfineid').val();				
                editFine(fineId);
	});
        
        jQuery(document).on('click','.editFine-edit', function(event)
	{            
                event.preventDefault();
		var fineId = $('#editFine_Fine_id').val();				
                saveEditedFineDetails(fineId);
                if(window.top==window) 
                {
                    // you're not in a frame so you reload the site
                    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                }
                else
                {

                }
	});
        
        
	// Cancel reservation 
	jQuery('.pendingReservationIgnore').click(function()
	{
		var contentId = $(this).closest('tr').find('.Content_id').val();
		var reserveId = $(this).closest('tr').find('.Reserve_id').val();
		var removebleRowId =  $(this).closest('tr').attr('id');
		confirmAdminReserve(contentId,'Cancel',reserveId,removebleRowId)


	});
	//display text box on click edit, on editing user
	$('#makeEditableFeldsofLending').click(function ()
	{
		$('.manageContent-edit').css( "visibility", "visible" );
		$('.btn').css( "visibility", "visible" );
		$('.disabledFeald').removeAttr('disabled');		
	});
/*******************************End Function callers()**************************************/
}); // ENd of document ready function
function validateFunction(userName,contentName,lendDate,lendDueDate,todayDate)
{
	var successMessage = null;
	var errormessage1  = "Please enter the Details!";
	var errormessage2  = "Content name, Lend date, Lend due date cannot be null!";
	var errormessage3  = "User name, Lend date & Lend due date cannot be null!";
	var errormessage4  = "User name, Content name, Lend due date cannot be null!";
	var errormessage5  = "User name, Content name, Lend date cannot be null!";
	var errormessage6  = "Lend date & Lend due date cannot be null!";
	var errormessage7  = "User name & Content name cannot be null!";
	var errormessage8  = "Please enter the User name!";
	var errormessage9  = "Please enter the Content name!";
	var errormessage10 = "Please enter the Lend date!";
	var errormessage11 = "Please enter the Lend due date!";
	var errormessage12 = "Lend due date should be greater than lend date!";
	var errormessage13 = "Lend due date should be greater than today date!";
	var errormessage14 = "Content Name and Lend due date cannot be null!";
	var errormessage15 = "Lend Date should be greater than today date!";

	if((userName != '') && (contentName != '') && (lendDate != '') && (lendDueDate != ''))
	{
		if(lendDate > lendDueDate)
		{
			successMessage = errormessage12;	

		}
		else
		{
			successMessage = '1';
		}
	}
	else
	{
		if(userName == '' && contentName == '' && lendDate == '' && lendDueDate == '')
		{
			successMessage = errormessage1;
		}
		else
			{
				if((lendDueDate == '') && (contentName == '') && (lendDate == ''))
				{
					successMessage = errormessage2;
				}
				else
				{
					if((userName == '') && (lendDueDate == '') && (lendDate == ''))
					{
						successMessage = errormessage3;
					}
					else
					{
						if((userName == '') && (contentName == '') && (lendDueDate == ''))
						{
							successMessage = errormessage4;
						}
						else
						{
							if((userName == '') && (contentName == '') && (lendDate == ''))
							{
								successMessage = errormessage5;
							}
							else
							{
								if((lendDueDate == '') && (lendDate == ''))
								{
									successMessage = errormessage6;
								}
								else
								{
									if((userName == '') && (contentName == ''))
									{										
										successMessage = errormessage7;
									}	
									else
									{
										if(userName == '')
										{
											successMessage = errormessage8;
										}
										else
										{
											if(contentName == '' && lendDueDate == '')
											{
												successMessage = errormessage14;
											}
											else
											{

												if(contentName == '')
												{
													successMessage = errormessage9;
												}
												else
												{
													if(lendDate == '')
													{
														successMessage = errormessage10;
													}
													else
													{
														if(lendDueDate == '')
														{
															successMessage = errormessage11;
														}
														else
														{
															if(lendDate > lendDueDate)
															{
																successMessage = errormessage12;		
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
	}

	return (successMessage);
}


function test()
{
	var dataSet = {
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/checkLendDueDate/';

	// Ajax funtion
	jQuery.ajax({
		type: 'POST',
		url: dataUrl,		
		data: dataSet,
		success: function (responce)
		{
			//alert(responce);
		}
	});
}

// /*******************************Start userMakeReserveBook()**************************************/
// //
// //Normal user 
// //#return type :
// 	function userMakeReserveBook(eContentId)
// 	{

// 		// get form data values
// 		var formData = {
// 			eContentId	: eContentId,
// 			submitMode  : "ajax"
// 		};
// 		// create data sent url
// 		dataSentUrl = base_url+'manageContent/userMakeReservation/';
// 		// alert(dataSentUrl);

// 		// Ajax funtion
// 		jQuery.ajax({
// 			type			: 'POST',
// 			url				: dataSentUrl,
// 			dataType		: 'json',
// 			data			: formData,
// 			success  : function (responce, status)
// 			{
// 				// alert('got responce');
// 				if(responce.status=="error")
// 				{
// 					// alert(responce.msg)
// 					$('.MsagesForReservation').addClass('alert-danger');						
// 					$('.MsagesForReservation').slideDown();
// 					$('.MsagesForReservation span').html(responce.msg);
// 					$(document).scrollTop(0);
// 					$('.MsagesForReservation').delay(4000).slideUp();

// 				}
// 				if(responce.status=="noLogin")
// 				{
// 					$('#loginPopup').modal();
// 				}
// 				else
// 				{
// 					if (responce.status=="success")
// 					{
// 						// alert(responce.msg)
// 						$('.MsagesForReservation').addClass('alert-success');
// 						$('.MsagesForReservation').slideDown();
// 						$('.MsagesForReservation span').html(responce.msg);
// 						$(document).scrollTop(0);
// 						$('.MsagesForReservation').delay(4000).slideUp();

// 					}
// 					else
// 					{

// 						// alert(responce.msg)
// 						$('.MsagesForReservation').addClass('alert-danger');						
// 						$('.MsagesForReservation').slideDown();
// 						$('.MsagesForReservation span').html(responce.msg);
// 						$(document).scrollTop(0);
// 						$('.MsagesForReservation').delay(4000).slideUp();
// 					}
// 				}
// 			}
// 		});

// 	}//Function End userMakeReserveBook()-------------------------------------------------FUNEND()

function closeLendings(lendId)
{
	
	var lendID = lendId;

	var dataSet = {
		LendId: lendID,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/closeLends/';

	//Ajax function
	jQuery.ajax({
		type: 'POST',
		url : dataUrl,
		dataType : 'json',
		data: dataSet,
		success: function(responce)
		{
			var currentDate = $('#currentDate').val();
			for (var i = 0; i < responce.eContents.length; i++)
			{
				contenTable = 
				'<tr>\n\
					<td>User Name</td>\n\
					<td><input type="text" disabled id="editLend_User_name" value="'+responce.eContents[i].User_name+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Content ID</td>\n\
					<td><input type="text" disabled id="editLend_Content_id" value="'+responce.eContents[i].Content_id+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Lend Date</td>\n\
					<td><input type="text" disabled id="editLend_Lend_date" value="'+responce.eContents[i].Lend_date+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Lend Due Date</td>\n\
					<td><input type="text"  id="editLend_Lend_due_date" value="'+responce.eContents[i].Lend_due_date+'" ></td>\n\
			    </tr>\n\
			    <tr>\n\
			    	<td>Content Return Date</td>\n\
			    	<td><input type="text" id="editLend_content_return_date" value="'+currentDate+'"></td>\n\
			    </tr>\n\
			    <tr>\n\
			    	<td>Status</td>\n\
			    	<td>\n\
                        <select id="a_editLend_Lend_status">\n\
                                <option value="Open">Open</option>\n\
                                <option value="Closed">Closed</option>\n\
                        </select>\n\
                    </td>\n\
			    </tr>';			    
				$('#viewLendDetails table').find('tbody').html(contenTable);
                                $('#viewMainLendingDetails').modal('show');
				$('#hiddenLendID').val(responce.eContents[i].Lend_id);				   
			}
		}
	});
}


function closeReservings(reserveId)
{
	
	var reserveId = reserveId;

	var dataSet = {
		ReserveId: reserveId,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/closeReserve/';

	//Ajax function
	jQuery.ajax({
		type: 'POST',
		url : dataUrl,
		dataType : 'json',
		data: dataSet,
		success: function(responce)
		{
                   
			var dt = new Date();
			var todayDate = (dt.getFullYear() + "-" + (dt.getMonth() + 1)+"-" + dt.getDate());

			for (var i = 0; i < responce.reserve.length; i++)
			{
				contenTable = 
				'<tr>\n\
					<td>User Name</td>\n\
					<td><input type="text" disabled id="editReserve_User_name" value="'+responce.reserve[i].User_name+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Content ID</td>\n\
					<td><input type="text" disabled id="editReserve_Content_id" value="'+responce.reserve[i].Content_id+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Reserved Date</td>\n\
					<td><input type="text" disabled id="editReserve_Reserved_date" value="'+responce.reserve[i].Reserved_date+'" ></td>\n\
				</tr>\n\
				<tr>\n\
					<td>Expiration Date</td>\n\
					<td><input type="text" id="editReserve_Reserve_expiration_date" value="'+responce.reserve[i].Reserve_expiration_date+'" ></td>\n\
			    </tr>\n\
			    <tr>\n\
			    	<td>Status</td>\n\
			    	<td>\n\
                        <select id="a_editReserve_Reserve_status">\n\
                                <option value="R">Reserved</option>\n\
                                <option value="Lended">Closed</option>\n\
                        </select>\n\
                    </td>\n\
			    </tr>';			    
				$('#viewReserveDetails table').find('tbody').html(contenTable);
                                $('#viewMainReservingDetails').modal('show');
				$('#hiddenReserveID').val(responce.reserve[i].Reserve_id);				   
			}
		}
	});
}

function editFine(fineId)
{
	
	var fineId = fineId;

	var dataSet = {
		FineId: fineId,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/editContentFine/';

	//Ajax function
	jQuery.ajax({
		type: 'POST',
		url : dataUrl,
		dataType : 'json',
		data: dataSet,
		success: function(responce)
		{
                    for (var i = 0; i < responce.eContents.length; i++)
                    {
                        var currentDate = $('#currentDate').val();
                        
                            contenTable = 
                            '<tr>\n\
                                    <td>Fine Id</td>\n\
                                    <td><input type="text"  disabled id="editFine_Fine_id" value="'+responce.eContents[i].Fine_id+'" ></td>\n\
                            </tr>\n\
                            <tr>\n\
                                    <td>Description</td>\n\
                                    <td><input type="text"  disabled id="editFine_Description" value="'+responce.eContents[i].Description+'" ></td>\n\
                            </tr>\n\
                            <tr>\n\
                                    <td>Total Amount</td>\n\
                                    <td><input type="text" disabled id="editFine_Total_amount" value="'+responce.eContents[i].Total_amount+'" ></td>\n\
                            </tr>\n\
                            <tr>\n\
                                    <td>Comments</td>\n\
                                    <td><input type="text" id="editFine_Comments" value="'+responce.eContents[i].Comments+'" ></td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td>Lend Id</td>\n\
                            <td><input type="text" disabled id="editFine_Lend_id" value="'+responce.eContents[i].Lend_id+'"></td>\n\
                        </tr>\n\\n\
                        <tr>\n\
                            <td>Due Date</td>\n\
                            <td><input type="text" id="editFine_Due_date" value="'+responce.eContents[i].Due_date+'"></td>\n\
                        </tr>\n\\n\
                        <tr>\n\
                            <td>Date Paid</td>\n\
                            <td><input type="text" id="editFine_Date_paid" value="'+currentDate+'"></td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td>Fine Status</td>\n\
                            <td>\n\
                    <select id="a_editFine_Fine_status">\n\
                            <option value="Open">Open</option>\n\
                            <option value="Closed">Closed</option>\n\
                    </select>\n\
                </td>\n\
                        </tr>';			    
                            $('#viewFineDetails table').find('tbody').html(contenTable);
                            $('#viewMainOverdueDetails').modal('show');
                            //$('#hiddenLendID').val(responce.eContents[i].Lend_id);				   
                    }
		}
	});
}

	// // make reservation using ajax
	// jQuery(document).on('click','.userMakeReserveBook', function(event)
	// {
	// 	alert('hi')
	// 	contentId = $('.contentId').val();
	// 	// alert(contentId)
	// 	userMakeReserveBook(contentId);
	// });


function saveEditedLendDetails(hiddenLendID)
{
	var hiddenLendID          = hiddenLendID;
	var userName              = jQuery('#editLend_User_name').val();
	var contentId             = jQuery('#editLend_Content_id').val();
	var lendDate              = jQuery('#editLend_Lend_date').val();
	var lendDueDate           = jQuery('#editLend_Lend_due_date').val();
	var contentReturnDate     = jQuery('#editLend_content_return_date').val();
	var lendStatus            = jQuery('#a_editLend_Lend_status').val();		

	var dataSet = {		
		HiddenLendId : hiddenLendID,
		UserName     : userName,
	    ContentID    : contentId,
	    LendDate     : lendDate,
	    LendDueDate  : lendDueDate,
	    ReturnDate   : contentReturnDate,
	    LendStatus   : lendStatus,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/saveEditedLendDetails/';

	jQuery.ajax({
		type: 'POST',
		url : dataUrl,		
		data: dataSet,
		success: function(responce)
		{
			//alert(responce);
			if (responce == 1)
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-success');
				$('.successMsages .successMsagesContainer').html('Lending successfully edited.');
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
			else
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-error');
				$('.successMsages .successMsagesContainer').html(responce);
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
		}
	});
}

function saveEditedReserveDetails(hiddenReserveID)
{
     
	var hiddenReserveID       = hiddenReserveID;
	var userName              = jQuery('#editReserve_User_name').val();
	var contentId             = jQuery('#editReserve_Content_id').val();
	var reserveDate              = jQuery('#editReserve_Reserved_date').val();
	var reserveDueDate           = jQuery('#editReserve_Reserve_expiration_date').val();
	var reserveStatus            = jQuery('#a_editReserve_Reserve_status').val();		
        
        
        if(reserveStatus == 'Reserved')
            {
                reserveStatus ='R';
            }
	var dataSet = {		
		HiddenReserveId : hiddenReserveID,
		UserName     : userName,
	    ContentID    : contentId,
	    ReserveDate     : reserveDate,
	    ReserveDueDate  : reserveDueDate,
	    ReserveStatus   : reserveStatus,
		submitMode: "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/saveEditedReserveDetails/';

	jQuery.ajax({
		type: 'POST',
		url : dataUrl,		
		data: dataSet,
		success: function(responce)
		{
                    
			if (responce == 'true')
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-success');
				$('.successMsages .successMsagesContainer').html('Updates Reservation Details');
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
			else
			{
				$('.successMsages').slideDown();
				$('.successMsages').addClass('alert-error');
				$('.successMsages .successMsagesContainer').html(responce);
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                                if(window.top==window) {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
					}
			}
		}
	});
}

function saveEditedFineDetails(fineId)
{
      
	var fineID                = fineId;		
	var comments              = jQuery('#editFine_Comments').val();
	var dueDate               = jQuery('#editFine_Due_date').val();
	var datePaid              = jQuery('#editFine_Date_paid').val();
        var fineStatus            = jQuery('#a_editFine_Fine_status').val();
        
	var dataSet = {		
		FineId      : fineID,
		Comments    : comments,
	        DueDate     : dueDate,
	        DatePaid    : datePaid,
	        FineStatus  : fineStatus,	    
	        submitMode  : "ajax"
	};

	var dataUrl = base_url+'index.php/manageContent/saveEditedFineDetails/';

	jQuery.ajax({
		type: 'POST',
		url : dataUrl,		
		data: dataSet,
		success: function(responce)
		{
                    
                    if (responce == '1')
                    {
                            $('.successMsages').slideDown();
                            $('.successMsages').addClass('alert-success');
                            $('.successMsages .successMsagesContainer').html('Fine Sucessfully Closed');
                            $(document).scrollTop(0);
                            $('.successMsages').delay(4000).slideUp();                            
                    }
                    else
                    {
                            $('.successMsages').slideDown();
                            $('.successMsages').addClass('alert-error');
                            $('.successMsages .successMsagesContainer').html(responce);
                            $(document).scrollTop(0);
                            $('.successMsages').delay(4000).slideUp();                            
                    }
		}
	});
}



// recept print for overdue lending
$('#adminpanelPrintReceptForOverDueLending').on('click',function()
{

	tableContainer =("<tr>"+
					    "<td>Fine Id</td>"+
					    "<td>"+$('#editFine_Fine_id').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Description</td>"+
					    "<td>"+$('#editFine_Description').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Total Amount</td>"+
					    "<td>"+$('#editFine_Total_amount').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Comments</td>"+
					    "<td>"+$('#editFine_Comments').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Lend Id</td>"+
					    "<td>"+$('#editFine_Lend_id').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Due Date</td>"+
					    "<td>"+$('#editFine_Due_date').val()+"</td>"+
					"</tr>"+
					"<tr>"+
					    "<td>Date Paid</td>"+
					    "<td>"+$('#editFine_Date_paid').val()+"</td>"+
					"</tr>");

	$('.printTemplateForLendingOverDue').find('table').find('tbody').html(tableContainer);

	$('.printTemplateForLendingOverDue').print();

})
