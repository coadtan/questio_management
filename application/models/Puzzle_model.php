<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Puzzle_model extends CI_Model{
    private $puzzleid;
    private $imageurl;
    private $helperanswer;
    private $correctanswer;

    public function __construct(){
        parent::__construct();
    }
    public function set_puzzleid($puzzleid){
        $this->puzzleid = $puzzleid;
    }
    public function get_puzzleid(){
        return $this->puzzleid;
    }
    public function set_imageurl($imageurl){
        $this->imageurl = $imageurl;
    }
    public function get_imageurl(){
        return $this->imageurl;
    }
    public function set_helperanswer($helperanswer){
        $this->helperanswer = $helperanswer;
    }
    public function get_helperanswer(){
        return $this->helperanswer;
    }
    public function set_correctanswer($correctanswer){
        $this->correctanswer = $correctanswer;
    }
    public function get_correctanswer(){
        return $this->correctanswer;
    }

    public function addpuzzle($puzzleid, $imageurl, $helperanswer, $correctanswer){
        $puzzle_obj = array(
            'puzzleid' => $puzzleid,
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
    public function getPuzzleFromPuzzleId($puzzleid){
        $puzzle = array();
        $this->db->select('*');
        $this->db->from('PicturePuzzle');
        $this->db->where('puzzleid',$puzzleid);
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $row = $query->row_array();
            $puzzle[0] =
                    array(
                        'puzzleid' => $row['puzzleid'],
                        'imageurl' => $row['imageurl'],
                        'helperanswer' => $row['helperanswer'],
                        'correctanswer' => $row['correctanswer']
                    );
        }
        return $puzzle;
    }
    public function updatePuzzle($puzzleid, $imageurl, $helperanswer, $correctanswer){
        $puzzle_obj = array(
            'imageurl' => $imageurl,
            'helperanswer' => $helperanswer,
            'correctanswer' => $correctanswer
        );
        $this->db->trans_start();
        $this->db->where('puzzleid', $puzzleid);
        $this->db->update('PicturePuzzle', $puzzle_obj);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
}
