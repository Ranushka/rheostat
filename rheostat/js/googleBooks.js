jQuery(document).ready(function()
{


    jQuery('#googleSearch').click(function(event)
    {
        searchGoogle();
    });


    function searchGoogle(searchVal)
    {

        var searchVal = $('#searchvalue').val();

        var formData = {
            searched_qury : searchVal
        }

        dataSentUrl = base_url+'index.php/categories/googleBooksSearch/';

        $.ajax({
            type: 'POST',
            url: dataSentUrl,
            data: formData,
            dataType :"JSON",
            success: function (data)
            {
                if (data.status!=='error')
                {
                    
                    // data.search.results
                    pageContent = "";
                    for (var i = 0; i < data.search.results.length; i++)
                    {

                        pageContent = pageContent + ('<hr>');
                        pageContent = pageContent + ('<strong>'+data.search.results[i].title+'</strong>'+'<br/>'+'<br/>');
                        pageContent = pageContent + ('<a href="'+data.search.results[i].unescapedUrl+'">'+'<img src="'+data.search.results[i].tbUrl+'" />'+'</a>'+' <br/>'+'<br/>');
                        pageContent = pageContent + ('Author/s :-'+'&nbsp;'+data.search.results[i].authors+'<br/>'+'<br/>');
                        pageContent = pageContent + ('Published Year :-'+'&nbsp;'+data.search.results[i].publishedYear+'<br/>'+'<br/>');
                        pageContent = pageContent + ('<a href="'+data.search.results[i].unescapedUrl+'">'+data.search.results[i].title+'</a>'+'<br/>');
                        // pageContent = pageContent + ('<hr>');
                    }
                    $('.searchResult').html(pageContent);
                }
                else
                {
                    alert(data.msg);
                }
            }
        });
    }

});//document.ready closed