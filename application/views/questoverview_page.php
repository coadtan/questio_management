<script type="text/javascript">
$(document).ready(function(){
	$('.Quiz').click(function(){
		var questid = this.getAttribute("data");
		$('#loading').load(
    		"<?=base_url('questoverview/quizoverview')?>"+ "/"+ questid
		);
		$('html,body').animate({
				scrollTop: $("#loading").offset().top},
				'slow'
		);
	});
	$('.Riddle').click(function(){
		var questid = this.getAttribute("data");
		$('#loading').load(
    		"<?=base_url('questoverview/riddleoverview')?>"+ "/"+ questid
		);
		$('html,body').animate({
				scrollTop: $("#loading").offset().top},
				'slow'
		);
	});
	$('.Puzzle').click(function(){
		var questid = this.getAttribute("data");
		$('#loading').load(
    		"<?=base_url('questoverview/puzzleoverview')?>"+ "/"+ questid
		);
		$('html,body').animate({
				scrollTop: $("#loading").offset().top},
				'slow'
		);
	});
});
</script>
	<a href = "<?=base_url('addquest/add/'.$zoneid)?>" style="color:black">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</a>
	<table class="table">
	<thead>
	    <tr>
	        <th>#</th>
	        <th>Quest Name</th>
	        <th>Type</th>
	        <th>Zone</th>
	        <th>Difficulty</th>
	        <th>Reward</th>
	        <th>Edit</th>
	    </tr>
	</thead>
	<tbody>
	<?php if(isset($questdata)) :?>
		<?php $i = 1 ?>
		<?php foreach($questdata as $quest):?>
	    <tr>
	        <td><?= $i++?></td>
	        <td><?= $quest['questname']?></td>
	        <td><?= $quest['typename']?></td>
	        <td><?= $quest['zonename']?></td>
	        <td><?= $quest['difftype']?></td>
	        <td><?= $quest['rewardname']?></td>
	        <td>
	        	<span
	        		data="<?=$quest['questid']?>"
	        		class="glyphicon glyphicon-asterisk <?=($quest['typename'])=='Picture Puzzle'?'Puzzle':$quest['typename']?> "
	        		style="cursor: pointer">
	        	</span>
	        </td>
	    </tr>
	    <?php endforeach;?>
	<?php else: ?>
		echo "<h2 style='color:red'>Quest not found</h2>";
	<?php endif;?>
	</tbody>
</table>
	<a href="<?=base_url('login')?>">Go back</a>
</div>

<div id="loading"></div>
