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
        
        var placeid = $("#placeid").val();
        var placename = $("#placename").val();
        var placefullname = $("#placefullname").val();
        var latitude = $("#latitude").val();
        var longitude = $("#longitude").val();
        var radius = $("#radius").val();
        var placetype = $("#placetype").val();
        var imageurl = $("#imageurl").val();
        var placepic = $("#placepic").val();
        var enter_rewardid = $("#enter_rewardid").val();
        var rewardid = $("#rewardid").val();


        var url = "<?=base_url('editplace/editplacecheck')?>"+"/"+placeid;
        $.ajax({
               type: "POST",
               url: url,
               data: {
                placename: placename,
                placefullname: placefullname,
                latitude: latitude,
                longitude: longitude,
                radius: radius,
                placetype: placetype,
                imageurl: imageurl,
                placepic: placepic,
                enter_rewardid: enter_rewardid,
                rewardid: rewardid
               }
               , 
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
	<input type="hidden" name="placeid" id="placeid" value="<?=$placedata["placeid"]?>"
	Place Name*:
	<i>Must be less than 50 characters</i>
	 <input type="text" name="placename" id="placename" value="<?=$placedata['placename']?>" size="30" required maxlength="50"><br>
	Place Full Name*:
	<i>Must be less than 255 characters</i>
	 <input type="text" name="placefullname" id="placefullname" value="<?=$placedata['placefullname']?>" size="50" required maxlength="255"><br>
	Latitude*:
	<input type="number" name="latitude" id="latitude" value='<?=$placedata["latitude"]?>' required
			pattern="\d+(\.\d{1,15})?"><br>
	Longitude*:
	<input type="number" name="longitude" id="longitude" value='<?=$placedata["longitude"]?>' required
			pattern="\d+(\.\d{1,15})?"><br>
	Radius*:
	<input type="number" name="radius" id="radius" value='<?=$placedata["radius"]?>' required
			pattern="\d+(\.\d{1,4})?"><br>
<select name="placetype" id="placetype">
	<option value="University" <?=$placedata["placetype"]=="University"?'selected':''?>>University</option>
	<option value="Museum" <?=$placedata["placetype"]=="Museum"?'selected':''?>>Museum</option>
	<option value="Temple" <?=$placedata["placetype"]=="Temple"?'selected':''?>>Temple</option>
</select>
	<input type="hidden" name="imageurl" id="imageurl" value='<?=$placedata["imageurl"]?>'>
	Place Image: <input type="file"
		class ="register-margin register-box"
		name="placepic"
		id="placepic"
		size ="999"
        accept="image/*">
		<img
            src="http://52.74.64.61/questio_management<?=$placedata["imageurl"]?>"
            alt="<?= $placedata["imageurl"]?>"
            style="width:100px;
                    height:100px;">
		<br>
	Enter Rewards:
	<?= form_dropdown('enter_rewardid',$enterrewarddata,$placedata["enter_rewardid"],'id="enter_rewardid"') ?><br>
	Rewards:
	<?= form_dropdown('rewardid',$rewarddata,$placedata["rewardid"],'id="rewardid"') ?><br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
