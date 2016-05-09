<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });    
    $('#addquiz').click(function(){
        var questid = this.getAttribute("questid");
        $('#mainarea').load(
            "<?=base_url('addquest/addquiz')?>"+'/'+questid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('.editquiz').click(function(){
        var quizid = this.getAttribute("quizid");
        $('#mainarea').load(
            "<?=base_url('editquest/editquiz')?>"+'/'+quizid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
    $('#editquest').click(function(){
        var questid = this.getAttribute("questid");
        $('#mainarea').load(
            "<?=base_url('editquest/edit')?>"+'/'+questid
        );
        $('html,body').animate({
        scrollTop: $("#mainarea").offset().top},
        'slow');
    });
});
</script>
<div class ="r1-add-place">
    <h1 class ="text-white"style="margin-top:50px !important">Quiz list</h1>
  </div>
  <br><br>
<a href = "#" style="color:black" id="addquiz" questid="<?=$questid?>">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
<a href = "#" style="color:black" id="editquest" questid="<?=$questid?>">
        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
    </a>
    <table class="table">
    <thead>
        <tr class ="table-tropic">
            <th>#</th>
            <th>Question</th>
            <th>Choice 1</th>
            <th>Choice 2</th>
            <th>Choice 3</th>
            <th>Choice 4</th>
            <th>Answer</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($quizdata)) :?>
        <?php foreach($quizdata as $quiz):?>
        <tr>
            <td><?= $quiz['seqid']?></td>
            <td><?= $quiz['question']?></td>
            <td><?= $quiz['choicea']?></td>
            <td><?= $quiz['choiceb']?></td>
            <td><?= $quiz['choicec']?></td>
            <td><?= $quiz['choiced']?></td>
            <td><?= $quiz['answerid']?></td>
            <td>
                <a href="#" quizid="<?=$quiz['quizid']?>" class="editquiz">
                    <span
                        class="glyphicon glyphicon-asterisk"
                        style="cursor: pointer">
                    </span>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Quiz not found</h2>
    <?php endif;?>
    </tbody>
</table>
<div id="quizmanage"></div>
