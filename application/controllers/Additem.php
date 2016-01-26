<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Additem extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
		$this->load->helper('form');
	}

	public function index(){
		$position = $this->Item_model->getposition();
		$this->load->view(
			'additem_page',array(
				'message' => "",
				'position' => $position
			)
		);
	}

	public function additemcheck(){
		$item = $this->Item_model;
		$position = $item->getposition();
		$itemname = $_POST['itemname'];
		$itemcollection = $_POST['itemcollection'];
		$positionid = $_POST['positionid'];

		$this->form_validation->set_rules('itemname', 'itemname', 'required|max_length[30]');
		$this->form_validation->set_rules('itemcollection', 'itemcollection', 'required|max_length[50]');

		if ($this->form_validation->run()==TRUE){
			if($item->additem($itemname, "/itempic/blank.png", "/itempic/spritepic/blank.png", $itemcollection, $positionid)==TRUE){
				$this->load->view(
					'additem_page',array(
					'message' => 'Add item successful.',
					'position' => $position
					)
				);
			}else{
				$this->load->view(
					'additem_page',array(
					'message' => 'Add item failed.',
					'position' => $position
					)
				);
			}

		}else{
			$this->load->view(
			'additem_page',array(
				'message' => 'Form validation error. please check again.',
				'position' => $position
				)
			);
		}
	}


}
