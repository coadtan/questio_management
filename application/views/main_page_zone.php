<?php $this->load->view('head', array('title' => 'Welcome'));?>
<body>
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
	</div>
	<div id="questlist">
	</div>
</body>
</html>
