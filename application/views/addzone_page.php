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
            
        var inputFile1 = $('input[name=zonepic]');
        var zonepic = inputFile1[0].files[0];
        var inputFile2 = $('input[name=minimappic]');
        var minimappic = inputFile2[0].files[0];
        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);

        if (zonepic != 'undefined'){
          formData.append("zonepic", zonepic);
        }

        if (minimappic != 'undefined'){
          formData.append("minimappic", minimappic);
        }


        var url = "<?=base_url('addzone/addzonecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,
               success: function(data){
                if(data == 'add_zone_success'){
                    $('#mainarea').load(
			    		       "<?=base_url('mainpage/getplace')?>"
					           );

			        $('html,body').animate({
			        scrollTop: $("#mainarea").offset().top},
			        'slow');
                   }else if(data == 'add_zone_failed'){
                        alert('Add zone failed');
                   }else if(data == 'add_zone_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
        
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	Zone Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="zonename" id="zonename" size="50" required maxlength="100"><br>
	Floor Name*:
	<?php echo form_dropdown('floorid',$floordata, '', 'id="floorid"'); ?>
	 <br>
	Zone Type*:
	<?php echo form_dropdown('zonetype',$zonetypedata, '', 'id="zonetype"'); ?>
	 <br>
	Zone Details:<br>
	<textarea name="zonedetails" id="zonedetails" rows="5" cols="50">

	</textarea><br>
	<input type="hidden" name="qrcode" id="qrcode" value="<?=$qrcode?>"><br>
	<input type="hidden" name="sensorid" id="sensorid" value="<?=$sensorid?>"><br>
	Zone Picture: <input type="file"
		class ="register-margin register-box"
		name="zonepic"
		id="zonepic"
		size ="999"
    accept="image/*">
		<br>
	Minimap Picture: <input type="file"
		class ="register-margin register-box"
		name="minimappic"
		id="minimappic"
		size ="999"
    accept="image/*">
		<br>
	Items:
	<?= form_dropdown('itemid',$itemdata, '', 'id="itemid"'); ?><br>
	Rewards:
	<?= form_dropdown('rewardid',$rewarddata, '', 'id="rewardid"'); ?><br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
