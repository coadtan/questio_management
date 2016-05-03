<script type="text/javascript">
    
    $(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    

        var placeid = sessionStorage.setItem('placeid', $('#placechoose').val());
    $('#placechoose').on('change', function() {
        placeid = sessionStorage.setItem('placeid', $('#placechoose').val());
        var mode = sessionStorage.getItem('mode');
        if(mode=='adventurercountday'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/adventurercount?type=d&placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='adventurercountweek'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/adventurercount?type=w&placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='adventurercountmonth'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/adventurercount?type=m&placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='adventurercountyear'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/adventurercount?type=y&placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='questplayed'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/questplayed?placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='explorercount'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/explorercount?placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }else if(mode=='averagescore'){
            placeid = sessionStorage.getItem('placeid');
            $('#graph').load(
                "<?=base_url('statistic/averagescore?placeid=')?>"+placeid
            );

            $('html,body').animate({
            scrollTop: $("#graph").offset().top},
            'slow');
        }
    });

    
});
</script>
<div class ="r1-add-place">
        <h1 class ="text-white"style="margin-top:50px !important">Statistic Management </h1>
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
    <h1 id="error" style='color:red'></h1>
    <div id="graph" style ="margin:100px">


    </div><!-- end of graph-->
</body>
</html>
