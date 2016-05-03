<script>
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });  
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
            
        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);

        var url = "<?=base_url('addquest/addquestcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               success: function(data){
                   if(data == 'add_quest_success'){
                        $('#mainarea').load(
                            "<?=base_url('questoverview/getquest')?>"+"/"+zoneid
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_quest_failed'){
                        alert('Add quest failed');
                   }else if(data == 'add_quest_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form method="POST">
	Quest Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="questname" id="questname" size="100" required maxlength="100"><br>
	Quest Details*:
	<textarea name="questdetails" id="questdetails" rows="5" cols="50" required>
	</textarea><br>
	Quest Type*:
	<?= form_dropdown('questtypeid',$questtype, '', 'id="questtypeid"'); ?>
	 <br>
	<input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
	Difficulty*:
	<?= form_dropdown('diffid',$difficulty, '', 'id="diffid"'); ?>
	 <br>
	Rewards:
	<?= form_dropdown('rewardid',$reward, '', 'id="rewardid"'); ?>
	 <br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback" zoneid="<?=$zoneid?>" style ="color:black">Go Back</a>
