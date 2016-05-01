<script type="text/javascript">
$(document).ready(function(){
    $('#addreward').click(function(){
        $('#mainarea').load(
            "<?=base_url('addreward')?>"
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editreward').click(function(){
        var rewardid = this.getAttribute("rewardid");
        $('#mainarea').load(
            "<?=base_url('editreward/edit')?>"+'/'+rewardid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
        <h1 class ="text-white"style="margin-top:50px !important">Reward Managemet </h1>
</div>
<br><br>
<a href = "#" style="color:black" id="addreward">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Reward Name</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Reward Type</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($rewarddata)) :?>
        <?php $i = 1 ?>
        <?php foreach($rewarddata as $reward):?>
        <tr>
            <td><?= $i++?></td>
            <td><?= $reward['rewardname']?></td>
            
            <td><?= $reward['description']?></td>
            <td>
                <?php if(!empty($reward['rewardpic'])):?>
            <img
                src="http://52.74.64.61/questio_management<?=$reward['rewardpic']?>"
                alt="<?= $reward['rewardpic']?>"
                style="width:50px;
                        height:50px;">
            <?php endif;?>
                        </td>
            <td><?= $reward['rewardtypename']?></td>
            <td>
                <a href="#" class="editreward" rewardid="<?=$reward['rewardid']?>">
                    <span
                        data="<?=$reward['rewardid']?>"
                        class="glyphicon glyphicon-asterisk"
                        style="cursor: pointer">
                    </span>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Reward not found</h2>
    <?php endif;?>
    </tbody>
</table>
<div id="rewardmanage">
</div>