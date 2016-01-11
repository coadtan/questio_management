<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
	<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
	<!-- <?=link_tag('assets/bootstrap/css/bootstrap-theme.min.css')?> -->
</head>
<body>
	<!--<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">.col-md-5</div>
			<div class="col-md-1">.col-md-1</div>
			<div class="col-md-1">.col-md-1</div>
			<div class="col-md-1">.col-md-1</div>
			<div class="col-md-1">.col-md-1</div>
			<div class="col-md-1">.col-md-1</div>
			<div class="col-md-2">.col-md-2</div>
		</div>
		<div class="row" align="center" style ="backgroundcolor:red">
			<div class="row">row1</div>
			<div class="row">row1</div>
		</div>
		<div class="row" align ="center">
			<div class="col-md-2">.col-md-2</div>
			<div class="col-md-2">.col-md-2</div>
			<div class="col-md-2">.col-md-2</div>
			<div class="col-md-2">.col-md-2</div>
			<div class="col-md-2">.col-md-2</div>
			<div class="col-md-2">.col-md-2</div>
		</div>
		<div class="row" align ="center">
			<div class="col-md-6">.col-md-6</div>
			<div class="col-md-6">.col-md-6</div>
		</div>
		-->
	
 		<div class="row">
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
		<br>
		<a href="<?=base_url('placelist')?>">Place list</a>
		<a href="<?=base_url('itemlist')?>">Item list</a>
		<a href="<?=base_url('questlist')?>">Quest list</a>
		<a href="<?=base_url('rewardlist')?>">Reward list</a>
	</div> 
</div> 

</body>
</html>