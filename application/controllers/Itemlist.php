<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Item_model');
		$this->load->helper('form');
	}

	public function index(){
		$itemdata = $this->Item_model->getallitem();
		$this->load->view(
			'itemlist_page',array(
				'itemdata' => $itemdata
			)
		);
	}

	public function search(){
		$namepart = $_POST['namepart'];
		$itemdata = $this->Item_model->searchitem($namepart);
		$this->load->view(
			'itemlist_page',array(
				'itemdata' => $itemdata
			)
		);
	}

}