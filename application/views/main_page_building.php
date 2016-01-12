<?php $this->load->view('head', array('title' => 'Welcome'));?>
<body>
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
			      	src="http://52.74.64.61/<?=$building['imageurl']?>"
			      	alt="<?=$building['buildingname']?>">
			    </a>
			    <?=$building['buildingname']?>
		  	</div>
        <?php endforeach;?>
	<?php endif;?>
	</div>
	<div id="floorlist">
	</div>
</body>
</html>
