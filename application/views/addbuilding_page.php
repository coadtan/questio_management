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
            
        var buildingname = $("#buildingname").val();
        var placeid = $("#placeid").val();
        var latitude = $("#latitude").val();
        var longitude = $("#longitude").val();
        var radius = $("#radius").val();
        var buildingpic = $("#buildingpic").val();


        var url = "<?=base_url('addbuilding/addbuildingcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                buildingname: buildingname,
                placeid: placeid,
                latitude: latitude,
                longitude: longitude,
                radius: radius,
                buildingpic: buildingpic
               }
               , 
               success: function(data){
                   if(data == 'add_building_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_building_failed'){
                        alert('Add building failed');
                   }else if(data == 'add_building_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	Building Name*:
	<i>Must be less than 140 characters</i>
	 <input type="text" name="buildingname" id="buildingname" size="50" required maxlength="140"><br>
	Place Name*:
	<?= form_dropdown('placeid',$placedata,'','id="placeid"'); ?>
	 <br>
	Latitude*:
	<input type="number" name="latitude" id="latitude" required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Longitude*:
	<input type="number" name="longitude" id="longitude" required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Radius*:
	<input type="number" name="radius" id="radius" required pattern="\d+(\.\d{1,4})?" title="Decimal number"><br>
	Building Image: <input type="file"
		class ="register-margin register-box"
		name="buildingpic"
		id="buildingpic"
		size ="999"
    accept="image/*">
		<br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
