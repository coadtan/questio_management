<?=link_tag('assets/questio/questio.css')?>
<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
	$('.keeperbuilding').click(function(){
        var buildingid = this.getAttribute( "buildingid");
        $('#floorlist').load(
        	"<?=base_url('mainpage/getfloor')?>"+ "/"+ buildingid
       	);
       	$('html,body').animate({
        scrollTop: $("#floorlist").offset().top},
        'slow');
        $('.keeperbuilding').removeClass('element_item');
        $('.keeperbuilding').addClass('item_default');
        $(this).removeClass('item_default');
        $(this).addClass('element_item');
    });
    $('#addbuilding').click(function(){
        $('#mainarea').load(
            "<?=base_url('addbuilding')?>"
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
        $(this).addClass('element_item');
        $(this).removeClass('item_default');
    });
    $('.editbuilding').click(function(){
        var buildingid = this.getAttribute("buildingid");
        $('#mainarea').load(
            "<?=base_url('editbuilding/edit/')?>"+ "/"+ buildingid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.deletebuilding').click(function(){
        var buildingid = this.getAttribute("buildingid");
        $('#mainarea').load(
            "<?=base_url('mainpage/deletebuilding')?>"+ "/"+ buildingid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<h1>Buildings</h1>
<div class="row">
<?php if(!empty($data)):?>
	<?php foreach($data as $building):?>
        <div class="col-xs-6 col-md-3">
            <a
            	href="#"
            	class="thumbnail keeperbuilding item_default"
            	id="building_<?=$building['buildingid']?>"
            	buildingid="<?=$building['buildingid']?>"
            >
            <?php if(!empty($building['imageurl'])):?>
		      <img
		      	src="<?=base_url($building['imageurl'])?>"
		      	alt="<?=$building['buildingname']?>">
            <?php else:?>
                <h3 style="color:black"><b><?=$building['buildingname']?></b></h3>
            <?php endif;?>
		    </a>
		    <?=$building['buildingname']?>
		    <a href="#" class="editbuilding" buildingid="<?=$building['buildingid']?>" style ="color:black">Edit</a>
		    <a href="#" class="deletebuilding" buildingid="<?=$building['buildingid']?>"style ="color:black">Delete</a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="#"
		    class="thumbnail item_default"
		    id="addbuilding"
            style="color:black"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="floorlist">
</div>


