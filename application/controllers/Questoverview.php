<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoverview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Quest_model');
		$this->load->helper('form');
	}

	public function getquest($zoneid){
		$questdata = $this->Quest_model->getQuestByZone($zoneid);
		$this->load->view(
			'questoverview_page',array(
				'questdata' => $questdata,
				'zoneid' => $zoneid
			)
		);
	}

}
