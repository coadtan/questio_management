<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfloor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Floor_model');
		$this->load->helper('form');
	}

	public function index(){
		$floor = $this->Floor_model;
		$qrcode = $floor->getqrcode();
		$sensorid = $floor->getsensorid();
		$buildingdata = $this->getbuilding();
		$this->load->view(
			'addfloor_page',array(
				'message' => "",
				'buildingdata' => $buildingdata,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid
			)
		);
	}

	public function addfloorcheck(){
		$buildingdata = $this->getbuilding();
		$floor = $this->Floor_model;
		$buildingid = $_POST['buildingid'];
		$floorname = $_POST['floorname'];
		$qrcode = $_POST['qrcode'];
		$sensorid = $_POST['sensorid'];

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($floor->addfloor($buildingid, $floorname, null, $qrcode, $sensorid)==TRUE){
				$qrcode = $floor->getqrcode();
				$sensorid = $floor->getsensorid();
				$this->load->view(
					'addfloor_page',array(
					'message' => 'Add floor successful.',
					'buildingdata' => $buildingdata,
					'qrcode' => $qrcode,
					'sensorid' => $sensorid
					)
				);
			}else{
				$qrcode = $floor->getqrcode();
				$sensorid = $floor->getsensorid();
				$this->load->view(
					'addfloor_page',array(
					'message' => 'Add floor failed.',
					'buildingdata' => $buildingdata,
					'qrcode' => $qrcode,
					'sensorid' => $sensorid
					)
				);
			}
		}else{
			$this->load->view(
			'addfloor_page',array(
				'message' => 'From validation error. please check again.',
				'buildingdata' => $buildingdata
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
