<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfloor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Floor_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function edit($floorid){
		$floor = $this->Floor_model;
		$floordata = $floor->getFloorFromId($floorid);
		$buildingdata = $this->getbuilding();
		$this->load->view(
			'editfloor_page',array(
				'message' => "",
				'buildingdata' => $buildingdata,
				'floordata' => $floordata
			)
		);
	}

	public function editfloorcheck($floorid){
		$buildingdata = $this->getbuilding();
		$floor = $this->Floor_model;
		$buildingid = $this->input->post('buildingid');
		$floorname = $this->input->post('floorname');
		$imageurl = $this->input->post('imageurl')

		if(!empty($_FILES['floorpic']['name'])){
			$config['upload_path'] = './pictures/floor';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';

			$this->upload->initialize($config);


			if ($this->upload->do_upload('floorpic')){
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($floor->updateFloor($floorid, $buildingid, $floorname, $imageurl)==TRUE){
				echo "edit_floor_success";
				//$floordata = $floor->getFloorFromId($floorid);
				//$this->load->view(
				//	'editfloor_page',array(
				//	'message' => 'Edit floor successful.',
				//	'buildingdata' => $buildingdata,
				//	'floordata' => $floordata
				//	)
				//);
			}else{
				echo "edit_floor_failed";
				//$floordata = $floor->getFloorFromId($floorid);
				//$this->load->view(
				//	'editfloor_page',array(
				//	'message' => 'Edit floor failed.',
				//	'buildingdata' => $buildingdata,
				//	'floordata' => $floordata
				//	)
				//);
			}
		}else{
			echo "edit_floor_error";
			//$floordata = $floor->getFloorFromId($floorid);
			//$this->load->view(
			//'editfloor_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'buildingdata' => $buildingdata,
			//	'floordata' => $floordata
			//	)
			//);
		}
	}

	public function getbuilding(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$buildingdata = $this->Building_model->getbuildingdata($keeperid);
		return $buildingdata;
	}


}
