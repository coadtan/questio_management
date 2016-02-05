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

		$itempicpath = null;
		$equipspritepath = null;

		$config['upload_path'] = './pictures/item';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';
		$this->load->library('upload', $config, 'itempicupload');
		$this->itempicupload->initialize($config);

		$config['upload_path'] = './pictures/item';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';
		$this->load->library('upload', $config, 'equipspriteupload');
		$this->equipspriteupload->initialize($config);

		$upload_item = $this->upload->do_upload('itempic');
		$upload_sprite = $this->upload->do_upload('spritepic');

		if ($upload_item && $upload_sprite){
			$itemdata = $this->itempicupload->data();
			$spritedata = $this->equipspriteupload->data();
			$itempicpath = substr($itemdata['full_path'], strpos($itemdata['full_path'],"questio_management")+18);
			$equipspritepath = substr($spritedata['full_path'], strpos($spritedata['full_path'],"questio_management")+18);
		}else{
			$error = array(
				'itemerror' => $this->itempicupload->display_errors(),
				'spriteerror' => $this->equipspriteupload->display_errors()
				);
			var_dump($error);

		}

		$this->form_validation->set_rules('itemname', 'itemname', 'required|max_length[30]');
		$this->form_validation->set_rules('itemcollection', 'itemcollection', 'required|max_length[50]');

		if ($this->form_validation->run()==TRUE){
			if($item->additem($itemname, $itempicpath, $equipspritepath, $itemcollection, $positionid)==TRUE){
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
