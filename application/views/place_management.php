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
                <a href="<?=base_url('editplace/edit/'.$place["placeid"])?>">Edit</a>
                <a href="<?=base_url('mainpage/deleteplace/'.$place["placeid"])?>">Delete</a>
                <a href="<?=base_url('addplace/addEditPlaceDetail/'.$place["placeid"])?>">
                Add/Edit Placedetail
                </a>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <div class="col-xs-6 col-md-3" style="text-align:center">
        <a
            href="<?=base_url('addplace')?>"
            class="thumbnail"
        >
            <span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
        </a>
    </div>
</div>
<div id="buildinglist">
</div>

<!--Place management end here :D-->
