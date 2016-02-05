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
	<?= form_open('editquest/editquizcheck')?>
		<input type="hidden" name="quizid" value=<?=$quizdata['quizid']?>>
		<input type="hidden" name="questid" value=<?=$questdata['questid']?>>
		Quest Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="questname" id="questname" size="100" value=<?=$questdata['questname']?>><br>
		Quest Details*:
		<textarea name="questdetails" rows="5" cols="50">
		<?=$questdata['questdetails']?>
		</textarea><br>
		 <br>
		Difficulty*:
		<?= form_dropdown('diffid',$difficulty,$questdata['diffid']); ?>
		 <br>
		Rewards:
		<?= form_dropdown('rewardid',$reward,$questdata['rewardid']); ?>
		 <br>
        Question*:
        <input type="text" name="question" size="100" value=<?=$quizdata['question']?>><br>
        Choice 1*:<i>Must not longer than 100 characters</i>
        <input type="text" name="choicea" size="100" value=<?=$quizdata['choicea']?>><br>
        Choice 2*:<i>Must not longer than 100 characters</i>
        <input type="text" name="choiceb" size="100" value=<?=$quizdata['choiceb']?>><br>
        Choice 3:<i>Must not longer than 100 characters</i>
        <input type="text" name="choicec" size="100" value=<?=$quizdata['choicec']?>><br>
        Choice 4:<i>Must not longer than 100 characters</i>
        <input type="text" name="choiced" size="100" value=<?=$quizdata['choiced']?>><br>
        Answer*
        <input type="radio" name="answerid" value="1" <?=$quizdata['answerid']== 1 ? 'checked' : ''?>>1
        <input type="radio" name="answerid" value="2" <?=$quizdata['answerid']== 2 ? 'checked' : ''?>>2
        <input type="radio" name="answerid" value="3" <?=$quizdata['answerid']== 3 ? 'checked' : ''?>>3
        <input type="radio" name="answerid" value="4" <?=$quizdata['answerid']== 4 ? 'checked' : ''?>>4
         <br>
        <input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('questoverview/'.$zoneid)?>">Go Back</a>
</div>
</body>
</html>