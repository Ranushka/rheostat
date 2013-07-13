jQuery(document).ready(function($)
{
	//change password msg from user
	$('.passwordChange').delay(4000).slideUp();

	// get base url from interface (footer.php)
	base_url = jQuery('#base_url').val();

	//Create cancel button
$('#cancelCreateUser').click(function(e)
	{
		e.preventDefault();

			jQuery('#Mem_title').val(''),
			jQuery('#Mem_firstname').val('');
			jQuery('#Mem_lastName').val('');
			jQuery('#Mem_userName').val('');
			jQuery('#Mem_nicNumber').val(''),
			jQuery('#Mem_address').val('');
			jQuery('#Mem_birthDay').val('');
			jQuery('#Mem_Gender').val('');
			jQuery('#Mem_email').val('');
			jQuery('#Mem_telNumber').val('');
			jQuery('#Mem_usertype').val('');			

	});


	


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


	/************************************ createUser()*******************************************/
	// Ajax form submit from UserManagement view, create member
	//@ type : 
	//#return type : alert when error occuring
	function createUser() 
	{            
            telephoneNumber = jQuery('#Mem_telNumber').val();
            
            if(telephoneNumber.charAt(0) == "0")
            {
               telephoneNumber = jQuery('#Mem_telNumber').val().substring(1);
            }
            else
            {
                    telephoneNumber = jQuery('#Mem_telNumber').val();
            }
		// get form data values
		var formData = {
			
			title        : jQuery('#Mem_title').val(),
			firstName    : jQuery('#Mem_firstname').val(),
			lastName     : jQuery('#Mem_lastName').val(),
			userName     : jQuery('#Mem_userName').val(),
			nicNumber    : jQuery('#Mem_nicNumber').val(),
			address	     : jQuery('#Mem_address').val(),
			gender	     : jQuery('#Mem_Gender').val(),
			birthDay     : jQuery('#Mem_birthDay').val(),
			email	     : jQuery('#Mem_email').val(),
			telNumber    : telephoneNumber,
			MemType      : jQuery('#Mem_usertype').val(),
                        Memregdate   : jQuery('#Mem_regdate').val(),
			submitMode   : "ajax"
		};
                
                
		// create data sent url
		dataSentUrl = base_url+'index.php/user/create/';
		
		// Ajax funtion
		jQuery.ajaxFileUpload({
			url		: dataSentUrl,
			secureuri	: false,
			fileElementId	: 'Image_path',
			dataType	: 'json',
			data		: formData,
			success  : function (responce, status)
			{
				if(responce.status!="error")
				{

                                    $('.successMsages').slideDown();
                                    $('.successMsages span').html('User has successfully added.');
                                    $(document).scrollTop(0);
                                    $('.successMsages').delay(4000).slideUp();


                                    jQuery('#Mem_title').val(''),
                                    jQuery('#Mem_firstname').val('');
                                    jQuery('#Mem_lastName').val('');
                                    jQuery('#Mem_userName').val('');
                                    jQuery('#Mem_nicNumber').val(''),
                                    jQuery('#Mem_address').val('');
                                    jQuery('#Mem_birthDay').val('');
                                    jQuery('#Mem_Gender').val('');
                                    jQuery('#Mem_email').val('');
                                    jQuery('#Mem_telNumber').val('');
                                    jQuery('#Mem_usertype').val('');
                                    jQuery('#Membership_type').val('');
                                    if(window.top==window)
                                    {
                                                        // you're not in a frame so you reload the site
                                                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                                    }
				}
				else
				{
					// alert(responce.msg);
					$('.successMsages').addClass('alert-info');
					$('.successMsages').slideDown();
					$('.successMsages span').html('User has successfully added.');
					$(document).scrollTop(0);
					$('.successMsages').delay(4000).slideUp();
				}
			}
		});
	}//Function End createUser()------------------------------------------------------FUNEND

	function checkExsistingUser() 
	{
		// get form data values
		var formData = {
			userName	     : $('#Mem_userName').val(),
			submitMode 		 : "ajax"
		};
		  // create data sent url
		dataSentUrl = base_url+'index.php/user/checkExsistingUser/';
		// alert(dataSentUrl);
		// Ajax funtion
		jQuery.ajax(
		{
			type			: 'POST',
			url				: dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce)
		  	{
		  		if(responce.status=='success')
		  		{
		  			jQuery('#Mem_userNameAvalable').html('');
		  		}
		  		else
		  		{
		  			jQuery('#Mem_userNameAvalable').html('User name is alredy taken !.');		  			
		  		}
		  	}
		});					
	}


/*******************************Start Function getAllDetailsForSpecificUser()**************************************/
// get user detail for edit using pop dialog box
//#return type :
	function getAllDetailsForSpecificUser(userName)
	{
		// get form data values
		var formData = {
			userName	:userName,
			submitMode  : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/user/getAllDetailsForSpecificUser/';
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
					editUserDetailsPopDetails ='<tr> <td> Title </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Title" value="'+responce.userDetail.Title+'" > </td> </tr>'+
					'<tr> <td> First Name </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_First_name" value="'+capitalizeFirstLatter(responce.userDetail.First_name)+'" > </td> </tr>'+
					'<tr> <td> Last Name </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Last_name" value="'+capitalizeFirstLatter(responce.userDetail.Last_name)+'" > </td> </tr>'+
					'<tr> <td> Password </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Password" value="'+responce.userDetail.Password+'" > </td> </tr>'+
					'<tr> <td> NIC No </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_NIC_No" value="'+responce.userDetail.NIC_No+'" > </td> </tr>'+
					'<tr> <td> Address </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Address" value="'+capitalizeFirstLatter(responce.userDetail.Address)+'" > </td> </tr>'+
					'<tr> <td> Date Of Birth </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Date_of_birth" value="'+responce.userDetail.Date_of_birth+'" > </td> </tr>'+
					'<tr> <td> Email </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Email" value="'+responce.userDetail.Email+'" > </td> </tr>'+
					'<tr> <td> Contact No </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Contact_No" value="'+responce.userDetail.Contact_No+'" > </td> </tr>'+
					'<tr> <td> Date Of Register </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Date_of_register" value="'+responce.userDetail.Date_of_register+'" > </td> </tr><input type="hidden" class="userEdit_User_name" value="'+responce.userDetail.User_name+'"/>'+
                                        '<tr> <td> User Status</td> <td><input type="text" disabled class="disabledFeald" id="userEdit_User_status" value="'+responce.userDetail.User_status+'" > </td> </tr>';
					//console.log(responce.userDetail.User_status);
					if(((responce.userDetail.User_status).toLowerCase())=="active")
					{
						$('#editUserDetailsPopContainerActiveDeativeBTN').removeClass('hide');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass();
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').addClass('editUserDetailsPop-userDeactivate');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('Deactivate');
					}
					else if(((responce.userDetail.User_status).toLowerCase())=="deactive")
					{
						$('#editUserDetailsPopContainerActiveDeativeBTN').removeClass('hide');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass();
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').addClass('editUserDetailsPop-userActivate');
						$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('Activate');
					}

					$('#editUserDetailsPop').find('tbody').html(editUserDetailsPopDetails);
					$('#editUserDetailsPop').modal('show');
				}
				else
				{
					console.log(responce.msg);
				}
			}
		});

	}//Function End getAllDetailsForSpecificUser()---------------------------------------------------FUNEND()


		/*******************************Start Function getAllDetailsForSpecificUser()**************************************/
// get user detail for edit using pop dialog box
//#return type :
	function editeUserProfileDetails(userName)
	{
		// get form data values
		var formData = {
			userName	:userName,
			submitMode  : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/user/getAllDetailsForSpecificUser/';
		//alert(dataSentUrl);

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
					editUserProfileDetails = '<tr><td>Profile Image</td><td><label for="profileImage"><img style="width:60px; height:70px;" src="'+base_url+(responce.userDetail.Image_path).substring(2)+responce.userDetail.User_profile_image+'" alt="User profile image"/></label><input class="disabledFeald" style="width: 300px; margin-top: -95px;opacity: 0;"type="file" id="profileImage" name="profileImage"></td></tr>'+
					'<tr> <td> Title </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Title" value="'+responce.userDetail.Title+'" > </td> </tr>'+
					'<tr> <td> First Name </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_First_name" value="'+capitalizeFirstLatter(responce.userDetail.First_name)+'" > </td> </tr>'+
					'<tr> <td> Last Name </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Last_name" value="'+capitalizeFirstLatter(responce.userDetail.Last_name)+'" > </td> </tr>'+
					'<tr> <td> NIC No </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_NIC_No" value="'+responce.userDetail.NIC_No+'" > </td> </tr>'+
					'<tr> <td> Address </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Address" value="'+capitalizeFirstLatter(responce.userDetail.Address)+'" > </td> </tr>'+
					'<tr> <td> Gender </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Gender" value="'+responce.userDetail.Gender+'" > </td> </tr>'+
					'<tr> <td> Date Of Birth </td> <td><input type="text" disabled class="disabledFeald" id="userEdit_Date_of_birth" value="'+responce.userDetail.Date_of_birth+'" > </td> </tr>'+
					
					'<input type="hidden"id="userEdit_User_name" value="'+responce.userDetail.User_name+'" ></td> </tr>';

					$('.editeProfile-save').css('visibility','hidden');
					$('#editeProfile').find('tbody').html(editUserProfileDetails);
					$('#editeProfile').modal('show');
				}
				else
				{
					// alert('not popup')
				}
			}
		});

	}//Function End getAllDetailsForSpecificUser()---------------------------------------------------FUNEND()





/*******************************Start Function saveUserDetailsForSpecificUser()**************************************/
//
//#return type :
	function saveUserDetailsForSpecificUser(userName)
	{
		// get form data values
		var userData = {

			Title             : jQuery('#userEdit_Title').val(),
			First_name        : jQuery('#userEdit_First_name').val(),
			Last_name         : jQuery('#userEdit_Last_name').val(),
			Password          : jQuery('#userEdit_Password').val(),
			NIC_No            : jQuery('#userEdit_NIC_No').val(),
			Address           : jQuery('#userEdit_Address').val(),
			Gender            : jQuery('#userEdit_Gender').val(),
			Date_of_birth     : jQuery('#userEdit_Date_of_birth').val(),
			Email             : jQuery('#userEdit_Email').val(),
			Contact_No        : jQuery('#userEdit_Contact_No').val(),
			Date_of_register  : jQuery('#userEdit_Date_of_register').val(),
			MembershipType_id : jQuery('#userEdit_MembershipType_id').val(),
			User_type         : jQuery('#userEdit_User_type').val(),
                        User_status       : jQuery('#userEdit_User_status').val()
		};

		var formData = {
			User_name         : userName,
			userData          : userData,
			submitMode        : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/user/saveUserDetailsForSpecificUser/';
		//alert(dataSentUrl);

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url		        : dataSentUrl,
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
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');

					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
					// show user update massage
					$('.msgDisplay').removeClass('alert-danger');
					$('.msgDisplay').addClass('alert-success');
					$('.msgDisplay').slideDown();
					$('.msgDisplay span').html(responce.msg);
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
					// hide pop up menu
					$('#editUserDetailsPop').modal('toggle');
					// remove Activate user and Deactive user button
					$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');
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

	}//Function End saveUserDetailsForSpecificUser()---------------------------------------------------FUNEND()


	/*******************************Start Function saveUserProfileDetailsForSpecificUser()**************************************/
// get user detail for edit using pop dialog box
//#return type :
	function saveUserProfileDetailsForSpecificUser(userName)
	{
		
		// get form data values
		var userData = {

			Title             : jQuery('#userEdit_Title').val(),
			First_name        : jQuery('#userEdit_First_name').val(),
			Last_name         : jQuery('#userEdit_Last_name').val(),
			// Password          : jQuery('#userEdit_Password').val(),
			NIC_No            : jQuery('#userEdit_NIC_No').val(),
			Address           : jQuery('#userEdit_Address').val(),
			Gender            : jQuery('#userEdit_Gender').val(),
			Date_of_birth     : jQuery('#userEdit_Date_of_birth').val(),
			//Email             : jQuery('#userEdit_Email').val(),
			//Contact_No        : jQuery('#userEdit_Contact_No').val(),
			// Date_of_register  : jQuery('#userEdit_Date_of_register').val(),
			// User_type         : jQuery('#userEdit_User_type').val(),
			
			User_name         : userName,

			submitMode        : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url+'index.php/user/saveUserProfileDetailsForSpecificUser/';

		// Ajax funtion
		jQuery.ajaxFileUpload({
			url				: dataSentUrl,
			secureuri		: false,
			fileElementId	: 'profileImage',
			dataType		: 'JSON',
			data			: userData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{

					$('#saveProfileDetails').addClass('alert-success');
					$('#saveProfileDetails').slideDown();
					$('#saveProfileDetails span').html('Successfully Saved Profile Details.');
					$(document).scrollTop(0);
					$('#saveProfileDetails').delay(4000).slideUp();
				}
				else
				{
					$('#saveProfileDetails').addClass('alert-danger');
					$('#saveProfileDetails').slideDown();
					$('#saveProfileDetails span').html('Not Updated Profile Details.');
					$(document).scrollTop(0);
					$('#saveProfileDetails').delay(4000).slideUp();
					// alert(responce.msg);
				}
			}
		});

	}//Function End saveUserProfileDetailsForSpecificUser()---------------------------------------------------FUNEND()





	/*************************Start Function deactivateUser()***********************************/
	//Owner : Madhuranga Senadheera
	//
	// Deactivate user, 
	// methord call from, ManagecontentP-> #editUserDetailsPop ->.editUserDetailsPop-deactivate
	function changeUserStatus(userName,userStatus)
	{
		console.log('userName:'+userName+'\n'+'User_status:'+userStatus);
		// get form data values
		var userData = {
			User_status : userStatus
		};

		var formData = {
			User_name         : userName,
			userData          : userData,
			submitMode        : "ajax"
		};
		// create data sent url
		dataSentUrl = base_url+'index.php/user/changeUserStatus/';
		//alert(dataSentUrl);

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
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');
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
					$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');
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
	jQuery('#ManageMemberCreate').submit(function(event)
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
	jQuery('#createUser').click(function(event)
	{
		// event.preventDefault();
		$('#ManageUserCreate').validate(
		{
			submitHandler: function()
			{
				createUser();
				// Stop php the form submit  
				return false;
			}
		});
	});

	/*// View user's details to edit
	// location: #editUserDetailsPop
	$('.editUserDetailsPop-view').click(function()
	{
		var userName = $(this).closest('tr').find('.User_name').html();
		getAllDetailsForSpecificUser(userName);
	});
*/
	// View user's details to edit
	// location User Mange page
	jQuery(document).on('click','.editUserDetailsPop-view', function(event)
	{
		var userName = $(this).closest('tr').find('.User_name').html();
		getAllDetailsForSpecificUser(userName);
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


	// View user edit detail send to data base
	// location: #editUserDetailsPop
	jQuery(document).on('click','.editUserDetailsPop-save', function(event)
	{
		if(confirm("Are you sure udpate this user's details"))
		{
			var userName = $('#editUserDetailsPopContainer').find('.userEdit_User_name').val();
			saveUserDetailsForSpecificUser(userName);
		}
	});

	// Deactivate User
	// Admin user privilages
	// Admin user login only
	// location: #UserManage -> editUsers profile
	jQuery(document).on('click','.editUserDetailsPop-userDeactivate', function(event)
	{
		if((confirm("Are you sure deactivate this user"))==true)
		{
			var userName = $('#editUserDetailsPopContainer').find('.userEdit_User_name').val();
			changeUserStatus(userName,"deactivate");
		}
	});

	// Activate User
	// Admin user privilages
	// Admin user login only
	// location: #UserManage -> editUsers profile
	jQuery(document).on('click','.editUserDetailsPop-userActivate', function(event)
	{
		if((confirm("Are you sure activate this user"))==true)
		{
			var userName = $('#editUserDetailsPopContainer').find('.userEdit_User_name').val();
			changeUserStatus(userName,"activate");
		}
	});

	// Location Mange user pop window Active user and deactive user 
	// Remove active and deactive button 
	jQuery(document).on('click','#editUserDetailsPopContainerActiveDeativeBTN', function(event)
	{
		// remove Activate user and Deactive user button
		$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').removeClass('editUserDetailsPop-userDeactivate,  editUserDetailsPop-userActivate');
		$('#editUserDetailsPopContainerActiveDeativeBTN').addClass('hide');
		$('#editUserDetailsPopContainerActiveDeativeBTN').find('a').html('');
	});

/*******************************End Function callers()**************************************/

}); // End document.ready() function
