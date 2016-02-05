<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addreward extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rewards_model');
		$this->load->helper('form');
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
		$rewardname = $_POST['rewardname'];
		$description = $_POST['description'];
		$rewardtype = $_POST['rewardtype'];
		$imageurl = null;

		$config['upload_path'] = './pictures/floor';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';


		$this->load->library('upload', $config);
		$this->upload->initialize($config);


		if (!$this->upload->do_upload('rewardpic')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error) ;
		}else{
			$uploaddata = $this->upload->data();
			$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
		}

		$this->form_validation->set_rules('rewardname', 'rewardname', 'required|max_length[50]');
		$this->form_validation->set_rules('description', 'description', 'required|max_length[200]');

		if ($this->form_validation->run()==TRUE){
			if($reward->addreward($rewardname, $description, $rewardtype, $imageurl)==TRUE){
				$this->load->view(
					'addreward_page',array(
					'message' => 'Add reward successful.',
					'rewardtypedata' => $rewardtypedata
					)
				);
			}else{
				$this->load->view(
					'addreward_page',array(
					'message' => 'Add reward failed.',
					'rewardtypedata' => $rewardtypedata
					)
				);
			}

		}else{
			$this->load->view(
			'addreward_page',array(
				'message' => 'Form validation error. please check again.',
				'rewardtypedata' => $rewardtypedata
				)
			);
		}
	}


}
