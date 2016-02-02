<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quiz_model extends CI_Model{
    private $quizid;
    private $questid;
    private $seqid;
    private $question;
    private $choicea;
    private $choiceb;
    private $choicec;
    private $choiced;
    private $answerid;

    public function __construct(){
        parent::__construct();
    }
    public function set_quizid($quizid){
        $this->quizid = $quizid;
    }
    public function get_quizid(){
        return $this->quizid;
    }
    public function set_questid($questid){
        $this->questid = $questid;
    }
    public function get_questid(){
        return $this->questid;
    }
    public function set_seqid($seqid){
        $this->seqid = $seqid;
    }
    public function get_seqid(){
        return $this->seqid;
    }
    public function set_question($question){
        $this->question = $question;
    }
    public function get_question(){
        return $this->question;
    }
    public function set_choicea($choicea){
        $this->choicea = $choicea;
    }
    public function get_choicea(){
        return $this->choicea;
    }
    public function set_choiceb($choiceb){
        $this->choiceb = $choiceb;
    }
    public function get_choiceb(){
        return $this->choiceb;
    }
    public function set_choicec($choicec){
        $this->choicec = $choicec;
    }
    public function get_choicec(){
        return $this->choicec;
    }
    public function set_choiced($choiced){
        $this->choiced = $choiced;
    }
    public function get_choiced(){
        return $this->choiced;
    }
    public function set_answerid($answerid){
        $this->answerid = $answerid;
    }
    public function get_answerid(){
        return $this->answerid;
    }

    public function addquiz($questid, $seqid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid){
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

    public function getQuizByQuestId($questid){
        $quizzes = null;
        $this->db->select('*');
        $this->db->from('Quiz');
        $this->db->where('questid',$questid);
        $this->db->order_by('seqid','asc');
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $quizzes = array();
            $i = 0;
            foreach($query->result_array() as $row){
                $quizid = $row['quizid'];
                $questid = $row['questid'];
                $seqid = $row['seqid'];
                $question = $row['question'];
                $choicea = $row['choicea'];
                $choiceb = $row['choiceb'];
                $choicec = $row['choicec'];
                $choiced = $row['choiced'];
                $answerid = $row['answerid'];
                $quizzes[$i++] =
                    array(
                        'quizid'=>$quizid,
                        'questid'=>$questid,
                        'seqid'=>$seqid,
                        'question'=>$question,
                        'choicea'=>$choicea,
                        'choiceb'=>$choiceb,
                        'choicec'=>$choicec,
                        'choiced'=>$choiced,
                        'answerid'=>$answerid
                    );
            }
        }
        return $quizzes;
    }

    public function getseqidfromquestid($questid){
        $seqid = null;
        $this->db->select_max('seqid', 'currentsequence');
        $this->db->from('Quiz');
        $this->db->where('questid',$questid);
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $row = $query->row_array();
            $seqid = $row['currentsequence'];
            if(!is_null($seqid)){
                $seqid++;
            }else{
                $seqid = 1;
            }

        }
        return $seqid;
    }
}
