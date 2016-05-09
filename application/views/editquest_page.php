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
    $('#submit-edit-quest').click(function(){
        event.preventDefault();
        
        var formElement = document.querySelector("#form-edit-quest");
        var formData = new FormData(formElement);

        var url = "<?=base_url('editquest/editquestcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,   
               success: function(data){
                   if(data == 'edit_quest_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'edit_quest_failed'){
                        alert('Edit quest failed');
                   }else if(data == 'edit_quest_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form method="POST" id="form-edit-quest">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไข Quest</h1>
  </div>
    <input type="hidden" name="questid" id="questid" value="<?=$questdata['questid']?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>"><br>
    Quest Details*:
    <textarea name="questdetails" id="questdetails" rows="5" cols="50"><?=$questdata['questdetails']?>
    </textarea><br>
     <br>
    Difficulty*:
    <?= form_dropdown('diffid',$difficulty,$questdata['diffid'],'id="diffid"'); ?>
     <br>
    Rewards:
    <?= form_dropdown('rewardid',$reward,$questdata['rewardid'],'id="rewardid"'); ?>
     <br>
    <input type="submit" value="Submit" id="submit-edit-quest">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
