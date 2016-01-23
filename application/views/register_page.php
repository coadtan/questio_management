<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Keeper Registeration'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('register/updatecheck')?>
		Username*:
		<i>Must be 3-16 characters</i>
		 <input type="text" name="username" id="username"><br>
		Password*:
		<i>Must be 8-12 characters</i>
		 <input type="password" name="password" id="password"><br>
		Password Confirmation*: <input type="password" name="passwordconf" id="passwordconf"><br>
		First Name*: <input type="text" name="fname" id="fname" size="50"><br>
		Last Name*: <input type="text" name="lname" id="lname" size="50"><br>
		Telephone*: <input type="tel" name="telephone" id="telephone"><br>
		E-Mail*: <input type="email" name="email" id="email" size="100"><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
</div>
</body>
</html>
