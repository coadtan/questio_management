<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<h1>Enter E-Mail Address</h1>
	<?php echo validation_errors();?>
	<?php echo form_open('forgotpassword')?>
		E-Mail*: <input type="email" name="email" id="email" size="100"><br>
		<input type="submit" value="Enter">
	</form>
</body>
</html>