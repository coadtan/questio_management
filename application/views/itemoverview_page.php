<script type="text/javascript">
$(document).ready(function(){
    $('#additem').click(function(){
        $('#mainarea').load(
            "<?=base_url('additem')?>"
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.edititem').click(function(){
        var itemid = this.getAttribute("itemid");
        $('#mainarea').load(
            "<?=base_url('edititem/edit')?>"+'/'+itemid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
        <h1 class ="text-white"style="margin-top:50px !important">Item Managemet </h1>
</div>
<br><br>
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
                src="<?=base_url($item['itempicpath'])?>"
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