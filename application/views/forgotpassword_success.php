<?php $this->load->view('head', array('title' => 'Forgot Password'));?>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Forgot Password'));?>
	<h2>E-Mail has been sent.</h2>
	<a href="<?=base_url('login')?>">Back</a>
</div>
</body>
</html>
