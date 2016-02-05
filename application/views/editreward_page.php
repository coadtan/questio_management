<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Reward</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
	<?php $this->load->view('header', array('title' => 'Add Reward'));?>
	<div class ="r1-register">
		<h1 class ="text-white"style="margin-top:50px !important">แก้ไขงรางวัลให้กับผู้เล่นของคุณ</h1>
	</div>
<div class="container-fluid">
	
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open_multipart('editreward/editrewardcheck')?>
	<input type="hidden" name="rewardid" value=<?=$rewarddata['rewardid']?>>
	Reward Name*:
		<input type="text" 
			class ="register-margin register-box" 
			name="rewardname" 
			id="rewardname" 
			size ="100" 
			placeholder ="&nbsp  Must be less than 50 characters"
			value=<?=$rewarddata['rewardname']?>><br>
	Description*:
		<input type="text" 
			class ="register-margin register-box" 
			name="description" 
			id="description" 
			size ="103" 
			placeholder ="&nbsp  Must be less than 200 characters"
			value=<?=$rewarddata['description']?>><br>
	Reward Picture: <input type="file"
			class ="register-margin register-box"
			name="rewardpic"
			id="rewardpic"
			size ="999">
			<br>
	<input type="hidden" name="rewardpic" value=<?=$rewarddata['rewardpic']?>>
	Reward Type*:
		<?= form_dropdown('rewardtype',$rewardtypedata, $rewarddata['rewardtype']); ?>
		 <br><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
