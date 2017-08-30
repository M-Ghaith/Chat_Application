

		function show_contacts()
                        {
                          $.ajax({
                                  type:"post",
                                  url:"show_users",
                                  
                                  success:function(data)
                                  { 
                                      
                                       $("#contacts").html(data);
                                      
                                  }
                          }); 
                             
                        }

                    setInterval(show_contacts, 1000); 
           function userStatus()
         				{	var status=$('#status').val();
         					
         					  $.ajax({
                                  type:"post",
                                  url:"change_status",
                                  data:{'status':status},
                                  success:function(data)
                                  {show_contacts();}
                                  }
                          );
         				}  
                 



