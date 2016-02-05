<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addzone extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Zone_model');
		$this->load->model('Floor_model');
		$this->load->model('Item_model');
		$this->load->model('Rewards_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function index(){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$qrcode = $zone->getqrcode();
		$sensorid = $zone->getsensorid();
		$zonetypedata = $zone->getzonetypedata();
		$itemdata = $this->Item_model->getEquippableItem();
		$rewarddata = $this->Rewards_model->getRewardFromType(4);
		$this->load->view(
			'addzone_page',array(
				'message' => "",
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid,
				'itemdata' => $itemdata,
				'rewarddata' => $rewarddata
			)
		);
	}

	public function addzonecheck(){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$zonetypedata = $zone->getzonetypedata();
		$itemdata = $this->Item_model->getEquippableItem();
		$rewarddata = $this->Rewards_model->getRewardFromType(4);
		$floorid = $_POST['floorid'];
		$zonename = $_POST['zonename'];
		$zonetypeid = $_POST['zonetype'];
		$zonedetails = $_POST['zonedetails'];
		$qrcode = $_POST['qrcode'];
		$sensorid = $_POST['sensorid'];
		if($_POST['itemid'] != 0){
			$itemid = $_POST['itemid'];
		}else{
			$itemid = null;
		}
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}

		$imageurl = null;
		$minimapurl = null;

		if(!empty($_FILES['zonepic']['name'])){
			$config['upload_path'] = './pictures/zone';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('zonepic')){
				$zonedata = $this->zonepicupload->data();
				$imageurl = substr($zonedata['full_path'], strpos($zonedata['full_path'],"questio_management")+18);
			}
		}

		if(!empty($_FILES['minimappic']['name'])){
			$config['upload_path'] = './pictures/zone_minimap';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('minimappic')){
				$minimapdata = $this->zoneminimapupload->data();
				$minimapurl = substr($minimapdata['full_path'], strpos($minimapdata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('zonename', 'zonename', 'required|max_length[100]|alpha_numeric');

		if ($this->form_validation->run()==TRUE){
			if($zone->addzone($floorid, $zonetypeid, $zonename, $zonedetails, $qrcode, $sensorid, $imageurl, $minimapurl, $itemid, $rewardid)==TRUE){
				$qrcode = $zone->getqrcode();
				$sensorid = $zone->getsensorid();
				$this->load->view(
					'addzone_page',array(
					'message' => 'Add zone successful.',
					'floordata' => $floordata,
					'zonetypedata' => $zonetypedata,
					'qrcode' => $qrcode,
					'sensorid' => $sensorid,
					'itemdata' => $itemdata,
					'rewarddata' => $rewarddata
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
					'sensorid' => $sensorid,
					'itemdata' => $itemdata,
					'rewarddata' => $rewarddata
					)
				);
			}

		}else{
			$qrcode = $zone->getqrcode();
			$sensorid = $zone->getsensorid();
			$this->load->view(
			'addzone_page',array(
				'message' => 'Form validation error. please check again.',
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid,
				'itemdata' => $itemdata,
				'rewarddata' => $rewarddata
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
