<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addzone extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Zone_model');
		$this->load->model('Floor_model');
		$this->load->helper('form');
	}

	public function index(){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$qrcode = $zone->getqrcode();
		$sensorid = $zone->getsensorid();
		$zonetypedata = $this->Zone_model->getzonetypedata();
		$this->load->view(
			'addzone_page',array(
				'message' => "",
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid
			)
		);
	}

	public function addzonecheck(){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$zonetypedata = $zone->getzonetypedata();
		$floorid = $_POST['floorid'];
		$zonename = $_POST['zonename'];
		$zonetypeid = $_POST['zonetype'];
		$zonedetails = $_POST['zonedetails'];
		$qrcode = $_POST['qrcode'];
		$sensorid = $_POST['sensorid'];

		$this->form_validation->set_rules('zonename', 'zonename', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($zone->addzone($floorid, $zonetypeid, $zonename, $zonedetails, $qrcode, $sensorid, null, null, null, null)==TRUE){
				$qrcode = $zone->getqrcode();
				$sensorid = $zone->getsensorid();
				$this->load->view(
					'addzone_page',array(
					'message' => 'Add zone successful.',
					'floordata' => $floordata,
					'zonetypedata' => $zonetypedata,
					'qrcode' => $qrcode,
					'sensorid' => $sensorid
					)
				);
			}else{
				$qrcode = $zone->getqrcode();
				$sensorid = $zone->getsensorid();
				$this->load->view(
					'addzone_page',array(
					'message' => 'Add zone failed.',
					'floordata' => $floordata,
					'zonetypedata' => $zonetypedata,
					'qrcode' => $qrcode,
					'sensorid' => $sensorid
					)
				);
			}

		}else{
			$this->load->view(
			'addzone_page',array(
				'message' => 'From validation error. please check again.',
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata
				)
			);
		}
	}

	public function getfloor(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$floordata = $this->Floor_model->getfloordata($keeperid);
		return $floordata;
	}




}
