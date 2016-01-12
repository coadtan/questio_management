<?php $this->load->view('head', array('title' => 'Place List'));?>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Place List'));?>
	<?=form_open('placelist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
	<?php
		$this->table->set_heading('#','Place name','Place Full Name','Latitude','Longitude','Radius','Place Type','Enter Reward Name','Reward Name');

		if(!empty($placedata)){
			for($i=0; $i<count($placedata);$i++){
				$this->table->add_row($placedata[$i]['placeno'],$placedata[$i]['placename'],$placedata[$i]['placefullname'],$placedata[$i]['latitude'],$placedata[$i]['longitude'],$placedata[$i]['radius'],$placedata[$i]['placetype'],$enter_rewarddata[$i],$reward[$i]);
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Place not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>">Go back</a>
</div>
</body>
</html>
