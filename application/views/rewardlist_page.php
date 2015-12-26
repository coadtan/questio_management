<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reward List</title>
</head>
<body>
<h1>Reward List</h1>
	<?=form_open('rewardlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	</form>
	<?php
		$this->table->set_heading('#','Reward Name','Description','Reward Type');
		
		if(!empty($rewarddata)){
			for($i=0; $i<count($rewarddata);$i++){
				$this->table->add_row($rewarddata[$i]['rewardno'],$rewarddata[$i]['rewardname'],$rewarddata[$i]['description'],$rewarddata[$i]['rewardtypename']);
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Reward not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>">Go back</a>
</body>
</html>