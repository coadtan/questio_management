<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add News</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Add News'));?>
    <h2 style='color:red'><?=$message?></h2>
    <?= form_open('editnews/editnewscheck')?>
        <input type="hidden" name="newsid" value=<?=$newsdata['newsid']?>>
        Place Name*:
        <?= form_dropdown('placeid',$placedata, $newsdata['placeid']); ?>
         <br>
        News Header*:<i>Must not longer than 100 characters</i>
        <input type="text" name="newsheader" size="100" value=<?=$newsdata['newsheader']?>><br>
        News Details*:
        <input type="text" name="newsdetails" size="100" value=<?=$newsdata['newsdetails']?>><br>
        Date Started*:
        <input type="datetime" name="datestarted" value=<?=$newsdata['datestarted']?>><br>
        Date Ended*:
        <input type="datetime" name="dateended" value=<?=$newsdata['dateended']?>><br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    <a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
