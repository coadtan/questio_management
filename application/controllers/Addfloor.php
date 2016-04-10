<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfloor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Building_model');
		$this->load->model('Floor_model');
		$this->load->helper('form');
		$this->load->library('upload');
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

		$imageurl = null;

		if(!empty($_FILES['floorpic']['name'])){
			$config['upload_path'] = './pictures/floor';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';


			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			if (!$this->upload->do_upload('floorpic')){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error) ;
			}else{
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($floor->addfloor($buildingid, $floorname, $imageurl, $qrcode, $sensorid)==TRUE){
				echo "add_floor_success";
				//$qrcode = $floor->getqrcode();
				//$sensorid = $floor->getsensorid();
				//$this->load->view(
				//	'addfloor_page',array(
				//	'message' => 'Add floor successful.',
				//	'buildingdata' => $buildingdata,
				//	'qrcode' => $qrcode,
				//	'sensorid' => $sensorid
				//	)
				//);
			}else{
				echo "add_floor_failed";
				//$qrcode = $floor->getqrcode();
				//$sensorid = $floor->getsensorid();
				//$this->load->view(
				//	'addfloor_page',array(
				//	'message' => 'Add floor failed.',
				//	'buildingdata' => $buildingdata,
				//	'qrcode' => $qrcode,
				//	'sensorid' => $sensorid
				//	)
				//);
			}
		}else{
			echo "add_floor_error";
			//$qrcode = $floor->getqrcode();
			//$sensorid = $floor->getsensorid();
			//$this->load->view(
			//'addfloor_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'buildingdata' => $buildingdata,
			//	'qrcode' => $qrcode,
			//	'sensorid' => $sensorid
			//	)
			//);
		}
	}

	public function getbuilding(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$buildingdata = $this->Building_model->getbuildingdata($keeperid);
		return $buildingdata;
	}


}
