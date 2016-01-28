<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Item</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Item'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('additem/additemcheck')?>
		Item Name*:
		<i>Must be less than 30 characters</i>
		 <input type="text" name="itemname" id="itemname" size="30"><br>
		Item Collection*:
		<i>Must be less than 50 characters</i>
		<input type="text" name="itemcollection" id="itemcollection" size="50"><br> 
		Position to Equip*:
		<?= form_dropdown('positionid',$position); ?>
		 <br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
