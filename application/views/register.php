<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register with GANA</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>

      <link rel="stylesheet" href="assests/css/loginstyle.css">
  <link rel="shortcut icon" href="assests/imgs/1495417458_message.png">
  
</head>

<body style="background-image: url(assests/imgs/background2.jpg);" >
    <div class="wrapper">
    <form class="form-signin" action="sign_up" method="POST">  
    
       <?php echo form_open_multipart('processors/image_upload/' , array('id' => 'img')); ?>     
      <h2 class="form-signin-heading">Register</h2>

      <div class="form-group">
            <label for="name">Nick name</label>
            <input type="text" name="nickName" placeholder="Your Nick name.." value="<?= set_value('nickName');?>" class="form-control" onfocusout="check_if_exists()" id="nickName" autofocus="" />
            <span id="hint" class="text-danger"><?= form_error('nickName')?></span>
      </div>
          
          <div class="form-group">
            <label for="name">Email</label>
            <input type="email" name="email" placeholder="Email" value="<?= set_value('email');?>" class="form-control" />
            <span class="text-danger"><?= form_error('email')?></span>
          </div>

        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" placeholder="Password" value="<?= set_value('password');?>" class="form-control" />
            <span class="text-danger"><?= form_error('password')?></span>
          </div>

        <div class="form-group">
            <label for="name">Confirm password</label>
            <input type="password" name="cpassword" placeholder="Confirm your password"  value="<?= set_value('cpassword');?>" class="form-control" />
            <span class="text-danger"><?= form_error('cpassword')?></span>
         </div>  <br>
         <div class="form-group">
            <?php echo form_error('g-recaptcha-response','<div style="color:red;">','</div>');?>
            <div class="form-group">
            <label for="name">Upload your picture:</label>
            <input type="file" name="img" id="img">
           
            </div>
          <div class="g-recaptcha" data-sitekey="6LfVYSIUAAAAAFa0gNrlIOgPhnei6uPEd_rh4HeV"></div>
          </div>   
         <button name="submit" id="img-submit" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>  

    </form>

    <?php if(isset($errors))
    {
    echo $errors;
    }?>
    <?php if(isset($succes))
    {
    echo $succes;
    }?>


    <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">  
    Already have an account? <a href="login">login Here</a>
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
  <script src="assests/javascript/ajax1.js"></script>

</body>
</html>