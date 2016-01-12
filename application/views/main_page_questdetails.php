<?php $this->load->view('head', array('title' => 'Welcome'));?>
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
