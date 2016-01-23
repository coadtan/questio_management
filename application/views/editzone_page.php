<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Zone</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Zones'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('editzone/editzonecheck/'.$zonedata["zoneid"])?>
		Zone Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="zonename" id="zonename" size="50" value="<?=$zonedata["zonename"]?>"><br>
		Floor Name*:
		<?php echo form_dropdown('floorid',$floordata,$zonedata["floorid"]); ?>
		 <br>
		Zone Type*:
		<?php echo form_dropdown('zonetype',$zonetypedata,$zonedata["zonetypeid"]); ?>
		 <br>
		Zone Details:<br>
		<textarea name="zonedetails" rows="5" cols="50">
		<?=$zonedata["zonedetails"]?>
		</textarea><br>
		Items:
		<?= form_dropdown('itemid',$itemdata,$zonedata["itemid"]); ?><br>
		Rewards:
		<?= form_dropdown('rewardid',$rewarddata,$zonedata["rewardid"]); ?><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
