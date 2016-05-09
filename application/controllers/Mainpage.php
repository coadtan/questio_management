<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Place_model');
		$this->load->model('Building_model');
		$this->load->model('Floor_model');
		$this->load->model('Zone_model');
		$this->load->model('Quest_model');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$this->load->view('management_page', array(
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'keeperplace' => $this->Place_model->showPlaceManagement($session_data['keeperid'])
					));
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('mainpage','refresh');
	}

	public function getplace(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$this->load->view('place_management', array(
					'keeperplace' => $this->Place_model->showPlaceManagement($session_data['keeperid'])
					));
		}else{
			redirect('login','refresh');
		}
	}

	public function getbuilding($placeid){
		$data = $this->Building_model->showBuildingManagement($placeid);
		$this->load->view('main_page_building', array(
										'data' => $data
									));
	}

	public function getfloor($buildingid){
		$data = $this->Floor_model->showFloorManagement($buildingid);
		$this->load->view('main_page_floor', array(
										'data' => $data
									));
	}

	public function getzone($floorid){
		$data = $this->Zone_model->showZoneManagement($floorid);
		$this->load->view('main_page_zone', array(
										'data' => $data
									));
	}

	public function getquest($zoneid){
		$data = $this->Quest_model->getQuestByZone($zoneid);
		$this->load->view('main_page_quest', array(
										'data' => $data
									));
	}

	public function getquestdetails($questidstr){
		$questid = substr($questidstr,6);
		$data = $this->Quest_model->getQuestByQuest($questid);
		$this->load->view('main_page_questdetails', array(
										'data' => $data
									));
	}

	public function deleteplace($placeid){
		$this->Place_model->deletePlace($placeid);
		$this->getplace();
	}

	public function deletebuilding($buildingid){
		$this->Building_model->deleteBuilding($buildingid);
		$this->getplace();
	}

	public function deletefloor($floorid){
		$this->Floor_model->deleteFloor($floorid);
		$this->getplace();
	}

	public function deletezone($zoneid){
		$this->Zone_model->deleteZone($zoneid);
		$this->getplace();
	}


}
