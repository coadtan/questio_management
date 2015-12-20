<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<h1>Add Zones</h1>

	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addzone/addzonecheck')?>
		Zone Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="zonename" id="zonename" size="50"><br>
		Floor Name*:
		<?php echo form_dropdown('floorid',$floordata); ?>
		 <br>
		Zone Type*:
		<?php echo form_dropdown('zonetype',$zonetypedata); ?>
		 <br>
		Zone Details:<br>
		<textarea name="zonedetails" rows="5" cols="50">
		</textarea><br>
		QR Code:
		<input type="text" name="qrcode" id="qrcode" value="<?=$qrcode?>" readonly><br>
		Sensor ID:
		<input type="text" name="sensorid" id="sensorid" value="<?=$sensorid?>" readonly><br>
		<input type="submit" value="Submit">
	</form>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</body>
</html>