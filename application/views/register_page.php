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
	<?php $this->load->view('header', array('title' => 'Keeper Registeration'));?>
	<div class ="r1-register">
		<h1 class ="text-white"style="margin-top:50px !important">สร้าง Keeper ID ของคุณ</h1>
	</div>
	<div class="container-fluid">
		<h5 style='color:red'><?=$message?></h5>
		<?= form_open('register/updatecheck')?>
		<p><h3 class ="text-gray" style ="margin-top:30px;margin-bottom:20px">Keeper ID คือบัญชีเดียวเท่านั้นที่คุณต้องการสำหรับการใช้บริการทุกอย่างจาก Questio</h3></p>
		<input type="text" 
			class ="register-margin register-box" 
			name="username" 
			id="username" 
			size ="100" 
			placeholder ="&nbsp Username*: Must be 3-50 characters"><br>
		<input type="password" 
			class ="register-margin register-box" 
			name="password" 
			size ="100" id="password" 
			placeholder ="&nbsp Password*: Must be 8-50 characters"><br>
		<input type="password" 
			class ="register-margin register-box" 
			name="passwordconf" 
			size ="100" 
			id="passwordconf" 
			placeholder ="&nbsp Password Confirmation*:"><br>
		<input type="text" 
			class ="register-margin register-box" 
			name="fname" id="fname" 
			size="48" 
			placeholder ="&nbsp First Name*: ">
		<input type="text" 
			class ="register-margin register-box" 
			name="lname" 
			id="lname" 
			size="48" 
			placeholder="&nbsp Last Name*: "><br>
		<input type="tel" 
			class ="register-margin register-box" 
			name="telephone" 
			id="telephone"
			size ="100" 
			placeholder="&nbsp Telephone*:"><br>
		<input type="email"
			class ="register-margin register-box" 
			name="email" id="email" 
			size="100" 
			placeholder="&nbsp E-Mail*:"><br>
		<input type="submit" 
			class ="register-margin" 
			value="Submit">
		<?=form_close()?>
		<div class="forget-footer" style ="margin-top:20px !important">
		</div>
	</div>
	</div>
</body>
</html>
