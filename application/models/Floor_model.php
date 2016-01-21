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
		$this->db->insert('Floor',$floor_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getfloordata($keeperid){
		$floor = null;
		$this->db->select('placeid');
		$this->db->from('management');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('buildingid');
		$this->db->from('management');
		$this->db->where_in('placeid',$subquery);
		$subquery2 = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('Floor');
		$this->db->where_in('buildingid',$subquery2);
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

	public function getqrcode(){
		$qrcode = null;
		$this->db->select_max('qrcode', 'currentqr');
		$this->db->from('Floor');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$qrcode = $row['currentqr'];
				$qrcode++;
			}
		}else{
			echo "No data in query at 'getqrcode'";
		}
		return $qrcode;
	}

	public function getsensorid(){
		$sensorid = null;
		$this->db->select_max('sensorid', 'currentsensor');
		$this->db->from('Floor');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$sensorid = $row['currentsensor'];
				$sensorid++;
			}
		}else{
			echo "No data in query at 'getsensorid'";
		}
		return $sensorid;
	}

	public function showFloorManagement($buildingid){
		$floor = null;
		$this->db->select('floorid, floorname, imageurl');
		$this->db->from('Floor');
		$this->db->where('buildingid',$buildingid);
		$this->db->order_by('floorid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$floor = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$floorid = $row['floorid'];
				$floorname = $row['floorname'];
				$imageurl = $row['imageurl'];
				$floor[$i++] =
					array(
						'floorid'=>$floorid,
						'floorname'=>$floorname,
						'imageurl'=>$imageurl
					);
			}
		}
		return $floor;
	}
	public function updateFloor($floorid, $buildingid, $floorname,$imageurl){
		$floor_object = array(
			'buildingid'=>$buildingid,
			'floorname'=>$floorname,
			'imageurl'=>$imageurl
		);
		$this->db->trans_start();
		$this->db->where('floorid', $floorid);
		$this->db->update('Floor', $floor_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function deleteFloor($floorid){
		$this->db->trans_start();
		$this->db->where('floorid', $floorid);
		$this->db->delete('Floor');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function getFloorFromId($floorid){
		$floor = null;
		$this->db->select('*');
		$this->db->from('Floor');
		$this->db->where('floorid',$floorid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$buildingid = $row['buildingid'];
			$floorname = $row['floorname'];
			$imageurl = $row['imageurl'];
			$floor =
				array(
					'floorid'=>$floorid,
					'buildingid'=>$buildingid,
					'floorname'=>$floorname,
					'imageurl'=>$imageurl
				);
			}
		return $floor;
	}

}
