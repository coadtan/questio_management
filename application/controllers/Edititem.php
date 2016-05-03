<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edititem extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function edit($itemid){
		$item = $this->Item_model;
		$itemdata = $item->getItemFromItemId($itemid);
		$position = $item->getposition();
		$this->load->view(
			'edititem_page',array(
				'message' => "",
				'itemdata' => $itemdata,
				'position' => $position
			)
		);
	}

	public function edititemcheck(){
		$item = $this->Item_model;
		$position = $item->getposition();
		$itemid = $this->input->post('itemid');
		$itemname = $this->input->post('itemname');
		$itemcollection = $this->input->post('itemcollection');
		$positionid = $this->input->post('positionid');
		$itempicpath = $this->input->post('itempicpath');
		$equipspritepath = $this->input->post('equipspritepath');

		$this->form_validation->set_rules('itemname', 'itemname', 'required|max_length[30]');
		$this->form_validation->set_rules('itemcollection', 'itemcollection', 'required|max_length[50]');

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
			}else{
				$itemerror = array('error' => $this->upload->display_errors());
				var_dump($itemerror);
			}
		}
		if(!empty($_FILES['spritepic']['name'])){
			$config['upload_path'] = './pictures/equipsprite';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('spritepic')){
				$spritedata = $this->upload->data();
				$equipspritepath = substr($spritedata['full_path'], strpos($spritedata['full_path'],"questio_management")+18);
			}else{
				$spriteerror = array('error' => $this->upload->display_errors());
				var_dump($spriteerror);
			}
		}

		if ($this->form_validation->run()==TRUE){

				if($item->updateItem($itemid, $itemname, $itempicpath, $equipspritepath, $itemcollection, $positionid)==TRUE){
					echo "edit_item_success";
					//$itemdata = $item->getItemFromItemId($itemid);
					//$this->load->view(
					//	'edititem_page',array(
					//	'message' => 'Edit item successful.',
					//	'itemdata' => $itemdata,
					//	'position' => $position
					//	)
					//);
				}else{
					echo "edit_item_failed";
					//$itemdata = $item->getItemFromItemId($itemid);
					//$this->load->view(
					//	'edititem_page',array(
					//	'message' => 'Edit item failed.',
					//	'itemdata' => $itemdata,
					//	'position' => $position
					//	)
					//);
				}

		}else{
			echo "edit_item_error";
			//$itemdata = $item->getItemFromItemId($itemid);
			//$this->load->view(
			//'additem_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'itemdata' => $itemdata,
			//	'position' => $position
			//	)
			//);
		}
	}
}