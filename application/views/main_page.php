<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
	<title>Welcome</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.keeperplace').click(function(){
				var id = this.id;
				$('#buildinglist').load("<?=base_url('mainpage/getbuilding/"+id+"')?>")
			});
		});
	</script>
</head>
<body>
	<h1>Welcome
	<?=$firstname?>
	<?=$lastname?>
	</h1>
	<a href="<?=base_url('addplace')?>">Add Place</a>
	<a href="<?=base_url('addbuilding')?>">Add Building</a>
	<a href="<?=base_url('addfloor')?>">Add Floor</a>
	<a href="<?=base_url('addzone')?>">Add Zone</a>
	<a href="<?=base_url('mainpage/logout')?>">Logout</a>
	<div id="placelist">
	<?php
		if(!empty($keeperplace)){
			for($i=0; $i<count($keeperplace);$i++){
				echo "<a class='keeperplace' id='place_".$keeperplace[$i]['placeid']."' href='#buildinglist'>";
				echo '<img src="http://52.74.64.61'.$keeperplace[$i]['imageurl'].'" style="width:250px;height:250px;">';
				echo '<h3>'.$keeperplace[$i]['placename'].'</h3>';
				echo "</a>";
			};
		}
	?>
	</div>
	<div id="buildinglist">
	</div>
</body>
</html>
