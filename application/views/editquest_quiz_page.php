<script type="text/javascript">
$(document).ready(function(){
  var zoneid = $('#zoneid').val();
    $.ajaxSetup({ 
        cache: false 
    });  
    $('.goback').click(function(){
        $('#mainarea').load(
          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('#submit-edit-quiz').click(function(){
        event.preventDefault();
            
        var formElement = document.querySelector("#form-edit-quiz");
        var formData = new FormData(formElement);


        var url = "<?=base_url('editquest/editquizcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'edit_quiz_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'edit_quiz_failed'){
                        alert('Edit quiz failed');
                   }else if(data == 'edit_quiz_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไข Quiz</h1>
  </div><br><br>
<h2 style='color:red'><?=$message?></h2>
<form method="POST" id="form-edit-quiz">
	<input type="hidden" name="quizid" id="quizid" value="<?=$quizdata['quizid']?>">
  <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Question*:
    <input type="text" name="question" id="question" size="100" value="<?=$quizdata['question']?>" required><br>
    Choice 1*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicea" id="choicea" size="100" value="<?=$quizdata['choicea']?>" required maxlength="100"><br>
    Choice 2*:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiceb" id="choiceb" size="100" value="<?=$quizdata['choiceb']?>" required maxlength="100"><br>
    Choice 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="choicec" id="choicec" size="100" value="<?=$quizdata['choicec']?>" maxlength="100"><br>
    Choice 4:<i>Must not longer than 100 characters</i>
    <input type="text" name="choiced" id="choiced" size="100" value="<?=$quizdata['choiced']?>" maxlength="100"><br>
    Answer*
    <input type="radio" name="answerid" id="answerid" value="1" <?=$quizdata['answerid']== 1 ? 'checked' : ''?>>1
    <input type="radio" name="answerid" id="answerid" value="2" <?=$quizdata['answerid']== 2 ? 'checked' : ''?>>2
    <input type="radio" name="answerid" id="answerid" value="3" <?=$quizdata['answerid']== 3 ? 'checked' : ''?>>3
    <input type="radio" name="answerid" id="answerid" value="4" <?=$quizdata['answerid']== 4 ? 'checked' : ''?>>4
     <br>
    <input type="submit" value="Submit" id="submit-edit-quiz">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
