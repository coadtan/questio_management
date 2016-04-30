<script>
$(document).ready(function(){
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('mainpage/getplace')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var floorname = $("#floorname").val();
        var buildingid = $("#buildingid").val();
        var qrcode = $("#qrcode").val();
        var sensorid = $("#sensorid").val();
        var floorpic = $("#floorpic").val();


        var url = "<?=base_url('addfloor/addfloorcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                floorname: floorname,
                buildingid: buildingid,
                qrcode: qrcode,
                sensorid: sensorid,
                floorpic: floorpic
               }
               , 
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
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
