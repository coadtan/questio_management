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
            
        var inputFile = $('input[name=floorpic]');
        var floorpic = inputFile[0].files[0];

        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);

        if (floorpic != 'undefined') {
          formData.append("floorpic", floorpic);
        }


        var url = "<?=base_url('editfloor/editfloorcheck')?>"+"/"+floorid;
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'edit_floor_success'){
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_floor_failed'){
                        alert('Edit floor failed');
                   }else if(data == 'edit_floor_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	<input type="hidden" name="floorid" id="floorid" value="<?=$floordata['floorid']?>">
	Floor Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="floorname" id="floorname" size="50" value="<?=$floordata['floorname']?>" required maxlength="100"><br>
	Building Name*:
	<?php echo form_dropdown('buildingid',$buildingdata, $floordata['buildingid'], 'id="buildingid"'); ?>
	 <br>
	<input type="hidden" name="imageurl" id="imageurl" value="<?=$floordata['imageurl']?>">
	Floor Image: <input type="file"
		class ="register-margin register-box"
		name="floorpic"
		id="floorpic"
		size ="999"
    accept="image/*">
    <?php if(!empty($floordata['imageurl'])):?>
		<img
            src="http://52.74.64.61/questio_management<?=$floordata['imageurl']?>"
            alt="<?= $floordata["imageurl"]?>"
            style="width:100px;
                    height:100px;">
    <?php endif;?>
		<br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback" style ="color:black">Go Back</a>