<?php $this->load->view('head', array('title' => 'Add Floor'));?>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Add Floors'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addfloor/addfloorcheck')?>
		Floor Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="floorname" id="floorname" size="50"><br>
		Building Name*:
		<?php echo form_dropdown('buildingid',$buildingdata); ?>
		 <br>
		QR Code:
		<input type="text" name="qrcode" id="qrcode" value="<?=$qrcode?>" readonly><br>
		Sensor ID:
		<input type="text" name="sensorid" id="sensorid" value="<?=$sensorid?>" readonly><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
