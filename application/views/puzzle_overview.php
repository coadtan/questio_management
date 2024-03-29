<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('#addpuzzle').click(function(){
        var puzzleid = this.getAttribute("puzzleid");
        $('#mainarea').load(
            "<?=base_url('addquest/addpuzzle')?>"+'/'+puzzleid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editpuzzle').click(function(){
        var puzzleid = this.getAttribute("puzzleid");
        $('#mainarea').load(
            "<?=base_url('editquest/editpuzzle')?>"+'/'+puzzleid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Puzzle List</h1>
  </div><br><br>
<?php if(empty($puzzledata)) :?>
<a href = "#" id="addpuzzle" style="color:black" puzzleid="<?=$puzzleid?>">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <?php endif;?>
    <table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Helper Answer</th>
            <th>Answer</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($puzzledata)) :?>
        <?php foreach($puzzledata as $puzzle):?>
        <tr>
            <td><img
                src="<?=base_url($puzzle['imageurl'])?>"
                alt="<?= $puzzle['imageurl']?>"
                style="width:100px;
                        height:100px;"></td>
            <td><?= $puzzle['helperanswer']?></td>
            <td><?= $puzzle['correctanswer']?></td>
            <td>
                <a href="#" class="editpuzzle" puzzleid="<?=$puzzle['puzzleid']?>">
                    <span
                        class="glyphicon glyphicon-asterisk"
                        style="cursor: pointer; color:black">
                    </span>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Puzzle not found</h2>"
    <?php endif;?>
    </tbody>
</table>

