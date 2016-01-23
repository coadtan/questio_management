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
	<h1>Enter E-Mail Address</h1>
	<?=validation_errors();?>
	<?=form_open('forgotpassword')?>
		E-Mail*: <input type="email" name="email" id="email" size="100"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
</div>
</body>
</html>
