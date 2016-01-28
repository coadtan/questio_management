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
	}

	public function edit($zoneid){
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$zonedata = $zone->getZoneFromId($zoneid);
		$zonetypedata = $zone->getzonetypedata();
		$itemdata = $this->Item_model->getEquippableItem();
		$rewarddata = $this->Rewards_model->getRewardFromType(4);
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
		$floordata = $this->getfloor();
		$zone = $this->Zone_model;
		$zonetypedata = $zone->getzonetypedata();
		$itemdata = $this->Item_model->getEquippableItem();
		$rewarddata = $this->Rewards_model->getRewardFromType(4);
		$floorid = $_POST['floorid'];
		$zonename = $_POST['zonename'];
		$zonetypeid = $_POST['zonetype'];
		$zonedetails = $_POST['zonedetails'];
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

		$this->form_validation->set_rules('zonename', 'zonename', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($zone->updateZone($zoneid, $floorid, $zonetypeid, $zonename, $zonedetails, null, null, $itemid, $rewardid)==TRUE){
				$zonedata = $zone->getZoneFromId($zoneid);
				$this->load->view(
					'editzone_page',array(
					'message' => 'Edit zone successful.',
					'floordata' => $floordata,
					'zonetypedata' => $zonetypedata,
					'itemdata' => $itemdata,
					'rewarddata' => $rewarddata,
					'zonedata' => $zonedata
					)
				);
			}else{
				$zonedata = $zone->getZoneFromId($zoneid);
				$this->load->view(
					'editzone_page',array(
					'message' => 'Edit zone failed.',
					'floordata' => $floordata,
					'zonetypedata' => $zonetypedata,
					'itemdata' => $itemdata,
					'rewarddata' => $rewarddata,
					'zonedata' => $zonedata
					)
				);
			}

		}else{
			$zonedata = $zone->getZoneFromId($zoneid);
			$this->load->view(
			'editzone_page',array(
				'message' => 'Form validation error. please check again.',
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata,
				'itemdata' => $itemdata,
				'rewarddata' => $rewarddata,
				'zonedata' => $zonedata
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
