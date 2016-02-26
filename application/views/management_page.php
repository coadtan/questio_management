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
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#place').click(function(){
		        $('#mainarea').load(
            		"<?=base_url('mainpage/getplace')?>"
        		);

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});

        	$('#statistics').click(function(){
		        $('#mainarea').load(
		            "<?=base_url('statistic')?>"
		        );

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});

    		$('#item').click(function(){
		        $('#mainarea').load(
		            "<?=base_url('itemoverview')?>"
		        );

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});

    		$('#reward').click(function(){
		        $('#mainarea').load(
		            "<?=base_url('rewardoverview')?>"
		        );

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});

    		$('#news').click(function(){
		        $('#mainarea').load(
		            "<?=base_url('newsoverview')?>"
		        );

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});
    		$('#contact').click(function(){
		        $('#mainarea').load(
		            "<?=base_url('management/load_contact')?>"
		        );

		        $('html,body').animate({
		        scrollTop: $("#mainarea").offset().top},
		        'slow');
    		});

    		$('#contact').css('cursor', 'pointer');

    	});
</script>
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
			<div style="float:left;margin-left:10px;width: calc(100% - 180px);">
				<input type ="text" class ="input-search">
			</div>
		</div>
		<div class ="header-right header-float">
			<div>
				<?php if($this->session->userdata('logged_in') != NULL) :?>
				        <font style="font-size:20px;color:gray;padding-left:30px">
				            <?=$this->session->userdata('logged_in')['firstname'];?>
				        </font>
				       	<a href="<?=base_url('mainpage/logout')?>">
				        <button
				            type="button"
				            class="btn btn-default">
				            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
				        </button>
				    	</a>
				<?php else :?>
				    <button
				    	type="button"
				    	class="btn btn-default"
				    	data-toggle="modal"
				    	data-target="#login">
				    	Login
					</button>
				<?php endif; ?>

			</div>
		</div>
	</header>
	<div class ="wrapper">
		<div class ="wrapper-align-left header-float wrapper-l">
			<div class ="wrapper-l text-white">
				<p>MENU</p>
				<ul class ="align-menu">
					<a href = "#" id="place" style ="color:white"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/place.png" alt="" >&nbsp&nbsp PLACE</li></a>
					<a href = "#" id="reward"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rewards.png" alt="">&nbsp&nbsp REWARD</li></a>
					<a href = "#" id="item"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/item.png" alt="">&nbsp&nbsp ITEM</li></a>
					<a href = "#" id="news"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/news.png" alt="">&nbsp&nbsp NEWS</li></a>
					<a href = "#" id="statistics" style ="color:white"><li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/stats.png" alt="" >&nbsp&nbsp STATISTICS</li></a>
				</ul>
			</div>
			<div class ="wrapper-l text-white">
				<ul class ="align-menu">
					<li id ="contact"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/phone.png" alt="">&nbsp &nbsp CONTACT</li>
				</ul>
			</div>
		</div>
		<div class ="wrapper-align-mid header-float wrapper-m">
			<div class ="wrapper-m" id="mainarea">
			</div>
		<!--<div class ="wrapper-align-right header-floatwrapper-m wrapper-r">
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
		</div>-->
	</div>
	<div class="footer">
	</div>
</body>
</html>
