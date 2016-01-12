<?php $this->load->view('head', array('title' => 'Item List'));?>
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
