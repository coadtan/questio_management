<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Place_model extends CI_Model{
	private $placeid;
	private $placename;
	private $placefullname;
	private $qrcode;
	private $sensorid;
	private $latitude;
	private $longitude;
	private $radius;
	private $placetype;
	private $imageurl;
	private $enter_rewardid;
	private $rewardid;

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function set_placeid($placeid){
		$this->placeid = $placeid;
	}
	public function set_placename($placename){
		$this->placename = $placename;
	}
	public function set_placefullname($placefullname){
		$this->placefullname = $placefullname;
	}
	public function set_qrcode($qrcode){
		$this->qrcode = $qrcode;
	}
	public function set_sensorid($sensorid){
		$this->sensorid = $sensorid;
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
	public function set_placetype($placetype){
		$this->placetype = $placetype;
	}
	public function set_imageurl($imageurl){
		$this->imageurl = $imageurl;
	}
	public function set_enter_rewardid($enter_rewardid){
		$this->enter_rewardid = $enter_rewardid;
	}
	public function set_rewardid($rewardid){
		$this->rewardid = $rewardid;
	}
	public function get_placeid(){
		return $this->placeid;
	}
	public function get_placename(){
		return $this->placename;
	}
	public function get_placefullname(){
		return $this->placefullname;
	}
	public function get_qrcode(){
		return $this->qrcode;
	}
	public function get_sensorid(){
		return $this->sensorid;
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
	public function get_placetype(){
		return $this->placetype;
	}
	public function get_imageurl(){
		return $this->imageurl;
	}
	public function get_enter_rewardid(){
		return $this->enter_rewardid;
	}
	public function get_rewardid(){
		return $this->rewardid;
	}
	public function addplace($placename, $placefullname, $qrcode, $sensorid, $latitude, $longitude, $radius, $placetype, $imageurl, $enter_rewardid, $rewardid){
		$place_obj = array(
			'placename' => $placename,
			'placefullname' => $placefullname,
			'qrcode' => $qrcode,
			'sensorid' => $sensorid,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'radius' => $radius,
			'placetype' => $placetype,
			'imageurl' => $imageurl,
			'enter_rewardid' => $enter_rewardid,
			'rewardid' => $rewardid
			);
		$this->db->trans_start();
		$this->db->insert('place',$place_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$session_data = $this->session->userdata('logged_in');
			$keeperid = $session_data['keeperid'];
			if($this->addmanagement($keeperid, $this->getplaceid(), 1) === TRUE){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
    			return false;
			}

			
			
		}
	}
	public function getplacedata($keeperid){
		$places = null;
		$this->db->select('*');
		$this->db->from('place');
		$this->db->where('placeid IN (SELECT placeid FROM management WHERE keeperid = '.$keeperid.')');
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

	public function addmanagement($keeperid, $placeid, $roleid){
		$management_obj = array(
			'keeperid' => $keeperid,
			'placeid' => $placeid,
			'roleid' => $roleid
			);
		$this->db->trans_start();
		$this->db->insert('management',$management_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function getplaceid(){
		$placeid = null;
		$this->db->select_max('placeid', 'currentid');
		$this->db->from('place');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$placeid = $row['currentid'];
			}
		}else{
			echo "No data in query at 'getplaceid'";
		}
		return $placeid;
	}

	public function getqrcode(){
		$qrcode = null;
		$this->db->select_max('qrcode', 'currentqr');
		$this->db->from('place');
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
		$this->db->from('place');
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

}