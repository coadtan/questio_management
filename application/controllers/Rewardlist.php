<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewardlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Rewards_model');
		$this->load->helper('form');
	}

	public function index(){
		$rewarddata = $this->Rewards_model->getallrewards();
		$this->load->view(
			'rewardlist_page',array(
				'rewarddata' => $rewarddata
			)
		);
	}

	public function search(){
		$namepart = $_POST['namepart'];
		$rewarddata = $this->Rewards_model->searchrewards($namepart);
		$this->load->view(
			'rewardlist_page',array(
				'rewarddata' => $rewarddata
			)
		);
	}

}