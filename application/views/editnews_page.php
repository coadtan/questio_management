<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#newsmanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('editnews/editnewscheck')?>
    <input type="hidden" name="newsid" value="<?=$newsdata['newsid']?>">
    Place Name*:
    <?= form_dropdown('placeid',$placedata, $newsdata['placeid']); ?>
     <br>
    News Header*:<i>Must not longer than 100 characters</i>
    <input type="text" name="newsheader" size="100" value="<?=$newsdata['newsheader']?>"><br>
    News Details*:
    <input type="text" name="newsdetails" size="100" value="<?=$newsdata['newsdetails']?>"><br>
    Date Started*:
    <input type="datetime" name="datestarted" value="<?=$newsdata['datestarted']?>"><br>
    Date Ended*:
    <input type="datetime" name="dateended" value="<?=$newsdata['dateended']?>"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
