<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('.keeperzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
        	"<?=base_url('questoverview/getquest')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
        $('.keeperzone').removeClass('element_item');
        $(this).removeClass('item_default');
        $(this).addClass('element_item');
    });
    $('#addzone').click(function(){
        $('#mainarea').load(
            "<?=base_url('addzone')?>"
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editzone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        $('#mainarea').load(
            "<?=base_url('editzone/edit/')?>"+ "/"+ zoneid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.deletezone').click(function(){
        var zoneid = this.getAttribute("zoneid");
        sweetAlert({
              title: "Delete zone?",
              text: "Typing 'yes' to continue",
              type: 'input',
              showCancelButton: true,
              closeOnConfirm: true,
              animation: "slide-from-top"
              }, function(inputValue){
                if(inputValue=="yes"){
                    $('#mainarea').load(
                        "<?=base_url('mainpage/deletezone')?>"+ "/"+ zoneid
                    );
                    $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                    'slow');
                }
        });

    });
});
</script>
<h1>Zones</h1>
<div class="row">
<?php if(!empty($data)):?>
	<?php foreach($data as $zone):?>
        <div class="col-xs-6 col-md-3">
            <a
            	href="#"
            	class="thumbnail keeperzone item_default"
            	id="zone_<?=$zone['zoneid']?>"
            	zoneid="<?=$zone['zoneid']?>"
            >
            <?php if(!empty($zone['imageurl'])):?>
		      <img
		      	src="<?=base_url($zone['imageurl'])?>"
		      	alt="<?=$zone['zonename']?>"
                style="width: 200px; height: 200px">
            <?php else:?>
                <h3 style="color:black"><b><?=$zone['zonename']?></b></h3>
            <?php endif;?>
		    </a>
            <span style="font-size: 20px; font-weight: bold;"><?=$zone['zonename']?></span>
            <a href="#" style ="color:black" data-toggle="modal" data-target="#qrCodeZone-<?=$zone['qrcode']?>">
                <span class="glyphicon glyphicon-qrcode"/>
            </a>
		    <a href="#" class="editzone" zoneid="<?=$zone["zoneid"]?>"style ="color:black">
                <span class="glyphicon glyphicon-cog"/>
            </a>
		    <a href="#" class="deletezone" zoneid="<?=$zone["zoneid"]?>"style ="color:black">
                <span class="glyphicon glyphicon-trash" style="color:red"/>
            </a>
	  	</div>
<!-- QR Modal -->
<div class="modal fade" id="qrCodeZone-<?=$zone['qrcode']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">QR Code <?=$zone['qrcode']?></h4>
      </div>
      <div class="modal-body">
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=questio:zone:<?=$zone['qrcode']?>:questio&choe=UTF-8" title="Link to Google.com" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of QR Modal -->
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="#"
		    class="thumbnail item_default"
		    id="addzone"
            style="color:black; width: 200px; height: 200px;"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="questlist">
</div>
