<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('#addriddle').click(function(){
        var ridid = this.getAttribute("ridid");
        $('#mainarea').load(
            "<?=base_url('addquest/addriddle')?>"+'/'+ridid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editriddle').click(function(){
        var ridid = this.getAttribute("ridid");
        $('#mainarea').load(
            "<?=base_url('editquest/editriddle')?>"+'/'+ridid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Riddle List</h1>
  </div><br><br>
<?php if(empty($riddledata)) :?>
<a href = "#" style="color:black" id="addriddle" ridid="<?=$ridid?>">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <?php endif;?>
    <table class="table">
    <thead>
        <tr>
            <th>Riddle Details</th>
            <th>Scan Limit</th>
            <th>Hint 1</th>
            <th>Hint 2</th>
            <th>Hint 3</th>
            <th>QR Code</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($riddledata)) :?>
        <?php foreach($riddledata as $riddle):?>
        <tr>
            <td><?= $riddle['riddetails']?></td>
            <td><?= $riddle['scanlimit']?></td>
            <td><?= $riddle['hint1']?></td>
            <td><?= $riddle['hint2']?></td>
            <td><?= $riddle['hint3']?></td>
            <td>
                <a href="#" style ="color:black" data-toggle="modal" data-target="#qrCodeRiddle-<?=$riddle['qrcode']?>">
                    <span class="glyphicon glyphicon-qrcode"/>
                </a>
            </td>
            <td>
                <a href="#" class="editriddle" ridid="<?=$riddle['ridid']?>">
                    <span
                        class="glyphicon glyphicon-asterisk"
                        style="cursor: pointer">
                    </span>
                </a>
            </td>
        </tr>
<!-- QR Modal -->
<div class="modal fade" id="qrCodeRiddle-<?=$riddle['qrcode']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">QR Code <?=$riddle['qrcode']?></h4>
      </div>
      <div class="modal-body">
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=questio:riddleanswer:<?=$riddle['qrcode']?>:questio&choe=UTF-8" title="Link to Google.com" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of QR Modal -->
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Riddle not found</h2>"
    <?php endif;?>
    </tbody>
</table>
<div id="riddlemanage">
</div>

