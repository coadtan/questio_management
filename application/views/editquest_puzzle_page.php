<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#puzzlemanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open_multipart('editquest/editpuzzlecheck')?>
    <input type="hidden" name="puzzleid" value="<?=$puzzledata['puzzleid']?>">
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
    <input type="hidden" name="imageurl" value="<?=$puzzledata['imageurl']?>">
    Puzzle Picture: <input type="file"
        class ="register-margin register-box"
        name="puzzlepic"
        id="puzzlepic"
        size ="999">
        <img
            src="http://52.74.64.61/questio_management<?=$puzzledata['imageurl']?>"
            alt="<?= $puzzledata['imageurl']?>"
            style="width:100px;
                    height:100px;">
        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" size="100" value="<?=$puzzledata['helperanswer']?>"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" size="100" value="<?=$puzzledata['correctanswer']?>"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
