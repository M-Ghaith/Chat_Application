<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="chat applicatoin chat box publice chat amazing chat with people" />
    <meta name="author" content="GANA" />
       <link rel="shortcut icon" href="assests/imgs/1495417458_message.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script >
     window.setInterval(function() {
      var elem = document.getElementById('panel-body');
      
     elem.scrollTop = elem.scrollHeight;
      }, 1000);
    </script>
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/scss/_reboot.scss">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
 
    


  <script type='text/javascript' src='/F3962489-B5CD-421B-B74C-885F166E7925/5zy4h.js'></script>
  
    <title>GANA</title>
  
    <link href="assests/css/bootstrap.css" rel="stylesheet" />
    <link href="assests/css/chatbox.css" rel="stylesheet" type="text/css" >

</head>


<body style="font-family:Verdana; background-image: url(assests/imgs/background.jpg);">



<script src="assests/javascript/ajax3.js"></script>



<div class="container">
 <div class="row">

    <br /><br />
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">              
             
      <div class="row">

      <div class="col-md-1">
      <a class="pull-left" href="#">
            <img class="media-object img-circle " src="assests/imgs/couple.png" />
       </a>  
       </div>
      <div class="col-md-7">
       
             <h3>Welcome: <?php echo ucfirst($this->session->userdata('nickName')); ?></h3>

       </div>

   

       <div class="col-md-2" style="padding-top: 27px;">
         <select id="status" class="selectpicker" data-style="btn-primary" onchange="userStatus();">
                 <option>Online</option>
                 <option>Offline</option>
         </select>
        </div>

      
         <div class="col-md-1  " style="padding-top: 24px; ">



        <a href="log_out" style="color:white-blue;     font-size: large;
    font-family: fantasy; ">logout</a>

        
        </div>
      </div>
    </div>

  <div id="panel-body" class="panel-body1">
      <ul class="media-list">

            <li class="media">
            
             <div class="media-body">

                <div class="media">
                                             
                   <div id="chat_border" class="media-body" >  
                    
                    <hr />
                </div>
            </div>

          </div>
      </li>                          
     
    </ul>
  </div>
            <div class="panel-footer">
                <div class="input-group">


             <input id="msg" name="msg" type="text" class="form-control"  placeholder="Enter Message"  />
            


             <span class="input-group-btn">
               <button id="button" class="btn btn-info" type="button">SEND</button>
             </span>
         </div>
     </div>
  </div>
</div>

    <div class="col-md-3">
          <div class="panel panel-primary">
            <div class="panel-heading" style="height: 80px;">
            <div class="row">
            <div class="col-md-1"></div>
            <a class="pull-left" href="#">
                           <img class="media-object img-circle " src="assests/imgs/reunion.png" />
                         </a>  
             <div class="col-md-2">
              <h4>ONLINE USERS</h4> 
              </div>
              
            </div>
         </div>
        <div class="panel-body">

  <ul class="media-list">

               
        <li class="media">

              <div class="media-body">

                  <div class="media">
                                      
                     <div id="contacts" class="media-body" >
                       <small class="text-muted">Online</small>
                   </div>

                 </div>
            </div>
        </li>
    </ul>
                  
                    
            </div>
        
    </div>
</div>
  </div>
    <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; GANA 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
  <script src="assests/javascript/ajax2.js"></script>
  <script src="assests/javascript/ajax4.js"></script>

  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <script src="assests/lib/js/config.js"></script>
  <script src="assests/lib/js/util.js"></script>



   

</body>
</html>
