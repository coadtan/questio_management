<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbuilding extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function index(){
		$placedata = $this->getplace();
		$this->load->view(
			'addbuilding_page',array(
				'message' => "",
				'placedata' => $placedata
			)
		);
	}

	public function addbuildingcheck(){
		$placedata = $this->getplace();
		$building = $this->Building_model;
		$placeid = $_POST['placeid'];
		$buildingname = $_POST['buildingname'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$radius = $_POST['radius'];

		$imageurl = null;

		if(!empty($_FILES['buildingpic']['name'])){
			$config['upload_path'] = './pictures/building';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';


			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			if ($this->upload->do_upload('buildingpic')){
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('buildingname', 'buildingname', 'required|max_length[140]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|greater_than[1]|less_than[2000]');

		if ($this->form_validation->run()==TRUE){
			if($building->addbuilding($placeid, $buildingname, $latitude,$longitude, $radius, $imageurl)==TRUE){
				echo "add_building_success";
				//$this->load->view(
				//	'addbuilding_page',array(
				//	'message' => 'Add building successful.',
				//	'placedata' => $placedata
				//	)
				//);
			}else{
				echo "add_building_failed";
				//$this->load->view(
				//	'addbuilding_page',array(
				//	'message' => 'Add building failed.',
				//	'placedata' => $placedata
				//	)
				//);
			}

		}else{
			echo "add_building_error";
			//$this->load->view(
			//'addbuilding_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'placedata' => $placedata
			//	)
			//);
		}
	}

	public function getplace(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$placedata = $this->Place_model->getplacedata($keeperid);
		return $placedata;
	}


}
