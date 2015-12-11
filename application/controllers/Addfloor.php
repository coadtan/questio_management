<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfloor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Keeper_model');
	}

	public function index(){
		$buildingdata = $this->getbuildingdata();
		$this->load->view(
			'addfloor_page',array(
				'message' => "",
				'buildingdata' => $buildingdata
			)
		);
	}

	public function addfloorcheck(){
		$buildingdata = $this->getbuildingdata();
		$buildingid = $_POST['buildingid'];
		$floorname = $_POST['floorname'];

		$this->form_validation->set_rules('floorname', 'floorname', 'required|max_length[100]');
	
		if ($this->form_validation->run()==TRUE){
			$this->db->set('buildingid', $buildingid);
			$this->db->set('floorname', $floorname);
			$this->db->insert('floor');
			$this->load->view(
			'addfloor_page',array(
				'message' => 'Add floor successful.',
				'buildingdata' => $buildingdata
				)
			);
		}else{
			$this->load->view(
			'addfloor_page',array(
				'message' => 'From validation error. please check again.',
				'buildingdata' => $buildingdata
				)
			);
		}
	}

	function getbuildingdata(){
		$buildings = null;
		$this->db->select('*');
		$this->db->from('building');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			foreach($query->result_array() as $row){
				$buildings[$row['buildingid']] = $row['buildingname'];
			}
		}else{
			echo "No data in query at 'getbuildingdata'";
		}
		return $buildings;
	}
}