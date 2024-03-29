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
    $('#submit-add-placedetail').click(function(){
        event.preventDefault();
            
        var inputFile = $('input[name=placepic]');
        var placepic = inputFile[0].files[0];

        var formElement = document.querySelector("#form-add-placedetail");
        var formData = new FormData(formElement);

        if (placepic != 'undefined') {
          formData.append("placepic", placepic);
        }


        var url = "<?=base_url('addplace/addplacedetailcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'add_placedetail_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_placedetail_failed'){
                        alert('Add placedetail failed');
                   }else if(data == 'add_placedetail_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Add Place Detail</h1>
  </div><br><br>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-placedetail">
<input type="hidden" name="placeid" id="placeid" value="<?=$placeid?>">
    Place Details:*<br>
		<textarea name="placedetails" id="placedetails" rows="5" cols="50" required>
		</textarea><br>
	Phone Contact:<br>
	1.* <input type="tel" name="phonecontact1" id="phonecontact1" size="10" required maxlength="10" pattern="[0-9]{9,10}" title="number"><br>
	2. <input type="tel" name="phonecontact2" id="phonecontact2" size="10" maxlength="10" pattern="[0-9]{9,10}" title="number"><br>
	Website:<br>
	<input type="url" name="website" id="website" size="30"><br>
	Email:<br>
	<input type="email" name="email" id="email" size="30"><br>
    Place Picture: <input type="file"
        class ="register-margin register-box"
        name="placepic"
        id="placepic"
        size ="999"
        accept="image/*">
        <br>
    <input type="submit" value="Submit" id="submit-add-placedetail">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
</div>
</body>
</html>