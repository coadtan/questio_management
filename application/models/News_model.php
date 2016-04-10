<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_model extends CI_Model{
	private $newsid;
	private $placeid;
	private $newsheader;
	private $newsdetails;
	private $datestarted;
	private $dateended;

	public function __construct(){
        parent::__construct();
    }
    public function set_newsid($newsid){
        $this->newsid = $newsid;
    }
    public function get_newsid(){
        return $this->newsid;
    }
    public function set_placeid($placeid){
        $this->placeid = $placeid;
    }
    public function get_placeid(){
        return $this->placeid;
    }
    public function set_newsheader($newsheader){
        $this->newsheader = $newsheader;
    }
    public function get_newsheader(){
        return $this->newsheader;
    }
    public function set_newsdetails($newsdetails){
        $this->newsdetails = $newsdetails;
    }
    public function get_newsdetails(){
        return $this->newsdetails;
    }
    public function set_datestarted($datestarted){
        $this->datestarted = $datestarted;
    }
    public function get_datestarted(){
        return $this->datestarted;
    }
    public function set_dateended($dateended){
        $this->dateended = $dateended;
    }
    public function get_dateended(){
        return $this->dateended;
    }
    public function getNewsByKeeperId($keeperid){
    	$news = null;
		$this->db->select('placeid');
		$this->db->from('management');
		$this->db->where('keeperid',$keeperid);
		$subquery = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('PlaceNews');
		$this->db->join('Place','Place.placeid = PlaceNews.placeid');
		$this->db->where('PlaceNews.placeid IN ('.$subquery.')', null, false);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$news = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$newsid = $row['newsid'];
				$placeid = $row['placeid'];
				$placename = $row['placename'];
				$newsheader = $row['newsheader'];
				$newsdetails = $row['newsdetails'];
				$datestarted = $row['datestarted'];
				$dateended = $row['dateended'];
				$news[$i++] = array(
					'newsid'=>$newsid,
					'placeid'=>$placeid,
					'placename'=>$placename,
					'newsheader'=>$newsheader,
					'newsdetails'=>$newsdetails,
					'datestarted'=>$datestarted,
					'dateended'=>$dateended
				);
			}
		}
		return $news;
	}
    
	public function getNewsByNewsId($newsid){
    	$news = null;
		$this->db->select('*');
		$this->db->from('PlaceNews');
		$this->db->where('newsid',$newsid);
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$news = array();
			foreach($query->result_array() as $row){
				$newsid = $row['newsid'];
				$placeid = $row['placeid'];
				$newsheader = $row['newsheader'];
				$newsdetails = $row['newsdetails'];
				$datestarted = $row['datestarted'];
				$dateended = $row['dateended'];
				$news = array(
					'newsid'=>$newsid,
					'placeid'=>$placeid,
					'newsheader'=>$newsheader,
					'newsdetails'=>$newsdetails,
					'datestarted'=>$datestarted,
					'dateended'=>$dateended
				);
			}
		}
		return $news;
	}

	public function addNews($placeid, $newsheader, $newsdetails, $datestarted, $dateended){
		$news_obj = array(
			'placeid'=>$placeid,
			'newsheader'=>$newsheader,
			'newsdetails'=>$newsdetails,
			'datestarted'=>$datestarted,
			'dateended'=>$dateended
		);
		$this->db->trans_start();
		$this->db->insert('PlaceNews',$news_obj);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function updateNews($newsid, $placeid, $newsheader, $newsdetails, $datestarted, $dateended){
		$news_obj = array(
			'placeid'=>$placeid,
			'newsheader'=>$newsheader,
			'newsdetails'=>$newsdetails,
			'datestarted'=>$datestarted,
			'dateended'=>$dateended
		);
		$this->db->trans_start();
		$this->db->where('newsid', $newsid);
		$this->db->update('PlaceNews', $news_obj);
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