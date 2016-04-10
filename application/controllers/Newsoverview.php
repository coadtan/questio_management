<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsoverview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$newsdata = $this->News_model->getNewsByKeeperId($keeperid);
		$this->load->view(
			'newsoverview_page',array(
				'newsdata' => $newsdata
			)
		);
	}
}
