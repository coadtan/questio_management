<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>

	
</head>
<body>
	<?=$data?>
    <?php foreach($datas as $element):?>
    	<?=$element['fname']?>
    	<?=$element['lname']?>
    <?php endforeach;?>
</body>
</html>