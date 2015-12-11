<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addzone extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Keeper_model');
	}

	public function index(){
		$floordata = $this->getfloordata();
		$zonetypedata = $this->getzonetypedata();
		$this->load->view(
			'addzone_page',array(
				'message' => "",
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata
			)
		);
	}

	public function addzonecheck(){
		$floordata = $this->getfloordata();
		$zonetypedata = $this->getzonetypedata();
		$floorid = $_POST['floorid'];
		$zonename = $_POST['zonename'];
		$zonetype = $_POST['zonetype'];
		$zonedetails = $_POST['zonedetails'];

		$this->form_validation->set_rules('zonename', 'zonename', 'required|max_length[100]');
	
		if ($this->form_validation->run()==TRUE){
			$this->db->set('floorid', $floorid);
			$this->db->set('zonename', $zonename);
			$this->db->set('zonetypeid', $zonetype);
			$this->db->set('zonedetails', $zonedetails);
			$this->db->insert('zone');
			$this->load->view(
			'addzone_page',array(
				'message' => 'Add zone successful.',
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata
				)
			);
		}else{
			$this->load->view(
			'addzone_page',array(
				'message' => 'From validation error. please check again.',
				'floordata' => $floordata,
				'zonetypedata' => $zonetypedata
				)
			);
		}
	}

	function getfloordata(){
		$floor = null;
		$this->db->select('*');
		$this->db->from('floor');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			foreach($query->result_array() as $row){
				$floor[$row['floorid']] = $row['floorname'];
			}
		}else{
			echo "No data in query at 'getfloordata'";
		}
		return $floor;
	}

	function getzonetypedata(){
		$zonetype = null;
		$this->db->select('*');
		$this->db->from('zonetype');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			foreach($query->result_array() as $row){
				$zonetype[$row['zonetypeid']] = $row['typename'];
			}
		}else{
			echo "No data in query at 'getzonetypedata'";
		}
		return $zonetype;
	}
}