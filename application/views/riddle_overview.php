<script type="text/javascript">
$(document).ready(function(){
    $('#addriddle').click(function(){
        var ridid = this.getAttribute("ridid");
        $('#mainarea').load(
            "<?=base_url('addquest/addriddle')?>"+'/'+ridid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editriddle').click(function(){
        var ridid = this.getAttribute("ridid");
        $('#mainarea').load(
            "<?=base_url('editquest/editriddle')?>"+'/'+ridid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<?php if(empty($riddledata)) :?>
<a href = "#" style="color:black" id="addriddle" ridid="<?=$ridid?>">
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
    <?php if(!empty($riddledata)) :?>
        <?php foreach($riddledata as $riddle):?>
        <tr>
            <td><?= $riddle['riddetails']?></td>
            <td><?= $riddle['scanlimit']?></td>
            <td><?= $riddle['hint1']?></td>
            <td><?= $riddle['hint2']?></td>
            <td><?= $riddle['hint3']?></td>
            <td>
                <a href="#" class="editriddle" ridid="<?=$riddle['ridid']?>">
                    <span
                        class="glyphicon glyphicon-asterisk"
                        style="cursor: pointer">
                    </span>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Riddle not found</h2>"
    <?php endif;?>
    </tbody>
</table>
<div id="riddlemanage">
</div>

