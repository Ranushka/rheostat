jQuery(document).ready(function($)
{
    
    
    
    
    function createContact()
    {
        var formData = {
			
			name		         : jQuery('#Your_Name').val(),
			email                    : jQuery('#Your_Email').val(),
			subject                  : jQuery('#Your_Subject').val(),
			message			 : jQuery('#Your_Message').val(),
			submitMode               : "ajax"
		};
        
        dataSentUrl = base_url+'index.php/contactUs/emailmessage/';
               jQuery.ajax({
			type			: 'POST',
			url                     : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				if(responce.status!=="error")
				{ 
 
					$('#sendSuccessMsg').slideDown();
					$('#sendSuccessMsg span').html('Your message is sent to the Administrator.');
					$('#sendSuccessMsg').delay(4000).slideUp();
					jQuery('#Your_Name').val(''),
					jQuery('#Your_Email').val('');
					jQuery('#Your_Subject').val('');
					jQuery('#Your_Message').val('');
					
				}
				else
				{
          
					$('#sendSuccessMsg').addClass('alert-danger');
					$('#sendSuccessMsg').slideDown();
					$('#sendSuccessMsg span').html('Message sending fail.');
					$('#sendSuccessMsg').delay(4000).slideUp();
				}
			}
		});
    }
    
   jQuery('#createContact').click(function(event)
	{
		$('#ContactUsCreate').validate(
		{
			submitHandler: function()
			{
				createContact();
				// Stop php the form submit  
				return false;
                                
			}
		});
	});
});


