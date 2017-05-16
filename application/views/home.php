<!DOCTYPE html>
<html>
<head>
	<title>Facebook</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	

</head>
<body>
<div>
	<h3>Sign Up</h3>
	<form action="sign_up" method="POST">
		<label>email</label>
		<input type="email" name="email" value="<?= set_value('email');?>">
		<span style="color: red">*<?= form_error('email')?></span>
		<label>password</label>
		<input type="password" name="password" value="<?= set_value('password');?>">
		<span style="color: red">*<?= form_error('password')?></span>
		<label>confirm password</label>
		<input type="password" name="cpassword" value="<?= set_value('cpassword');?>">
		<span style="color: red">*<?= form_error('cpassword')?></span>
		<label>Nick Name</label>
		<input type="text" name="nickName" value="<?= set_value('nickName');?>" onfocusout="check_if_exists()" id="nickName">
		<span id="hint" style="color: red">*<?= form_error('nickName')?></span>

		<input type="submit" name="submit"  value="sign up">
		
	</form>
	<?php if(isset($errors))
	{
		echo $errors;
	}?>
	<?php if(isset($succes))
	{
		echo $succes;
	}?>

</div>
<div>
	<span style="color: red"></span>
	<h3>Sign In</h3>
	<form action="sign_in" method="POST">
	
		<label>Nick Name</label>
		<input type="text" name="nickName">
		<label>password</label>
		<input type="password" name="password">
		<input type="submit" name="submit"  value="sign in">
		
	</form>
</div>
<script src="assests/javascript/ajax1.js"></script>

</body>
</html>