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
		$this->load->helper('html');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['keeperplace'] = $this->Place_model->showPlaceManagement($session_data['keeperid']);
			$this->load->view('main_page', $data);
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('mainpage','refresh');
	}

	public function getbuilding($placeidstr){
		$placeid = substr($placeidstr,6);
		$data['keeperbuilding'] = $this->Building_model->showBuildingManagement($placeid);
		$this->load->view('main_page_building', $data);
	}

	public function getfloor($buildingidstr){
		$buildingid = substr($buildingidstr,9);
		$data['keeperfloor'] = $this->Floor_model->showFloorManagement($buildingid);
		$this->load->view('main_page_floor', $data);
	}

	public function getzone($flooridstr){
		$floorid = substr($flooridstr,6);
		$data['keeperzone'] = $this->Zone_model->showZoneManagement($floorid);
		$this->load->view('main_page_zone', $data);
	}

	public function getquest($zoneidstr){
		$zoneid = substr($zoneidstr,5);
		$data['keeperquest'] = $this->Quest_model->getQuestByZone($zoneid);
		$this->load->view('main_page_quest', $data);
	}

	public function getquestdetails($questidstr){
		$questid = substr($questidstr,6);
		$data['keeperquestdetails'] = $this->Quest_model->getQuestByQuest($questid);
		$this->load->view('main_page_questdetails', $data);
	}


}
