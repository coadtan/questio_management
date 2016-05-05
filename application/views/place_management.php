<?=link_tag('assets/questio/questio.css')?>
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
            //addClass("fadeOutDown");
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
            'slow');
        });
        $('.deleteplace').click(function(){
            var placeid = this.getAttribute("placeid");
            $('#mainarea').load(
                "<?=base_url('mainpage/deleteplace')?>"+ "/"+ placeid
            );
            $('html,body').animate({
                scrollTop: $("#mainarea").offset().top},
            'slow');
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
                        alt="<?=$place['placename']?>">
                <?php else:?>
                    <h3 style="color:black"><b><?=$place['placename']?></b></h3>
                <?php endif;?>
                </a>
                <?=$place['placename']?>
                <a href="#" class="editplace" placeid="<?=$place['placeid']?>" style ="color:black">Edit</a>
                <a href="#" class="deleteplace" placeid="<?=$place['placeid']?>"style ="color:black">Delete</a>
                <a href="#" class="manageplacedetail" placeid="<?=$place['placeid']?>"style ="color:black">
                Add/Edit Placedetail
                </a>
              
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <div class="col-xs-6 col-md-3" style="text-align:center">
        <a
            href="#"
            class="thumbnail item_default"
            id="addplace"
            style="color:black"
        >
            <span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
        </a>
    </div>
</div>
<div id="buildinglist">
</div>
</div>

<!--Place management end here :D-->
