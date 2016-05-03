<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editbuilding extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function edit($buildingid){
		$placedata = $this->getplace();
		$buildingdata = $this->Building_model->getBuildingFromId($buildingid);
		$this->load->view(
			'editbuilding_page',array(
				'message' => "",
				'buildingdata' => $buildingdata,
				'placedata' => $placedata
			)
		);
	}

	public function editbuildingcheck($buildingid){
		$placedata = $this->getplace();
		$building = $this->Building_model;
		$placeid = $this->input->post('placeid');
		$buildingname = $this->input->post('buildingname');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$radius = $this->input->post('radius');
		$imageurl = null;

		if(!empty($_FILES['buildingpic']['name'])){

			$config['upload_path'] = './pictures/building';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';

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
			if($building->updateBuilding($buildingid,$placeid,$buildingname,$latitude,$longitude,$radius,null)==TRUE){
				echo "edit_building_success";
				//$buildingdata = $building->getBuildingFromId($buildingid);
				//$this->load->view(
				//	'editbuilding_page',array(
				//	'message' => 'Edit building successful.',
				//	'buildingdata' => $buildingdata,
				//	'placedata' => $placedata
				//	)
				//);
			}else{
				echo "edit_building_failed";
				//$buildingdata = $building->getBuildingFromId($buildingid);
				//$this->load->view(
				//	'editbuilding_page',array(
				//	'message' => 'Edit building failed.',
				//	'buildingdata' => $buildingdata,
				//	'placedata' => $placedata
				//	)
				//);
			}

		}else{
			echo "edit_building_error";
			//$buildingdata = $building->getBuildingFromId($buildingid);
			//$this->load->view(
			//'editbuilding_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'buildingdata' => $buildingdata,
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
