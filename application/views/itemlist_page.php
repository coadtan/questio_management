<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Item List</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Item List'));?>
	<?=form_open('itemlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
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
</div>
</body>
</html>
