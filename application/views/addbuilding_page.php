<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<h1>Add Buildings</h1>

	<h2 style='color:red'><?=$message?></h2>
	<form action="/questio_management/index.php/addbuilding/addbuildingcheck" method="POST">
		Building Name*:
		<i>Must be less than 140 characters</i>
		 <input type="text" name="buildingname" id="buildingname" size="50"><br>
		Place Name*:
		<?php echo form_dropdown('placeid',$placedata); ?>
		 <br>
		Latitude*:
		<input type="text" name="latitude" id="latitude"><br>
		Longitude*:
		<input type="text" name="longitude" id="longitude"><br>
		Radius*:
		<input type="text" name="radius" id="radius"><br>
		<input type="submit" value="Submit">
	</form>
	<a href="/questio_management/index.php/mainpage">Go Back</a>
</body>
</html>