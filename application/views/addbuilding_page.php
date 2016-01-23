<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Building</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Building'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addbuilding/addbuildingcheck')?>
		Building Name*:
		<i>Must be less than 140 characters</i>
		 <input type="text" name="buildingname" id="buildingname" size="50"><br>
		Place Name*:
		<?= form_dropdown('placeid',$placedata); ?>
		 <br>
		Latitude*:
		<input type="text" name="latitude" id="latitude"><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude"><br>
		Radius*:
		<input type="text" name="radius" id="radius"><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
