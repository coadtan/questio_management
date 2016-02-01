<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Statistics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/questio/questio.css')?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    var placeid = $('#placechoose').val();

    $('#placechoose').on('change', function() {
        placeid = $('#placechoose').val();
    });

    $('#adventurer-count-day').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=d&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-week').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=w&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-month').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=m&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-year').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=y&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#quest-played').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/questplayed?placeid=')?>"+placeid
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
    <select id="placechoose"
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
        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-primary" style="pointer-events: none;">Adventurer Count</button>
            <button type="button" class="btn btn-default" id="adventurer-count-day">Day</button>
            <button type="button" class="btn btn-default" id="adventurer-count-week">Week</button>
            <button type="button" class="btn btn-default" id="adventurer-count-month">Month</button>
            <button type="button" class="btn btn-default" id="adventurer-count-year">Year</button>
            </div>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary" id="quest-played">Quest played</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Average score</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Zone visited</a>
        </div>
    <br>
    <br>
    <br>
    <br>
    <div id="graph">


    </div><!-- end of graph-->
</body>
</html>
