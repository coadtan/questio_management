<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemoverview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function index(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$itemdata = $this->Item_model->getItemFromKeeperId($keeperid);
		$this->load->view(
			'itemoverview_page',array(
				'itemdata' => $itemdata
			)
		);
	}
}
