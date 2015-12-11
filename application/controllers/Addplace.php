<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplace extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Keeper_model');
	}

	public function index(){
		$this->load->view(
			'addplace_page',array(
				'message' => ""
			)
		);
	}

	public function addplacecheck(){
		$placename = $_POST['placename'];
		$placefullname = $_POST['placefullname'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$radius = $_POST['radius'];
		$placetype = $_POST['placetype'];	

		$this->form_validation->set_rules('placename', 'placename', 'required|max_length[50]');
		$this->form_validation->set_rules('placefullname', 'placefullname', 'required|max_length[255]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');
		$this->form_validation->set_rules('placetype', 'placetype', 'required|alpha_numeric');
	
		if ($this->form_validation->run()==TRUE){
			$this->db->set('placename', $placename);
			$this->db->set('placefullname', $placefullname);
			$this->db->set('latitude', $latitude);
			$this->db->set('longitude', $longitude);
			$this->db->set('radius', $radius);
			$this->db->set('placetype', $placetype);
			$this->db->insert('place');
			$this->load->view(
			'addplace_page',array(
				'message' => 'Add Place successful.'
				)
			);
		}else{
			$this->load->view(
			'addplace_page',array(
				'message' => 'From validation error. please check again.'
				)
			);
		}
	}
}