<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('.goback').click(function(){
        $('#mainarea').load(
            "<?=base_url('newsoverview')?>"
        );

        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
            'slow'
        );
    });
    $('#submit-edit-news').click(function(){
        event.preventDefault();
        
        var formElement = document.querySelector("#form-edit-news");
        var formData = new FormData(formElement);


        var url = "<?=base_url('editnews/editnewscheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,                
               success: function(data){
                   if(data == 'edit_news_success'){
                        $('#mainarea').load(
                            "<?=base_url('newsoverview')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'edit_news_failed'){
                        alert('Edit news failed');
                   }else if(data == 'edit_news_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
    $('.goback').click(function(){
        $('#mainarea').load(
        "<?=base_url('newsoverview')?>"
    );

        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });    
});
</script>
<form method="POST" id="form-edit-news">
    <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">แก้ไขข่าว</h1>
  </div><br><br>
    <input type="hidden" name="newsid" id="newsid" value="<?=$newsdata['newsid']?>">
    Place Name*:
    <?= form_dropdown('placeid',$placedata, $newsdata['placeid'],'id="placeid"'); ?>
     <br>
    <label>News Header*:</label>
    <input type="text" name="newsheader" class ="register-margin register-box"  id="newsheader" size="100" placeholder ="Must not longer than 100 characters"value="<?=$newsdata['newsheader']?>" required maxlength="100"><br>
    <label>News Details*:</label>
    <input type="text" name="newsdetails" class ="register-margin register-box"  id="newsdetails" size="100" value="<?=$newsdata['newsdetails']?>" required><br>
    <label>Date Started*:</label>
    <input type="datetime-local" name="datestarted" class ="register-margin register-box" id="datestarted" value="<?=date_format(date_create($newsdata['datestarted']),"Y-m-d")."T".date_format(date_create($newsdata['datestarted']),"H:i:s")?>" required><br>
    <label>Date Ended*:</label>
    <input type="datetime-local" name="dateended" class ="register-margin register-box" id="dateended" value="<?=date_format(date_create($newsdata['dateended']),"Y-m-d")."T".date_format(date_create($newsdata['dateended']),"H:i:s")?>" required><br>
    <br><br>
    <input type="submit" value="Submit" id="submit-edit-news">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
