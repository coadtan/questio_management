<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
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
			$this->load->view('main_page', array(
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

	public function getquest($zoneidstr){
		$zoneid = substr($zoneidstr,5);
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


}
