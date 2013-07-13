jQuery(document).ready(function(){
	
	// get base url from interface (footer.php)
	base_url = jQuery('#base_url').val();
	

	$('#addNewPaymentCancelButton').click(function(event)
	{	
		event.preventDefault();

		jQuery('#Event_id').val("");
		jQuery('#advance_amount').val("");
		jQuery('#rate_per_hour').val("");
		jQuery('#ac_hours').val("");
		jQuery('#number_of_lights').val("");
		jQuery('#light_amount10000').val("");
		jQuery('#light_amount20000').val("");
		jQuery('#light_amountabove20000').val("");
		jQuery('#additional_charges').val("");
		jQuery('#other_prices').val("");
		jQuery('#amount_paid').val("");
		jQuery('#date_paid').val("");
	});

	
	function addNewPayment()
	{		
		// get form data values
		var formData = {
			Event_id			   :jQuery('#Event_id').val(),
			advance_amount         :jQuery('#advance_amount').val(),
			rate_per_hour          :jQuery('#rate_per_hour').val(),
			ac_hours               :jQuery('#ac_hours').val(),
			number_of_lights       :jQuery('#number_of_lights').val(),
			light_amount10000      :jQuery('#light_amount10000').val(),
			light_amount20000      :jQuery('#light_amount20000').val(),
			light_amountabove20000 :jQuery('#light_amountabove20000').val(),
			additional_charges     :jQuery('#additional_charges').val(),
			other_prices           :jQuery('#other_prices').val(),
			amount_paid            :jQuery('#amount_paid').val(),
			date_paid              :jQuery('#date_paid').val(),
			submitMode	           : "ajax"
		};


		// create data sent url
		dataSentUrl = base_url +'index.php/managePayment/addNewPayment/';


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

					$('.successMsagesAddNewPayment').slideDown();
				    $('.successMsagesAddNewPayment span').html('Payment Successfully Created');
				    $(document).scrollTop(0);
				    $('.successMsagesAddNewPayment').delay(4000).slideUp();
					
					jQuery('#Event_id').val("");
					jQuery('#advance_amount').val("");
					jQuery('#rate_per_hour').val("");
					jQuery('#ac_hours').val("");
					jQuery('#number_of_lights').val("");
					jQuery('#light_amount10000').val("");
					jQuery('#light_amount20000').val("");
					jQuery('#light_amountabove20000').val("");
					jQuery('#additional_charges').val("");
					jQuery('#other_prices').val("");
					jQuery('#amount_paid').val("");
					jQuery('#date_paid').val("");
					
					if(window.top==window)
                    {
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }
				}
				else
				{
					// alert(responce.msg);
					$('.unsuccessMsagesAddNewPayment').slideDown();
				    $('.unsuccessMsagesAddNewPayment span').html(responce.msg);
				    $(document).scrollTop(0);
				    $('.unsuccessMsagesAddNewPayment').delay(4000).slideUp();
				}
			}
		});


	}//Function End addPhysicalBook()----------------------------------------------------FUNEND()

	jQuery('#addNewPaymentButton').click(function()
	{
		//alert('hello');
		$('#managePayment').validate(
		{
			submitHandler: function()
			{
				addNewPayment();
				// Stop php the form submit  
				return false;
			}
		});
	});

	$('#number_of_lights').change(function()
	{
		var selectedvalue = $(this).find('option:selected').text();
		if (selectedvalue == '10,000')
		{
			$('#light10000Parent').removeClass('hide');
		}
		else
		{
			$('#light10000Parent').addClass('hide');
		}
	});

	$('#number_of_lights').change(function()
	{
		var selectedvalue = $(this).find('option:selected').text();
		if (selectedvalue == '15,000')
		{
			$('#light20000Parent').removeClass('hide');
		}
		else
		{
			$('#light20000Parent').addClass('hide');
		}
	});

	$('#number_of_lights').change(function()
	{
		var selectedvalue = $(this).find('option:selected').text();
		if (selectedvalue == '>20,000')
		{
			$('#lightabove20000Parent').removeClass('hide');
		}
		else
		{
			$('#lightabove20000Parent').addClass('hide');
		}
	});

	// Display payment edit page
	jQuery(document).on('click','.editPaymentsDetailsPop-view', function(event)
	{
		paymentID = $(this).closest('tr').find('td:first-child').html();
		getAllPaymentDetails(paymentID);
	});

	// save edited payment details
	jQuery(document).on('click','.managePayment-edit', function(event)
	{
		paymentID = $('#managePayment_Payment_id').val();
		saveEditedPaymentDetails(paymentID);
	});

	function getAllPaymentDetails(paymentID)
	{
		
		// get form data values
		var formData = {
			PaymentID     : paymentID,
			submitMode    : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/managePayment/aJaxGetPaymentsToUpdate/';
		
		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce)
			{
				console.log(responce.payments);
                            if(responce.status!="error")
                            {                                
                                /*var categoryDropdown = "";
                                
                                categoryDropdown = '<select disabled class="disabledFeald" id="manageContent_Category_id_dropdown">';
                                for(var i = 0; i < responce.category.length; i++)
                                {
                                    categoryDropdown+= '<option value="'+responce.category[i].Category_id+'">'+responce.category[i].Category_name+'</option>';
                                    
                                }
                                categoryDropdown += '</select>';*/                                                          
                                
                                for (var i = 0; i < responce.payments.length; i++)
                                {
                                    contenTable =   '<tr><td>Payment ID</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Payment_id"                 value="'+responce.payments[i].Payment_id+'">          </td> </tr>'+
                                                    '<tr><td>Event ID</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Event_id"                     value="'+responce.payments[i].Event_id+'">            </td> </tr>'+
                                                    '<tr><td>For A/C</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_For_ac"                        value="'+responce.payments[i].For_ac+'">              </td> </tr>'+
                                                    '<tr><td>Numberof Lights</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Numberof_lights"       value="'+responce.payments[i].Numberof_lights+'">     </td> </tr>'+
                                                    '<tr><td>For Lights</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_For_lights"                 value="'+responce.payments[i].For_lights+'">          </td> </tr>'+
                                                    '<tr><td>Other Description</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Other_description"   value="'+responce.payments[i].Other_description+'">   </td> </tr>'+
                                                    '<tr><td>Other</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Other_amount"                    value="'+responce.payments[i].Other_amount+'">        </td> </tr>'+
                                                    //'<tr id="manageContent_Category_id_inputbox"><td>Category Name </td> <td><input type="text" disabled class="disabledFeald" id="manageContent_Category_id"        value="'+responce.categoryName[i].Category_name+'">    </td> </tr>'+                                                    
                                                    //'<tr class="hide" id="manageContent_Category_id_select"><td>Category Name </td> <td>'+categoryDropdown+'</td></tr>'+
                                                    '<tr><td>Total Amount</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Total_amount"             value="'+responce.payments[i].Total_amount+'">        </td> </tr>'+
                                                    '<tr><td>Advance Amount</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Advance_amount"         value="'+responce.payments[i].Advance_amount+'">      </td> </tr>'+
                                                    '<tr><td>Amount Paid</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Amount_paid"               value="'+responce.payments[i].Amount_paid+'">         </td> </tr>'+
                                                    '<tr><td>Date Paid</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Date_paid"                   value="'+responce.payments[i].Date_paid+'">           </td> </tr>'+
                                                    '<tr><td>Total Due Amount</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Due_amound"           value="'+responce.payments[i].Due_amound+'">          </td> </tr>'+
                                                    '<tr><td>Advance Due Amount</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Due_advance_amount" value="'+responce.payments[i].Due_advance_amount+'">  </td> </tr>'+
                                                    '<tr><td>Customer Id</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Customer_id"               value="'+responce.payments[i].Customer_id+'">         </td> </tr>'+
                                                    '<tr><td>Due Date</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Due_date"                     value="'+responce.payments[i].Due_date+'">            </td> </tr>'+
                                                    '<tr><td>Payment Status</td> <td><input type="text" disabled class="disabledFeald" id="managePayment_Payment_status"         value="'+responce.payments[i].Payment_status+'">      </td> </tr>';
                                    
                                    $('#viewPaymentDetails table').find('tbody').html(contenTable);
                                    $('#viewMainPaymentDetails').modal('show');
                                }
                            }
                            else
                            {
                                console.log(responce.msg);
                            }
                          }                            			
		});

	}//Function End geteContentDetails()---------------------------------------------------FUNEND()

	function saveEditedPaymentDetails(paymentID)
	{
		var editedPaymentDetails = {
					Payment_id        : jQuery("#managePayment_Payment_id").val(),
                    Event_id          : jQuery("#managePayment_Event_id").val(),
                    For_ac            : jQuery("#managePayment_For_ac").val(),
                    Numberof_lights   : jQuery("#managePayment_Numberof_lights").val(),
                    For_lights        : jQuery("#managePayment_For_lights").val(),
                    Other_description : jQuery("#managePayment_Other_description").val(),
                    Other_amount      : jQuery("#managePayment_Other_amount").val(),                           
                    Total_amount      : jQuery("#managePayment_Total_amount").val(),
                    Advance_amount    : jQuery("#managePayment_Advance_amount").val(),
                    Amount_paid       : jQuery("#managePayment_Amount_paid").val(),
                    Date_paid         : jQuery("#managePayment_Date_paid").val(),
                    Due_amound        : jQuery("#managePayment_Due_amound").val(),
                    Due_advance_amount: jQuery("#managePayment_Due_advance_amount").val(),
                    Customer_id       : jQuery("#managePayment_Customer_id").val(),
                    Due_date          : jQuery("#managePayment_Due_date").val(),
                    Payment_status    : jQuery("#managePayment_Payment_status").val()
		};

		var formData = {
			editedPaymentDetails  : editedPaymentDetails,
			PaymentId			  : paymentID,
			submitMode  		  : "ajax"
		}

		// create data sent url
		dataSentUrl = base_url+'index.php/managePayment/saveEditedPaymentDetails/';

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				//console.log(responce.PaymentId);	
				if(responce.status!=="error")
				{					
					$('.managePaymentSavePayment').removeClass('alert-danger');					
					$('.managePaymentSavePayment').addClass('alert-success');					
					$('.managePaymentSavePayment').slideDown();
					$('.managePaymentSavePayment span').html('Payment Details Successfully Updated');
					$(document).scrollTop(0);
					$('.managePaymentSavePayment').delay(4000).slideUp();
					if(window.top==window)
                    {
						calculateTotalAmountAfterUpdatePaymentDetails(responce.PaymentId);
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }
				}
				else
				{
					$('.managePaymentSavePayment').removeClass('alert-success');
					$('.managePaymentSavePayment').addClass('alert-danger');
					$('.managePaymentSavePayment').slideDown();
					$('.managePaymentSavePayment span').html('Payment Details Not Updated');
					$(document).scrollTop(0);
					$('.managePaymentSavePayment').delay(4000).slideUp();			
				}
				
			}
		});
	}

	function calculateTotalAmountAfterUpdatePaymentDetails(PaymentId)
	{	
		var formData ={			
			PaymentID                : PaymentId,
			submitMode               : "ajax"
		};

		// create data sent url
		dataSentUrl = base_url+'index.php/managePayment/calculateTotalAmountAfterUpdatePaymentDetails/';

		// Ajax funtion
		jQuery.ajax({
			type			: 'POST',
			url			    : dataSentUrl,
			dataType		: 'json',
			data			: formData,
			success  : function (responce, status)
			{
				console.log(responce.newTotalAmount);	
				/*if(responce.status!=="error")
				{					
					$('.managePaymentSavePayment').removeClass('alert-danger');					
					$('.managePaymentSavePayment').addClass('alert-success');					
					$('.managePaymentSavePayment').slideDown();
					$('.managePaymentSavePayment span').html('Payment Details Successfully Updated');
					$(document).scrollTop(0);
					$('.managePaymentSavePayment').delay(4000).slideUp();
					calculateTotalAmountAfterUpdatePaymentDetails(responce.PaymentId);
					if(window.top==window)
                    {
                        // you're not in a frame so you reload the site
                        window.setTimeout('location.reload()', 5000); //reloads after 3 seconds
                    }
				}
				else
				{
					$('.managePaymentSavePayment').removeClass('alert-success');
					$('.managePaymentSavePayment').addClass('alert-danger');
					$('.managePaymentSavePayment').slideDown();
					$('.managePaymentSavePayment span').html('Payment Details Not Updated');
					$(document).scrollTop(0);
					$('.managePaymentSavePayment').delay(4000).slideUp();			
				}*/
				
			}
		});
	}
});