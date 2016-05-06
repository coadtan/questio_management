<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplace extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Place_model');
		$this->load->model('Placedetail_model');
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
		$placename = $this->input->post('placename');
		$placefullname = $this->input->post('placefullname');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$radius = $this->input->post('radius');
		$placetype = $this->input->post('placetype');
		$qrcode = $this->input->post('qrcode');
		$sensorid = $this->input->post('sensorid');
		if($this->input->post('enter_rewardid')!= 0){
			$enter_rewardid = $this->input->post('enter_rewardid');
		}else{
			$enter_rewardid = null;
		}
		if($this->input->post('rewardid') != 0){
			$rewardid = $this->input->post('rewardid');
		}else{
			$rewardid = null;
		}

		$imageurl = null;

		if(!empty($_FILES['placepic']['name'])){

			$config['upload_path'] = './pictures/place';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';

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
				echo "add_place_success";
				//$qrcode = $place->getqrcode();
				//$sensorid = $place->getsensorid();
				//$this->load->view(
				//	'addplace_page',array(
				//	'message' => 'Add Place successful.',
				//	'qrcode' => $qrcode,
				//	'sensorid' => $sensorid,
				//	'enterrewarddata' => $enterrewarddata,
				//	'rewarddata' => $rewarddata
				//	)
				//);
			}else{
				echo "add_place_failed";
				//$qrcode = $place->getqrcode();
				//$sensorid = $place->getsensorid();
				//$this->load->view(
				//	'addplace_page',array(
				//	'message' => 'Add Place failed.',
				//	'qrcode' => $qrcode,
				//	'sensorid' => $sensorid,
				//	'enterrewarddata' => $enterrewarddata,
				//	'rewarddata' => $rewarddata
				//	)
				//);
			}
		}else{
			echo "add_place_error";
			//$qrcode = $place->getqrcode();
			//$sensorid = $place->getsensorid();
			//$this->load->view(
			//'addplace_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'qrcode' => $qrcode,
			//		'sensorid' => $sensorid,
			//		'enterrewarddata' => $enterrewarddata,
			//		'rewarddata' => $rewarddata
			//	)
			//);
		}
	}

	public function addEditPlaceDetail($placeid){
		$placedetaildata = $this->Placedetail_model->getPlaceDetailByPlaceId($placeid);
		if(is_null($placedetaildata)){
			$this->load->view(
			'addplacedetail_page',array(
				'message' => "",
				'placeid' => $placeid
				)
			);
		}else{
			$this->load->view(
			'editplacedetail_page',array(
				'message' => "",
				'placedetaildata' => $placedetaildata,
				'placeid' => $placeid
				)
			);
		}
		
	}

	public function addPlaceDetailCheck(){
		$placedet = $this->Placedetail_model;
		$placeid = $this->input->post('placeid');
		$placedetails = $this->input->post('placedetails');
		$phonecontact1 = $this->input->post('phonecontact1');
		$phonecontact2 = $this->input->post('phonecontact2');
		$website = $this->input->post('website');
		$email = $this->input->post('email');
		$imageurl = null;

		if(!empty($_FILES['placepic']['name'])){

			$config['upload_path'] = './pictures/place';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';

			$this->upload->initialize($config);


			if ($this->upload->do_upload('placepic')){
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}

		}


		$this->form_validation->set_rules('placedetails', 'placedetails', 'required');
		$this->form_validation->set_rules('phonecontact1', 'phonecontact1', 'required|numeric|max_length[10]');
		$this->form_validation->set_rules('phonecontact2', 'phonecontact2', 'numeric|max_length[10]');
		$this->form_validation->set_rules('email', 'email', 'valid_email');

		if ($this->form_validation->run()==TRUE){
			if($placedet->addPlaceDetail($placeid, $placedetails, $phonecontact1, $phonecontact2, $website, $email, $imageurl)==TRUE){
				echo "add_placedetail_success";
				//$this->load->view(
				//	'management_page',array(
				//	'message' => 'Add Place Detail successful.'
				//	)
				//);
			}else{
				echo "add_placedetail_failed";
				//$this->load->view(
				//	'addplacedetail_page',array(
				//	'message' => 'Add Place Detail failed.',
				//	'placeid' => $placeid
				//	)
				//);
			}
		}else{
			echo "add_placedetail_error";
			//$this->load->view(
			//'addplacedetail_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'placeid' => $placeid
			//	)
			//);
		}
	}
}
