<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quest Overview</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?=script_tag('assets/jquery/jquery-2.2.0.min.js')?>
<?=script_tag('assets/bootstrap/js/bootstrap.js')?>
<?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
<?=link_tag('assets/questio/questio.css')?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('header', array('title' => 'Quest List'));?>
	<a href = "<?=base_url('addquest/add/'.$zoneid)?>">Add Quest</a>
	<?php
		$this->table->set_heading('ID','Quest name','Type','Zone','Difficulty','Reward','');

		if(!empty($questdata)){
			foreach($questdata as $quest){
				$this->table->add_row($quest['questno'],$quest['questname'],$quest['typename'],$quest['zonename'],$quest['difftype'],$quest['rewardname'],"Edit");
			}
			echo $this->table->generate();
		}else{
			echo "<h2 style='color:red'>Quest not found</h2>";
		}
	?>
	<a href="<?=base_url('login')?>">Go back</a>
</div>
</body>
</html>
