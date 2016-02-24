<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#quizmanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('addquest/addquizcheck')?>
    <input type="hidden" name="questid" value="<?=$questid?>">
    <input type="hidden" name="seqid" value="<?=$seqid?>">
    Question*:
    <input type="text" name="question" size="100"><br>
    Choice 1*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicea" size="100"><br>
    Choice 2*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiceb" size="100"><br>
    Choice 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicec" size="100"><br>
    Choice 4:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiced" size="100"><br>
    Answer*
    <input type="radio" name="answerid" value="1" checked>1
    <input type="radio" name="answerid" value="2">2
    <input type="radio" name="answerid" value="3">3
    <input type="radio" name="answerid" value="4">4
     <br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>

