<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
      var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var formElement = document.querySelector("form");
        var formData = new FormData(formElement);


        var url = "<?=base_url('addquest/addriddlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
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
<h2 style='color:red'><?=$message?></h2>
<form method="POST">
    <input type="hidden" name="ridid" id="ridid" value="<?=$ridid?>">
    <input type="hidden" name="qrcode" id="qrcode" value="<?=$qrcode?>">
    <input type="hidden" name="sensorid" id="sensorid" value="<?=$sensorid?>">
    Riddle Details*:
    <input type="text" name="riddetails" id="riddetails" size="100" required><br>
    Scan Limit*:
    <input type="number" name="scanlimit" id="scanlimit" value="4" required pattern="[0-9]"><br>
    Hint 1:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint1" id="hint1" size="100" required maxlength="100"><br>
    Hint 2:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint2" id="hint2" size="100" required maxlength="100"><br>
    Hint 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint3" id="hint3" size="100" required maxlength="100"><br>
    <input type="submit" value="Submit">
</form>
<a href="#" class="goback" zoneid="<?=$zoneid?>"style ="color:black">Go Back</a>
