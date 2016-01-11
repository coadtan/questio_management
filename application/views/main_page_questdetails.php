<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
	<title>Welcome</title>
	<!--<script type="text/javascript">
		$(document).ready(function(){
			$('.keeperquest').click(function(){
				
			});
		});
	</script>-->
</head>
<body>
	<?php
		if(!empty($keeperquestdetails)){
			for($i=0; $i<count($keeperquestdetails);$i++){
				//echo "<a class='keeperquestdetails' id='quest_".$keeperquestdetails[$i]['floorid']."' href='#questdetails'>";
				echo '<h3>Name: '.$keeperquestdetails[$i]['questname'].'</h3>';
				echo 'Description: '.$keeperquestdetails[$i]['questdetails'].'<br>';
				echo 'Type: '.$keeperquestdetails[$i]['typename'].'<br>';
				echo 'Difficulty: '.$keeperquestdetails[$i]['difftype'].'<br>';
				echo 'Rewards: '.$keeperquestdetails[$i]['rewardname'].'<br>';
				//echo "</a>";
			};
		}
	?>
	<!--<div id="questdetails">
	</div>-->
</body>
</html>
