<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistics_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->helper('date');
    }

    public function getAdventurerCountByPlaceAndType($placeid, $type){
        $adventurercount = null;
        $this->db->select('count(adventurerid) as adventurercount');
        $this->db->from('PlaceEnterLog');
        $this->db->where('placeid',$placeid);
        if($type == 'd'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 30 DAY)');
            $this->db->group_by('day(enter_date)');
        }
        if($type == 'w'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 7 WEEK)');
            $this->db->group_by('week(enter_date)');
        }
        if($type == 'm'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 12 MONTH)');
            $this->db->group_by('month(enter_date)');
        }
        if($type == 'y'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 5 YEAR)');
            $this->db->group_by('year(enter_date)');
        }
        $this->db->order_by('enter_date','asc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $adventurercount[$i] = $row['adventurercount'];
                $i++;
            }
        }
        return $adventurercount;
    }
    public function getEnterDateByPlaceAndType($placeid, $type){
        $enterdate = null;
        $this->db->select('enter_date');
        $this->db->from('PlaceEnterLog');
        $this->db->where('placeid',$placeid);
        if($type == 'd'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 30 DAY)');
            $this->db->group_by('day(enter_date)');
        }
        if($type == 'w'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 7 WEEK)');
            $this->db->group_by('week(enter_date)');
        }
        if($type == 'm'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 12 MONTH)');
            $this->db->group_by('month(enter_date)');
        }
        if($type == 'y'){
            $this->db->where('enter_date > DATE_SUB(now(), INTERVAL 5 YEAR)');
            $this->db->group_by('year(enter_date)');
        }
        $this->db->order_by('enter_date','asc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $enterdate[$i] = unix_to_human(mysql_to_unix($row['enter_date']), TRUE, 'us');
                $i++;
            }
        }
        return $enterdate;
    }

    public function getCountQuestPlayedByPlaceId($placeid){
        $questcount = null;
        $this->db->select('buildingid');
        $this->db->from('Building');
        $this->db->where('placeid',$placeid);
        $subquery = $this->db->get_compiled_select();
        $this->db->select('floorid');
        $this->db->from('Floor');
        $this->db->where('buildingid IN ('.$subquery.')', null, false);
        $subquery2 = $this->db->get_compiled_select();
        $this->db->select('zoneid');
        $this->db->from('Zone');
        $this->db->where('floorid IN ('.$subquery2.')', null, false);
        $subquery3 = $this->db->get_compiled_select();
        $this->db->select('count(adventurerid) as questcount');
        $this->db->from('QuestProgress');
        $this->db->where('QuestProgress.zoneid IN ('.$subquery3.')', null, false);
        $this->db->where_in('statusid', array('3','4'));
        $this->db->group_by('questid');
        $this->db->order_by('count(adventurerid)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $questcount[$i] = $row['questcount'];
                $i++;
            }
        }
        return $questcount;
    }
    public function getQuestNamePlayedByPlaceId($placeid){
        $questname = null;
        $this->db->select('buildingid');
        $this->db->from('Building');
        $this->db->where('placeid',$placeid);
        $subquery = $this->db->get_compiled_select();
        $this->db->select('floorid');
        $this->db->from('Floor');
        $this->db->where('buildingid IN ('.$subquery.')', null, false);
        $subquery2 = $this->db->get_compiled_select();
        $this->db->select('zoneid');
        $this->db->from('Zone');
        $this->db->where('floorid IN ('.$subquery2.')', null, false);
        $subquery3 = $this->db->get_compiled_select();
        $this->db->select('questname');
        $this->db->from('QuestProgress');
        $this->db->join('Quest','Quest.questid=QuestProgress.questid');
        $this->db->where('QuestProgress.zoneid IN ('.$subquery3.')', null, false);
        $this->db->where_in('statusid', array('3','4'));
        $this->db->group_by('QuestProgress.questid');
        $this->db->order_by('count(adventurerid)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $questname[$i] = $row['questname'];
                $i++;
            }
        }
        return $questname;
    }
    //SELECT count(adventurerid) FROM explorerprogress WHERE isentered = 1 and placeid = 1 group by zoneid
    public function getExplorerCountByPlaceId($placeid){
        $explorercount = null;
        $this->db->select('count(adventurerid) as explorercount');
        $this->db->from('ExplorerProgress');
        $this->db->where('isentered','1');
        $this->db->where('placeid',$placeid);
        $this->db->group_by('zoneid');
        $this->db->order_by('count(adventurerid)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $explorercount[$i] = $row['explorercount'];
                $i++;
            }
        }
        return $explorercount;
    }
    public function getZoneNameByPlaceId($placeid){
        $zonename = null;
        $this->db->select('zonename');
        $this->db->from('ExplorerProgress');
        $this->db->join('Zone','Zone.zoneid=ExplorerProgress.zoneid');
        $this->db->where('isentered','1');
        $this->db->where('placeid',$placeid);
        $this->db->group_by('ExplorerProgress.zoneid');
        $this->db->order_by('count(adventurerid)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $zonename[$i] = $row['zonename'];
                $i++;
            }
        }
        return $zonename;
    }
    public function getAverageScoreByPlaceId($placeid){
        $averagescore = null;
        $this->db->select('buildingid');
        $this->db->from('Building');
        $this->db->where('placeid',$placeid);
        $subquery = $this->db->get_compiled_select();
        $this->db->select('floorid');
        $this->db->from('Floor');
        $this->db->where('buildingid IN ('.$subquery.')', null, false);
        $subquery2 = $this->db->get_compiled_select();
        $this->db->select('zoneid');
        $this->db->from('Zone');
        $this->db->where('floorid IN ('.$subquery2.')', null, false);
        $subquery3 = $this->db->get_compiled_select();
        $this->db->select_avg('score','averagescore');
        $this->db->from('QuestProgress');
        $this->db->where('QuestProgress.zoneid IN ('.$subquery3.')', null, false);
        $this->db->where_in('statusid', array('3','4'));
        $this->db->group_by('questid');
        $this->db->order_by('avg(score)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $averagescore[$i] = $row['averagescore'];
                $i++;
            }
        }
        return $averagescore;
    }
    public function getQuestNameScoreByPlaceId($placeid){
        $questname = null;
        $this->db->select('buildingid');
        $this->db->from('Building');
        $this->db->where('placeid',$placeid);
        $subquery = $this->db->get_compiled_select();
        $this->db->select('floorid');
        $this->db->from('Floor');
        $this->db->where('buildingid IN ('.$subquery.')', null, false);
        $subquery2 = $this->db->get_compiled_select();
        $this->db->select('zoneid');
        $this->db->from('Zone');
        $this->db->where('floorid IN ('.$subquery2.')', null, false);
        $subquery3 = $this->db->get_compiled_select();
        $this->db->select('questname');
        $this->db->from('QuestProgress');
        $this->db->join('Quest','Quest.questid=QuestProgress.questid');
        $this->db->where('QuestProgress.zoneid IN ('.$subquery3.')', null, false);
        $this->db->where_in('statusid', array('3','4'));
        $this->db->group_by('QuestProgress.questid');
        $this->db->order_by('avg(score)','desc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $i = 1;
            foreach($query->result_array() as $row){
                $questname[$i] = $row['questname'];
                $i++;
            }
        }
        return $questname;
    }
}
