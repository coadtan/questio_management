<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#quizmanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('editquest/editquestcheck')?>
    <input type="hidden" name="questid" value="<?=$questdata['questid']?>">
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
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
