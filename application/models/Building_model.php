<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Building_model extends CI_Model{
	private $buildingid;
	private $placeid;
	private $buildingname;
	private $latitude;
	private $longitude;
	private $radius;
	private $imageurl;

	public function __construct(){
		parent::__construct();
	}
	public function set_buildingid($buildingid){
		$this->buildingid = $buildingid;
	}
	public function set_placeid($placeid){
		$this->placeid = $placeid;
	}
	public function set_buildingname($buildingname){
		$this->buildingname = $buildingname;
	}
	public function set_latitude($latitude){
		$this->latitude = $latitude;
	}
	public function set_longitude($longitude){
		$this->longitude = $longitude;
	}
	public function set_radius($radius){
		$this->radius = $radius;
	}
	public function set_imageurl($imageurl){
		$this->imageurl = $imageurl;
	}
	public function get_buildingid(){
		return $this->buildingid;
	}
	public function get_placeid(){
		return $this->placeid;
	}
	public function get_buildingname(){
		return $this->buildingname;
	}
	public function get_latitude(){
		return $this->latitude;
	}
	public function get_longitude(){
		return $this->longitude;
	}
	public function get_radius(){
		return $this->radius;
	}
	public function get_imageurl(){
		return $this->imageurl;
	}
	public function addbuilding($placeid, $buildingname, $latitude, $longitude, $radius, $imageurl){
		$building_obj = array(
			'placeid' => $placeid,
			'buildingname' => $buildingname,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'radius' => $radius,
			'imageurl' => $imageurl
			);
		$this->db->trans_start();
		$this->db->insert('Building',$building_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getbuildingdata($keeperid){
		$buildings = null;
		$this->db->select('placeid');
		$this->db->from('management');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('Building');
		$this->db->where('placeid IN ('.$subquery.')', null, false);
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
	public function showBuildingManagement($placeid){
		$building = null;
		$this->db->select('buildingid, buildingname, imageurl');
		$this->db->from('Building');
		$this->db->where('placeid',$placeid);
		$this->db->order_by('buildingid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$building = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$buildingid = $row['buildingid'];
				$buildingname = $row['buildingname'];
				$imageurl = $row['imageurl'];
				$building[$i++] =
					array(
						'buildingid'=>$buildingid,
						'buildingname'=>$buildingname,
						'imageurl'=>$imageurl
					);
			}
		}
		return $building;
	}
	public function updateBuilding($buildingid,$placeid,$buildingname,$latitude,$longitude,$radius,$imageurl){
		$building_object = array(
			'placeid'=>$placeid,
			'buildingname'=>$buildingname,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'radius'=>$radius,
			'imageurl'=>$imageurl
		);
		$this->db->trans_start();
		$this->db->where('buildingid', $buildingid);
		$this->db->update('Building', $building_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function deleteBuilding($buildingid){
		$this->db->trans_start();
		$this->db->where('buildingid', $buildingid);
		$this->db->delete('Building');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getBuildingFromId($buildingid){
		$building = null;
		$this->db->select('*');
		$this->db->from('Building');
		$this->db->where('Buildingid',$buildingid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$placeid = $row['placeid'];
			$buildingname = $row['buildingname'];
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$radius = $row['radius'];
			$imageurl = $row['imageurl'];
			$building =
				array(
					'buildingid'=>$buildingid,
					'placeid'=>$placeid,
					'buildingname'=>$buildingname,
					'latitude'=>$latitude,
					'longitude'=>$longitude,
					'radius'=>$radius,
					'imageurl'=>$imageurl
				);
			}
			return $building;
		}
		
	

}
