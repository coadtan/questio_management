<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
	$('.keeperfloor').click(function(){
        var floorid = this.getAttribute( "floorid");
        $('#zonelist').load(
        	"<?=base_url('mainpage/getzone')?>"+ "/"+ floorid
        );
        $('html,body').animate({
        scrollTop: $("#zonelist").offset().top},
        'slow');
        $('.keeperfloor').removeClass('element_item');
        $('.keeperfloor').addClass('item_default');
        $(this).removeClass('item_default');
        $(this).addClass('element_item');
    });
    $('#addfloor').click(function(){
        $('#mainarea').load(
            "<?=base_url('addfloor')?>"
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editfloor').click(function(){
        var floorid = this.getAttribute("floorid");
        $('#mainarea').load(
            "<?=base_url('editfloor/edit/')?>"+ "/"+ floorid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.deletefloor').click(function(){
        var floorid = this.getAttribute("floorid");
        sweetAlert({
              title: "Delete floor?",
              text: "Typing 'yes' to continue",
              type: 'input',
              showCancelButton: true,
              closeOnConfirm: true,
              animation: "slide-from-top"
              }, function(inputValue){
                if(inputValue=="yes"){
                    $('#mainarea').load(
                        "<?=base_url('mainpage/deletefloor')?>"+ "/"+ floorid
                    );
                    $('html,body').animate({
                        scrollTop: $("#mainarea").offset().top},
                    'slow');
                }
        });
    });
});
</script>
<h1>Floors</h1>
<div class="row">
<?php if(!empty($data)):?>
	<?php foreach($data as $floor):?>
        <div class="col-xs-6 col-md-3">
            <a
            	href="#"
            	class="thumbnail keeperfloor item_default"
            	id="floor_<?=$floor['floorid']?>"
            	floorid="<?=$floor['floorid']?>"
            >
            <?php if(!empty($floor['imageurl'])):?>
		      <img
		      	src="<?=base_url($floor['imageurl'])?>"
		      	alt="<?=$floor['floorname']?>"
                style="width: 200px; height: 200px">
            <?php else:?>
                <h3 style="color:black"><b><?=$floor['floorname']?></b></h3>
            <?php endif;?>
		    </a>
            <span style="font-size: 20px; font-weight: bold;"><?=$floor['floorname']?></span>
		    <a href="#" class="editfloor" floorid="<?=$floor['floorid']?>"style ="color:black">
                <span class="glyphicon glyphicon-cog"/>
            </a>
		    <a href="#" class="deletefloor" floorid="<?=$floor['floorid']?>"style ="color:black">
                <span class="glyphicon glyphicon-trash" style="color:red"/>
            </a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="#"
		    class="thumbnail item_default"
		    id="addfloor"
            style="color:black; width: 200px; height: 200px;"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="zonelist">
</div>
<div id="floormanage">
</div>

