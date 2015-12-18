<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbuilding extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Building_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
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

		$this->form_validation->set_rules('buildingname', 'buildingname', 'required|max_length[140]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');
	
		if ($this->form_validation->run()==TRUE){
			if($building->addbuilding($placeid, $buildingname, $latitude,$longitude, $radius, null)==TRUE){
				$this->load->view(
					'addbuilding_page',array(
					'message' => 'Add building successful.',
					'placedata' => $placedata
					)
				);
			}else{
				$this->load->view(
					'addbuilding_page',array(
					'message' => 'Add building failed.',
					'placedata' => $placedata
					)
				);
			}
			
		}else{
			$this->load->view(
			'addbuilding_page',array(
				'message' => 'From validation error. please check again.',
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