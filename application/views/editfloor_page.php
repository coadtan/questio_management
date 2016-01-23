<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Floor</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Floors'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('editfloor/editfloorcheck/'.$floordata["floorid"])?>
		Floor Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="floorname" id="floorname" size="50" value=<?=$floordata["floorname"]?>><br>
		Building Name*:
		<?php echo form_dropdown('buildingid',$buildingdata, $floordata["buildingid"]); ?>
		 <br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
