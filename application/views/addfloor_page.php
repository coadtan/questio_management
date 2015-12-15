<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<h1>Add Floors</h1>

	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addfloor/addfloorcheck')?>
		Floor Name*:
		<i>Must be less than 100 characters</i>
		 <input type="text" name="floorname" id="floorname" size="50"><br>
		Building Name*:
		<?php echo form_dropdown('buildingid',$buildingdata); ?>
		 <br>
		<input type="submit" value="Submit">
	</form>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</body>
</html>