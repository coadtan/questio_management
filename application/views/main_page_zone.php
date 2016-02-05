<script type="text/javascript">
$(document).ready(function(){
    $('.keeperzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
        	"<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
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
	            	class="thumbnail keeperzone"
	            	id="zone_<?=$zone['zoneid']?>"
	            	zoneid="<?=$zone['zoneid']?>"
	            >
			      <img
			      	src="http://52.74.64.61/questio_management<?=$zone['imageurl']?>"
			      	alt="<?=$zone['zonename']?>">
			    </a>
			    <?=$zone['zonename']?>
			    <a href="<?=base_url('editzone/edit/'.$zone["zoneid"])?>">Edit</a>
			    <a href="<?=base_url('mainpage/deletezone/'.$zone["zoneid"])?>">Delete</a>
		  	</div>
        <?php endforeach;?>
	<?php endif;?>
		<div class="col-xs-6 col-md-3" style="text-align:center">
			<a
			    href="<?=base_url('addzone')?>"
			    class="thumbnail"
			>
				<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
			</a>
		</div>
	</div>
	<div id="questlist">
	</div>
