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
            
        var rewardname = $("#rewardname").val();
        var description = $("#description").val();
        var rewardpic = $("#rewardpic").val();
        var rewardtype = $("#rewardtype").val();

        var url = "<?=base_url('addreward/addrewardcheck')?>"
        $.ajax({
               type: "POST",
               url: url,
               data: {
                rewardname: rewardname,
                description: description,
                rewardpic: rewardpic,
                rewardtype: rewardtype
               }
               , 
               success: function(data){
                   if(data == 'add_reward_success'){
                        $('#mainarea').load(
                            "<?=base_url('rewardoverview')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_reward_failed'){
                        alert('Add reward failed');
                   }else if(data == 'add_reward_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-register">
	<h1 class ="text-white"style="margin-top:50px !important">สร้างรางวัลให้กับผู้เล่นของคุณ</h1>
</div>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
Reward Name*:
	<input type="text" 
		class ="register-margin register-box" 
		name="rewardname" 
		id="rewardname" 
		size ="100" 
		placeholder ="&nbsp  Must be less than 50 characters"
		required
		maxlength="50"><br>
Description*:
	<input type="text" 
		class ="register-margin register-box" 
		name="description" 
		id="description" 
		size ="100" 
		placeholder ="&nbsp  Must be less than 200 characters"
		required
		maxlength="200"><br>
Reward Picture: <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="rewardpic"
		id="rewardpic"
		size ="999">
		<br>
Reward Type*:
	<?= form_dropdown('rewardtype',$rewardtypedata, '', 'id="rewardtype"'); ?>
	 <br><br>
	<input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
