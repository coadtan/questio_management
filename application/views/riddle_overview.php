<?php if(!isset($riddledata)) :?>
<a href = "<?=base_url('addquest/addriddle/'.$ridid)?>" style="color:black">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <?php endif;?>
    <table class="table">
    <thead>
        <tr>
            <th>Riddle Details</th>
            <th>Scan Limit</th>
            <th>Hint 1</th>
            <th>Hint 2</th>
            <th>Hint 3</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(isset($riddledata)) :?>
        <?php foreach($riddledata as $riddle):?>
        <tr>
            <td><?= $riddle['riddetails']?></td>
            <td><?= $riddle['scanlimit']?></td>
            <td><?= $riddle['hint1']?></td>
            <td><?= $riddle['hint2']?></td>
            <td><?= $riddle['hint3']?></td>
            <td>
                <span
                    data="<?=$riddle['ridid']?>"
                    class="glyphicon glyphicon-asterisk"
                    style="cursor: pointer">
                </span>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        echo "<h2 style='color:red'>Riddle not found</h2>";
    <?php endif;?>
    </tbody>
</table>
