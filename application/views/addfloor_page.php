<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Floor</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Floors'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open_multipart('addfloor/addfloorcheck')?>
		Floor Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="floorname" id="floorname" size="50"><br>
		Building Name*:
		<?php echo form_dropdown('buildingid',$buildingdata); ?>
		 <br>
		QR Code:
		<input type="text" name="qrcode" id="qrcode" value="<?=$qrcode?>" readonly><br>
		Sensor ID:
		<input type="text" name="sensorid" id="sensorid" value="<?=$sensorid?>" readonly><br>
		<input type="submit" value="Submit">
		Floor Image: <input type="file"
			class ="register-margin register-box"
			name="floorpic"
			id="floorpic"
			size ="999">
			<br>
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
