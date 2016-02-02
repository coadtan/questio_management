<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Quiz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Add Quiz'));?>
    <h2 style='color:red'><?=$message?></h2>
    <?= form_open('addquest/addquizcheck')?>
        <input type="hidden" name="questid" value="<?=$questid?>">
        <input type="hidden" name="seqid" value="<?=$seqid?>">
        Question*:
        <input type="text" name="question" size="100"><br>
        Choice 1*:<i>Must not longer than 100 characters</i>
        <input type="text" name="choicea" size="100"><br>
        Choice 2*:<i>Must not longer than 100 characters</i>
        <input type="text" name="choiceb" size="100"><br>
        Choice 3:<i>Must not longer than 100 characters</i>
        <input type="text" name="choicec" size="100"><br>
        Choice 4:<i>Must not longer than 100 characters</i>
        <input type="text" name="choiced" size="100"><br>
        Answer*
        <input type="radio" name="answerid" value="1" checked>1
        <input type="radio" name="answerid" value="2">2
        <input type="radio" name="answerid" value="3">3
        <input type="radio" name="answerid" value="4">4
         <br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    <a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
