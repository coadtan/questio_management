<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editbuilding extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
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
		$placeid = $_POST['placeid'];
		$buildingname = $_POST['buildingname'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$radius = $_POST['radius'];

		$this->form_validation->set_rules('buildingname', 'buildingname', 'required|max_length[140]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');

		if ($this->form_validation->run()==TRUE){
			if($building->updateBuilding($buildingid,$placeid,$buildingname,$latitude,$longitude,$radius,null)==TRUE){
				$buildingdata = $building->getBuildingFromId($buildingid);
				$this->load->view(
					'editbuilding_page',array(
					'message' => 'Edit building successful.',
					'buildingdata' => $buildingdata,
					'placedata' => $placedata
					)
				);
			}else{
				$buildingdata = $building->getBuildingFromId($buildingid);
				$this->load->view(
					'editbuilding_page',array(
					'message' => 'Edit building failed.',
					'buildingdata' => $buildingdata,
					'placedata' => $placedata
					)
				);
			}

		}else{
			$buildingdata = $building->getBuildingFromId($buildingid);
			$this->load->view(
			'editbuilding_page',array(
				'message' => 'Form validation error. please check again.',
				'buildingdata' => $buildingdata,
				'placedata' => $placedata
				)
			);
		}
	}

	public function getplace(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$placedata = $this->Place_model->getplacedata($keeperid);
		return $placedata;
	}

}
