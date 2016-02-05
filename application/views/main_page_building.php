<script type="text/javascript">
$(document).ready(function(){
$('.keeperbuilding').click(function(){
        var buildingid = this.getAttribute( "buildingid");
        $('#floorlist').load(
        	"<?=base_url('mainpage/getfloor')?>"+ "/"+ buildingid
       	);
       	$('html,body').animate({
        scrollTop: $("#floorlist").offset().top},
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
            	class="thumbnail keeperbuilding"
            	id="building_<?=$building['buildingid']?>"
            	buildingid="<?=$building['buildingid']?>"
            >
		      <img
		      	src="http://52.74.64.61/questio_management/<?=$building['imageurl']?>"
		      	alt="<?=$building['buildingname']?>">
		    </a>
		    <?=$building['buildingname']?>
		    <a href="<?=base_url('editbuilding/edit/'.$building["buildingid"])?>">Edit</a>
		    <a href="<?=base_url('mainpage/deletebuilding/'.$building["buildingid"])?>">Delete</a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="<?=base_url('addbuilding')?>"
		    class="thumbnail"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="floorlist">
</div>

