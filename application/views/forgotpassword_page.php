<?php $this->load->view('head', array('title' => 'Forgot Password'));?>
<body>
<div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Forgot Password'));?>
	<h1>Enter E-Mail Address</h1>
	<?=validation_errors();?>
	<?=form_open('forgotpassword')?>
		E-Mail*: <input type="email" name="email" id="email" size="100"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
</div>
</body>
</html>
