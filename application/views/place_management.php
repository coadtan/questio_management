<script type="text/javascript">
    $(document).ready(function(){
        $('.keeperplace').click(function(){
            var placeid = this.getAttribute("placeid");
            $('#buildinglist').load(
                "<?=base_url('mainpage/getbuilding')?>"+ "/"+ placeid
            );
            $('html,body').animate({
                scrollTop: $("#buildinglist").offset().top},
            'slow');
        });
        $('#addplace').click(function(){
            $('#mainarea').load(
                "<?=base_url('addplace')?>"
            );
            $('html,body').animate({
                scrollTop: $("#mainarea").offset().top},
            'slow');
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
<div class="row">
    <?php if(!empty($keeperplace)):?>
        <?php foreach($keeperplace as $place):?>
            <div class="col-xs-6 col-md-3">
                <a
                    href="#"
                    class="thumbnail keeperplace"
                    id="place_<?=$place['placeid']?>"
                    placeid="<?=$place['placeid']?>"
                >
                    <img
                        src="http://52.74.64.61/questio_management<?=$place['imageurl']?>"
                        alt="<?=$place['placename']?>">
                </a>
                <?=$place['placename']?>
                <a href="#" class="editplace" placeid="<?=$place['placeid']?>">Edit</a>
                <a href="#" class="deleteplace" placeid="<?=$place['placeid']?>">Delete</a>
                <a href="#" class="manageplacedetail" placeid="<?=$place['placeid']?>">
                Add/Edit Placedetail
                </a>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <div class="col-xs-6 col-md-3" style="text-align:center">
        <a
            href="#"
            class="thumbnail"
            id="addplace"
            style="color:black"
        >
            <span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
        </a>
    </div>
</div>
<div id="buildinglist">
</div>

<!--Place management end here :D-->
