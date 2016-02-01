<div class="row">
    <div id="myDiv">
    </div>
    <script>
        <?php if(!empty($x) && !empty($y)):?>
        var zonename_arr = [];
        <?php foreach($x as $zonename):?>
            zonename_arr.push('<?=$zonename?>');
        <?php endforeach;?>
        var number_arr = [];
        <?php foreach($y as $number):?>
            number_arr.push(<?=$number?>);
        <?php endforeach;?>
        var data = [
          {
            x : zonename_arr,
            y : number_arr,
            type: 'bar'
          }
        ];

        Plotly.newPlot('myDiv', data);
        <?php endif;?>

    </script>
</div>
