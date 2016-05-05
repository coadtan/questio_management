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
	$(document).on("submit", "form", function(event){
        event.preventDefault();
        
        var inputFile = $('input[name=placepic]');
        var placepic = inputFile[0].files[0];

        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);

        if (placepic != 'undefined') {
          formData.append("placepic", placepic);
        }


        var url = "<?=base_url('editplace/editplacecheck')?>"+"/"+placeid;
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'edit_place_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_place_failed'){
                        alert('Edit place failed');
                   }else if(data == 'edit_place_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });    
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	<input type="hidden" name="placeid" id="placeid"  class ="margin-field-default" value="<?=$placedata["placeid"]?>"
	Place Name*:
	<i>Must be less than 50 characters</i>
	 <input type="text" name="placename" class ="margin-field-default" id="placename" value="<?=$placedata['placename']?>" size="30" required maxlength="50"><br>
	Place Full Name*:
	<i>Must be less than 255 characters</i>
	 <input type="text" name="placefullname" class ="margin-field-default" id="placefullname" value="<?=$placedata['placefullname']?>" size="50" required maxlength="255"><br>
	Latitude*:
	<input type="number" name="latitude" class ="margin-field-default" id="latitude" value='<?=$placedata["latitude"]?>' required
			pattern="\d+(\.\d{1,15})?"><br>
	Longitude*:
	<input type="number" name="longitude" class ="margin-field-default" id="longitude" value='<?=$placedata["longitude"]?>' required
			pattern="\d+(\.\d{1,15})?"><br>
	Radius*:
	<input type="number" name="radius" class ="margin-field-default" id="radius" value='<?=$placedata["radius"]?>' required
			pattern="\d+(\.\d{1,4})?"><br> 
<select name="placetype" id="placetype" class ="margin-field-default">
	<option value="University" <?=$placedata["placetype"]=="University"?'selected':''?>>University</option>
	<option value="Museum" <?=$placedata["placetype"]=="Museum"?'selected':''?>>Museum</option>
	<option value="Temple" <?=$placedata["placetype"]=="Temple"?'selected':''?>>Temple</option>
</select>

    <input style ="margin:0 auto;" type="hidden" name="imageurl" id="imageurl" class ="margin-field-default"value='<?=$placedata["imageurl"]?>'><br>
	Place Image: 
    <input type="file"
    class ="register-margin register-box"
		name="placepic"
		id="placepic"
		size ="999"
    accept="image/*">
    <br>
		<?php if(!empty($placedata["imageurl"])):?>
        <img
            class ="margin-field-default"
            src="<?=base_url($placedata["imageurl"])?>"
            alt="<?= $placedata["imageurl"]?>"
            style="width:100px;height:100px;">
        <?php endif;?>
		<br>
	Enter Rewards:
	<?= form_dropdown('enter_rewardid',$enterrewarddata,$placedata["enter_rewardid"],'id="enter_rewardid"') ?><br>
	Rewards:
	<?= form_dropdown('rewardid',$rewarddata,$placedata["rewardid"],'id="rewardid"') ?><br>
	<input type="submit" class ="margin-field-default" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
