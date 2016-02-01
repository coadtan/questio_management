<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Place</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
<script>

var isMarked = false;
var gmarkers = [];
var gcircles = [];

function initMap() {
	var mapDiv = document.getElementById('map');
	var map = new google.maps.Map(mapDiv, {
	center: {lat: 13.733969, lng: 100.565957},
	zoom: 8
	});
	map.addListener('click', function(e) {
    placeMarker(e.latLng, map);
  	});
}

function placeMarker(location, map) {
	if (!isMarked ){
		var marker = new google.maps.Marker({
        position: location, 
        map: map
    	});	
    	gmarkers.push(marker);
		var circle = new google.maps.Circle({
		  map: map,
		  radius: parseInt(document.getElementById("radius").value),    // 10 miles in metres
		  fillColor: '#AA0000'
		});
		circle.bindTo('center', marker, 'position');
		gcircles.push(circle);
		isMarked = true; 
		document.getElementById("latitude").value = location.lat();
		document.getElementById("longitude").value = location.lng();
	}else{
		isMarked = false;
		document.getElementById("latitude").value = "";
		document.getElementById("longitude").value = "";
		for(i=0; i<gmarkers.length; i++){
        	gmarkers[i].setMap(null);
    	}
    	for(i=0; i<gcircles.length; i++){
        	gcircles[i].setMap(null);
    	}
	}
}
</script>
</head>
<body>
<?php $this->load->view('header', array('title' => 'Add Places'));?>
<div class="container-fluid">
	<div class ="r1-add-place">
		<h1 class ="text-white"style="margin-top:50px !important">Add Place ของคุณ</h1>
	</div>
	<h2 style='color:red'><?=$message?></h2>
	<?= form_open('addplace/addplacecheck')?>
	<div style ="margin-top:35px">
	<input type="text" 
			class ="register-margin register-box" 
			name="placename" 
			id="placename" 
			size ="100" 
			placeholder ="&nbsp Place Name*: Must be less than 50 characters"><br>
	<input type="text" 
			class ="register-margin register-box" 
			name="placefullname" 
			id="placefullname" 
			size ="100" 
			placeholder ="&nbsp Place Full Name*: Must be less than 255 characters"><br>
	<input type="text" 
			class ="register-margin register-box" 
			name="latitude" 
			id="latitude" 
			size ="48" 
			placeholder ="&nbsp Latitude*:">				
	<input type="text" 
			class ="register-margin register-box" 
			name="longitude" 
			id="longitude" 
			size ="48" 
			placeholder ="&nbsp Longitude*:"><br>			
	<input type="number" 
			class ="register-margin register-box" 
			name="radius" 
			id="radius" 
			size ="20" 
			placeholder ="&nbsp Radius*:*:">&nbsp Metres &nbsp
			QR Code:	
	<input type="text" 
			class ="register-margin register-box" 
			name="qrcode" 
			id="qrcode"
			value="<?=$qrcode?>" 
			readonly
			size ="20" 
			placeholder ="&nbsp QR Code:">
			&nbsp Sensor ID: &nbsp
	<input type="text" 
			class ="register-margin register-box" 
			name="sensorid" 
			id="sensorid"
			value="<?=$sensorid?>" 
			readonly
			size ="20" 
			placeholder ="&nbsp Sensor ID:"><br>	
	<input type="text" 
			class ="register-margin register-box" 
			name="placetype" 
			id="placetype"
			size ="100" 
			placeholder ="&nbsp Place Type*: Must be less than 30 characters"><br>	

		Enter Rewards:
		<?= form_dropdown('enter_rewardid',$enterrewarddata); ?>
		Rewards:
		<?= form_dropdown('rewardid',$rewarddata); ?><br><br>
		<input type="submit" value="Submit">
	<?=form_close()?>
	<br>
	<a href="<?=base_url('mainpage')?>">Go Back</a>
</div>
<br>
</div>
<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
</body>
</html>
