<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Riddle_model extends CI_Model{
    private $ridid;
    private $riddetails;
    private $qrcode;
    private $sensorid;
    private $scanlimit;
    private $hint1;
    private $hint2;
    private $hint3;

    public function __construct(){
        parent::__construct();
    }
    public function set_ridid($ridid){
        $this->ridid = $ridid;
    }
    public function get_ridid(){
        return $this->ridid;
    }
    public function set_riddetails($riddetails){
        $this->riddetails = $riddetails;
    }
    public function get_riddetails(){
        return $this->riddetails;
    }
    public function set_qrcode($qrcode){
        $this->qrcode = $qrcode;
    }
    public function get_qrcode(){
        return $this->qrcode;
    }
    public function set_sensorid($sensorid){
        $this->sensorid = $sensorid;
    }
    public function get_sensorid(){
        return $this->sensorid;
    }
    public function set_scanlimit($scanlimit){
        $this->scanlimit = $scanlimit;
    }
    public function get_scanlimit(){
        return $this->scanlimit;
    }
    public function set_hint1($hint1){
        $this->hint1 = $hint1;
    }
    public function get_hint1(){
        return $this->hint1;
    }
    public function set_hint2($hint2){
        $this->hint2 = $hint2;
    }
    public function get_hint2(){
        return $this->hint2;
    }
    public function set_hint3($hint3){
        $this->hint3 = $hint3;
    }
    public function get_hint3(){
        return $this->hint3;
    }

    public function addriddle($riddetails, $qrcode, $sensorid, $scanlimit, $hint1, $hint2, $hint3){
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
    public function getRiddleFromRidId($ridid){
        $riddle = array();
        $this->db->select('*');
        $this->db->from('Riddle');
        $this->db->where('ridid',$ridid);
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $row = $query->row_array();
            $riddle[0] =
                    array(
                        'ridid' => $row['ridid'],
                        'riddetails' => $row['riddetails'],
                        'qrcode' => $row['qrcode'],
                        'sensorid' => $row['sensorid'],
                        'scanlimit' => $row['scanlimit'],
                        'hint1' => $row['hint1'],
                        'hint2' => $row['hint2'],
                        'hint3' => $row['hint3']
                    );
        }
        return $riddle;
    }
}
