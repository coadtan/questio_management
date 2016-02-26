<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#puzzlemanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open_multipart('addquest/addpuzzlecheck')?>
    <input type="hidden" name="puzzleid" value="<?=$puzzleid?>">
    Puzzle Picture: <input type="file"
        class ="register-margin register-box"
        name="puzzlepic"
        id="puzzlepic"
        size ="999">
        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" size="100"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" size="100"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>

