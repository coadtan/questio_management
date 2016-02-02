<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Riddle</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Add Riddle'));?>
    <h2 style='color:red'><?=$message?></h2>
    <?= form_open('addquest/addriddlecheck')?>
        <input type="hidden" name="ridid" value="<?=$ridid?>">
        <input type="hidden" name="qrcode" value="<?=$qrcode?>">
        <input type="hidden" name="sensorid" value="<?=$sensorid?>">
        Riddle Details*:
        <input type="text" name="riddetails" size="100"><br>
        Scan Limit*:
        <input type="text" name="scanlimit" value="4"><br>
        Hint 1:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint1" size="100"><br>
        Hint 2:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint2" size="100"><br>
        Hint 3:<i>Must not longer than 100 characters</i>
        <input type="text" name="hint3" size="100"><br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    <a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
