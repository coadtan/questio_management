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
    $('#submit-edit-riddle').click(function(){
        event.preventDefault();
            
        var formElement = document.querySelector("#form-edit-riddle");
        var formData = new FormData(formElement);


        var url = "<?=base_url('editquest/editriddlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'edit_riddle_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'edit_riddle_failed'){
                        alert('Edit riddle failed');
                   }else if(data == 'edit_riddle_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form method="POST" id="form-edit-riddle">
    <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไข Riddle</h1>
  </div><br><br>
    <input type="hidden" name="ridid" id="ridid" value="<?=$riddledata['ridid']?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>" required maxlength="100"><br>
    Quest Details*:
    <textarea name="questdetails" id="questdetails" rows="5" cols="50" required><?=$questdata['questdetails']?>
    </textarea><br>
    Difficulty*:
    <?= form_dropdown('diffid',$difficulty,$questdata['diffid'], 'id="diffid"'); ?>
     <br>
    Rewards:
    <?= form_dropdown('rewardid',$reward,$questdata['rewardid'],'id="rewardid"'); ?>
     <br>
    Riddle Details*:
    <input type="text" name="riddetails" id="riddetails" size="100" value="<?=$riddledata['riddetails']?>" required><br>
    Scan Limit*:
    <input type="number" name="scanlimit" id="scanlimit" value="4" value="<?=$riddledata['scanlimit']?>" required pattern="[0-9]"><br>
    Hint 1:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint1" id="hint1" size="100" value="<?=$riddledata['hint1']?>" required maxlength="100"><br>
    Hint 2:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint2" id="hint2" size="100" value="<?=$riddledata['hint2']?>" required maxlength="100"><br>
    Hint 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint3" id="hint3" size="100" value="<?=$riddledata['hint3']?>" required maxlength="100"><br>
    <input type="submit" value="Submit" id="submit-edit-riddle">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
