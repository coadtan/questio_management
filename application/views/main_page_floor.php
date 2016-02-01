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
		      	src="http://52.74.64.61/<?=$floor['imageurl']?>"
		      	alt="<?=$floor['floorname']?>">
		    </a>
		    <?=$floor['floorname']?>
		    <a href="<?=base_url('editfloor/edit/'.$floor["floorid"])?>">Edit</a>
		    <a href="<?=base_url('mainpage/deletefloor/'.$floor["floorid"])?>">Delete</a>
	  	</div>
    <?php endforeach;?>
<?php endif;?>
	<div class="col-xs-6 col-md-3" style="text-align:center">
		<a
		    href="<?=base_url('addfloor')?>"
		    class="thumbnail"
		>
			<span class="glyphicon glyphicon-plus" style="font-size:100px"></span>
		</a>
	</div>
</div>
<div id="zonelist">
</div>

