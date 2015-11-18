<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keeper_model extends CI_Model{
	private $keeperid;
	private $username;
	private $password;
	private $fname;
	private $lname;
	private $telephone;
	private $email;

	public function __construct(){
		parent::__construct();
	}
	public function set_keeperid($keeperid){
		$this->keeperid = $keeperid;
	}
	public function set_username($username){
		$this->username = $username;
	}
	public function set_password($password){
		$this->password = $password;
	}
	public function set_fname($fname){
		$this->fname = $fname;
	}
	public function set_lname($lname){
		$this->lname = $lname;
	}
	public function set_telephone($telephone){
		$this->telephone = $telephone;
	}
	public function set_email($email){
		$this->email = $email;
	}
	public function get_keeperid(){
		return $this->keeperid;
	}
	public function get_username(){
		return $this->username;
	}
	public function get_password(){
		return $this->password;
	}
	public function get_fname(){
		return $this->fname;
	}
	public function get_lname(){
		return $this->lname;
	}
	public function get_telephone(){
		return $this->telephone;
	}
	public function get_email(){
		return $this->email;
	}
	public function get_data(){
		return "NingSama";
	}
	public function get_all_keeper(){
		$keepers = null;
		$this->db->select('*');
		$this->db->from('keeper');
		$query = $this->db->get();
		if ($query->num_rows() >= 1){
			$keepers = array();
			$i = 0;
			foreach($query->result_array() as $row){
				$fname = $row['fname'];
				$lname = $row['lname'];
				$keepers[$i++] = 
					array(
						'fname'=>$fname,
						'lname'=>$lname
					);
			}
		}else{
			echo "No data in query at 'get_all_keeper'";
		}
		return $keepers;
	}

}