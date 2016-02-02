<?php if(!isset($puzzledata)) :?>
<a href = "<?=base_url('addquest/addriddle/'.$puzzleid)?>" style="color:black">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <?php endif;?>
    <table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Helper Answer</th>
            <th>Answer</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(isset($puzzledata)) :?>
        <?php foreach($puzzledata as $puzzle):?>
        <tr>
            <td><img
                src="http://52.74.64.61/<?=$puzzle['imageurl']?>"
                alt="<?= $puzzle['imageurl']?>"
                style="width:100px;
                        height:100px;"></td>
            <td><?= $puzzle['helperanswer']?></td>
            <td><?= $puzzle['correctanswer']?></td>
            <td>
                <span
                    data="<?=$puzzle['puzzleid']?>"
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
