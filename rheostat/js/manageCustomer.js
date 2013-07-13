jQuery(document).ready(function($)
{
        //date pickers
	$('#Cus_visitedDate').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){$('#Cus_visitedDate').datepicker('hide')});
        
	//change password msg from user
	$('.passwordChange').delay(4000).slideUp();

	// get base url from interface (footer.php)
	base_url = jQuery('#base_url').val();

	//Create cancel button
$('#cancelCreateCustomer').click(function(e)
	{
		e.preventDefault();

			jQuery('#Cus_title').val(''),
			jQuery('#Cus_firstname').val('');
			jQuery('#Cus_lastName').val('');
			jQuery('#Cus_nicNumber').val('');
			jQuery('#Cus_Gender').val(''),
			jQuery('#Cus_address1').val('');
			jQuery('#Cus_address2').val('');
			jQuery('#Cus_telNumber1').val('');
			jQuery('#Cus_telNumber2').val('');
			jQuery('#Cus_telNumber3').val('');
			jQuery('#Cus_email').val('');
			
	});


	// render the table
$('#OP_adimnContentDetails').dataTable();


/*************************Start Function capitalizeFirstLatter()***********************************/
//Owner : Anoj Saranga
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



    /************************************ createCustomer()*******************************************/
    // Ajax form submit from CustomerManagement view, create member
    //@ type : 
    //#return type : alert when error occuring
    function createCustomer() 
    {            
        telephoneNumber1 = jQuery('#Cus_telNumber1').val();
        telephoneNumber2 = jQuery('#Cus_telNumber2').val();
        telephoneNumber3 = jQuery('#Cus_telNumber3').val();

        if(telephoneNumber1.charAt(0) == "0")
        {
           telephoneNumber1 = jQuery('#Cus_telNumber1').val().substring(1);
        }
        else
        {
                telephoneNumber1 = jQuery('#Cus_telNumber1').val();
        }

        if(telephoneNumber2.charAt(0) == "0")
            {
                    telephoneNumber2 = jQuery('#Cus_telNumber2').val().substring(1);
            }
            else
            {
                    telephoneNumber2 = jQuery('#Cus_telNumber2').val();
            }

            if(telephoneNumber3.charAt(0) == "0")
            {
                    telephoneNumber3 = jQuery('#Cus_telNumber3').val().substring(1);
            }
            else
            {
                    telephoneNumber3 = jQuery('#Cus_telNumber3').val();
            }


            // get form data values
            var formData = {
                    title	:jQuery('#Cus_title').val(),
                    firstName   :jQuery('#Cus_firstname').val(),
                    lastName	:jQuery('#Cus_lastName').val(),
                    nicNumber	:jQuery('#Cus_nicNumber').val(),
                    gender	:jQuery('#Cus_Gender').val(),
                    address1	:jQuery('#Cus_address1').val(),
                    address2	:jQuery('#Cus_address2').val(),
                    telNumber1	:telephoneNumber1,
                    telNumber2	:telephoneNumber2,
                    telNumber3	:telephoneNumber3,						
                    email	:jQuery('#Cus_email').val(),
                    RegDate	:jQuery('#Cus_visitedDate').val(),
                    submitMode 	: "ajax"
            };


            // create data sent url
            dataSentUrl = base_url+'index.php/manageCustomer/create/';
            // alert(dataSentUrl);
            // Ajax funtion
            jQuery.ajaxFileUpload({
                    url				: dataSentUrl,
                    secureuri		: false,
                    fileElementId	: 'Image_path',
                    dataType		: 'json',
                    data			: formData,
                    success  : function (responce, status)
                    {
                            if(responce.status!="error")
                            {

                                    $('.successMsages').slideDown();
                                    $('.successMsages span').html('User has successfully added.');
                                    $(document).scrollTop(0);
                                    $('.successMsages').delay(4000).slideUp();


                                    jQuery('#Cus_title').val(''),
                                    jQuery('#Cus_firstname').val('');
                                    jQuery('#Cus_lastName').val('');
                                    jQuery('#Cus_nicNumber').val('');
                                    jQuery('#Cus_Gender').val(''),
                                    jQuery('#Cus_address1').val('');
                                    jQuery('#Cus_address2').val('');
                                    jQuery('#Cus_telNumber1').val('');
                                    jQuery('#Cus_telNumber2').val('');
                                    jQuery('#Cus_telNumber3').val('');
                                    jQuery('#Cus_email').val('');
                                    if(window.top==window)
                                    {
                                                        // you're not in a frame so you reload the site
                                                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                                    }
                            }
                            else
                            {
                                $('.successMsages').slideDown();
				$('.successMsages').addClass('alert-error');
				$('.successMsages span').html(responce.msg);
				$(document).scrollTop(0);
				$('.successMsages').delay(4000).slideUp();
                            }
                    }
            });
    }//Function End createUser()------------------------------------------------------FUNEND



/*******************************Start Function getAllDetailsForSpecificCustomer()**************************************/
// get customer detail for edit using pop dialog box
//#return type :
	function getAllDetailsForSpecificCustomer(NICNumber)
	{
		// get form data values
		var formData = {
			NicNumber   : NICNumber,
			submitMode  : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/manageCustomer/getAllDetailsForSpecificCustomer/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
                            //console.log(responce.customerDetail);
				if(responce.status!="error")
				{
					editCustomerDetailsPopDetails ='\
                                        <tr>\n\
                                            <td> Title </td>\n\
                                            <td><input type="hidden" id="Customer_id" value="'+responce.customerDetail.Customer_id+'"/><input type="text" disabled class="disabledFeald" id="customerEdit_Title" value="'+responce.customerDetail.Title+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> First Name </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_First_name" value="'+capitalizeFirstLatter(responce.customerDetail.First_name)+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> Last Name </td>\n\
                                                <td><input type="text" disabled class="disabledFeald" id="customerEdit_Last_name" value="'+capitalizeFirstLatter(responce.customerDetail.Last_name)+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> NIC No </td>\n\
                                                <td><input type="text" disabled class="disabledFeald" id="customerEdit_NIC_No" value="'+responce.customerDetail.NIC_no+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> Gender </td>\n\
                                                <td><input type="text" disabled class="disabledFeald" id="customerEdit_Gender" value="'+responce.customerDetail.Gender+'" > </td> </tr>'+
                                        '<tr>\n\
                                            <td> Address1 </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Address1" value="'+capitalizeFirstLatter(responce.customerDetail.Address1)+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> Address2 </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Address2" value="'+capitalizeFirstLatter(responce.customerDetail.Address2)+'" > </td> </tr>'+
                                        '<tr>\n\
                                            <td> Email </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Email" value="'+responce.customerDetail.Email+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> Contact No1 </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Contact_No1" value="'+responce.customerDetail.Contact_no1+'" > </td> </tr>'+
                                        '<tr>\n\
                                                <td> Contact No2 </td>\n\
                                                <td><input type="text" disabled class="disabledFeald" id="customerEdit_Contact_No2" value="'+responce.customerDetail.Contact_no2+'" > </td> </tr>'+
                                        '<tr>\n\
                                                <td> Contact No3 </td>\n\
                                                <td><input type="text" disabled class="disabledFeald" id="customerEdit_Contact_No3" value="'+responce.customerDetail.Contact_no3+'" > </td> </tr>'+
					'<tr>\n\
                                            <td> Date Of Register </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Date_of_register" value="'+responce.customerDetail.Date_of_register+'" > </td> </tr>'+
                                        '<tr>\n\
                                            <td> Status </td>\n\
                                            <td><input type="text" disabled class="disabledFeald" id="customerEdit_Status" value="'+responce.customerDetail.Customer_status+'" > </td> </tr>';
					
                                        if(((responce.customerDetail.Customer_status).toLowerCase())=="active")
					{
						$('#editUserDetailsPopContainerActiveDeativeBTN').removeClass('hide');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass();
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').addClass('editCustomerDetailsPop-userDeactivate');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('Deactivate');
					}
					else if(((responce.customerDetail.Customer_status).toLowerCase())=="deactive")
					{
						$('#editUserDetailsPopContainerActiveDeativeBTN').removeClass('hide');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass();
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').addClass('editCustomerDetailsPop-userActivate');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('Activate');
					}
                                        
					$('#editUserDetailsPop').find('tbody').html(editCustomerDetailsPopDetails);
					$('#editUserDetailsPop').modal('show');
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});

	}//Function End getAllDetailsForSpecificCustomer()---------------------------------------------------FUNEND()


		



/*******************************Start Function saveDetailsForSpecificCustomer()**************************************/
//
//#return type :
	function saveDetailsForSpecificCustomer(Customer_id)
	{
		// get form data values
		var userData = {
			Title             : jQuery('#customerEdit_Title').val(),
			First_name        : jQuery('#customerEdit_First_name').val(),
			Last_name         : jQuery('#customerEdit_Last_name').val(),			
			NIC_No            : jQuery('#customerEdit_NIC_No').val(),
			Gender            : jQuery('#customerEdit_Gender').val(),
			Address1          : jQuery('#customerEdit_Address1').val(),
			Address2          : jQuery('#customerEdit_Address2').val(),						
			Email             : jQuery('#customerEdit_Email').val(),
			Contact_No1       : jQuery('#customerEdit_Contact_No1').val(),
			Contact_No2       : jQuery('#customerEdit_Contact_No2').val(),
			Contact_No3       : jQuery('#customerEdit_Contact_No3').val(),
			Date_of_register  : jQuery('#customerEdit_Date_of_register').val(),
                        Customer_status   : jQuery('#customerEdit_Status').val()                        
		};

		var formData = {
			Customer_id       : Customer_id,
			userData          : userData,
			submitMode        : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/manageCustomer/saveDetailsForSpecificCustomer/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{
					// hide pop up menu
					$('#editUserDetailsPop').modal('toggle');
					// remove Activate user and Deactive user button
					$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editCustomerDetailsPop-userDeactivate,  editCustomerDetailsPop-userActivate');

					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
					// show user update massage
					$('.msgDisplay').removeClass('alert-danger');
					$('.msgDisplay').addClass('alert-success');
					$('.msgDisplay').slideDown();
					$('.msgDisplay span').html(responce.msg);
					$(document).scrollTop(0);
					$('.msgDisplay').delay(4000).slideUp();

				}
				else
				{
					// hide pop up menu
					$('#editUserDetailsPop').modal('toggle');
					// remove Activate user and Deactive user button
					$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editCustomerDetailsPop-userDeactivate,  editCustomerDetailsPop-userActivate');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
					// show user update error massage
					$('.msgDisplay').removeClass('alert-success');
					$('.msgDisplay').addClass('alert-danger');
					$('.msgDisplay').slideDown();
					$('.msgDisplay span').html(responce.msg);
					$(document).scrollTop(0);
					$('.msgDisplay').delay(4000).slideUp();
					console.log(responce.msg);
				}
			}
		});

	}//Function End saveDetailsForSpecificCustomer()---------------------------------------------------FUNEND()



        function changeUserStatus(NICNumber,userStatus)
	{	
            console.log(NICNumber);
		// get form data values
		var userData = {
			User_status : userStatus
		};

		var formData = {
			NICNumber         : NICNumber,
			userData          : userData,
			submitMode        : "ajax"
		};
                
		// create data sent url                
		dataSentUrl = base_url+'index.php/manageCustomer/changeUserStatus/';
		

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
					$('#editUserDetailsPop').modal('toggle');
					// remove Activate user and Deactive user button
					$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editCustomerDetailsPop-userDeactivate,  editCustomerDetailsPop-userActivate');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
					// remove Message
					$('.msgDisplay').removeClass('alert-danger');
					$('.msgDisplay').addClass('alert-success');
					$('.msgDisplay').slideDown();
					$('.msgDisplay span').html('User successfully '+userStatus+'d.');
					$(document).scrollTop(0);
					$('.msgDisplay').delay(4000).slideUp();
                                        if(window.top==window)
                                        {
                                                            // you're not in a frame so you reload the site
                                            window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                                        }
				}
				else
				{
					$('#editUserDetailsPop').modal('toggle');
					// remove Activate user and Deactive user button
					$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editCustomerDetailsPop-userDeactivate,  editCustomerDetailsPop-userActivate');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');

					// remove Message
					$('.msgDisplay').removeClass('alert-success');
					$('.msgDisplay').addClass('alert-danger');
					$('.msgDisplay').slideDown();
					$('.msgDisplay span').html(responce.msg);
					$(document).scrollTop(0);
					$('.msgDisplay').delay(4000).slideUp();
				}
			}
		});

	}//Function End deactivateUser()---------------------------------------------------FUNEND()




/*******************************Start Function callers()**************************************/
	// Call addPDF() function
	// PDF file upload using ajax and upadate data base
	jQuery('#ManageCustomerCreate').submit(function(event)
	{
		// Stop php the form submit  
		event.preventDefault();

		$(this).validate({
			submitHandler: function()
			{
				createMember();
			}
		});

	});

	//call the function in click event
	jQuery('#createCustomer').click(function(event)
	{   
		//event.preventDefault();
		$('#ManageCustomerCreate').validate(
		{
			submitHandler: function()
			{
				createCustomer();
				// Stop php the form submit  
				return false;
			}
		});
	});

	// View user's details to edit
	// location: #editUserDetailsPop
	/*$('.editUserDetailsPop-view').click(function()
	{
		var userName = $(this).closest('tr').find('.User_name').html();
		getAllDetailsForSpecificUser(userName);
	});*/
        
	// View user's details to edit
	// location User Mange page
	jQuery(document).on('click','.editCustomerDetailsPop-view', function(event)
	{            
            var NICNumber = $(this).closest('tr').find('.NIC_No').html();           
            getAllDetailsForSpecificCustomer(NICNumber);
            $('#OP_adimnContentDetails').dataTable();
	});

	// Edite user details 
	// Home page->edit profile in normal user
	$('.editUserProfileDetailsPop-view').click(function()
	{
		var userName = $('.User_name').html();
		editeUserProfileDetails(userName);
	});



	//check for exsisting user on key change
	$('#Mem_userName').blur(function () {
		if ($.trim($('#Mem_userName').val())!=='')
		{
			checkExsistingUser();
		}
		else
		{
			jQuery('#Mem_userNameAvalable').html('');
		}
	});




	// Edite userProfile details send to database
	jQuery(document).on('click','.editeProfile-save', function(event)
	{
		var userName = $('.User_name').html();
		saveUserProfileDetailsForSpecificUser(userName);
	});


	// View customer edit detail send to data base
	// location: #editUserDetailsPop
	jQuery(document).on('click','.editCustomerDetailsPop-save', function(event)
	{
		if(confirm("Are you sure udpate this user's details"))
		{
			var Customer_id = jQuery('#Customer_id').val()
			saveDetailsForSpecificCustomer(Customer_id);
                        if(window.top==window)
                        {
					    // you're not in a frame so you reload the site
					    window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                        }
		}
	});
	
        
        jQuery(document).on('click','.editCustomerDetailsPop-userDeactivate', function(event)
	{  
		if((confirm("Are you sure deactivate this user"))== true)
		{
			var NICNumber = $('#customerEdit_NIC_No').val();
			changeUserStatus(NICNumber,"deactivate");                        
		}
	});

	// Activate User
	// Admin user privilages
	// Admin user login only
	// location: #UserManage -> editUsers profile
	/*jQuery(document).on('click','.editUserDetailsPop-userActivate', function(event)
	{
		if((confirm("Are you sure activate this user"))==true)
		{
			var NICNumber = $('#editUserDetailsPopContainer').find('.customerEdit_NIC_No').val();
			changeUserStatus(NICNumber,"activate");
		}
	});*/

	// Location Mange user pop window Active user and deactive user 
	// Remove active and deactive button 
	/*jQuery(document).on('click','#editUserDetailsPopContainerActiveDeativeBTN', function(event)
	{
		// remove Activate user and Deactive user button
		$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');
		$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
		$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
	});*/

/*******************************End Function callers()**************************************/

}); // End document.ready() function
