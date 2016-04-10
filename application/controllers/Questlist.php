<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Quest_model');
		$this->load->helper('form');
	}

	public function index(){
		$questdata = $this->Quest_model->getallquest();
		$this->load->view(
			'questlist_page',array(
				'questdata' => $questdata
			)
		);
	}

	public function search(){
		$namepart = $_POST['namepart'];
		$questdata = $this->Quest_model->searchquest($namepart);
		$this->load->view(
			'questlist_page',array(
				'questdata' => $questdata
			)
		);
	}

}