<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editreward extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rewards_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function edit($rewardid){
		$reward = $this->Rewards_model;
		$rewarddata = $reward->getRewardFromRewardId($rewardid);
		$rewardtypedata = $reward->getrewardtype();
		$this->load->view(
			'editreward_page',array(
				'message' => "",
				'rewarddata' => $rewarddata,
				'rewardtypedata' => $rewardtypedata
			)
		);
	}

	public function editrewardcheck(){
		$reward = $this->Rewards_model;
		$rewardtypedata = $reward->getrewardtype();
		$rewardid = $_POST['rewardid'];
		$rewardname = $_POST['rewardname'];
		$description = $_POST['description'];
		$rewardtype = $_POST['rewardtype'];
		$rewardpic = $_POST['rewardpic'];

		if(!empty($_FILES['rewardurl']['name'])){
			$config['upload_path'] = './pictures/reward';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';

			$this->upload->initialize($config);


			if ($this->upload->do_upload('rewardurl')){
				$uploaddata = $this->upload->data();
				$rewardpic = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('rewardname', 'rewardname', 'required|max_length[50]');
		$this->form_validation->set_rules('description', 'description', 'required|max_length[200]');

		if ($this->form_validation->run()==TRUE){
			if($reward->updateReward($rewardid, $rewardname, $description, $rewardtype, $rewardpic)==TRUE){
				echo "edit_reward_success";
				//$rewarddata = $reward->getRewardFromRewardId($rewardid);
				//$this->load->view(
				//	'editreward_page',array(
				//	'message' => 'Edit reward successful.',
				//	'rewarddata' => $rewarddata,
				//	'rewardtypedata' => $rewardtypedata
				//	)
				//);
			}else{
				echo "edit_reward_failed";
				//$rewarddata = $reward->getRewardFromRewardId($rewardid);
				//$this->load->view(
				//	'editreward_page',array(
				//	'message' => 'Edit reward failed.',
				//	'rewarddata' => $rewarddata,
				//	'rewardtypedata' => $rewardtypedata
				//	)
				//);
			}

		}else{
			echo "edit_reward_error";
			//$rewarddata = $reward->getRewardFromRewardId($rewardid);
			//$this->load->view(
			//'editreward_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'rewarddata' => $rewarddata,
			//	'rewardtypedata' => $rewardtypedata
			//	)
			//);
		}
	}


}
