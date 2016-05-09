<script>
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });  
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('rewardoverview')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('#submit-edit-reward').click(function(){
        event.preventDefault();
            
        var inputFile = $('input[name=rewardurl]');
      var rewardurl = inputFile[0].files[0];
      
      var formElement = document.querySelector("#form-edit-reward");
      var formData = new FormData(formElement);
          
        if (rewardurl != 'undefined') {
          formData.append("rewardurl", rewardurl);
        }

        var url = "<?=base_url('editreward/editrewardcheck')?>"
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,
               success: function(data){
                   if(data == 'edit_reward_success'){
                        $('#mainarea').load(
                            "<?=base_url('rewardoverview')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_reward_failed'){
                        alert('Edit reward failed');
                   }else if(data == 'edit_reward_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไขรางวัลของคุณ</h1>
  </div><br><br>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-edit-reward">
<input type="hidden" name="rewardid" id="rewardid" value="<?=$rewarddata['rewardid']?>">
Reward Name*:
	<input type="text" 
		class ="register-margin register-box" 
		name="rewardname" 
		id="rewardname" 
		size ="100" 
		placeholder ="&nbsp  Must be less than 50 characters"
		value="<?=$rewarddata['rewardname']?>"
		required
		maxlength="50"><br>
Description*:
	<input type="text" 
		class ="register-margin register-box" 
		name="description" 
		id="description" 
		size ="103" 
		placeholder ="&nbsp  Must be less than 200 characters"
		value="<?=$rewarddata['description']?>"
		required
		maxlength="200"><br>
Reward Picture: <input type="file"
		class ="register-margin register-box"
		name="rewardurl"
		id="rewardurl"
		size ="999"
    accept="image/*">
    <?php if(!empty($rewarddata['rewardpic'])):?>
		<img
            src="<?=base_url($rewarddata['rewardpic'])?>"
            alt="<?= $rewarddata['rewardpic']?>"
            style="width:100px;
                    height:100px;">
    <?php endif;?>
		<br>
<input type="hidden" name="rewardpic" id="rewardpic" value="<?=$rewarddata['rewardpic']?>">
Reward Type*:
	<?= form_dropdown('rewardtype',$rewardtypedata, $rewarddata['rewardtype'],'id="rewardtype"'); ?>
	 <br><br>
	<input type="submit" value="Submit" id="submit-edit-reward">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
