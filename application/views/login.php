<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>login to GANA</title>
  
  
    <link rel="shortcut icon" href="assests/imgs/1495417458_message.png">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <link rel="stylesheet" href="assests/css/loginstyle.css">

  
</head>

<body style="background-image: url(assests/imgs/background2.jpg);">

  <div class="wrapper">
    <form class="form-signin" action="sign_in" method="POST">       
      <h2 class="form-signin-heading">login</h2>
      
        <div class="form-group">
            <label for="name">Your Nickname</label>
            <input type="text" name="nickName" placeholder="Nick name" class="form-control" autofocus="" />
          </div>

          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control" />
           
          </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button> 
      <br>  
      <span class="text-danger text-center">  <?php if(isset($errors)){echo $errors;}?></span>  
    </form>


  
    
 
    <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">  
    New User? <a href="register">Register Here</a>
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
