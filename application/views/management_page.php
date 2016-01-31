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
	<header>
		<div class ="header-left header-float">
			<div><img class="questio-mini-logo" src="<?= base_url()?>assets/images/logo.png" alt="">
			</div>
			<div><h5 class="font-white">QUESTIO MANAGEMENT</h5>
			</div>
		</div>
		<div class ="header-mid header-float">
			<div style ="float:left;padding-left:20px"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/magnifier.png" alt="">
			</div>
			<div>
				<input type ="text" class ="input-search">
			</div>
			<div style ="float:right;padding-right:20px"><input type ="button" value ="Search" id ="search" class ="button-search" >
			</div>
		</div>
		<div class ="header-right header-float">
			<div style ="float:left"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/clock_gray.png" alt="">
				<img class="questio-menu-logo" src="<?= base_url()?>assets/images/news_gray.png" alt="">
				<img class="style-mail-icon"  src="<?= base_url()?>assets/images/mail_gray.png" alt="">
			</div>
			<div>ICON NEWS &nbsp
			</div>
		</div>
	</header>
	<div class ="wrapper">
		<div class ="wrapper-align-left header-float wrapper-l">
			<div class ="wrapper-l text-white">
				<p>MENU</p>
				<ul class ="align-menu">
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/profile.png" alt="">&nbsp&nbsp PROFILE</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/quest.png" alt="">&nbsp&nbsp QUEST</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rewards.png" alt="">&nbsp&nbsp REWARD</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/item.png" alt="">&nbsp&nbsp ITEM</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/news.png" alt="">&nbsp&nbsp NEWS</li>
				</ul>
			</div>
			<div class ="wrapper-l text-white" >
				<ul class ="align-menu">
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/stats.png" alt="">&nbsp&nbsp STATISTICAL</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/adventurer.png" alt="">&nbsp&nbsp ADVENTURER</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/paper.png" alt="">&nbsp&nbsp QUEST</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rank.png" alt="">&nbsp&nbsp SCORE</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/top.png" alt="">&nbsp&nbsp POPULAR ZONE</li>
				</ul>
			</div>
			<div class ="wrapper-l text-white">
				<ul class ="align-menu">
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/phone.png" alt="">&nbsp &nbsp CONTACT</li>
					<li><img class="style-mail-icon" src="<?= base_url()?>assets/images/mail.png" alt="">&nbsp&nbsp EMAIL ADDRESS</li>
				</ul>
			</div>
		</div>
		<div class ="wrapper-align-mid header-float wrapper-m">
			<div class ="wrapper-m">
				xxxxxxxxxxxxxxxx
			</div>
			
		</div>
		<div class ="wrapper-align-right header-floatwrapper-m wrapper-r">
			<div class ="wrapper-r">
				<p>MENU</p>
				<ul>
					<li>xxx</li>
					<li>xxx</li>
					<li>xxx</li>
					<li>xxx</li>
				</ul>
			</div>
			<div class ="wrapper-r">
				<p>MENU</p>
				<ul>
					<li>xxx</li>
					<li>xxx</li>
					<li>xxx</li>
					<li>xxx</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer">
	</div>
</body>
</html>
