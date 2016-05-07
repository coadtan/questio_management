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

    $('#submit-add-puzzle').click(function(){
      event.preventDefault();
        var inputFile = $('input[name=puzzlepic]');
        var puzzlepic = inputFile[0].files[0];
        

        if (puzzlepic != 'undefined') {

          var formElement = document.querySelector("#form-add-puzzle");
          var formData = new FormData(formElement);
          formData.append("puzzlepic", puzzlepic);


        var url = "<?=base_url('addquest/addpuzzlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false, 
                success: function(data){
                console.log("success: " + data);
                   if(data == 'add_puzzle_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'add_puzzle_failed'){
                        alert('Add puzzle failed');
                   }else if(data == 'add_puzzle_error'){
                        alert('Error: Some field is not valid');
                   }
               },
                error: function(data){
                  console.log("error: " + data);
                }
        });
      }
        return false;
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-add-puzzle">
    <input type="hidden" name="puzzleid" id="puzzleid" value="<?=$puzzleid?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Puzzle Picture: <input type="file"
        class ="register-margin register-box"
        name="puzzlepic"
        id="puzzlepic"
        accept="image/*"
        style="width:200px">

        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" id="helperanswer" size="100" maxlength="100"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" id="correctanswer" size="100" required maxlength="100"><br>
    <input type="submit" value="Submit" id="submit-add-puzzle">
</form>
<a href="#" class="goback" zoneid="<?=$zoneid?>"style ="color:black">Go Back</a>

