<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<h1>Add Places</h1>

	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addplace/addplacecheck')?>
		Place Name*:
		<i>Must be less than 50 characters</i>
		 <input type="text" name="placename" id="placename" size="30"><br>
		Place Full Name*:
		<i>Must be less than 255 characters</i>
		 <input type="text" name="placefullname" id="placefullname" size="50"><br>
		Latitude*:
		<input type="text" name="latitude" id="latitude"><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude"><br>
		Radius*:
		<input type="text" name="radius" id="radius"><br>
		QR Code:
		<input type="text" name="qrcode" id="qrcode" value="<?=$qrcode?>" readonly><br>
		Sensor ID:
		<input type="text" name="sensorid" id="sensorid" value="<?=$sensorid?>" readonly><br>
		Place Type*:
		<i>Must be less than 30 characters</i>
		<input type="text" name="placetype" id="placetype" size="30"><br>
		<input type="submit" value="Submit">
	</form>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</body>
</html>