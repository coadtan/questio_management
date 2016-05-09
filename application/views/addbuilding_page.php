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
    $('#submit-add-building').click(function(){
        event.preventDefault();
            
        var inputFile = $('input[name=buildingpic]');
        var buildingpic = inputFile[0].files[0];

        var formElement = document.querySelector("#form-add-building");
        var formData = new FormData(formElement);

        if (buildingpic != 'undefined') {
          formData.append("buildingpic", buildingpic);
        }


        var url = "<?=base_url('addbuilding/addbuildingcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
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
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-building">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Add Building ของคุณ</h1>
  </div>
  <div class="form-field-add">
	Building Name*:
	<i>Must be less than 140 characters</i>
	 <input type="text" name="buildingname" id="buildingname" size="50" required maxlength="140"><br>
	Place Name*:
	<?= form_dropdown('placeid',$placedata,'','id="placeid"'); ?>
	 <br>
	Latitude*:
	<input type="text" name="latitude" id="latitude" required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Longitude*:
	<input type="text" name="longitude" id="longitude" required pattern="\d+(\.\d{1,15})?" title="Decimal number"><br>
	Radius*:
	<input type="text" name="radius" id="radius" required pattern="\d+(\.\d{1,4})?" title="Decimal number"><br>
	Building Image: <input type="file"
		class ="register-margin register-box"
		name="buildingpic"
		id="buildingpic"
		size ="999"
    accept="image/*">
		<br><br>
	<input type="submit" value="Submit" id="submit-add-building">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
</div>