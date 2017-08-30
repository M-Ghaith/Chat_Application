

$(document).ready(function(){  
  
  function showmsg()
                  {
                    $.ajax({
                            type:"post",
                            url:"process",
                           
                            data:"action=show_msg",
                            success:function(data)
                            {
                                 $("#chat_border").html(data);

                            }
                          });

                    }

           setInterval(showmsg, 1000);  
                    
$("#chat_border").animate({ scrollTop: $('#chat_border').height()}, 1000);
 
           $("#button").click(function(){
 
                          
                          var message=$("#msg").val();
                          if (message=="") 
                          {
                            alert('enter msg');

                          }
                          else
                          {
                          $.ajax({
                              type:"post",
                              url:"process",
                              
                              data:{'msg':message,'action':'add_msg'},
                              success:function(data){
                                showmsg();


                                  
                              }
 
                          });
                          $("#msg").val("");
                        }
 
                    });
           
           $("#msg").keydown(function(e){
               
                    if(e.keyCode == 13)
                    {      
                          var message=$("#msg").val();
                          if (message=="") 
                          {
                            alert('enter msg');
                          }
                          else{
                          
                          $.ajax({
                              type:"post",
                              url:"process", 
                              data:{'msg':message,'action':'add_msg'},
                              success:function(data){
                                showmsg(); 
                                  $("#msg").val("");

                              }
                             
                                });
                          }
                          } 
                          
                   
                          
               
                    
             });


           
              
           });