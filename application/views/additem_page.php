<script>
$(document).ready(function(){

    $.ajaxSetup({ 
        cache: false 
    });
    
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('itemoverview')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });

    $('#submit-add-item').click(function(){
    // $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var inputFile1 = $('input[name=itempic]');
        var itempic = inputFile1[0].files[0];
        var inputFile2 = $('input[name=spritepic]');
        var spritepic = inputFile2[0].files[0];
        

        if (itempic != 'undefined' && spritepic != 'undefined') {

            var formElement = document.querySelector("#form-add-item");
            var formData = new FormData(formElement);
            // formData.append("itempic", itempic);
            // formData.append("spritepic", spritepic);

            //var formData = $('#form-add-item').serialize();
            formData.append("itempic", itempic);
            formData.append("spritepic", spritepic);

            var url = "<?=base_url('additem/additemcheck')?>";
            $.ajax({
                   type: "POST",
                   url: url,
                   data: formData,
                   processData: false,
                   contentType: false,
                   success: function(data){
                       if(data == 'add_item_success'){
                            $('#mainarea').load(
                                "<?=base_url('itemoverview')?>"
                            );

                            $('html,body').animate({
                                scrollTop: $("#mainarea").offset().top},
                                'slow'
                            );
                       }else if(data == 'add_item_failed'){
                            alert('Add item failed');
                       }else if(data == 'add_item_error'){
                            alert('Error: Some field is not valid');
                       }
                   }
            });
            return false;
      }
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-item">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">เพิ่มไอเท็ม</h1>
  </div>
  <div class ="form-field-add">
	<label>Item Name*:</label>
	<input type="text" 
		class ="register-margin register-box" 
		name="itemname" 
		id="itemname" 
		size ="100" 
		placeholder ="&nbsp Must be less than 30 characters"
		required
		maxlength="30"><br>
	<label>Item Collection*:</label>
	<input type="text" 
		class ="register-margin register-box" 
		name="itemcollection" 
		id="itemcollection" 
		size ="97" 
		placeholder ="&nbsp  Must be less than 50 characters"
		required
		maxlength="50"><br>
	<label>Item Picture:</label>
   <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="itempic"
		id="itempic"
		size ="999"
    accept="image/*">
		<br>
	<label>Item Sprite:</label>
  <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="spritepic"
		id="spritepic"
		size ="999"
    accept="image/*">
		<br>
	<label>Position to Equip*:</label>
	<?= form_dropdown('positionid',$position,'','id="positionid"'); ?>
	 <br><br>
	<input type="submit" id="submit-add-item" value="Submit">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
</div>
