<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome
	<?=$firstname?>
	<?=$lastname?>
	</h1>
	<a href="addplace">Add Place</a>
	<a href="addbuilding">Add Building</a>
	<a href="addfloor">Add Floor</a>
	<a href="addzone">Add Zone</a>
	<a href="mainpage/logout">Logout</a>
</body>
</html>