<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editplace extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Place_model');
		$this->load->model('Rewards_model');
		$this->load->library('upload');
	}

	public function edit($placeid){
		$place = $this->Place_model;
		$placedata = $place->getPlaceById($placeid);
		$reward = $this->Rewards_model;
		$enterrewarddata = $reward->getRewardFromType(5);
		$rewarddata = $reward->getRewardFromType(2);
		$this->load->view(
			'editplace_page',array(
				'message' => "",
				'enterrewarddata' => $enterrewarddata,
				'rewarddata' => $rewarddata,
				'placedata' => $placedata
			)
		);
	}

	public function editplacecheck($placeid){
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

		$imageurl = $_POST['imageurl'];

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
		$this->form_validation->set_rules('placefullname', 'placefullname', 'required|max_length[255]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|greater_than[1]|less_than[2000]');
		$this->form_validation->set_rules('placetype', 'placetype', 'required|alpha_numeric');

		if ($this->form_validation->run()==TRUE){
			if($place->updatePlace($placeid, $placename, $placefullname, $latitude ,$longitude ,$radius, $placetype, $imageurl, $enter_rewardid, $rewardid)==TRUE){
				$placedata = $place->getPlaceById($placeid);
				$this->load->view(
					'editplace_page',array(
					'message' => 'Edit Place successful.',
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata,
				'placedata' => $placedata
					)
				);
			}else{
				$placedata = $place->getPlaceById($placeid);
				$this->load->view(
					'editplace_page',array(
					'message' => 'Edit Place failed.',
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata,
				'placedata' => $placedata
					)
				);
			}
		}else{
			$placedata = $place->getPlaceById($placeid);
			$this->load->view(
			'editplace_page',array(
				'message' => 'Form validation error. please check again.',
				'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata,
				'placedata' => $placedata
				)
			);
		}
	}
}
