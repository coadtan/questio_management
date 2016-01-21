<?php $this->load->view('head', array('title' => 'Statistics'));?>
<body>
    <div class="container-fluid">
    <?php $this->load->view('header', array('title' => 'Welcome'));?>

    <?php if(!empty($keeperplace)):?>
    <select
        data-toggle="select"
        class="form-control select select-default mrs mbm">

        <optgroup label="Choose your place...">
        <?php foreach($keeperplace as $place):?>
        <option value="<?=$place['placeid']?>">
                <?=$place['placename']?>
        </option>
        <?php endforeach;?>
        </optgroup>
      </select>
    <?php endif;?>


    </div>
</body>
</html>
