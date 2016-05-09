<script type="text/javascript">
$(document).ready(function(){
  var zoneid = $('#zoneid').val();
    $.ajaxSetup({ 
        cache: false 
    });
    $('.goback').click(function(){
        $('#mainarea').load(
          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('#submit-add-riddle').click(function(){
        event.preventDefault();
            
        var formElement = document.querySelector("#form-add-riddle");
        var formData = new FormData(formElement);


        var url = "<?=base_url('addquest/addriddlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false, 
               success: function(data){
                   if(data == 'add_riddle_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'add_riddle_failed'){
                        alert('Add riddle failed');
                   }else if(data == 'add_riddle_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Add Riddle</h1>
  </div><br><br>
<h2 style='color:red'><?=$message?></h2>
<form method="POST" id="form-add-riddle">
    <input type="hidden" name="ridid" id="ridid" value="<?=$ridid?>">
    <input type="hidden" name="qrcode" id="qrcode" value="<?=$qrcode?>">
    <input type="hidden" name="sensorid" id="sensorid" value="<?=$sensorid?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Riddle Details*:
    <input type="text" name="riddetails" id="riddetails" size="100" required><br>
    Scan Limit*:
    <input type="number" name="scanlimit" id="scanlimit" value="4" required pattern="[0-9]"><br>
    Hint 1:
    <input type="text" name="hint1" id="hint1" size="100" placeholder="Must not longer than 100 characters" required maxlength="100"><br>
    Hint 2:
    <input type="text" name="hint2" id="hint2" size="100" placeholder="Must not longer than 100 characters" required maxlength="100"><br>
    Hint 3:
    <input type="text" name="hint3" id="hint3" size="100" placeholder="Must not longer than 100 characters" required maxlength="100"><br>
    <input type="submit" value="Submit" id="submit-add-riddle">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
