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
	<?php $this->load->view('header', array('title' => 'Add Item'));?>
	<div class ="r1-register">
		<h1 class ="text-white"style="margin-top:50px !important"> สร้างอุปกรณ์ให้กับตัวละคร</h1>
	</div>
<div class="container-fluid">
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('additem/additemcheck')?>
		Item Name*: 
		<input type="text" 
			class ="register-margin register-box" 
			name="itemname" 
			id="itemname" 
			size ="100" 
			placeholder ="&nbsp Must be less than 30 characters"><br>
		Item Collection*:
		<input type="text" 
			class ="register-margin register-box" 
			name="itemcollection" 
			id="itemcollection" 
			size ="97" 
			placeholder ="&nbsp  Must be less than 50 characters"><br>
		Position to Equip*:
		<?= form_dropdown('positionid',$position); ?>
		 <br><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
