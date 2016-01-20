<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zone_model extends CI_Model{
	private $zoneid;
	private $floorid;
	private $zonetypeid;
	private $zonename;
	private $zonedetails;
	private $qrcode;
	private $sensorid;
	private $imageurl;
	private $minimapurl;
	private $itemid;
	private $rewardid;

	public function __construct(){
		parent::__construct();
	}
	public function set_zoneid($zoneid){
		$this->zoneid = $zoneid;
	}
	public function set_floorid($floorid){
		$this->floorid = $floorid;
	}
	public function set_zonetypeid($zonetypeid){
		$this->zonetypeid = $zonetypeid;
	}
	public function set_zonename($zonename){
		$this->zonename = $zonename;
	}
	public function set_zonedetails($zonedetails){
		$this->zonedetails = $zonedetails;
	}
	public function set_qrcode($qrcode){
		$this->qrcode = $qrcode;
	}
	public function set_sensorid($sensorid){
		$this->sensorid = $sensorid;
	}
	public function set_imageurl($imageurl){
		$this->imageurl = $imageurl;
	}
	public function set_minimapurl($minimapurl){
		$this->minimapurl = $minimapurl;
	}
	public function set_itemid($itemid){
		$this->itemid = $itemid;
	}
	public function set_rewardid($rewardid){
		$this->rewardid = $rewardid;
	}
	public function get_zoneid(){
		return $this->zoneid;
	}
	public function get_floorid(){
		return $this->floorid;
	}
	public function get_zonetypeid(){
		return $this->zonetypeid;
	}
	public function get_zonename(){
		return $this->zonename;
	}
	public function get_zonedetails(){
		return $this->zonedetails;
	}
	public function get_qrcode(){
		return $this->qrcode;
	}
	public function get_sensorid(){
		return $this->sensorid;
	}
	public function get_imageurl(){
		return $this->imageurl;
	}
	public function get_minimapurl(){
		return $this->minimapurl;
	}
	public function get_itemid(){
		return $this->itemid;
	}
	public function get_rewardid(){
		return $this->rewardid;
	}
	public function addzone($floorid, $zonetypeid, $zonename, $zonedetails, $qrcode, $sensorid, $imageurl, $minimapurl, $itemid, $rewardid){
		$zone_obj = array(
			'floorid' => $floorid,
			'zonetypeid' => $zonetypeid,
			'zonename' => $zonename,
			'zonedetails' => $zonedetails,
			'qrcode' => $qrcode,
			'sensorid' => $sensorid,
			'imageurl' => $imageurl,
			'minimapurl' => $minimapurl,
			'itemid' => $itemid,
			'rewardid' => $rewardid
			);
		$this->db->trans_start();
		$this->db->insert('zone',$zone_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getzonetypedata(){
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

	public function getqrcode(){
		$qrcode = null;
		$this->db->select_max('qrcode', 'currentqr');
		$this->db->from('zone');
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
		$this->db->from('zone');
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

	public function showZoneManagement($floorid){
		$zone = null;
		$this->db->select('zoneid, zonename, imageurl');
		$this->db->from('zone');
		$this->db->where('floorid',$floorid);
		$this->db->order_by('zoneid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$zone = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$zoneid = $row['zoneid'];
				$zonename = $row['zonename'];
				$imageurl = $row['imageurl'];
				$zone[$i++] =
					array(
						'zoneid'=>$zoneid,
						'zonename'=>$zonename,
						'imageurl'=>$imageurl
					);
			}
		}
		return $zone;
	}
	public function updateZone($zoneid,$floorid,$zonetypeid,$zonename,$zonedetails,$imageurl,$minimapurl,$itemid,$rewardid){
		$zone_object = array(
			'floorid'=>$floorid,
			'zonetypeid'=>$zonetypeid,
			'zonename'=>$zonename,
			'zonedetails'=>$zonedetails,
			'imageurl'=>$imageurl,
			'minimapurl'=>$minimapurl,
			'itemid'=>$itemid,
			'rewardid'=>$rewardid
		);
		$this->db->trans_start();
		$this->db->where('zoneid', $zoneid);
		$this->db->update('zone', $zone_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function deleteZone($zoneid){
		$this->db->trans_start();
		$this->db->where('zoneid', $zoneid);
		$this->db->delete('zone');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getZoneFromId($zoneid){
		$zone = null;
		$this->db->select('*');
		$this->db->from('zone');
		$this->db->where('zoneid',$zoneid);
		$this->db->order_by('zoneid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$floorid = $row['floorid'];
			$zonetypeid = $row['zonetypeid'];
			$zonename = $row['zonename'];
			$zonedetails = $row['zonedetails'];
			$imageurl = $row['imageurl'];
			$minimapurl = $row['minimapurl'];
			$itemid = $row['itemid'];
			$rewardid = $row['rewardid'];
			$zone =
				array(
					'zoneid'=>$zoneid,
					'floorid'=>$floorid,
					'zonetypeid'=>$zonetypeid,
					'zonename'=>$zonename,
					'zonedetails'=>$zonedetails,
					'imageurl'=>$imageurl,
					'minimapurl'=>$minimapurl,
					'itemid'=>$itemid,
					'rewardid'=>$rewardid
				);
			
		}
		return $zone;
	}	
}
