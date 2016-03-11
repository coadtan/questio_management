<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
      var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
        
        var questid = $("#questid").val();   
        var questname = $("#questname").val();
        var questdetails = $("#questdetails").val();
        var diffid = $("#diffid").val();
        var rewardid = $("#rewardid").val();

        var url = "<?=base_url('editquest/editquestcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                questid: questid,
                questname: questname,
                questdetails: questdetails,
                diffid: diffid,
                rewardid: rewardid
               }
               , 
               success: function(data){
                   if(data == 'edit_quest_success'){
                        $('#quizmanage').empty();
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
<form method="POST">
    <input type="hidden" name="questid" id="questid" value="<?=$questdata['questid']?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>"><br>
    Quest Details*:
    <textarea name="questdetails" id="questdetails" rows="5" cols="50">
    <?=$questdata['questdetails']?>
    </textarea><br>
     <br>
    Difficulty*:
    <?= form_dropdown('diffid',$difficulty,$questdata['diffid'],'id="diffid"'); ?>
     <br>
    Rewards:
    <?= form_dropdown('rewardid',$reward,$questdata['rewardid'],'id="rewardid"'); ?>
     <br>
    <input type="submit" value="Submit">
</form>
<a href="#" class="goback" zoneid="<?=$zoneid?>">Go Back</a>
