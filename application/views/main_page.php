<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
<script type="text/javascript">
$(document).ready(function(){
    $('.keeperplace').click(function(){
        var placeid = this.getAttribute("placeid");
        $('#buildinglist').load(
            "<?=base_url('mainpage/getbuilding')?>"+ "/"+ placeid
        );
        $('html,body').animate({
        scrollTop: $("#buildinglist").offset().top},
        'slow');
    });
});
</script>
</head>
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
