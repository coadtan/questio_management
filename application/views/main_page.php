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
	<?php
		if(!empty($keeperplace)){
			for($i=0; $i<count($keeperplace);$i++){
				$this->table->add_row('<img src="http://52.74.64.61'.$keeperplace[$i]['imageurl'].'" style="width:250px;height:250px;"');
				$this->table->add_row('<h3>'.$keeperplace[$i]['placename'].'</h3>');
				echo $this->table->generate();
			};
		}
	?>
</body>
</html>
