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

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($floor->updateFloor($floorid, $buildingid, $floorname, null)==TRUE){
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
				'message' => 'From validation error. please check again.',
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
