<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#mainarea').load(
            "<?=base_url('newsoverview')?>"
        );

        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
            'slow'
        );
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
        
        var newsid = $("#newsid").val();
        var placeid = $("#placeid").val();
        var newsheader = $("#newsheader").val();
        var newsdetails = $("#newsdetails").val();
        var datestarted = $("#datestarted").val();
        var dateended = $("#dateended").val();


        var url = "<?=base_url('editnews/editnewscheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                newsid: newsid,
                placeid: placeid,
                newsheader: newsheader,
                newsdetails: newsdetails,
                datestarted: datestarted,
                dateended: dateended
               }
               , 
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
                        alert('Error: Some field is empty');
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
<form method="POST">
    <input type="hidden" name="newsid" id="newsid" value="<?=$newsdata['newsid']?>">
    Place Name*:
    <?= form_dropdown('placeid',$placedata, $newsdata['placeid'],'id="placeid"'); ?>
     <br>
    News Header*:<i>Must not longer than 100 characters</i>
    <input type="text" name="newsheader" id="newsheader" size="100" value="<?=$newsdata['newsheader']?>" required maxlength="100"><br>
    News Details*:
    <input type="text" name="newsdetails" id="newsdetails" size="100" value="<?=$newsdata['newsdetails']?>" required><br>
    Date Started*:
    <input type="datetime-local" name="datestarted" id="datestarted" value="<?=$newsdata['datestarted']?>" required><br>
    Date Ended*:
    <input type="datetime-local" name="dateended" id="dateended" value="<?=$newsdata['dateended']?>" required><br>
    <input type="submit" value="Submit">
</form>
<a href="#" class="goback" style ="color:black">Go Back</a>
