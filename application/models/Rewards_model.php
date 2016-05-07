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
		$this->db->select('rewardid, rewardname, description, rewardtypename');
		$this->db->from('Rewards');
		$this->db->join('RewardType','RewardType.rewardtypeid = Rewards.rewardtype');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$rewardid = $row['rewardid'];
				$rewardname = $row['rewardname'];
				$description = $row['description'];
				$rewardtypename = $row['rewardtypename'];
				$rewards[$i++] =
					array(
						'rewardno'=>$i,
						'rewardid'=>$rewardid,
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
		$this->db->from('Rewards');
		$this->db->join('RewardType','RewardType.rewardtypeid = Rewards.rewardtype');
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
	public function getRewardFromType($rewardtype,$keeperid){
		$rewards = null;
		$this->db->select('rewardid');
		$this->db->from('management_reward');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('rewardid, rewardname');
		$this->db->from('Rewards');
		$this->db->where('RewardType',$rewardtype);
		$this->db->where('rewardid IN ('.$subquery.')', null, false);
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
	public function addreward($rewardname, $description, $rewardtype, $rewardpic){
		$reward_obj = array(
			'rewardname' => $rewardname,
			'description' => $description,
			'rewardtype' => $rewardtype,
			'rewardpic' => $rewardpic
			);
		$this->db->trans_start();
		$this->db->insert('Rewards',$reward_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$session_data = $this->session->userdata('logged_in');
			$keeperid = $session_data['keeperid'];
			if($this->addmanagement($keeperid, $this->getrewardid()) === TRUE){
				$this->db->trans_commit();
				return true;
			}else{
				$this->db->trans_rollback();
    			return false;
			}
		}
	}
	public function getrewardtype(){
		$position = null;
		$this->db->select('*');
		$this->db->from('RewardType');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$position[$row['rewardtypeid']] = $row['rewardtypename'];
			}
		}else{
			echo "No data in query at 'getrewardtype'";
		}
		return $position;
	}
	public function addmanagement($keeperid, $rewardid){
		$management_obj = array(
			'keeperid' => $keeperid,
			'rewardid' => $rewardid
			);
		$this->db->trans_start();
		$this->db->insert('management_reward',$management_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getrewardid(){
		$rewardid = null;
		$this->db->select_max('rewardid', 'currentid');
		$this->db->from('Rewards');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$rewardid = $row['currentid'];
		}else{
			echo "No data in query at 'getrewardid'";
		}
		return $rewardid;
	}
	public function getRewardFromKeeperId($keeperid){
		$rewards = null;
		$this->db->select('rewardid');
		$this->db->from('management_reward');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('Rewards');
		$this->db->join('RewardType','RewardType.rewardtypeid = Rewards.rewardtype');
		$this->db->where('rewardid IN ('.$subquery.')', null, false);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$rewardid = $row['rewardid'];
				$rewardname = $row['rewardname'];
				$description = $row['description'];
				$rewardtypename = $row['rewardtypename'];
				$rewardpic = $row['rewardpic'];
				$rewards[$i++] =
					array(
						'rewardid'=>$rewardid,
						'rewardname'=>$rewardname,
						'description'=>$description,
						'rewardtypename'=>$rewardtypename,
						'rewardpic'=>$rewardpic
					);
			}
		}
		return $rewards;
	}

	public function updateReward($rewardid, $rewardname, $description, $rewardtype, $rewardpic){
		$reward_obj = array(
			'rewardname' => $rewardname,
			'description' => $description,
			'rewardtype' => $rewardtype,
			'rewardpic' => $rewardpic
		);
		$this->db->trans_start();
		$this->db->where('rewardid', $rewardid);
		$this->db->update('Rewards', $reward_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function getRewardFromRewardId($rewardid){
		$rewards = null;
		$this->db->select('*');
		$this->db->from('Rewards');
		$this->db->where('rewardid',$rewardid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$rewards = array();
			foreach($query->result_array() as $row){
				$rewardid = $row['rewardid'];
				$rewardname = $row['rewardname'];
				$description = $row['description'];
				$rewardtype = $row['rewardtype'];
				$rewardpic = $row['rewardpic'];
				$rewards =
					array(
						'rewardid'=>$rewardid,
						'rewardname'=>$rewardname,
						'description'=>$description,
						'rewardtype'=>$rewardtype,
						'rewardpic'=>$rewardpic
					);
			}
		}
		return $rewards;
	}
}
