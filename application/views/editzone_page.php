<script>
$(document).ready(function(){
  var zoneid = $('#zoneid').val();
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
      $('#submit-edit-zone').click(function(){
        event.preventDefault();
            
        var inputFile1 = $('input[name=zonepic]');
        var zonepic = inputFile1[0].files[0];
        var inputFile2 = $('input[name=minimappic]');
        var minimappic = inputFile2[0].files[0];
        var formElement = document.querySelector("#form-edit-zone");
        var formData = new FormData(formElement);

        if (zonepic != 'undefined'){
          formData.append("zonepic", zonepic);
        }

        if (minimappic != 'undefined'){
          formData.append("minimappic", minimappic);
        }


        var url = "<?=base_url('editzone/editzonecheck')?>"+'/'+zoneid;
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,
               success: function(data){
                if(data == 'edit_zone_success'){
                   $('#mainarea').load(
                        "<?=base_url('mainpage/getplace')?>"
                    );

                    $('html,body').animate({
                    scrollTop: $("#mainarea").offset().top},
                    'slow');
                   }else if(data == 'edit_zone_failed'){
                        alert('Edit zone failed');
                   }else if(data == 'edit_zone_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-edit-zone">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไข Zone</h1>
  </div><br><br>
	<input type="hidden" name="zoneid" id="zoneid" value="<?=$zonedata['zoneid']?>">
	Zone Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="zonename" id="zonename" size="50" value="<?=$zonedata['zonename']?>" required maxlength="100"><br>
	Floor Name*:
	<?php echo form_dropdown('floorid',$floordata,$zonedata["floorid"],'id="floorid"'); ?>
	 <br>
	Zone Type*:
	<?php echo form_dropdown('zonetype',$zonetypedata,$zonedata["zonetypeid"],'id="zonetype"'); ?>
	 <br>
	Zone Details:<br>
	<textarea name="zonedetails" id="zonedetails" rows="5" cols="50">
<?=$zonedata["zonedetails"]?>
	</textarea><br>
	<input type="hidden" name="imageurl" id="imageurl" value="<?=$zonedata['imageurl']?>">
	<input type="hidden" name="minimapurl" id="minimapurl" value="<?=$zonedata['minimapurl']?>">
	Zone Picture: <input type="file"
		class ="register-margin register-box"
		name="zonepic"
		id="zonepic"
		size ="999"
        accept="image/*">
    <?php if(!empty($zonedata['imageurl'])):?>
		<img
            src="<?=base_url($zonedata['imageurl'])?>"
            alt="<?= $zonedata['imageurl']?>"
            style="width:100px;
                    height:100px;">
		<br>
    <?php endif;?>
	Minimap Picture: <input type="file"
		class ="register-margin register-box"
		name="minimappic"
		id="minimappic"
		size ="999"
        accept="image/*">
    <?php if(!empty($zonedata['minimapurl'])):?>
		<img
            src="<?=base_url($zonedata['minimapurl'])?>"
            alt="<?= $zonedata['minimapurl']?>"
            style="width:100px;
                    height:100px;">
		<br>
    <?php endif;?>
	Items:
	<?= form_dropdown('itemid',$itemdata,$zonedata["itemid"],'id="itemid"') ?><br>
	Rewards:
	<?= form_dropdown('rewardid',$rewarddata,$zonedata["rewardid"],'id="rewardid"') ?><br>
	<input type="submit" value="Submit" id="submit-edit-zone">
  <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
