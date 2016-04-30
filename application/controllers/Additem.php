<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Additem extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
		$this->load->helper('form');
		$this->load->library('upload');
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
		$itempicpath = "/pictures/item/blank.png";
		$equipspritepath = "/pictures/equipsprite/blank.png";

		if(!empty($_FILES['itempic']['name'])){
			$config['upload_path'] = './pictures/item';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('itempic')){
				$itemdata = $this->upload->data();
				$itempicpath = substr($itemdata['full_path'], strpos($itemdata['full_path'],"questio_management")+18);
			}
		}
		if(!empty($_FILES['spritepic']['name'])){
			$config['upload_path'] = './pictures/equipsprite';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('spritepic')){
				$spritedata = $this->upload->data();
				$equipspritepath = substr($spritedata['full_path'], strpos($spritedata['full_path'],"questio_management")+18);
			}
		}
		$this->form_validation->set_rules('itemname', 'itemname', 'required|max_length[30]');
		$this->form_validation->set_rules('itemcollection', 'itemcollection', 'required|max_length[50]');

		if ($this->form_validation->run()==TRUE){

				if($item->additem($itemname, $itempicpath, $equipspritepath, $itemcollection, $positionid)==TRUE){
					echo "add_item_success";
					//$this->load->view(
					//	'additem_page',array(
					//	'message' => 'Add item successful.',
					//	'position' => $position
					//	)
					//);
				}else{
					echo "add_item_failed";
					//$this->load->view(
					//	'additem_page',array(
					//	'message' => 'Add item failed.',
					//	'position' => $position
					//	)
					//);
				}

		}else{
			echo "add_item_error";
			//$this->load->view(
			//'additem_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'position' => $position
			//	)
			//);
		}
	}


}
