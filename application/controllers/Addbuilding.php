<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbuilding extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Keeper_model');
	}

	public function index(){
		$placedata = $this->getplacedata();
		$this->load->view(
			'addbuilding_page',array(
				'message' => "",
				'placedata' => $placedata
			)
		);
	}

	public function addbuildingcheck(){
		$placedata = $this->getplacedata();
		$placeid = $_POST['placeid'];
		$buildingname = $_POST['buildingname'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$radius = $_POST['radius'];

		$this->form_validation->set_rules('buildingname', 'buildingname', 'required|max_length[140]');
		$this->form_validation->set_rules('latitude', 'latitude', 'required|numeric');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|numeric');
		$this->form_validation->set_rules('radius', 'radius', 'required|numeric');
	
		if ($this->form_validation->run()==TRUE){
			$this->db->set('placeid', $placeid);
			$this->db->set('buildingname', $buildingname);
			$this->db->set('latitude', $latitude);
			$this->db->set('longitude', $longitude);
			$this->db->set('radius', $radius);
			$this->db->insert('building');
			$this->load->view(
			'addbuilding_page',array(
				'message' => 'Add building successful.',
				'placedata' => $placedata
				)
			);
		}else{
			$this->load->view(
			'addbuilding_page',array(
				'message' => 'From validation error. please check again.',
				'placedata' => $placedata
				)
			);
		}
	}

	function getplacedata(){
		$places = null;
		$this->db->select('*');
		$this->db->from('place');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			foreach($query->result_array() as $row){
				$places[$row['placeid']] = $row['placename'];
			}
		}else{
			echo "No data in query at 'getplacedata'";
		}
		return $places;
	}
}