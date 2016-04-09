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
            
        var itemname = $("#itemname").val();
        var itemcollection = $("#itemcollection").val();
        var itempic = $("#itempic").val();
        var spritepic = $("#spritepic").val();
        var positionid = $("#positionid").val();


        var url = "<?=base_url('additem/additemcheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                itemname: itemname,
                itemcollection: itemcollection,
                itempic: itempic,
                spritepic: spritepic,
                positionid: positionid
               }
               , 
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
    });
});
</script>
<div class ="r1-register">
	<h1 class ="text-white"style="margin-top:50px !important"> สร้างอุปกรณ์ให้กับตัวละคร</h1>
</div>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	Item Name*: 
	<input type="text" 
		class ="register-margin register-box" 
		name="itemname" 
		id="itemname" 
		size ="100" 
		placeholder ="&nbsp Must be less than 30 characters"
		required
		maxlength="30"><br>
	Item Collection*:
	<input type="text" 
		class ="register-margin register-box" 
		name="itemcollection" 
		id="itemcollection" 
		size ="97" 
		placeholder ="&nbsp  Must be less than 50 characters"
		required
		maxlength="50"><br>
	Item Picture: <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="itempic"
		id="itempic"
		size ="999">
		<br>
	Item Sprite: <input type="file"
		style ="margin:auto;margin-top:5px!important"
		class ="register-margin register-box"
		name="spritepic"
		id="spritepic"
		size ="999">
		<br>
	Position to Equip*:
	<?= form_dropdown('positionid',$position,'','id="positionid"'); ?>
	 <br><br>
	<input type="button" class="goback" value ="Go Back"/>
   <input type="submit" value="Submit"/>
</form>
