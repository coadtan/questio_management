<?php $this->load->view('head', array('title' => 'Welcome'));?>
<body>
	<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Welcome'));?>
	<a href="<?=base_url('statistic')?>">Statistics</a>
	<h1>Places</h1>
	<div class="row">
	<?php if(!empty($keeperplace)):?>
		<?php foreach($keeperplace as $place):?>
            <div class="col-xs-6 col-md-3">
	            <a
	            	href="#"
	            	class="thumbnail keeperplace"
	            	id="place_<?=$place['placeid']?>"
	            	placeid="<?=$place['placeid']?>"
	            >
			      <img
			      	src="http://52.74.64.61/<?=$place['imageurl']?>"
			      	alt="<?=$place['placename']?>">
			    </a>
			    <?=$place['placename']?>
			    <a href="<?=base_url('editplace/edit/'.$place["placeid"])?>">Edit</a>
			    <a href="<?=base_url('mainpage/deleteplace/'.$place["placeid"])?>">Delete</a>
		  	</div>
        <?php endforeach;?>
	<?php endif;?>
		<div class="col-xs-6 col-md-3" style="text-align:center">
			<a
			    href="<?=base_url('addplace')?>"
			    class="thumbnail"
			>
				<span class="fui-plus" style="font-size:100px"></span>
			</a>
		</div>
	</div>

	<div id="buildinglist">
	</div>
</div>
</body>
</html>
