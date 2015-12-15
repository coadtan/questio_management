<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<?php echo validation_errors();?>
	<?php echo form_open('login')?>
		<b>Username: </b>
		<input type="text" size="20" id="username" name="username"/>
		<br/>
		<b>Password: </b>
		<input type="password" size="20" id="password" name="password"/>
		<br/>
		<input type="submit" value="login">
	</form>
	<a href="<?=base_url('register')?>">Register</a>
	<a href="<?=base_url('forgotpassword')?>">Forgot password?</a>
</body>
</html>