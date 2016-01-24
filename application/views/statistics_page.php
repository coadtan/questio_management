<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Statistics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#adventurer-count').click(function(){

        $('#graph').load(
            "<?=base_url('statistic/adventurercount')?>"
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
});
</script>
</head>
<body>
    <div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Statistics'));?>

    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-3">
    <?php if(!empty($keeperplace)):?>
    <select
        data-toggle="select"
        class="form-control select select-default mrs mbm">

        <optgroup label="Choose your place...">
        <?php foreach($keeperplace as $place):?>
        <option value="<?=$place['placeid']?>">
                <?=$place['placename']?>
        </option>
        <?php endforeach;?>
        </optgroup>
      </select>
    <?php endif;?>
        </div>
    </div>
    <br>
    <br>
    <div class="row" >
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
            <a href="#fakelink" id="adventurer-count" class="btn btn-block btn-lg btn-primary">Adventurer count</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Quest played</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Average score</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Zone visited</a>
        </div>

        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Adventurer info</a>
        </div>
        <div class="col-md-1">
        </div>
    <br>
    <br>
    <br>
    <br>
    <div id="graph">


    </div><!-- end of graph-->
</body>
</html>
