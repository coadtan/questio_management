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
        
        var inputFile = $('input[name=buildingpic]');
        var buildingpic = inputFile[0].files[0];

        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);

        if (buildingpic != 'undefined') {
          formData.append("buildingpic", buildingpic);
        }


        var url = "<?=base_url('editbuilding/editbuildingcheck')?>"+"/"+buildingid;
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'edit_building_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_building_failed'){
                        alert('Edit building failed');
                   }else if(data == 'edit_building_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	<input type="hidden" name="buildingid" id="buildingid" value="<?=$buildingdata["buildingid"]?>"
	Building Name*:
	<i>Must be less than 140 characters</i>
	 <input type="text" name="buildingname" id="buildingname" size="50" value='<?=$buildingdata["buildingname"]?>' required maxlength="140"><br>
	Place Name*:
	<?= form_dropdown('placeid',$placedata, $buildingdata['placeid'],'id="placeid"'); ?>
	 <br>
	Latitude*:
	<input type="text" name="latitude" id="latitude" value='<?=$buildingdata["latitude"]?>' required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Longitude*:
	<input type="text" name="longitude" id="longitude" value='<?=$buildingdata["longitude"]?>' required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Radius*:
	<input type="text" name="radius" id="radius" value='<?=$buildingdata["radius"]?>' required pattern="\d+(\.\d{1,4})?" title="Decimal number"><br>
	<input type="hidden" name="imageurl" value='<?=$buildingdata["imageurl"]?>'>
	Building Image: <input type="file"
		class ="register-margin register-box"
		name="buildingpic"
		id="buildingpic"
		size ="999"
    accept="image/*">
    <?php if(!empty($buildingdata["imageurl"])):?>
		<img
            src="<?=base_url($buildingdata["imageurl"])?>"
            alt="<?= $buildingdata["imageurl"]?>"
            style="width:100px;
                    height:100px;">
    <?php endif;?>
		<br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>