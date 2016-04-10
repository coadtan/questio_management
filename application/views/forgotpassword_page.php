<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
	<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
	<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
	<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
	<div class="container-fluid">
		<?php $this->load->view('header', array('title' => 'Forgot Password'));?>
		<div class ="r1-register">
			<h1 class ="text-white"style="margin-top:50px !important">มีปัญหาในการเข้าสู่ระบบใช่หรือไม่</h1>
		</div>
		<div style ="margin-top:30px">
			<h3>ป้อน EMAIL ADDRESS ของคุณเพื่อรีเซ็ตรหัสผ่านที่คุณลืม ปลดล็อกบัญชีที่ถูกล็อก หรือกู้คืน KEEPER ID</h3>
			<h5 style='color:red'><?=validation_errors();?></h5>
			<?=form_open('forgotpassword')?>
			<input type="email"
			class ="register-margin register-box" 
			name="email" id="email" 
			size="100" 
			placeholder="&nbsp E-Mail*:"><br>
			<input type="submit" value="Enter">
			<?=form_close()?>
			<div class="forget-footer">
			</div>
		</div>
	</div>
</body>
</html>
