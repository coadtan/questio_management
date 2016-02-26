<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Building</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Building'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open_multipart('editbuilding/editbuildingcheck/'.$buildingdata["buildingid"])?>
		Building Name*:
		<i>Must be less than 140 characters</i>
		 <input type="text" name="buildingname" id="buildingname" size="50" value='<?=$buildingdata["buildingname"]?>'><br>
		Place Name*:
		<?= form_dropdown('placeid',$placedata, $buildingdata['placeid']); ?>
		 <br>
		Latitude*:
		<input type="text" name="latitude" id="latitude" value='<?=$buildingdata["latitude"]?>'><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude" value='<?=$buildingdata["longitude"]?>'><br>
		Radius*:
		<input type="text" name="radius" id="radius" value='<?=$buildingdata["radius"]?>'><br>
		<input type="hidden" name="imageurl" value='<?=$buildingdata["imageurl"]?>'>
		Building Image: <input type="file"
			class ="register-margin register-box"
			name="buildingpic"
			id="buildingpic"
			size ="999">
			<br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
