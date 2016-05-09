<?=link_tag('assets/questio/questio.css')?>
<?=link_tag('assets/sweetalert/sweetalert.css')?>
<?=script_tag('assets/sweetalert/sweetalert-dev.js')?>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({ 
            cache: false 
        });        
        $('.keeperplace').click(function(){
            var placeid = this.getAttribute("placeid");
            $('#buildinglist').load(
                "<?=base_url('mainpage/getbuilding')?>"+ "/"+ placeid
            );
            $('html,body').animate({
                scrollTop: $("#buildinglist").offset().top},
            'slow');
            $('.keeperplace').removeClass('element_item');
            $('.keeperplace').addClass('item_default');
            $(this).removeClass('item_default');
            $(this).addClass('element_item');
        });
        $('#addplace').click(function(){
            $('#mainarea').load(
                "<?=base_url('addplace')?>"
            );
            $('html,body').animate({
                scrollTop: $("#mainarea").offset().top},
            'slow');
            $(this).addClass('element_item');
            $(this).removeClass('item_default');

        });
        $('.editplace').click(function(){
            var placeid = this.getAttribute("placeid");
            $('#mainarea').load(
                "<?=base_url('editplace/edit')?>"+ "/"+ placeid
            );
            $('html,body').animate({
                scrollTop: $("#mainarea").offset().top},
                'slow'
            );
        });
        $('.deleteplace').click(function(){
            var placeid = this.getAttribute("placeid");
            sweetAlert({
              title: "Delete place?",
              text: "Typing 'yes' to continue",
              type: 'input',
              showCancelButton: true,
              closeOnConfirm: true,
              animation: "slide-from-top"
              }, function(inputValue){
                if(inputValue=="yes"){
                    $('#mainarea').load(
                        "<?=base_url('mainpage/deleteplace')?>"+ "/"+ placeid
                    );
                    $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                    'slow');
                }
            });
        });
        $('.manageplacedetail').click(function(){
            var placeid = this.getAttribute("placeid");
            $('#mainarea').load(
                "<?=base_url('addplace/addEditPlaceDetail')?>"+ "/"+ placeid
            );
            $('html,body').animate({
                scrollTop: $("#mainarea").offset().top},
            'slow');
        });
    });
</script>
<!--Place management start here :D-->
<div class ="r1-add-place">
        <h1 class ="text-white"style="margin-top:50px !important">Place Managemet </h1>
</div>
<div class = "default-item-management">
<br>
<h1>Places</h1>
<div class="row">
    <?php if(!empty($keeperplace)):?>
        <?php foreach($keeperplace as $place):?>
            <div class="col-xs-6 col-md-3">
                <a
                    href="#"
                    class="thumbnail keeperplace item_default"
                    id="place_<?=$place['placeid']?>"
                    placeid="<?=$place['placeid']?>"
                >
                <?php if(!empty($place['imageurl'])):?>
                    <img
                        src="<?=base_url($place['imageurl'])?>"
                        alt="<?=$place['placename']?>"
                        style="width: 200px; height: 200px">
                <?php else:?>
                    <h3 style="color:black"><b><?=$place['placename']?></b></h3>
                <?php endif;?>
                </a>
                <span style="font-size: 20px; font-weight: bold;"><?=$place['placename']?></span>
                <a href="#" style ="color:black" data-toggle="modal" data-target="#qrCode-<?=$place['qrcode']?>">
                    <span class="glyphicon glyphicon-qrcode"/>
                </a>
                <a href="#" class="editplace" placeid="<?=$place['placeid']?>" style ="color:black">
                    <span class="glyphicon glyphicon-cog"/>
                </a>
                <a href="#" class="deleteplace" placeid="<?=$place['placeid']?>"style ="color:black">
                <span class="glyphicon glyphicon-trash" style="color:red"/>
                </a>
                <a href="#" class="manageplacedetail" placeid="<?=$place['placeid']?>"style ="color:black">
                    <span class="glyphicon glyphicon-edit"/>
                </a>
            </div>
<!-- QR Modal -->
<div class="modal fade" id="qrCode-<?=$place['qrcode']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">QR Code <?=$place['qrcode']?></h4>
      </div>
      <div class="modal-body">
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=questio:place:<?=$place['qrcode']?>:questio&choe=UTF-8" title="Link to Google.com" />
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
            id="addplace"
            style="color:black; width: 200px; height: 200px;"
        >
            <span class="glyphicon glyphicon-plus" style="font-size:100px; " />
        </a>
    </div>
</div>
<div id="buildinglist">
</div>
</div>

<!--Place management end here :D-->