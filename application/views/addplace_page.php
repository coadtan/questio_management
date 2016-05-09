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
    $('#submit-add-place').click(function(){
    	
        event.preventDefault();
            
        var inputFile = $('input[name=placepic]');
        var placepic = inputFile[0].files[0];

        var formElement = document.querySelector("#form-add-place");
        var formData = new FormData(formElement);

        if (placepic != 'undefined') {
          formData.append("placepic", placepic);
        }


        var url = "<?=base_url('addplace/addplacecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,  
               success: function(data){
                   if(data == 'add_place_success'){
                   	
                        $('#mainarea').load(
                            "<?=base_url('mainpage/getplace')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_place_failed'){
                        alert('Add place failed');
                   }else if(data == 'add_place_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        console.log("end");
        return false;
    });
});


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
<div class="container-fluid">
	<div class ="r1-add-place">
		<h1 class ="text-white"style="margin-top:50px !important">Add Place ของคุณ</h1>
	</div><br><br>
	<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-place">
	<div style ="margin-top:35px">
	<input type="text"
			class ="register-margin register-box"
			name="placename"
			id="placename"
			size ="100"
			placeholder ="&nbsp Place Name*: Must be less than 50 characters"
			required
			maxlength="50"><br>
	<input type="text"
			class ="register-margin register-box"
			name="placefullname"
			id="placefullname"
			size ="100"
			placeholder ="&nbsp Place Full Name*: Must be less than 255 characters"
			required
			maxlength="255"><br>
	<input type="text"
			class ="register-margin register-box"
			name="latitude"
			id="latitude"
			size ="48"
			placeholder ="&nbsp Latitude*:"
			required
			pattern="\d+(\.\d{1,15})?">
	<input type="text"
			class ="register-margin register-box"
			name="longitude"
			id="longitude"
			size ="48"
			placeholder ="&nbsp Longitude*:"
			required
			pattern="\d+(\.\d{1,15})?"><br>
	<input type="text"
			class ="register-margin register-box"
			name="radius"
			id="radius"
			size ="16"
			placeholder ="&nbsp Radius*"
			required
			pattern="\d+(\.\d{1,4})?"
			>&nbsp Metres
	<input type="hidden"
			class ="register-margin register-box"
			name="qrcode"
			id="qrcode"
			value="<?=$qrcode?>">
	<input type="hidden"
			class ="register-margin register-box"
			name="sensorid"
			id="sensorid"
			value="<?=$sensorid?>">&nbsp&nbsp
	<select name="placetype" id="placetype">
		<option value="University">University</option>
		<option value="Museum">Museum</option>
		<option value="Temple">Temple</option>
	</select>
	Place Image: <input type="file"
			style ="margin:auto;margin-top:5px!important"
			class ="register-margin register-box"
			name="placepic"
			id="placepic"
			size ="999"
			accept="image/*">
			<br>
		Enter Rewards:
		<?= form_dropdown('enter_rewardid',$enterrewarddata,'','id="enter_rewardid"'); ?>
		Rewards:
		<?= form_dropdown('rewardid',$rewarddata,'','id="rewardid"'); ?><br><br>

		<input type="submit" value="Submit" id="submit-add-place">
		<input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
	</div>
</div>
<br>
</div>
<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
</body>
</html>
