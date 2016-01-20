<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rewards_model extends CI_Model{
	private $rewardid;
	private $rewardname;
	private $description;
	private $rewardtype;
	private $rewardpic;

	public function __construct(){
		parent::__construct();
	}
	public function set_rewardid($rewardid){
		$this->rewardid = $rewardid;
	}
	public function set_rewardname($rewardname){
		$this->rewardname = $rewardname;
	}
	public function set_description($description){
		$this->description = $description;
	}
	public function set_rewardtype($rewardtype){
		$this->rewardtype = $rewardtype;
	}
	public function set_rewardpic($rewardpic){
		$this->rewardpic = $rewardpic;
	}
	public function get_rewardid(){
		return $this->rewardid;
	}
	public function get_rewardname(){
		return $this->rewardname;
	}
	public function get_description(){
		return $this->description;
	}
	public function get_rewardtype(){
		return $this->rewardtype;
	}
	public function get_rewardpic(){
		return $this->rewardpic;
	}
	public function getallrewards(){
		$rewards = null;
		$this->db->select('rewardname, description, rewardtypename');
		$this->db->from('rewards');
		$this->db->join('rewardtype','rewardtype.rewardtypeid = rewards.rewardtype');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$rewardname = $row['rewardname'];
				$description = $row['description'];
				$rewardtypename = $row['rewardtypename'];
				$rewards[$i++] = 
					array(
						'rewardno'=>$i,
						'rewardname'=>$rewardname,
						'description'=>$description,
						'rewardtypename'=>$rewardtypename
					);
			}
		}
		return $rewards;
	}
	public function searchrewards($namepart){
		$rewards = null;
		$this->db->select('rewardname, description, rewardtypename');
		$this->db->from('rewards');
		$this->db->join('rewardtype','rewardtype.rewardtypeid = rewards.rewardtype');
		$this->db->like('rewardname',$namepart);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$rewardname = $row['rewardname'];
				$description = $row['description'];
				$rewardtypename = $row['rewardtypename'];
				$rewards[$i++] = 
					array(
						'rewardno'=>$i,
						'rewardname'=>$rewardname,
						'description'=>$description,
						'rewardtypename'=>$rewardtypename
					);
			}
		}
		return $rewards;
	}
	public function getRewardFromType($rewardtype){
		$rewards = null;
		$this->db->select('rewardid, rewardname');
		$this->db->from('rewards');
		$this->db->where('rewardtype',$rewardtype);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			$rewards[0] = null;
			$i = 1;
			foreach($query->result_array() as $row){
				$rewardid = $row['rewardid'];
				$rewardname = $row['rewardname'];
				$rewards[$rewardid] = $rewardname;
			}
		}
		return $rewards;
	}
}