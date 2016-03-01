<script type="text/javascript">
$(document).ready(function(){
	$('.keeperfloor').click(function(){
        var floorid = this.getAttribute( "floorid");
        $('#zonelist').load(
        	"<?=base_url('mainpage/getzone')?>"+ "/"+ floorid
        );
        $('html,body').animate({
        scrollTop: $("#zonelist").offset().top},
        'slow');
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
        $('#mainarea').load(
            "<?=base_url('mainpage/deletefloor')?>"+ "/"+ floorid
        );
        $('html,body').animate({
            scrollTop: $("#mainarea").offset().top},
        'slow');
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
            	class="thumbnail keeperfloor"
            	id="floor_<?=$floor['floorid']?>"
            	floorid="<?=$floor['floorid']?>"
            >
		      <img
		      	src="http://52.74.64.61/questio_management<?=$floor['imageurl']?>"
		      	alt="<?=$floor['floorname']?>">
		    </a>
		    <?=$floor['floorname']?>
		    <a href="#" class="editfloor" floorid="<?=$floor['floorid']?>">Edit</a>
		    <a href="#" class="deletefloor" floorid="<?=$floor['floorid']?>">Delete</a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="#"
		    class="thumbnail"
		    id="addfloor"
            style="color:black"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="zonelist">
</div>
<div id="floormanage">
</div>

