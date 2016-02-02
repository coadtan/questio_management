<div class="row">
    <div id="myDiv">
    </div>
    <script>
        <?php if(!empty($x) && !empty($y)):?>
        var questname_arr = [];
        <?php foreach($x as $questname):?>
            questname_arr.push('<?=$questname?>');
        <?php endforeach;?>
        var score_arr = [];
        <?php foreach($y as $score):?>
            score_arr.push(<?=$score?>);
        <?php endforeach;?>
        var data = [
          {
            x : questname_arr,
            y : score_arr,
            type: 'bar'
          }
        ];

        Plotly.newPlot('myDiv', data);
        <?php endif;?>

    </script>
</div>
