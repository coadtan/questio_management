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
    private $quizid;

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
