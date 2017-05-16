function check_if_exists() {

var nickName = $("#nickName").val();

if (nickName!='') 
{


$.ajax(
    {
        type:"POST",
        url: "is_valid",
        data:{'nickName':nickName},
        
        success:function(response)
        { 
            if (response=='true') 
            { 
              
                $('#hint').text('chooes another name');
                $('#nickName').val('');
            }
            else 
            { 
                
               $('#hint').text("valid");
            }  
        }
    });
 }
}