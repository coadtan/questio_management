<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Placedetail_model extends CI_Model{
	private $placeid;
	private $placedetails;
	private $phonecontact1;
	private $phonecontact2;
	private $website;
	private $email;
	private $imageurl;

	public function __construct(){
        parent::__construct();
    }
    public function set_placeid($placeid){
        $this->placeid = $placeid;
    }
    public function get_placeid(){
        return $this->placeid;
    }
    public function set_placedetails($placedetails){
        $this->placedetails = $placedetails;
    }
    public function get_placedetails(){
        return $this->placedetails;
    }
    public function set_phonecontact1($phonecontact1){
        $this->phonecontact1 = $phonecontact1;
    }
    public function get_phonecontact1(){
        return $this->phonecontact1;
    }
    public function set_phonecontact2($phonecontact2){
        $this->phonecontact2 = $phonecontact2;
    }
    public function get_phonecontact2(){
        return $this->phonecontact2;
    }
    public function set_website($website){
        $this->website = $website;
    }
    public function get_website(){
        return $this->website;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function get_email(){
        return $this->email;
    }
    public function set_imageurl($imageurl){
        $this->imageurl = $imageurl;
    }
    public function get_imageurl(){
        return $this->imageurl;
    }
    public function addPlaceDetail($placeid, $placedetails, $phonecontact1, $phonecontact2, $website, $email, $imageurl){
    	$placedetail_obj = array(
                'placeid' => $placeid,
                'placedetails' => $placedetails,
                'phonecontact1' => $phonecontact1,
                'phonecontact2' => $phonecontact2,
                'website' => $website,
                'email' => $email,
                'imageurl' => $imageurl
                );
            $this->db->trans_start();
            $this->db->insert('PlaceDetail',$placedetail_obj);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }
    public function getPlaceDetailByPlaceId($placeid){
    	$placedetail = null;
        $this->db->select('*');
        $this->db->from('PlaceDetail');
        $this->db->where('placeid',$placeid);
        $query = $this->db->get();
        if ($query->num_rows() >= 1){
            $placedetail = array();
            $row = $query->row_array();
            $placedetail =
                array(
                    'placeid' => $row['placeid'],
                    'placedetails' => $row['placedetails'],
                    'phonecontact1' => $row['phonecontact1'],
                    'phonecontact2' => $row['phonecontact2'],
                    'website' => $row['website'],
                    'email' => $row['email'],
                    'imageurl' => $row['imageurl']
                );
        }
        return $placedetail;
    }
    public function updatePlaceDetail($placeid, $placedetails, $phonecontact1, $phonecontact2, $website, $email, $imageurl){
        $placedetail_obj = array(
                'placedetails' => $placedetails,
                'phonecontact1' => $phonecontact1,
                'phonecontact2' => $phonecontact2,
                'website' => $website,
                'email' => $email,
                'imageurl' => $imageurl
                );
        $this->db->trans_start();
        $this->db->where('placeid', $placeid);
        $this->db->update('PlaceDetail', $placedetail_obj);
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