<div class="row">
    <div id="myDiv">
    </div>
    <script>
    $(document).ready(function(){
    $.ajaxSetup({ 
        cache: false 
    });        
        <?php if(!empty($x) && !empty($y)):?>
        $('#error').text("");
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
            x : number_arr,
            y : zonename_arr,
            type: 'bar',
            orientation: 'h'
          }
        ];

        Plotly.newPlot('myDiv', data);
        <?php else:?>
            $('#error').text("No data available.");
        <?php endif;?>
    });
    </script>
</div>
