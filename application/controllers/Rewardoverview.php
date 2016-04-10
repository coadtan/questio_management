<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewardoverview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rewards_model');
	}

	public function index(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$rewarddata = $this->Rewards_model->getRewardFromKeeperId($keeperid);
		$this->load->view(
			'rewardoverview_page',array(
				'rewarddata' => $rewarddata
			)
		);
	}
}
