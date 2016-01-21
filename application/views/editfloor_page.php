<?php $this->load->view('head', array('title' => 'Edit Floor'));?>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Edit Floors'));?>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('editfloor/editfloorcheck/'.$floordata["floorid"])?>
		Floor Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="floorname" id="floorname" size="50" value=<?=$floordata["floorname"]?>><br>
		Building Name*:
		<?php echo form_dropdown('buildingid',$buildingdata, $floordata["buildingid"]); ?>
		 <br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
</body>
</html>
