<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quest List</title>
</head>
<body>
<h1>Quest List</h1>
	<?=form_open('questlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	</form>
	<?php
		$this->table->set_heading('#','Quest name','Type','Zone','Difficulty','Reward');
		
		if(!empty($questdata)){
			for($i=0; $i<count($questdata);$i++){
				$this->table->add_row($questdata[$i]['questno'],$questdata[$i]['questname'],$questdata[$i]['typename'],$questdata[$i]['zonename'],$questdata[$i]['difftype'],$questdata[$i]['rewardname']);
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Quest not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>">Go back</a>
</body>
</html>