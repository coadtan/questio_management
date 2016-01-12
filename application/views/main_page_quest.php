<?php $this->load->view('head', array('title' => 'Welcome'));?>
<body>
	<h1>Zones</h1>
	<div class="row">
	<?php if(!empty($data)):?>
		<?php foreach($data as $zone):?>
            <div class="col-xs-6 col-md-3">
	            <a
	            	href="#"
	            	class="keeperquest"
	            	id="zone_<?=$zone['zoneid']?>"
	            	zoneid="<?=$zone['zoneid']?>"
	            >
			      <img
			      	src="http://52.74.64.61/<?=$zone['imageurl']?>"
			      	alt="<?=$zone['zonename']?>">
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
</body>
</html>
