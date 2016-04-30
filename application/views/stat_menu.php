<script>
$(document).ready(function(){

var placeid = sessionStorage.getItem('placeid');

$('#adventurer-count-day').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','adventurercountday');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=d&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-week').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','adventurercountweek');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=w&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-month').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','adventurercountmonth');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=m&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#adventurer-count-year').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','adventurercountyear');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/adventurercount?type=y&placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#quest-played').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','questplayed');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/questplayed?placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#explorer-count').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','explorercount');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/explorercount?placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    });
    $('#average-score').on("click", function(e){
        e.preventDefault();
        sessionStorage.setItem('mode','averagescore');
        placeid = sessionStorage.getItem('placeid');
        $('#graph').load(
            "<?=base_url('statistic/averagescore?placeid=')?>"+placeid
        );

        $('html,body').animate({
        scrollTop: $("#graph").offset().top},
        'slow');
    }); 

});       
</script>

<a href="#" id="adventurer-count-day"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">&nbsp&nbsp ADVENTURER-DAY</li></a>
<a href="#" id="adventurer-count-week"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">&nbsp&nbsp ADVENTURER-WEEK</li></a>
<a href="#" id="adventurer-count-month"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">&nbsp&nbsp ADVENTURER-MONTH</li></a>
<a href="#" id="adventurer-count-year"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">&nbsp&nbsp ADVENTURER-YEAR</li></a>
<a href="#" id="quest-played"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/paper.png" alt="">&nbsp&nbsp QUEST</li></a>
<a href="#" id="average-score"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rank.png" alt="">&nbsp&nbsp SCORE</li></a>
<a href="#" id="explorer-count"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/top.png" alt="">&nbsp&nbsp POPULAR ZONE</li></a>