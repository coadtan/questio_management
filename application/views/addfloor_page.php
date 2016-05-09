<script>
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('mainpage/getplace')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('#submit-add-floor').click(function(){
        event.preventDefault();
            
        var inputFile = $('input[name=floorpic]');
        var floorpic = inputFile[0].files[0];

        var formElement = document.querySelector("#form-add-floor");
        var formData = new FormData(formElement);

        if (floorpic != 'undefined') {
          formData.append("floorpic", floorpic);
        }


        var url = "<?=base_url('addfloor/addfloorcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false, 
               success: function(data){
                   if(data == 'add_floor_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_floor_failed'){
                        alert('Add floor failed');
                   }else if(data == 'add_floor_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Add Floor</h1>
  </div><br><br>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-floor">
	Floor Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="floorname" id="floorname" size="50" required maxlength="100"><br>
	Building Name*:
	<?php echo form_dropdown('buildingid',$buildingdata,'','id="buildingid"'); ?>
	 <br>
	<input type="hidden" name="qrcode" id="qrcode" value="<?=$qrcode?>"><br>
	<input type="hidden" name="sensorid" id="sensorid" value="<?=$sensorid?>"><br>
	Floor Image: <input type="file"
		class ="register-margin register-box"
		name="floorpic"
		id="floorpic"
		size ="999"
    accept="image/*">
		<br>
	<input type="submit" value="Submit" id="submit-add-floor">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
