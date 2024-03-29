<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Place List</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Place List'));?>
	<?=form_open('placelist/search')?>
	Search: <input type="text" name="namepart" id="namepart" size="50"><br>
		<input type="submit" value="Enter">
	<?=form_close()?>
	<?php
		$this->table->set_heading('#','Place name','Place Full Name','Latitude','Longitude','Radius','Place Type','Enter Reward Name','Reward Name');

		if(!empty($placedata)){
			for($i=0; $i<count($placedata);$i++){
				$this->table->add_row($placedata[$i]['placeno'],$placedata[$i]['placename'],$placedata[$i]['placefullname'],$placedata[$i]['latitude'],$placedata[$i]['longitude'],$placedata[$i]['radius'],$placedata[$i]['placetype'],$enter_rewarddata[$i],$reward[$i]);
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Place not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>"style ="color:black">Go back</a>
</div>
</body>
</html>
