<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Quest</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Quest'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addquest/addquestcheck')?>
		Quest Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="questname" id="questname" size="100"><br>
		Quest Details*:
		<textarea name="questdetails" rows="5" cols="50">
		</textarea><br>
		Quest Type*:
		<?= form_dropdown('questtypeid',$questtype); ?>
		 <br>
		<input type="hidden" name="zoneid" value="<?=$zoneid?>">
		Difficulty*:
		<?= form_dropdown('diffid',$difficulty); ?>
		 <br>
		Rewards:
		<?= form_dropdown('rewardid',$reward); ?>
		 <br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
