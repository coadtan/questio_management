<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
	<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
	<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
	<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
	<div class="container-fluid" style="overflow:hidden">
		<?php $this->load->view('header', array('title' => 'Login'));?>
		<div class="row">
			<div class ="r1">
				<h1 class ="text-gray80">Welcome to Questio</h1>
				<h2 class ="text-blue-title">Application for Adventure</h2>
				<br/>
				<img class="questio-logo" src="<?= base_url()?>assets/images/logo.png" alt="">
			</div>
		</div>
		<div class="row">
			<div class ="r2">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<div class="center">
						<img class="questio-sword" src="<?= base_url()?>assets/images/questio_sword.png" alt="">
						<br><br>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="center">
						<img class="questio-sword" src="<?= base_url()?>assets/images/questio_sword.png" alt="">
						<br><br>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="center">
						<img class="questio-sword" src="<?= base_url()?>assets/images/questio_sword.png" alt="">
						<br><br>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="center">
						<img class="questio-sword" src="<?= base_url()?>assets/images/questio_sword.png" alt="">
						<br><br>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxx</p>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="row">
			<div class ="r3">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class ="col-md-6">
						<div class="center">
							<h1>Adventurer Info</h1>
						</br>
						<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
						<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					</div>
				</div>
				<div class ="col-md-6">
					<div class="center">
						<img class="questio-avatar" src="<?= base_url()?>assets/images/avatar.png" alt="">
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<div class="row">
		<div class ="r4">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class ="col-md-6">
					<div class="center">
						<img class="questio-temple" src="<?= base_url()?>assets/images/questio_temple.png" alt="">
					</div>
				</div>
				<div class ="col-md-6">
					<div class="center">
						<h1>Keeper Info</h1>
					</br>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class ="r5">
			<div class="col-md-3"></div>
			<div class="col-md-6" style ="margin-top : 20px">
				<h3 class="text-white">Still for looking for ? Download application and have fun </h3>
				<br>
				<img src="<?= base_url()?>assets/images/playstore.png" alt="">
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<div class="row">
		<div class ="r6">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class ="col-md-6">
					<div class="center">
						<img class="feat-dummy-logo" src="<?= base_url()?>assets/images/questio_sword.png" alt="">
					</div>
				</div>
				<div class ="col-md-6">
					<div class="center">
						<h1>Feature Dummy</h1>
					</br>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
					<p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class ="r7">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class ="col-md-6" style="margin-top:20px">
					<h3 class="text-white">Subscribe for newsletter feed ! </h3>
					<br>
					<h4 class="text-gray" style ="margin-top:-15px;margin-left:-40px">Get the latest news from Questio</h4>
				</div>
				<div class ="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Input your email address" placeholder="Enter your email-address">
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class ="r8">
				<div class="col-md-2">.col-md-2</div>
				<div class="col-md-5">.col-md-5</div>
				<div class="col-md-3">.col-md-3</div>
				<div class="col-md-2">.col-md-2</div>
			</div>
		</div>
		<a href="#" style ="color:black">Place list</a>
		<a href="#" style ="color:black">Item list</a>
		<a href="#" style ="color:black">Quest list</a>
		<a href="#" style ="color:black">Reward list</a>
	</div>
</div>
</div>
</body>
</html>
