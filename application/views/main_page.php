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
	<a href="<?=base_url('addplace')?>">Add Place</a>
	<a href="<?=base_url('addbuilding')?>">Add Building</a>
	<a href="<?=base_url('addfloor')?>">Add Floor</a>
	<a href="<?=base_url('addzone')?>">Add Zone</a>
	<a href="<?=base_url('mainpage/logout')?>">Logout</a>
</body>
</html>