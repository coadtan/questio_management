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
		$this->db->join('questtype','quest.questtypeid = questtype.questtypeid','left');
		$this->db->join('zone','quest.zoneid = zone.zoneid','left');
		$this->db->join('difficulty','quest.diffid = difficulty.diffid','left');
		$this->db->join('rewards','quest.rewardid = rewards.rewardid','left');
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
		$this->db->select('questid, questname, typename');
		$this->db->from('Quest');
		$this->db->join('questtype','quest.questtypeid = questtype.questtypeid','left');
		$this->db->where('zoneid',$zoneid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questid = $row['questid'];
				$questname = $row['questname'];
				$typename = $row['typename'];
				$quests[$i++] = 
					array(
						'questid'=>$questid,
						'questname'=>$questname,
						'typename'=>$typename
					);
			}
		}
		return $quests;
	}

	public function getQuestByQuest($questid){
	$quests = null;
		$this->db->select('questname, questdetails, typename, difftype, rewardname');
		$this->db->from('Quest');
		$this->db->join('QuestType','Quest.questtypeid = QuestType.questtypeid','left');
		$this->db->join('Zone','Quest.zoneid = Zone.zoneid','left');
		$this->db->join('Difficulty','Quest.diffid = Difficulty.diffid','left');
		$this->db->join('Rewards','Quest.rewardid = Rewards.rewardid','left');
		$this->db->where('questid',$questid);
		$this->db->order_by('questid','asc');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$quests = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$questname = $row['questname'];
				$questdetails = $row['questdetails'];
				$typename = $row['typename'];
				$difftype = $row['difftype'];
				$rewardname = $row['rewardname'];
				$quests[$i++] = 
					array(
						'questname'=>$questname,
						'questdetails'=>$questdetails,
						'typename'=>$typename,
						'difftype'=>$difftype,
						'rewardname'=>$rewardname,
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
	public function addquest_quiz($questid, $seqid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid){
		$quiz_obj = array(
			'questid' => $questid,
			'seqid' => $seqid,
			'question' => $question,
			'choicea' => $choicea,
			'choiceb' => $choiceb,
			'choicec' => $choicec,
			'choiced' => $choiced,
			'answerid' => $answerid
			);
		$this->db->trans_start();
		$this->db->insert('Quiz',$quiz_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function addquest_riddle($riddetails, $qrcode, $sensorid, $scanlimit, $hint1, $hint2, $hint3){
		$riddle_obj = array(
			'riddetails' => $riddetails,
			'qrcode' => $qrcode,
			'sensorid' => $sensorid,
			'scanlimit' => $scanlimit,
			'hint1' => $hint1,
			'hint2' => $hint2,
			'hint3' => $hint3
			);
		$this->db->trans_start();
		$this->db->insert('Riddle',$riddle_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function addquest_puzzle($imageurl, $helperanswer, $correctanswer){
				$puzzle_obj = array(
			'imageurl' => $imageurl,
			'helperanswer' => $helperanswer,
			'correctanswer' => $correctanswer
			);
		$this->db->trans_start();
		$this->db->insert('PicturePuzzle',$puzzle_obj);
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
		}else{
			echo "No data in query at 'getquesttypedata'";
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
		}else{
			echo "No data in query at 'getdifficulty'";
		}
		return $difficulty;
	}

	public function getquestid(){
		$questid = null;
		$this->db->select_max('questid', 'currentid');
		$this->db->from('Quest');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$questid = $row['currentid'];
		}else{
			echo "No data in query at 'getquestid'";
		}
		return $questid;
	}
	public function getqrcode(){
		$qrcode = null;
		$this->db->select_max('qrcode', 'currentqr');
		$this->db->from('Riddle');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$qrcode = $row['currentqr'];
			$qrcode++;
		}else{
			echo "No data in query at 'getqrcode'";
		}
		return $qrcode;
	}

	public function getsensorid(){
		$sensorid = null;
		$this->db->select_max('sensorid', 'currentsensor');
		$this->db->from('Riddle');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$row = $query->row_array();
			$sensorid = $row['currentsensor'];
			$sensorid++;
		}else{
			echo "No data in query at 'getsensorid'";
		}
		return $sensorid;
	}	

}