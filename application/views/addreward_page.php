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


    $('#submit-add-reward').click(function(){
    //$(document).on("submit", "form", function(event){
      event.preventDefault();
      var inputFile = $('input[name=rewardpic]');
      var rewardpic = inputFile[0].files[0];
      
       var formElement = document.querySelector("#form-add-reward");
       var formData = new FormData(formElement);
        
      //  var formData = $('#form-add-reward').serializeArray();

        if (rewardpic != 'undefined') {
          formData.append("rewardpic", rewardpic);
        }

        var url = "<?=base_url('addreward/addrewardcheck')?>"
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,
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
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-reward">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">เพิ่มรางวัลให้กับผู้เล่นของคุณ</h1>
  </div><br><br>
<label>Reward Name*:</label>
	<input type="text" 
		class ="register-margin register-box" 
		name="rewardname" 
		id="rewardname" 
		size ="100" 
		placeholder ="&nbsp  Must be less than 50 characters"
		required
		maxlength="50"><br>
<label>Description*:</label>
	<input type="text" 
		class ="register-margin register-box" 
		name="description" 
		id="description" 
		size ="103" 
		placeholder ="&nbsp  Must be less than 200 characters"
		required
		maxlength="200"><br>
<label>Reward Picture:</label>
 <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="rewardpic"
		id="rewardpic"
		size ="999"
    accept="image/*">
		<br>
<label>Reward Type*:</label>
	<?= form_dropdown('rewardtype',$rewardtypedata, '', 'id="rewardtype"'); ?>
	 <br><br>
	<input id="submit-add-reward" type="submit" value="Submit">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
<?=form_close()?>

