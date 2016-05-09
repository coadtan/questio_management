<?=link_tag('assets/questio/questio.css')?>
<script type="text/javascript">
    $(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });
    // $("#addnews").submit(function(e) {
    $('#submit-add-news').click(function(){
        event.preventDefault();
            
        var formElement = document.querySelector("#form-add-news");
        var formData = new FormData(formElement);


        var url = "<?=base_url('addnews/addnewscheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: formData,
               processData: false,
               contentType: false,                
               success: function(data){
                   if(data == 'add_news_success'){
                        $('#mainarea').load(
                            "<?=base_url('newsoverview')?>"
                        );

                        $('html,body').animate({
                            scrollTop: $("#mainarea").offset().top},
                            'slow'
                        );
                   }else if(data == 'add_news_failed'){
                        alert('Add news failed');
                   }else if(data == 'add_news_error'){
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
<form method="POST" id="form-add-news">
    <div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">เพิ่มข้อมูลข่าวของคุณ</h1>
  </div><br><br>
    <label>Place Name*:</label>
    <?= form_dropdown('placeid',$placedata,'','id="placeid"'); ?><br>
    <label>News Header*:</label>
    <input type="text" 
      id="newsheader" 
      class ="register-margin register-box"
      name="newsheader" 
      size="100" 
      required maxlength="100"
      placeholder ="&nbsp Must not longer than 100 characters"><br>
    <label>News Details*:</label>
    <input type="text" 
      class ="register-margin register-box"
      id="newsdetails" 
      name="newsdetails" 
      size="100" 
      required><br>
    <label>Date Started*:</label><br>
    <input class ="register-margin register-box"type="datetime-local" id="datestarted" name="datestarted" required><br>
    <label>Date Ended*:</label><br>
    <input class ="register-margin register-box"type="datetime-local" id="dateended" name="dateended" required><br>
    <br><br>
    <input type="submit" value="Submit" id="submit-add-news">
    <input type="button"href="#" class="goback"style ="color:black" value="Back"></input>
</form>
