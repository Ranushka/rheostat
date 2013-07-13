$( document ).ready(function() {
	//$('#showFilters').fadeOut("slow");
	
	    // if (!$('.successMsages').hasClass('hide')) {
	    // 	$('.popupmsg').delay(2000).remove();
	    // }
	// $(window).scroll(function () 
	// {
	// });


    $('#digital-clock').clock(
    {
        offset: '+5.51', type: 'digital'
    });
    
});


$('#showFilters').click(function()
{
  $('#filterSet').toggle("slow");
  // $('#FiltersGroup .btn').addClass('btn-primary');

});

  
// $(window).scroll(function () {
//     $('#filterSet').delay(5000).slideUp();
// });

$('#filterSet').hover(function()
{
  $('#filterSet').slideDown(1);
  // $('#FiltersGroup .btn').addClass('btn-primary');

});



//set filters for search

	//remove masage box when there is no data
	
	function msgHideWhenNothingOnIt () {
		var seterdFilters = $('#seterdFilters').text()
		var seterdFiltersCatagary = $('#seterdFiltersCatagary').text()
		// alert(seterdFilters)
		// alert(seterdFiltersCatagary)

		if (($.trim(seterdFilters)=='') &&( $.trim(seterdFiltersCatagary)=='')) {
			$('#filtersForSearch').slideUp();
		}
		
	}

	// $(document).live("click", function() { return false; })

	// Selact Content type

		//filterBook
		$('#filterBook').click(function () {
			if ($(this).hasClass('active'))
			{
				$(this).removeClass('active');
				$('#filterMsgbooks').remove();
				msgHideWhenNothingOnIt();
			}
			else
			{
				$('#filtersForSearch').slideDown();
				$(this).addClass('active')
				$('#filtersForSearch').removeClass('hide')
				$('#filtersForSearch #seterdFilters').append('<em id="filterMsgbooks">books </em>')
			}
		}); 

		//filterVideo
		$('#filterVideo').click(function () {
			if ($(this).hasClass('active'))
			{
				$(this).removeClass('active')
				$('#filterMsgVideos').remove()
				msgHideWhenNothingOnIt()
			}
			else
			{
				$('#filtersForSearch').slideDown();
				$(this).addClass('active')
				$('#filtersForSearch').removeClass('hide')
				$('#filtersForSearch #seterdFilters').append('<em id="filterMsgVideos">Videos </em>')
			}
		});

		//filterPdf
		$('#filterPdf').click(function () {
			if ($(this).hasClass('active'))
			{
				$(this).removeClass('active')
				$('#filterMsgPDF').remove()
				msgHideWhenNothingOnIt()
			}
			else
			{
				$('#filtersForSearch').slideDown();
				$(this).addClass('active')
				$('#filtersForSearch').removeClass('hide')
				$('#filtersForSearch #seterdFilters').append('<em id="filterMsgPDF">PDF\'s </em>')
			}
		}); 

	// Selact content catagary

	$('#Category_id').change(function ()
	{

		value = $('#Category_id option:selected').text();//get value
		valueID = $('#Category_id option:selected').attr("value");// get id of value
		
		if (value != "-Please Select-")
		{
			$('#filtersForSearch').slideDown();
			$('#filtersForSearch').removeClass('hide')
			$('#filtersForSearch #seterdFiltersCatagary').html('<em id='+valueID+'>'+value+' </em>')
		}
		else
		{
			$('#filtersForSearch #seterdFiltersCatagary').html('')
			msgHideWhenNothingOnIt()
			// To do multipul catagarys 
			// $('#seterdFiltersCatagary #'+valueID).remove();
		}
	})



