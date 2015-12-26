<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Item List</title>
</head>
<body>
<h1>Item List</h1>
	<?=form_open('itemlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	</form>
	<?php
		$this->table->set_heading('#','Item Name','Item Collection','Position');
		
		if(!empty($itemdata)){
			for($i=0; $i<count($itemdata);$i++){
				$this->table->add_row($itemdata[$i]['itemno'],$itemdata[$i]['itemname'],$itemdata[$i]['itemcollection'],$itemdata[$i]['positionname']);
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Item not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>">Go back</a>
</body>
</html>