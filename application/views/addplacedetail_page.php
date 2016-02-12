<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Place Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Place Details'));?>
	<h2 style='color:red'><?=$message?></h2>
    <?= form_open_multipart('addplace/addplacedetailcheck')?>
    <input type="hidden" name="placeid" value="<?=$placeid?>">
	    Place Details:*<br>
			<textarea name="placedetails" rows="5" cols="50">
			</textarea><br>
		Phone Contact:<br>
		1.* <input type="tel" name="phonecontact1" size="10"><br>
		2. <input type="tel" name="phonecontact2" size="10"><br>
		Website:<br>
		<input type="text" name="website" size="30"><br>
		Email:<br>
		<input type="email" name="email" size="30"><br>
	    Place Picture: <input type="file"
	        class ="register-margin register-box"
	        name="placepic"
	        id="placepic"
	        size ="999">
	        <br>
	    <input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('questoverview/'.$zoneid)?>">Go Back</a>
</div>
</body>
</html>