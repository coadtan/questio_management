<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editzone extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Zone_model');
		$this->load->model('Floor_model');
		$this->load->model('Item_model');
		$this->load->model('Rewards_model');
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function edit($zoneid){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$zonedata = $zone->getZoneFromId($zoneid);
		$zonetypedata = $zone->getzonetypedata();
		$itemdata = $this->getitem();
		$rewarddata = $this->getreward(3);
		$this->load->view(
			'editzone_page',array(
				'message' => "",
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata,
				'itemdata' => $itemdata,
				'rewarddata' => $rewarddata,
				'zonedata' => $zonedata
			)
		);
	}

	public function editzonecheck($zoneid){
		$zone = $this->Zone_model;
		$floorid = $this->input->post('floorid');
		$zonename = $this->input->post('zonename');
		$zonetypeid = $this->input->post('zonetype');
		$zonedetails = $this->input->post('zonedetails');
		if($this->input->post('itemid') != 0){
			$itemid = $this->input->post('itemid');
		}else{
			$itemid = null;
		}
		if($this->input->post('rewardid') != 0){
			$rewardid = $this->input->post('rewardid');
		}else{
			$rewardid = null;
		}
		$imageurl =  $this->input->post('imageurl');
		$minimapurl = $this->input->post('minimapurl');

		if(!empty($_FILES['zonepic']['name'])){
			$config['upload_path'] = './pictures/zone';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('zonepic')){
				$zonedata = $this->upload->data();
				$imageurl = substr($zonedata['full_path'], strpos($zonedata['full_path'],"questio_management")+18);
			}
		}

		if(!empty($_FILES['minimappic']['name'])){
			$config['upload_path'] = './pictures/zone_minimap';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1080';
			$this->upload->initialize($config);

			if ($this->upload->do_upload('minimappic')){
				$minimapdata = $this->upload->data();
				$minimapurl = substr($minimapdata['full_path'], strpos($minimapdata['full_path'],"questio_management")+18);
			}
		}

		$this->form_validation->set_rules('zonename', 'zonename', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($zone->updateZone($zoneid, $floorid, $zonetypeid, $zonename, $zonedetails, $imageurl, $minimapurl, $itemid, $rewardid)==TRUE){
				echo "edit_zone_success";
				//$zonedata = $zone->getZoneFromId($zoneid);
				//$this->load->view(
				//	'editzone_page',array(
				//	'message' => 'Edit zone successful.',
				//	'floordata' => $floordata,
				//	'zonetypedata' => $zonetypedata,
				//	'itemdata' => $itemdata,
				//	'rewarddata' => $rewarddata,
				//	'zonedata' => $zonedata
				//	)
				//);
			}else{
				echo "edit_zone_failed";
				//$zonedata = $zone->getZoneFromId($zoneid);
				//$this->load->view(
				//	'editzone_page',array(
				//	'message' => 'Edit zone failed.',
				//	'floordata' => $floordata,
				//	'zonetypedata' => $zonetypedata,
				//	'itemdata' => $itemdata,
				//	'rewarddata' => $rewarddata,
				//	'zonedata' => $zonedata
				//	)
				//);
			}

		}else{
			echo "edit_zone_error";
			//$zonedata = $zone->getZoneFromId($zoneid);
			//$this->load->view(
			//'editzone_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'floordata' => $floordata,
			//	'zonetypedata' => $zonetypedata,
			//	'itemdata' => $itemdata,
			//	'rewarddata' => $rewarddata,
			//	'zonedata' => $zonedata
			//	)
			//);
		}
	}

	public function getfloor(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$floordata = $this->Floor_model->getfloordata($keeperid);
		return $floordata;
	}

	public function getreward($rewardtypeid){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$rewarddata = $this->Rewards_model->getRewardFromType($rewardtypeid,$keeperid);
		return $rewarddata;
	}

	public function getitem(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$itemdata = $this->Item_model->getEquippableItem($keeperid);
		return $itemdata;
	}	


}
