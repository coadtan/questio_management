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
			$('.keeperbuilding').click(function(){
				var id = this.id;
				$('#floorlist').load("<?=base_url('mainpage/getfloor/"+id+"')?>")
			});
		});
	</script>
</head>
<body>
	<?php
		if(!empty($keeperbuilding)){
			for($i=0; $i<count($keeperbuilding);$i++){
				echo "<a class='keeperbuilding' id='building_".$keeperbuilding[$i]['buildingid']."' href='#floorlist'>";
				echo '<img src="http://52.74.64.61'.$keeperbuilding[$i]['imageurl'].'" style="width:250px;height:250px;">';
				echo '<h3>'.$keeperbuilding[$i]['buildingname'].'</h3>';
				echo "</a>";
			};
		}
	?>
	</div>
	<div id="floorlist">
	</div>
</body>
</html>
