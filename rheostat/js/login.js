
$('#forgotPasswordLink').click(function(event) {
	// alert('dsaj')
	event.preventDefault();
	$('#loginForm').slideUp(100, function () {

		$('#forgotPassword').slideDown();

	});

	// $('	').slideDown('')
});


$('#loginLink').click(function(event) {
	// alert('dsaj')
	event.preventDefault();
	$('#forgotPassword').slideUp(1000, function () {

		$('#loginForm').slideDown();

	});

	// $('	').slideDown('')
});

$('#forgotPasswordButton').click(function (event){
	
	event.preventDefault();

	var forgotPasswordEmail = $('#forgotPasswordBox').val();

		var formData = {
			forgotPasswordEmail : forgotPasswordEmail,
			submitMode        	: "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/user/forgotLoginDetails/';

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
					console.log (responce.msg)

					$('#forgotPasswordMsg').addClass('alert-success');
					$('#forgotPasswordMsg').slideDown();
					$('#forgotPasswordMsg span').html(responce.msg);
					$(document).scrollTop(0);
					$('#forgotPasswordMsg').delay(4000).slideUp();
				}
				else
				{
					$('#forgotPasswordMsg').addClass('alert-error');
					$('#forgotPasswordMsg').slideDown();
					$('#forgotPasswordMsg span').html(responce.msg);
					$(document).scrollTop(0);
					$('#forgotPasswordMsg').delay(4000).slideUp(400,function () {
					$('#forgotPasswordMsg').removeClass('alert-error');
					});
					
				}
			}
		});	
		
	});


// login page error massage hide when click the password field
$('#OL_userName, #OL_userPassword').keypress(function()
{
	$('#userNamePasswordMissMatch').slideUp('slow');
	// $('#userNamePasswordMissMatchMsgbox').slideUp();
});
