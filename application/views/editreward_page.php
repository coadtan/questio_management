<script>
$(document).ready(function(){
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('rewardoverview')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var rewardid = $("#rewardid").val();
        var rewardname = $("#rewardname").val();
        var description = $("#description").val();
        var rewardpic = $("#rewardpic").val();
        var rewardurl = $("#rewardurl").val();
        var rewardtype = $("#rewardtype").val();

        var url = "<?=base_url('editreward/editrewardcheck')?>"
        $.ajax({
               type: "POST",
               url: url,
               data: {
                rewardid: rewardid,
                rewardname: rewardname,
                description: description,
                rewardpic: rewardpic,
                rewardurl: rewardurl,
                rewardtype: rewardtype
               }
               , 
               success: function(data){
                   if(data == 'edit_reward_success'){
                        $('#mainarea').load(
                            <?=base_url('rewardoverview')?>;
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
<div class ="r1-register">
	<h1 class ="text-white"style="margin-top:50px !important">แก้ไขรางวัลให้กับผู้เล่นของคุณ</h1>
</div>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
		size ="999">
		<img
            src="http://52.74.64.61/questio_management<?=$rewarddata['rewardpic']?>"
            alt="<?= $rewarddata['rewardpic']?>"
            style="width:100px;
                    height:100px;">
		<br>
<input type="hidden" name="rewardpic" value="<?=$rewarddata['rewardpic']?>">
Reward Type*:
	<?= form_dropdown('rewardtype',$rewardtypedata, $rewarddata['rewardtype'],'id="rewardtype"'); ?>
	 <br><br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
