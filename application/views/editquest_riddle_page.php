<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Riddle</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Edit Riddle'));?>
    <h2 style='color:red'><?=$message?></h2>
    <?= form_open('editquest/editriddlecheck')?>
        <input type="hidden" name="ridid" value=<?=$riddledata['ridid']?>>
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
        Riddle Details*:
        <input type="text" name="riddetails" size="100" value=<?=$riddledata['riddetails']?>><br>
        Scan Limit*:
        <input type="text" name="scanlimit" value="4" value=<?=$riddledata['scanlimit']?>><br>
        Hint 1:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint1" size="100" value=<?=$riddledata['hint1']?>><br>
        Hint 2:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint2" size="100" value=<?=$riddledata['hint2']?>><br>
        Hint 3:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint3" size="100" value=<?=$riddledata['hint3']?>><br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    <a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
