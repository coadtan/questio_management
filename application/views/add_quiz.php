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
    $('#submit-add-quiz').click(function(){
        event.preventDefault();
            
        var formElement = document.querySelector("#form-add-quiz");
        var formData = new FormData(formElement);


        var url = "<?=base_url('addquest/addquizcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false, 
               success: function(data){
                   if(data == 'add_quiz_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'add_quiz_failed'){
                        alert('Add quiz failed');
                   }else if(data == 'add_quiz_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Add Quiz</h1>
  </div>
  <br><br>
<h2 style='color:red'><?=$message?></h2>
<form method="POST" id="form-add-quiz">
    <input type="hidden" name="questid" id="questid" value="<?=$questid?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    <input type="hidden" name="seqid" id="seqid" value="<?=$seqid?>">
    Question*:
    <input type="text" name="question" id="question" size="100" required><br>
    Choice 1*:
    <input type="text" name="choicea" id="choicea" size="100" placeholder="Must not longer than 100 characters"r equired maxlength="100"><br>
    Choice 2*:
    <input type="text" name="choiceb" id="choiceb" size="100" placeholder="Must not longer than 100 characters" required maxlength="100"><br>
    Choice 3:
    <input type="text" name="choicec" id="choicec" size="100" placeholder="Must not longer than 100 characters" maxlength="100"><br>
    Choice 4:
    <input type="text" name="choiced" id="choiced" size="100" placeholder="Must not longer than 100 characters" maxlength="100"><br>
    Answer*
    <input type="radio" name="answerid" id="answerid" value="1" checked> &nbsp1 &nbsp
    <input type="radio" name="answerid" id="answerid" value="2">&nbsp 2 &nbsp
    <input type="radio" name="answerid" id="answerid" value="3">&nbsp 3 &nbsp
    <input type="radio" name="answerid" id="answerid" value="4">&nbsp 4 &nbsp
     <br>
    <input type="submit" value="Submit" id="submit-add-quiz">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>

