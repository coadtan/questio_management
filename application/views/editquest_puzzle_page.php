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
    $('#submit-edit-puzzle').click(function(){
        event.preventDefault();
            
        var inputFile = $('input[name=puzzlepic]');
        var puzzlepic = inputFile[0].files[0];

        var formElement = document.querySelector("#form-edit-puzzle");
        var formData = new FormData(formElement);
        

        if (puzzlepic != 'undefined') {
            formData.append("puzzlepic", puzzlepic);
        }

        var url = "<?=base_url('editquest/editpuzzlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false, 
               success: function(data){
                   if(data == 'edit_puzzle_success'){
                        $('#mainarea').load(
                          "<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
                        );
                        $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                        'slow');
                   }else if(data == 'edit_puzzle_failed'){
                        alert('Edit puzzle failed');
                   }else if(data == 'edit_puzzle_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-edit-puzzle">
  <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไข Puzzle</h1>
  </div>
    <input type="hidden" name="puzzleid" id="puzzleid" value="<?=$puzzledata['puzzleid']?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>" required maxlength="100"><br>
    Quest Details*:
    <textarea name="questdetails" id="questdetails" rows="5" cols="50" required><?=$questdata['questdetails']?>
    </textarea><br>
     <br>
    Difficulty*:
    <?= form_dropdown('diffid',$difficulty,$questdata['diffid'],'id="diffid"'); ?>
     <br>
    Rewards:
    <?= form_dropdown('rewardid',$reward,$questdata['rewardid'],'id="rewardid"'); ?>
     <br>
    <input type="hidden" name="imageurl" id="imageurl" value="<?=$puzzledata['imageurl']?>">
    Puzzle Picture: <input type="file"
        class ="register-margin register-box"
        name="puzzlepic"
        id="puzzlepic"
        size ="999"
        accept="image/*">
        <img
            src="<?=base_url($puzzledata['imageurl'])?>"
            alt="<?= $puzzledata['imageurl']?>"
            style="width:100px;
                    height:100px;">
        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" id="helperanswer" size="100" value="<?=$puzzledata['helperanswer']?>"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" id="correctanswer" size="100" value="<?=$puzzledata['correctanswer']?>"><br>
    <input type="submit" value="Submit" id="submit-edit-puzzle">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
