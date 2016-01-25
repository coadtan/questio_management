<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplace extends CI_Controller {
	var $config;
	public function __construct(){
		parent::__construct();
		$this->load->model('Place_model');
		$this->load->model('Rewards_model');
		$this->config =
			array(
				'upload_path' => './puzzlepic/',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'overwrite' => TRUE
			);
	}

	public function index(){
		$place = $this->Place_model;
		$reward = $this->Rewards_model;
		$qrcode = $place->getqrcode();
		$sensorid = $place->getsensorid();
		$enterrewarddata = $reward->getRewardFromType(5);
		$rewarddata = $reward->getRewardFromType(2);
		$this->load->view(
			'addplace_page',array(
				'message' => "",
				'qrcode' => $qrcode,
				'sensorid' => $sensorid,
				'enterrewarddata' => $enterrewarddata,
				'rewarddata' => $rewarddata
			)
		);
	}

	public function addplacecheck(){
		$place = $this->Place_model;
		$reward = $this->Rewards_model;
		$enterrewarddata = $reward->getRewardFromType(5);
		$rewarddata = $reward->getRewardFromType(2);
		$placename = $_POST['placename'];
		$placefullname = $_POST['placefullname'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$radius = $_POST['radius'];
		$placetype = $_POST['placetype'];
		$qrcode = $_POST['qrcode'];
		$sensorid = $_POST['sensorid'];
		if($_POST['enter_rewardid'] != 0){
			$enter_rewardid = $_POST['enter_rewardid'];
		}else{
			$enter_rewardid = null;
		}
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}
		
		

		$this->form_validation->set_rules('placename', 'placename', 'required|max_length[50]');
		$this->form_validation->set_rules('placefullname', 'placefullname', 'required|max_length[255]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');
		$this->form_validation->set_rules('placetype', 'placetype', 'required|alpha_numeric');

		if ($this->form_validation->run()==TRUE){
			if($place->addplace($placename, $placefullname, $qrcode, $sensorid, $latitude, $longitude, $radius, $placetype, null, $enter_rewardid, $rewardid)==TRUE){
				$qrcode = $place->getqrcode();
				$sensorid = $place->getsensorid();
				$this->load->view(
					'addplace_page',array(
					'message' => 'Add Place successful.',
					'qrcode' => $qrcode,
					'sensorid' => $sensorid,
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata
					)
				);
			}else{
				$qrcode = $place->getqrcode();
				$sensorid = $place->getsensorid();
				$this->load->view(
					'addplace_page',array(
					'message' => 'Add Place failed.',
					'qrcode' => $qrcode,
					'sensorid' => $sensorid,
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata
					)
				);
			}
		}else{
			$qrcode = $place->getqrcode();
				$sensorid = $place->getsensorid();
			$this->load->view(
			'addplace_page',array(
				'message' => 'From validation error. please check again.',
				'qrcode' => $qrcode,
					'sensorid' => $sensorid,
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata
				)
			);
		}
	}
}
