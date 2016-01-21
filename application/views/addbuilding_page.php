<?php $this->load->view('head', array('title' => 'Add Building'));?>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Building'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addbuilding/addbuildingcheck')?>
		Building Name*:
		<i>Must be less than 140 characters</i>
		 <input type="text" name="buildingname" id="buildingname" size="50"><br>
		Place Name*:
		<?= form_dropdown('placeid',$placedata); ?>
		 <br>
		Latitude*:
		<input type="text" name="latitude" id="latitude"><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude"><br>
		Radius*:
		<input type="text" name="radius" id="radius"><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
