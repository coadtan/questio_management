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
    $('#explorer-count').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/explorercount?placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#average-score').click(function(){
        $('#graph').load(
            "<?=base_url('statistic/averagescore?placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
        <h1 class ="text-white"style="margin-top:50px !important">Statistic Managemet </h1>
</div>
<br><br>
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
            <button type="button" class="btn btn-primary" style="pointer-events: none;"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">Adventurer Count</button>
            <button type="button" class="btn btn-default" id="adventurer-count-day">Day</button>
            <button type="button" class="btn btn-default" id="adventurer-count-week">Week</button>
            <button type="button" class="btn btn-default" id="adventurer-count-month">Month</button>
            <button type="button" class="btn btn-default" id="adventurer-count-year">Year</button>
            </div>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary" id="quest-played"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/paper.png" alt="">Quest played</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary" id="average-score"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rank.png" alt="">Average score</a>
        </div>
        <div class="col-md-2">
            <a href="#fakelink" class="btn btn-block btn-lg btn-primary" id="explorer-count"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/top.png" alt="">Zone visited</a>
        </div>
    <div id="graph" style ="margin:100px">


    </div><!-- end of graph-->
</body>
</html>
