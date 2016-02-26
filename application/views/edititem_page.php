<script>
$(document).ready(function(){
    $('.goback').click(function(){
        $('#mainarea').load(
    		"<?=base_url('itemoverview')?>"
		);

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var itemid = $("#itemid").val();
        var itemname = $("#itemname").val();
        var itemcollection = $("#itemcollection").val();
        var itempic = $("#itempic").val();
        var itempicpath = $("#itempicpath").val();
        var spritepic = $("#spritepic").val();
        var equipspritepath = $("#equipspritepath").val();
        var positionid = $("#positionid").val();


        var url = "<?=base_url('edititem/edititemcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                itemid: itemid,
                itemname: itemname,
                itemcollection: itemcollection,
                itempic: itempic,
                itempicpath: itempicpath,
                spritepic: spritepic,
                equipspritepath: equipspritepath,
                positionid: positionid
               }
               , 
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
<div class ="r1-register">
	<h1 class ="text-white"style="margin-top:50px !important"> แก้ไขอุปกรณ์ให้กับตัวละคร</h1>
</div>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
		size ="999">
		<img
            src="http://52.74.64.61/questio_management<?=$itemdata['itempicpath']?>"
            alt="<?= $itemdata['itempicpath']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Item Sprite: <input type="file"
		class ="register-margin register-box"
		name="spritepic"
		id="spritepic"
		size ="999">
		<img
            src="http://52.74.64.61/questio_management<?=$itemdata['equipspritepath']?>"
            alt="<?= $itemdata['equipspritepath']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Position to Equip*:
	<?= form_dropdown('positionid',$position, $itemdata["positionid"], 'id="positionid"'); ?>
	 <br><br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback">Go Back</a>