<a href = "<?=base_url('addreward')?>" style="color:black">
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
            <td><img
                src="http://52.74.64.61/questio_management<?=$reward['rewardpic']?>"
                alt="<?= $reward['rewardpic']?>"
                style="width:50px;
                        height:50px;"></td>
            <td><?= $reward['rewardtypename']?></td>
            <td>
                <a href="<?=base_url('editreward/edit').'/'.$reward['rewardid']?>">
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