<a href = "<?=base_url('additem')?>" style="color:black">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Item picture</th>
            <th>Item Collection</th>
            <th>Position</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($itemdata)) :?>
        <?php $i = 1 ?>
        <?php foreach($itemdata as $item):?>
        <tr>
            <td><?= $i++?></td>
            <td><?= $item['itemname']?></td>
            <td><img
                src="http://52.74.64.61/<?=$item['itempicpath']?>"
                alt="<?= $item['itempicpath']?>"
                style="width:100px;
                        height:100px;"></td>
            <td><?= $item['itemcollection']?></td>
            <td><?= $item['positionname']?></td>
            <td>
                <span
                    data="<?=$item['itemid']?>"
                    class="glyphicon glyphicon-asterisk"
                    style="cursor: pointer">
                </span>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        echo "<h2 style='color:red'>Item not found</h2>";
    <?php endif;?>
    </tbody>
</table>