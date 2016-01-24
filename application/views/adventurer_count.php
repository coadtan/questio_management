<div class="row">
    <div id="myDiv">
    </div>
    <script>
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

    </script>
</div>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-2">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Day</a>
    </div>
    <div class="col-md-2">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Week</a>
    </div>
    <div class="col-md-2">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Month</a>
    </div>
    <div class="col-md-2">
        <a href="#fakelink" class="btn btn-block btn-lg btn-primary">Year</a>
    </div>
    <div class="col-md-2">
    </div>
</div>