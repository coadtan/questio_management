<?php $this->load->view('head', array('title' => 'Login'));?>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Login'));?>
	<div class="row">
	<a href="<?=base_url('placelist')?>">Place list</a>
	<a href="<?=base_url('itemlist')?>">Item list</a>
	<a href="<?=base_url('questlist')?>">Quest list</a>
	<a href="<?=base_url('rewardlist')?>">Reward list</a>
	</div>
</div>

</body>
</html>
