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
            
        var puzzleid = $("#puzzleid").val();
        var zoneid = $("#zoneid").val();
        var imageurl = $("#imageurl").val();
        var puzzlepic = $("#puzzlepic").val();
        var helperanswer = $("#helperanswer").val();
        var correctanswer = $("#correctanswer").val();
        var questname = $("#questname").val();
        var questdetails = $("#questdetails").val();
        var questtypeid = $("#questtypeid").val();
        var diffid = $("#diffid").val();
        var rewardid = $("#rewardid").val();


        var url = "<?=base_url('editquest/editpuzzlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                puzzleid: puzzleid,
                imageurl: imageurl,
                puzzlepic: puzzlepic,
                helperanswer: helperanswer,
                correctanswer: correctanswer,
                questname: questname,
                questdetails: questdetails,
                questtypeid: questtypeid,
                diffid: diffid,
                rewardid: rewardid
               }
               , 
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
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <input type="hidden" name="puzzleid" id="puzzleid" value="<?=$puzzledata['puzzleid']?>">
    <input type="hidden" name="zoneid" id="zoneid" value="<?=$zoneid?>">
    Quest Name*:
    <i>Must be less than 100 characters</i>
     <input type="text" name="questname" id="questname" size="100" value="<?=$questdata['questname']?>" required maxlength="100"><br>
    Quest Details*:
    <textarea name="questdetails" id="questdetails" rows="5" cols="50" required>
    <?=$questdata['questdetails']?>
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
        size ="999">
        <img
            src="http://52.74.64.61/questio_management<?=$puzzledata['imageurl']?>"
            alt="<?= $puzzledata['imageurl']?>"
            style="width:100px;
                    height:100px;">
        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" id="helperanswer" size="100" value="<?=$puzzledata['helperanswer']?>"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" id="correctanswer" size="100" value="<?=$puzzledata['correctanswer']?>"><br>
    <input type="submit" value="Submit">
</form>
<a href="#" class="goback" zoneid="<?=$zoneid?>"style ="color:black">Go Back</a>
