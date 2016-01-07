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

	public function getbuilding($placeid){
		$data['keeperbuilding'] = $this->Building_model->showBuildingManagement($placeid);
		$this->load->view('main_page_building', $data);

	}

	public function getfloor($buildingid){
		$data['keeperfloor'] = $this->Floor_model->showFloorManagement($buildingid);
		$this->load->view('main_page_floor', $data);

	}

	public function getzone($floorid){
		$data['keeperzone'] = $this->Zone_model->showZoneManagement($floorid);
		$this->load->view('main_page_zone', $data);

	}


}
