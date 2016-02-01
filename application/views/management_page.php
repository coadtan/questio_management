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
	<script type="text/javascript">
		$(document).ready(function(){
    		$('.keeperplace').click(function(){
        	var placeid = this.getAttribute("placeid");
        	$('#buildinglist').load(
            	"<?=base_url('mainpage/getbuilding')?>"+ "/"+ placeid
        	);
        	$('html,body').animate({
        		scrollTop: $("#buildinglist").offset().top},
        	'slow');
    	});
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
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/profile.png" alt="">&nbsp&nbsp PROFILE</li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/quest.png" alt="">&nbsp&nbsp QUEST</li>
					<li><a href = "<?=base_url('addreward')?>"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/rewards.png" alt="">&nbsp&nbsp REWARD</a></li>
					<li><a href = "<?=base_url('additem')?>"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/item.png" alt="">&nbsp&nbsp ITEM</a></li>
					<li><img class="questio-menu-logo" src="<?= base_url()?>assets/images/news.png" alt="">&nbsp&nbsp NEWS</li>
				</ul>
			</div>
			<div class ="wrapper-l text-white" >
				<ul class ="align-menu">
					<li><a href = "<?=base_url('statistic')?>"><img class="questio-menu-logo" src="<?= base_url()?>assets/images/stats.png" alt="">&nbsp&nbsp STATISTICS</a></li>
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
					<div class="row">
					<!--Place management start here :D-->
						<?php if(!empty($keeperplace)):?>
							<?php foreach($keeperplace as $place):?>
            					<div class="col-xs-6 col-md-3">
	            					<a
	            						href="#"
	            						class="thumbnail keeperplace"
	            						id="place_<?=$place['placeid']?>"
	            						placeid="<?=$place['placeid']?>"
	            					>
			      						<img
			      							src="http://52.74.64.61/<?=$place['imageurl']?>"
			      							alt="<?=$place['placename']?>">
			    					</a>
			    					<?=$place['placename']?>
			    					<a href="<?=base_url('editplace/edit/'.$place["placeid"])?>">Edit</a>
			    					<a href="<?=base_url('mainpage/deleteplace/'.$place["placeid"])?>">Delete</a>
		  						</div>
        					<?php endforeach;?>
						<?php endif;?>
						<div class="col-xs-6 col-md-3" style="text-align:center">
							<a
			    				href="<?=base_url('addplace')?>"
			    				class="thumbnail"
							>
								<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
							</a>
						</div>
					</div>
					<div id="buildinglist">
					</div>
				<!--Place management end here :D-->
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