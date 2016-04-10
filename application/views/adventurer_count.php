<div class="row">
    <div id="myDiv">
    </div>
    <script>
        <?php if(!empty($x) && !empty($y)):?>
        var date_arr = [];
        <?php foreach($x as $date):?>
            date_arr.push('<?=$date?>');
        <?php endforeach;?>
        var number_arr = [];
        <?php foreach($y as $number):?>
            number_arr.push(<?=$number?>);
        <?php endforeach;?>
        var data = [
          {
            x : date_arr,
            y : number_arr,
            type: 'scatter'
          }
        ];

        Plotly.newPlot('myDiv', data);
        <?php endif;?>

    </script>
</div>
