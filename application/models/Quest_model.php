<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quest_model extends CI_Model{
	private $questid;
	private $questname;
	private $questdetails;
	private $questtypeid;
	private $zoneid;
	private $diffid;
	private $rewardid;

	public function __construct(){
		parent::__construct();
	}
	public function set_questid($questid){
		$this->questid = $questid;
	}
	public function set_questname($questname){
		$this->questname = $questname;
	}
	public function set_questdetails($questdetails){
		$this->questdetails = $questdetails;
	}
	public function set_questtypeid($questtypeid){
		$this->questtypeid = $questtypeid;
	}
	public function set_zoneid($zoneid){
		$this->zoneid = $zoneid;
	}
	public function set_diffid($diffid){
		$this->diffid = $diffid;
	}
	public function set_rewardid($rewardid){
		$this->rewardid = $rewardid;
	}
	public function get_questid(){
		return $this->questid;
	}
	public function get_questname(){
		return $this->questname;
	}
	public function get_questdetails(){
		return $this->questdetails;
	}
	public function get_questtypeid(){
		return $this->questtypeid;
	}
	public function get_zoneid(){
		return $this->zoneid;
	}
	public function get_diffid(){
		return $this->diffid;
	}
	public function get_rewardid(){
		return $this->rewardid;
	}
	public function getallquest(){
		$quests = null;
		$this->db->select('questname, typename, zonename, difftype, rewardname');
		$this->db->from('quest');
		$this->db->join('questtype','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('rewards','quest.rewardid = rewards.rewardid','left');
		$this->db->order_by('questid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questname = $row['questname'];
				$typename = $row['typename'];
				$zonename = $row['zonename'];
				$difftype = $row['difftype'];
				$rewardname = $row['rewardname'];
				$quests[$i++] = 
					array(
						'questno'=>$i,
						'questname'=>$questname,
						'typename'=>$typename,
						'zonename'=>$zonename,
						'difftype'=>$difftype,
						'rewardname'=>$rewardname,
					);
			}
		}
		return $quests;
	}
	public function searchquest($namepart){
		$quests = null;
		$this->db->select('questname, typename, zonename, difftype, rewardname');
		$this->db->from('quest');
		$this->db->join('questtype','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('rewards','quest.rewardid = rewards.rewardid','left');
		$this->db->like('questname',$namepart);
		$this->db->order_by('questid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questname = $row['questname'];
				$typename = $row['typename'];
				$zonename = $row['zonename'];
				$difftype = $row['difftype'];
				$rewardname = $row['rewardname'];
				$quests[$i++] = 
					array(
						'questno'=>$i,
						'questname'=>$questname,
						'typename'=>$typename,
						'zonename'=>$zonename,
						'difftype'=>$difftype,
						'rewardname'=>$rewardname,
					);
			}
		}
		return $quests;
	}
}