<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#quizmanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('editquest/editquizcheck')?>
	<input type="hidden" name="quizid" value="<?=$quizdata['quizid']?>">
    Question*:
    <input type="text" name="question" size="100" value="<?=$quizdata['question']?>"><br>
    Choice 1*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicea" size="100" value="<?=$quizdata['choicea']?>"><br>
    Choice 2*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiceb" size="100" value="<?=$quizdata['choiceb']?>"><br>
    Choice 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicec" size="100" value="<?=$quizdata['choicec']?>"><br>
    Choice 4:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiced" size="100" value="<?=$quizdata['choiced']?>"><br>
    Answer*
    <input type="radio" name="answerid" value="1" <?=$quizdata['answerid']== 1 ? 'checked' : ''?>>1
    <input type="radio" name="answerid" value="2" <?=$quizdata['answerid']== 2 ? 'checked' : ''?>>2
    <input type="radio" name="answerid" value="3" <?=$quizdata['answerid']== 3 ? 'checked' : ''?>>3
    <input type="radio" name="answerid" value="4" <?=$quizdata['answerid']== 4 ? 'checked' : ''?>>4
     <br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
