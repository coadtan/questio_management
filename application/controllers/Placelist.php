<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placelist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Place_model');
		$this->load->helper('form');
	}

	public function index(){
		$place = $this->Place_model;
		$placedata = $place->getallplace();
		$enter_rewarddata = $place->getenterreward();
		$reward = $place->getplacereward();
		$this->load->view(
			'placelist_page',array(
				'placedata' => $placedata,
				'enter_rewarddata' => $enter_rewarddata,
				'reward' => $reward
			)
		);
	}

	public function search(){
		$namepart = $_POST['namepart'];
		$place = $this->Place_model;
		$placedata = $place->searchplace($namepart);
		$enter_rewarddata = $place->searchenterreward($namepart);
		$reward = $place->searchplacereward($namepart);
		$this->load->view(
			'placelist_page',array(
				'placedata' => $placedata,
				'enter_rewarddata' => $enter_rewarddata,
				'reward' => $reward
			)
		);
	}

}