<a href = "<?=base_url('addquest/addquiz/'.$questid)?>" style="color:black">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table">
    <thead>
        <tr>
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
    <?php if(isset($quizdata)) :?>
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
                <span
                    data="<?=$quiz['quizid']?>"
                    class="glyphicon glyphicon-asterisk"
                    style="cursor: pointer">
                </span>
            </td>
        </tr>
        <?php endforeach;?>
    <?php else: ?>
        <h2 style='color:red'>Quiz not found</h2>
    <?php endif;?>
    </tbody>
</table>
