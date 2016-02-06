<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Puzzle</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Edit Puzzle'));?>
    <h2 style='color:red'><?=$message?></h2>
    <?= form_open_multipart('editquest/editpuzzlecheck')?>
        <input type="hidden" name="puzzleid" value=<?=$puzzledata['puzzleid']?>>
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
        <input type="hidden" name="imageurl" value=<?=$puzzledata['imageurl']?>>
        Puzzle Picture: <input type="file"
            class ="register-margin register-box"
            name="puzzlepic"
            id="puzzlepic"
            size ="999">
            <br>
        Helper Answer:<i>Must not longer than 100 characters</i>
        <input type="text" name="helperanswer" size="100" value=<?=$puzzledata['helperanswer']?>><br>
        Correct Answer*:<i>Must not longer than 100 characters</i>
        <input type="text" name="correctanswer" size="100" value=<?=$puzzledata['correctanswer']?>><br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    <a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>

