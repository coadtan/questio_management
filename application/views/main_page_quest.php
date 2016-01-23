<script type="text/javascript">
$(document).ready(function(){
    $('.keeperquest').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#questdetails').load("<?=base_url('mainpage/getquestdetails/')?>" + '/' + zoneid)
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
            	class="keeperquest"
            	id="quest_<?=$quest['questid']?>"
            	zoneid="<?=$quest['questid']?>"
            >
		      
		    </a>
		    <?=$zone['zonename']?>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
<?php
	if(!empty($keeperquest)){
		for($i=0; $i<count($keeperquest);$i++){
			echo "<a class='keeperquest' id='quest_".$keeperquest[$i]['questid']."' href='#questdetails'>";
			echo '<h3>'.$keeperquest[$i]['questname'].'</h3>';
			echo '<h5>'.$keeperquest[$i]['typename'].'</h5>';
			echo "</a>";
		};
	}
?>
</div>
<div id="questdetails">
</div>
