<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfloor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Floor_model');
		$this->load->helper('form');
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
		$buildingid = $_POST['buildingid'];
		$floorname = $_POST['floorname'];
		$imageurl = $_POST['imageurl'];

		$config['upload_path'] = './pictures/floor';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';


		$this->load->library('upload', $config);
		$this->upload->initialize($config);


		if (!$this->upload->do_upload('floorpic')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error) ;
		}else{
			$uploaddata = $this->upload->data();
			$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
		}

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($floor->updateFloor($floorid, $buildingid, $floorname, $imageurl)==TRUE){
				$floordata = $floor->getFloorFromId($floorid);
				$this->load->view(
					'editfloor_page',array(
					'message' => 'Edit floor successful.',
					'buildingdata' => $buildingdata,
					'floordata' => $floordata
					)
				);
			}else{
				$floordata = $floor->getFloorFromId($floorid);
				$this->load->view(
					'editfloor_page',array(
					'message' => 'Edit floor failed.',
					'buildingdata' => $buildingdata,
					'floordata' => $floordata
					)
				);
			}
		}else{
			$floordata = $floor->getFloorFromId($floorid);
			$this->load->view(
			'editfloor_page',array(
				'message' => 'Form validation error. please check again.',
				'buildingdata' => $buildingdata,
				'floordata' => $floordata
				)
			);
		}
	}

	public function getbuilding(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$buildingdata = $this->Building_model->getbuildingdata($keeperid);
		return $buildingdata;
	}


}
