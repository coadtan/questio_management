<?php $this->load->view('head', array('title' => 'Edit Building'));?>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Building'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('editbuilding/editbuildingcheck/'.$buildingdata["buildingid"])?>
		Building Name*:
		<i>Must be less than 140 characters</i>
		 <input type="text" name="buildingname" id="buildingname" size="50" value=<?=$buildingdata["buildingname"]?>><br>
		Place Name*:
		<?= form_dropdown('placeid',$placedata, $buildingdata['placeid']); ?>
		 <br>
		Latitude*:
		<input type="text" name="latitude" id="latitude" value=<?=$buildingdata["latitude"]?>><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude" value=<?=$buildingdata["longitude"]?>><br>
		Radius*:
		<input type="text" name="radius" id="radius" value=<?=$buildingdata["radius"]?>><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
