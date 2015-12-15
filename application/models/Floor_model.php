<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Floor_model extends CI_Model{
	private $floorid;
	private $buildingid;
	private $floorname;
	private $imageurl;
	private $qrcode;
	private $sensorid;

	public function __construct(){
		parent::__construct();
	}
	public function set_floorid($floorid){
		$this->floorid = $floorid;
	}
	public function set_buildingid($buildingid){
		$this->buildingid = $buildingid;
	}
	public function set_floorname($floorname){
		$this->floorname = $floorname;
	}
	public function set_imageurl($imageurl){
		$this->imageurl = $imageurl;
	}
	public function set_qrcode($qrcode){
		$this->qrcode = $qrcode;
	}
	public function set_sensorid($sensorid){
		$this->sensorid = $sensorid;
	}
	public function get_floorid(){
		return $this->floorid;
	}
	public function get_buildingid(){
		return $this->buildingid;
	}
	public function get_floorname(){
		return $this->floorname;
	}
	public function get_imageurl(){
		return $this->imageurl;
	}
	public function get_qrcode(){
		return $this->qrcode;
	}
	public function get_sensorid(){
		return $this->sensorid;
	}
	public function addfloor($buildingid, $floorname, $imageurl, $qrcode, $sensorid){
		$floor_obj = array(
			'buildingid' => $buildingid,
			'floorname' => $floorname,
			'imageurl' => $imageurl,
			'qrcode' => $qrcode,
			'sensorid' => $sensorid
			);
		$this->db->trans_start();
		$this->db->insert('floor',$floor_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getfloordata(){
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

}