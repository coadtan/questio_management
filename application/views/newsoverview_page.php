<script type="text/javascript">
$(document).ready(function(){
    $('#addnews').click(function(){
        $('#newsmanage').load(
            "<?=base_url('addnews')?>"
        );
        $('html,body').animate({
        scrollTop: $("#newsmanage").offset().top},
        'slow');
    });
    $('.editnews').click(function(){
        var newsid = this.getAttribute("newsid");
        $('#newsmanage').load(
            "<?=base_url('editnews/edit')?>"+"/"+newsid
        );
        $('html,body').animate({
        scrollTop: $("#newsmanage").offset().top},
        'slow');
    });
});
</script>
<a href = "#" style="color:black" id="addnews">
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
                <a href="#" newsid="<?=$news['newsid']?>" class="editnews"><span
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
<div id="newsmanage"></div>
