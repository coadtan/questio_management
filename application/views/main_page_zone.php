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
			$('.keeperzone').click(function(){
				var id = this.id;
				$('#questlist').load("<?=base_url('mainpage/getquest/"+id+"')?>")
			});
		});
	</script>
</head>
<body>
	<?php
		if(!empty($keeperzone)){
			for($i=0; $i<count($keeperzone);$i++){
				echo "<a class='keeperzone' id='zone_".$keeperzone[$i]['zoneid']."' href='#questlist'>";
				echo '<img src="http://52.74.64.61'.$keeperzone[$i]['imageurl'].'" style="width:250px;height:250px;">';
				echo '<h3>'.$keeperzone[$i]['zonename'].'</h3>';
				echo "</a>";
			};
		}
	?>
	<div id="questlist">
	</div>
</body>
</html>
