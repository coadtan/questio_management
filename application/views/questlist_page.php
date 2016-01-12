<?php $this->load->view('head', array('title' => 'Quest List'));?>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Quest List'));?>
	<?=form_open('questlist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
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
</div>
</body>
</html>
