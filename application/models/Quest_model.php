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
		$this->db->select('questid, questname, typename, zonename, difftype, rewardname');
		$this->db->from('Quest');
		$this->db->join('QuestType','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('Zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('Difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('Rewards','quest.rewardid = rewards.rewardid','left');
		$this->db->order_by('questid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questid = $row['questid'];
				$questname = $row['questname'];
				$typename = $row['typename'];
				$zonename = $row['zonename'];
				$difftype = $row['difftype'];
				$rewardname = $row['rewardname'];
				$quests[$i++] =
					array(
						'questno'=>$i,
						'questid'=>$questid,
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
		$this->db->from('Quest');
		$this->db->join('QuestType','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('Zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('Difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('Rewards','quest.rewardid = rewards.rewardid','left');
		$this->db->like('questname',$namepart);
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

	public function getQuestByZone($zoneid){
		$quests = null;
		$this->db->select('questid, questname, questdetails, typename, zonename, difftype, rewardname');
		$this->db->from('Quest');
		$this->db->join('QuestType','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('Zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('Difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('Rewards','quest.rewardid = rewards.rewardid','left');
		$this->db->where('Quest.zoneid',$zoneid);
		$this->db->order_by('questid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questid = $row['questid'];
				$questname = $row['questname'];
				$questdetails = $row['questdetails'];
				$typename = $row['typename'];
				$zonename = $row['zonename'];
				$difftype = $row['difftype'];
				$rewardname = $row['rewardname'];
				$quests[$i++] =
					array(
						'questid'=>$questid,
						'questname'=>$questname,
						'questdetails'=>$questdetails,
						'typename'=>$typename,
						'zonename'=>$zonename,
						'difftype'=>$difftype,
						'rewardname'=>$rewardname
					);
			}
		}
		return $quests;
	}

	public function addquest($questname, $questdetails, $questtypeid, $zoneid, $diffid, $rewardid){
		$quest_obj = array(
			'questname' => $questname,
			'questdetails' => $questdetails,
			'questtypeid' => $questtypeid,
			'zoneid' => $zoneid,
			'diffid' => $diffid,
			'rewardid' => $rewardid
			);
		$this->db->trans_start();
		$this->db->insert('Quest',$quest_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function getquesttypedata(){
		$questtype = null;
		$this->db->select('*');
		$this->db->from('QuestType');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$questtype[$row['questtypeid']] = $row['typename'];
			}
		}
		return $questtype;
	}
	public function getdifficulty(){
		$difficulty = null;
		$this->db->select('*');
		$this->db->from('Difficulty');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			foreach($query->result_array() as $row){
				$difficulty[$row['diffid']] = $row['difftype'];
			}
		}
		return $difficulty;
	}

	public function getZoneIdByQuestId($questid){
		$zoneid = null;
		$this->db->select('zoneid');
		$this->db->from('Quest');
		$this->db->where('questid',$questid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$zoneid = $row['zoneid'];
		}
		return $zoneid;
	}

	public function updateQuest($questid, $questname, $questdetails, $diffid, $rewardid){
        $quest_obj = array(
            'questname' => $questname,
            'questdetails' => $questdetails,
            'diffid' => $diffid,
            'rewardid' => $rewardid
        );
        $this->db->trans_start();
        $this->db->where('questid', $questid);
        $this->db->update('Quest', $quest_obj);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    public function getQuestFromQuestId($questid){
		$quests = null;
		$this->db->select('*');
		$this->db->from('Quest');
		$this->db->where('questid',$questid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			foreach($query->result_array() as $row){
				$questid = $row['questid'];
				$questname = $row['questname'];
				$questdetails = $row['questdetails'];
				$questtypeid = $row['questtypeid'];
				$diffid = $row['diffid'];
				$rewardid = $row['rewardid'];
				$quests =
					array(
						'questid'=>$questid,
						'questname'=>$questname,
						'questdetails'=>$questdetails,
						'questtypeid'=>$questtypeid,
						'diffid'=>$diffid,
						'rewardid'=>$rewardid
					);
			}
		}
		return $quests;
	}

}
