<?php $this->load->view('head', array('title' => 'Reward List'));?>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Reward List'));?>
	<?=form_open('rewardlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
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
</div>
</body>
</html>
