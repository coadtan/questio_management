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
			$('.keeperquest').click(function(){
				var id = this.id;
				$('#questdetails').load("<?=base_url('mainpage/getquestdetails/"+id+"')?>")
			});
		});
	</script>
</head>
<body>
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
	<div id="questdetails">
	</div>
</body>
</html>
