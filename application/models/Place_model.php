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
		$this->db->insert('Place',$place_obj);
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
		$this->db->select('placeid');
		$this->db->from('management');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('Place');
		$this->db->where('placeid IN ('.$subquery.')', null, false);
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
		$this->db->from('Place');
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
		$this->db->from('Place');
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
		$this->db->from('Place');
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
	public function getallplace(){
		$places = null;
		$this->db->select('placename, placefullname, latitude, longitude, radius, placetype');
		$this->db->from('Place');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$placename = $row['placename'];
				$placefullname = $row['placefullname'];
				$latitude = $row['latitude'];
				$longitude = $row['longitude'];
				$radius = $row['radius'];
				$placetype = $row['placetype'];
				$places[$i++] =
					array(
						'placeno'=>$i,
						'placename'=>$placename,
						'placefullname'=>$placefullname,
						'latitude'=>$latitude,
						'longitude'=>$longitude,
						'radius'=>$radius,
						'placetype'=>$placetype
					);
			}
		}
		return $places;
	}
	public function getenterreward(){
		$enterrewards = null;
		$this->db->select('rewardname AS enter_rewardname');
		$this->db->from('Place');
		$this->db->join('rewards','place.enter_rewardid = rewards.rewardid', 'left');
		$this->db->order_by('placeid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$enterrewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$enter_rewardname = $row['enter_rewardname'];
				$enterrewards[$i++] = $enter_rewardname;
			}
		}
		return $enterrewards;
	}
	public function getplacereward(){
		$placerewards = null;
		$this->db->select('rewardname AS place_rewardname');
		$this->db->from('Place');
		$this->db->join('rewards','place.rewardid = rewards.rewardid', 'left');
		$this->db->order_by('placeid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$placerewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$place_rewardname = $row['place_rewardname'];
				$placerewards[$i++] = $place_rewardname;
			}
		}
		return $placerewards;
	}
	public function searchplace($namepart){
		$places = null;
		$this->db->select('placename, placefullname, latitude, longitude, radius, placetype');
		$this->db->from('Place');
		$this->db->like('placename',$namepart);
		$this->db->or_like('placefullname',$namepart);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$placename = $row['placename'];
				$placefullname = $row['placefullname'];
				$latitude = $row['latitude'];
				$longitude = $row['longitude'];
				$radius = $row['radius'];
				$placetype = $row['placetype'];
				$places[$i++] =
					array(
						'placeno'=>$i,
						'placename'=>$placename,
						'placefullname'=>$placefullname,
						'latitude'=>$latitude,
						'longitude'=>$longitude,
						'radius'=>$radius,
						'placetype'=>$placetype
					);
			}
		}
		return $places;
	}
	public function searchenterreward($namepart){
		$enterrewards = null;
		$this->db->select('rewardname AS enter_rewardname');
		$this->db->from('Place');
		$this->db->join('rewards','place.enter_rewardid = rewards.rewardid', 'left');
		$this->db->like('placename',$namepart);
		$this->db->or_like('placefullname',$namepart);
		$this->db->order_by('placeid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$enterrewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$enter_rewardname = $row['enter_rewardname'];
				$enterrewards[$i++] = $enter_rewardname;
			}
		}
		return $enterrewards;
	}
	public function searchplacereward($namepart){
		$placerewards = null;
		$this->db->select('rewardname AS place_rewardname');
		$this->db->from('Place');
		$this->db->join('rewards','place.rewardid = rewards.rewardid', 'left');
		$this->db->like('placename',$namepart);
		$this->db->or_like('placefullname',$namepart);
		$this->db->order_by('placeid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$placerewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$place_rewardname = $row['place_rewardname'];
				$placerewards[$i++] = $place_rewardname;
			}
		}
		return $placerewards;
	}
	public function showPlaceManagement($keeperid){
		$places = null;
		$this->db->select('placeid');
		$this->db->from('management');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('placeid, placename, imageurl');
		$this->db->from('Place');
		$this->db->where('placeid IN ('.$subquery.')', null, false);
		$this->db->order_by('placeid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$places = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$placeid = $row['placeid'];
				$placename = $row['placename'];
				$imageurl = $row['imageurl'];
				$places[$i++] =
					array(
						'placeid'=>$placeid,
						'placename'=>$placename,
						'imageurl'=>$imageurl
					);
			}
		}
		return $places;
	}
	public function updatePlace($placeid, $placename, $placefullname, $latitude ,$longitude ,$radius, $placetype, $imageurl, $enter_rewardid, $rewardid){
		$place_object = array(
			'placename'=>$placename,
			'placefullname'=>$placefullname,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'radius'=>$radius,
			'placetype'=>$placetype,
			'imageurl'=>$imageurl,
			'enter_rewardid'=>$enter_rewardid,
			'rewardid'=>$rewardid
		);
		$this->db->trans_start();
		$this->db->where('placeid', $placeid);
		$this->db->update('Place', $place_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function deletePlace($placeid){
		$this->db->trans_start();
		$this->db->where('placeid', $placeid);
		$this->db->delete('Place');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getPlaceById($placeid){
		$places = null;
		$this->db->select('*');
		$this->db->from('Place');
		$this->db->where('placeid', $placeid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$placename = $row['placename'];
			$placefullname = $row['placefullname'];
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$radius = $row['radius'];
			$placetype = $row['placetype'];
			$imageurl = $row['imageurl'];
			$enter_rewardid = $row['enter_rewardid'];
			$rewardid = $row['rewardid'];
			$places =
				array(
					'placeid'=>$placeid,
					'placename'=>$placename,
					'placefullname'=>$placefullname,
					'latitude'=>$latitude,
					'longitude'=>$longitude,
					'radius'=>$radius,
					'placetype'=>$placetype,
					'imageurl'=>$imageurl,
					'enter_rewardid'=>$enter_rewardid,
					'rewardid'=>$rewardid
				);
			}
			return $places;
		}
		

}
