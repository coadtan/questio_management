<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('.keeperzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
        	"<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
        $('.keeperzone').removeClass('element_item');
        $(this).removeClass('item_default');
        $(this).addClass('element_item');
    });
    $('#addzone').click(function(){
        $('#mainarea').load(
            "<?=base_url('addzone')?>"
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
            "<?=base_url('editzone/edit/')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.deletezone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
            "<?=base_url('mainpage/deletezone')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<h1>Zones</h1>
<div class="row">
<?php if(!empty($data)):?>
	<?php foreach($data as $zone):?>
        <div class="col-xs-6 col-md-3">
            <a
            	href="#"
            	class="thumbnail keeperzone item_default"
            	id="zone_<?=$zone['zoneid']?>"
            	zoneid="<?=$zone['zoneid']?>"
            >
            <?php if(!empty($zone['imageurl'])):?>
		      <img
		      	src="<?=base_url($zone['imageurl'])?>"
		      	alt="<?=$zone['zonename']?>">
            <?php else:?>
                <h3 style="color:black"><b><?=$zone['zonename']?></b></h3>
            <?php endif;?>
		    </a>
		    <?=$zone['zonename']?>
		    <a href="#" class="editzone" zoneid="<?=$zone["zoneid"]?>"style ="color:black">Edit</a>
		    <a href="#" class="deletezone" zoneid="<?=$zone["zoneid"]?>"style ="color:black">Delete</a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="#"
		    class="thumbnail item_default"
		    id="addzone"
            style="color:black"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="questlist">
</div>
