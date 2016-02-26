<script type="text/javascript">
$(document).ready(function(){
    $('.goback').click(function(){
        $('#riddlemanage').empty();
    });
});
</script>
<h2 style='color:red'><?=$message?></h2>
<?= form_open('addquest/addriddlecheck')?>
    <input type="hidden" name="ridid" value="<?=$ridid?>">
    <input type="hidden" name="qrcode" value="<?=$qrcode?>">
    <input type="hidden" name="sensorid" value="<?=$sensorid?>">
    Riddle Details*:
    <input type="text" name="riddetails" size="100"><br>
    Scan Limit*:
    <input type="text" name="scanlimit" value="4"><br>
    Hint 1:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint1" size="100"><br>
    Hint 2:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint2" size="100"><br>
    Hint 3:<i>Must not longer than 100 characters</i>
    <input type="text" name="hint3" size="100"><br>
    <input type="submit" value="Submit">
<?=form_close()?>
<a href="#" class="goback">Go Back</a>
