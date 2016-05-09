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
    $('#submit-edit-item').click(function(){
        event.preventDefault();
            
        var inputFile1 = $('input[name=itempic]');
        var itempic = inputFile1[0].files[0];
        var inputFile2 = $('input[name=spritepic]');
        var spritepic = inputFile2[0].files[0];
        

        if (itempic != 'undefined' && spritepic != 'undefined') {

          var formElement = document.querySelector("#form-edit-item");
          var formData = new FormData(formElement);
          formData.append("itempic", itempic);
          formData.append("spritepic", spritepic);

        }


        var url = "<?=base_url('edititem/edititemcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,
               success: function(data){
                   if(data == 'edit_item_success'){
                        $('#mainarea').load(
                            "<?=base_url('itemoverview')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_item_failed'){
                        alert('Edit item failed');
                   }else if(data == 'edit_item_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไขไอเท็มของคุณ</h1>
  </div><br><br>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-edit-item">
	<input type="hidden" name="itemid" id="itemid" value="<?=$itemdata['itemid']?>">
	Item Name*: 
	<input type="text" 
		class ="register-margin register-box" 
		name="itemname" 
		id="itemname" 
		size ="100" 
		placeholder ="&nbsp Must be less than 30 characters"
		value="<?=$itemdata['itemname']?>"><br>
	Item Collection*:
	<input type="text" 
		class ="register-margin register-box" 
		name="itemcollection" 
		id="itemcollection" 
		size ="97" 
		placeholder ="&nbsp  Must be less than 50 characters"
		value=<?=$itemdata['itemcollection']?>><br>
	<input type="hidden" name="itempicpath" id="itempicpath" value="<?=$itemdata['itempicpath']?>">
	<input type="hidden" name="equipspritepath" id="equipspritepath" value="<?=$itemdata['equipspritepath']?>">
	Item Picture: <input type="file"
		class ="register-margin register-box"
		name="itempic"
		id="itempic"
		size ="999"
        accept="image/*">
		<img
            src="<?=base_url($itemdata['itempicpath'])?>"
            alt="<?= $itemdata['itempicpath']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Item Sprite: <input type="file"
		class ="register-margin register-box"
		name="spritepic"
		id="spritepic"
		size ="999"
        accept="image/*">
		<img
            src="<?=base_url($itemdata['equipspritepath'])?>"
            alt="<?= $itemdata['equipspritepath']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Position to Equip*:
	<?= form_dropdown('positionid',$position, $itemdata["positionid"], 'id="positionid"'); ?>
	 <br><br>
	<input type="submit" value="Submit" id="submit-edit-item">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>