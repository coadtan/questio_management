<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#puzzlemanage').empty();
    });
    $(document).on("submit", "form", function(event){
        event.preventDefault();
            
        var puzzleid = $("#puzzleid").val();
        var puzzlepic = $("#puzzlepic").val();
        var helperanswer = $("#helperanswer").val();
        var correctanswer = $("#correctanswer").val();


        var url = "<?=base_url('addquest/addpuzzlecheck')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: {
                puzzleid: puzzleid,
                puzzlepic: puzzlepic,
                helperanswer: helperanswer,
                correctanswer: correctanswer
               }
               , 
               success: function(data){
                   if(data == 'add_puzzle_success'){
                        $('#puzzlemanage').empty();
                   }else if(data == 'add_puzzle_failed'){
                        alert('Add puzzle failed');
                   }else if(data == 'add_puzzle_error'){
                        alert('Error: Some field is not valid');
                   }
               }
        });
        return false;
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<form enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <input type="hidden" name="puzzleid" id="puzzleid" value="<?=$puzzleid?>">
    Puzzle Picture: <input type="file"
        class ="register-margin register-box"
        name="puzzlepic"
        id="puzzlepic"
        size ="999">
        <br>
    Helper Answer:<i>Must not longer than 100 characters</i>
    <input type="text" name="helperanswer" id="helperanswer" size="100" maxlength="100"><br>
    Correct Answer*:<i>Must not longer than 100 characters</i>
    <input type="text" name="correctanswer" id="correctanswer" size="100" required maxlength="100"><br>
    <input type="submit" value="Submit">
</form>
<a href="#" class="goback">Go Back</a>

