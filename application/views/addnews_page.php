<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#newsmanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('addnews/addnewscheck')?>
    Place Name*:
    <?= form_dropdown('placeid',$placedata); ?>
     <br>
    News Header*:<i>Must not longer than 100 characters</i>
    <input type="text" name="newsheader" size="100"><br>
    News Details*:
    <input type="text" name="newsdetails" size="100"><br>
    Date Started*:
    <input type="datetime" name="datestarted"><br>
    Date Ended*:
    <input type="datetime" name="dateended"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
