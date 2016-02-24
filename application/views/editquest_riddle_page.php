<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#riddlemanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('editquest/editriddlecheck')?>
    <input type="hidden" name="ridid" value="<?=$riddledata['ridid']?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>"><br>
    Quest Details*:
    <textarea name="questdetails" rows="5" cols="50">
    <?=$questdata['questdetails']?>
    </textarea><br>
     <br>
    Difficulty*:
    <?= form_dropdown('diffid',$difficulty,$questdata['diffid']); ?>
     <br>
    Rewards:
    <?= form_dropdown('rewardid',$reward,$questdata['rewardid']); ?>
     <br>
    Riddle Details*:
    <input type="text" name="riddetails" size="100" value="<?=$riddledata['riddetails']?>"><br>
    Scan Limit*:
    <input type="text" name="scanlimit" value="4" value="<?=$riddledata['scanlimit']?>"><br>
    Hint 1:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint1" size="100" value="<?=$riddledata['hint1']?>"><br>
    Hint 2:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint2" size="100" value="<?=$riddledata['hint2']?>"><br>
    Hint 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint3" size="100" value="<?=$riddledata['hint3']?>"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
