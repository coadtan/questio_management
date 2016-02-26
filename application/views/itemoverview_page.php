<script type="text/javascript">
$(document).ready(function(){
    $('#additem').click(function(){
        $('#itemmanage').load(
            "<?=base_url('additem')?>"
        );
        $('html,body').animate({
        scrollTop: $("#itemmanage").offset().top},
        'slow');
    });
    $('.edititem').click(function(){
        var itemid = this.getAttribute("itemid");
        $('#itemmanage').load(
            "<?=base_url('edititem/edit')?>"+'/'+itemid
        );
        $('html,body').animate({
        scrollTop: $("#itemmanage").offset().top},
        'slow');
    });
});
</script>
<a href = "#" style="color:black" id="additem">
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
                src="http://52.74.64.61/questio_management<?=$item['itempicpath']?>"
                alt="<?= $item['itempicpath']?>"
                style="width:100px;
                        height:100px;"></td>
            <td><?= $item['itemcollection']?></td>
            <td><?= $item['positionname']?></td>
            <td>
                <a href="#" class="edititem" itemid="<?=$item['itemid']?>"><span
                    data="<?=$item['itemid']?>"
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
<div id="itemmanage">
</div>