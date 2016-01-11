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
			$('.keeperfloor').click(function(){
				var id = this.id;
				$('#zonelist').load("<?=base_url('mainpage/getzone/"+id+"')?>")
			});
		});
	</script>
</head>
<body>
	<?php
		if(!empty($keeperfloor)){
			for($i=0; $i<count($keeperfloor);$i++){
				echo "<a class='keeperfloor' id='floor_".$keeperfloor[$i]['floorid']."' href='#zonelist'>".'<img src="http://52.74.64.61'.$keeperfloor[$i]['imageurl'].'" style="width:250px;height:250px;">';
				echo '<h3>'.$keeperfloor[$i]['floorname'].'</h3>';
				echo "</a>";
			};
		}
	?>
	<div id="zonelist">
	</div>
</body>
</html>
