<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Place</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Places'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('editplace/editplacecheck/'.$placedata["placeid"])?>
		Place Name*:
		<i>Must be less than 50 characters</i>
		 <input type="text" name="placename" id="placename" value=<?=$placedata["placename"]?> size="30"><br>
		Place Full Name*:
		<i>Must be less than 255 characters</i>
		 <input type="text" name="placefullname" id="placefullname" value=<?=$placedata["placefullname"]?> size="50"><br>
		Latitude*:
		<input type="text" name="latitude" id="latitude" value=<?=$placedata["latitude"]?>><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude" value=<?=$placedata["longitude"]?>><br>
		Radius*:
		<input type="text" name="radius" id="radius" value=<?=$placedata["radius"]?>><br>
		Place Type*:
		<i>Must be less than 30 characters</i>
		<input type="text" name="placetype" id="placetype" size="30" value=<?=$placedata["placetype"]?>><br>
		Enter Rewards:
		<?= form_dropdown('enter_rewardid',$enterrewarddata,$placedata["enter_rewardid"]); ?><br>
		Rewards:
		<?= form_dropdown('rewardid',$rewarddata,$placedata["rewardid"]); ?><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
