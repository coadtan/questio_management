<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplace extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Place_model');
		$this->load->model('Rewards_model');
		$this->load->library('upload');
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

		$imageurl = null;

		if(!empty($_FILES['placepic']['name'])){

			$config['upload_path'] = './pictures/place';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';


			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			if ($this->upload->do_upload('placepic')){
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}

		}


		$this->form_validation->set_rules('placename', 'placename', 'required|max_length[50]');
		$this->form_validation->set_rules('placefullname', 'placefullname', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|greater_than[1]|less_than[2000]');
		$this->form_validation->set_rules('placetype', 'placetype', 'required|alpha_numeric');

		if ($this->form_validation->run()==TRUE){
			if($place->addplace($placename, $placefullname, $qrcode, $sensorid, $latitude, $longitude, $radius, $placetype, $imageurl, $enter_rewardid, $rewardid)==TRUE){
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
				'message' => 'Form validation error. please check again.',
				'qrcode' => $qrcode,
					'sensorid' => $sensorid,
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata
				)
			);
		}
	}
}
