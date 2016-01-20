<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editplace extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Place_model');
		$this->load->model('Rewards_model');
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
		
		

		$this->form_validation->set_rules('placename', 'placename', 'required|max_length[50]');
		$this->form_validation->set_rules('placefullname', 'placefullname', 'required|max_length[255]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');
		$this->form_validation->set_rules('placetype', 'placetype', 'required|alpha_numeric');

		if ($this->form_validation->run()==TRUE){
			if($place->updatePlace($placeid, $placename, $placefullname, $latitude ,$longitude ,$radius, $placetype, null, $enter_rewardid, $rewardid)==TRUE){
				$placedata = $place->getPlaceById($placeid);
				$this->load->view(
					'editplace_page',array(
					'message' => 'Edd Place successful.',
					'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata,
				'placedata' => $placedata
					)
				);
			}else{
				$placedata = $place->getPlaceById($placeid);
				$this->load->view(
					'editplace_page',array(
					'message' => 'Edd Place failed.',
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
				'message' => 'From validation error. please check again.',
				'enterrewarddata' => $enterrewarddata,
					'rewarddata' => $rewarddata,
				'placedata' => $placedata
				)
			);
		}
	}
}
