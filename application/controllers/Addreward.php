<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addreward extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rewards_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function index(){
		$rewardtypedata = $this->Rewards_model->getrewardtype();
		$this->load->view(
			'addreward_page',array(
				'message' => "",
				'rewardtypedata' => $rewardtypedata
			)
		);
	}

	public function addrewardcheck(){
		$reward = $this->Rewards_model;
		$rewardtypedata = $reward->getrewardtype();
		$rewardname = $this->input->post('rewardname');
		$description = $this->input->post('description');
		$rewardtype = $this->input->post('rewardtype');
		$rewardpic = null;
		if(!empty($_FILES)){
			$config['upload_path'] = './pictures/reward/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';

			$this->upload->initialize($config);

			if ($this->upload->do_upload('rewardpic')){
				$uploaddata = $this->upload->data();
				$rewardpic = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}else{
				echo $this->upload->display_error();

			}
		}
		$this->form_validation->set_rules('rewardname', 'rewardname', 'required|max_length[50]');
		$this->form_validation->set_rules('description', 'description', 'required|max_length[200]');

		if ($this->form_validation->run()==TRUE){
			if($reward->addreward($rewardname, $description, $rewardtype, $rewardpic)==TRUE){
				echo "add_reward_success";
			//	$this->load->view(
			//		'addreward_page',array(
			//		'message' => 'Add reward successful.',
			//		'rewardtypedata' => $rewardtypedata
			//		)
			//	);
			}else{
				echo "add_reward_failed";
			//	$this->load->view(
			//		'addreward_page',array(
			//		'message' => 'Add reward failed.',
			//		'rewardtypedata' => $rewardtypedata
			//		)
			//	);
			}

		}else{
			echo "add_reward_error";
			//$this->load->view(
			//'addreward_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'rewardtypedata' => $rewardtypedata
			//	)
			//);
		}
	}


}
