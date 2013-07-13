jQuery(document).ready(function()
{
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
              
                for(var k=0; k<(data[i].length - 1); k++)
                {
                   if((i==1)&&(k==0))
                   {
                      for(var m=0; m<header.length; m++)
                      {
                          if(header[m] == "Event Title" || header[m] == "Date Created" )
                          {
                            continue;
                          }
                          else
                              {
                                  doc.cell(10, 20, 22, 5,header[m],i);
                              }
                      }
                   }
                   else
                   {
                       var tempValue = i+1;
                       var temp =++i;
                        i = tempValue;
                      
                        if((k==1)&&(temp==2))
                        {
                                doc.cell(10, 20, 22, 5,data[i][0],temp);
                                doc.cell(10, 20, 22, 5,data[i][k],temp);
                        }
                        else
                        {
                               doc.cell(10, 20, 22, 5,data[i][k],temp); 
                        }
                      
                   }
                  
                }
       
            }
 
   doc.output('datauri'); 

	 
	});
});