<script type="text/javascript">
$(document).ready(function(){
    $('.keeperzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $("#questlist").load('<?php echo site_url('mainpage/getquest'); ?>'+'/'+zoneid);
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
			      	src="http://52.74.64.61/<?=$zone['imageurl']?>"
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
				<span class="fui-plus" style="font-size:100px"></span>
			</a>
		</div>
	</div>
	<div id="questlist">
	</div>