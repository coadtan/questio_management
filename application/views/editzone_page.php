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
            
        var zoneid = $("#zoneid").val();
        var floorid = $("#floorid").val();
        var zonetype = $("#zonetype").val();
        var zonedetails = $("#zonedetails").val();
        var qrcode = $("#qrcode").val();
        var sensorid = $("#sensorid").val();
        var imageurl = $("#imageurl").val();
        var zonepic = $("#zonepic").val();
        var minimapurl = $("#minimapurl").val();
        var minimappic = $("#minimappic").val();
        var itemid = $("#itemid").val();
        var rewardid = $("#rewardid").val();


        var url = "<?=base_url('editzone/editzonecheck')?>"+'/'+zoneid;
        $.ajax({
               type: "POST",
               url: url,
               data: {
                floorid: floorid,
                zonetype: zonetype,
                zonedetails: zonedetails,
                qrcode: qrcode,
                sensorid: sensorid,
                imageurl: imageurl,
                zonepic: zonepic,
                minimapurl: minimapurl,
                minimappic: minimappic,
                itemid: itemid,
                rewardid: rewardid
               }
               , 
               success: function(data){
                if(data == 'add_zone_success'){
                    $('#mainarea').load(
			    		       "<?=base_url('mainpage/getplace')?>"
					           );

			        $('html,body').animate({
			        scrollTop: $("#mainarea").offset().top},
			        'slow');
                   }else if(data == 'add_zone_failed'){
                        alert('Add zone failed');
                   }else if(data == 'add_zone_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
	<input type="hidden" name="zoneid" id="zoneid" value="<?=$zonedata['zoneid']?>">
	Zone Name*:
	<i>Must be less than 100 characters</i>
	 <input type="text" name="zonename" id="zonename" size="50" value="<?=$zonedata['zonename']?>" required maxlength="100"><br>
	Floor Name*:
	<?php echo form_dropdown('floorid',$floordata,$zonedata["floorid"],'id="floorid"'); ?>
	 <br>
	Zone Type*:
	<?php echo form_dropdown('zonetype',$zonetypedata,$zonedata["zonetypeid"],'id="zonetypeid"'); ?>
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
		size ="999">
		<img
            src="http://52.74.64.61/questio_management<?=$zonedata['imageurl']?>"
            alt="<?= $zonedata['imageurl']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Minimap Picture: <input type="file"
		class ="register-margin register-box"
		name="minimappic"
		id="minimappic"
		size ="999">
		<img
            src="http://52.74.64.61/questio_management<?=$zonedata['minimapurl']?>"
            alt="<?= $zonedata['minimapurl']?>"
            style="width:100px;
                    height:100px;">
		<br>
	Items:
	<?= form_dropdown('itemid',$itemdata,$zonedata["itemid"],'id="itemid"') ?><br>
	Rewards:
	<?= form_dropdown('rewardid',$rewarddata,$zonedata["rewardid"],'id="rewardid"') ?><br>
	<input type="submit" value="Submit">
</form>
<a href="#" class="goback"style ="color:black">Go Back</a>
