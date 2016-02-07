<a href = "<?=base_url('addnews')?>" style="color:black">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Place Name</th>
            <th>News Header</th>
            <th>News Details</th>
            <th>Date Started</th>
            <th>Date Ended</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($newsdata)) :?>
        <?php $i = 1 ?>
        <?php foreach($newsdata as $news):?>
        <tr>
            <td><?= $i++?></td>
            <td><?= $news['placename']?></td>
            <td><?= $news['newsheader']?></td>
            <td><?= $news['newsdetails']?></td>
            <td><?= $news['datestarted']?></td>
            <td><?= $news['dateended']?></td>
            <td>
                <a href="<?=base_url('editnews/edit').'/'.$news['newsid']?>"><span
                    data="<?=$news['newsid']?>"
                    class="glyphicon glyphicon-asterisk"
                    style="cursor: pointer">
                </span></a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Item not found</h2>
    <?php endif;?>
    </tbody>
</table>