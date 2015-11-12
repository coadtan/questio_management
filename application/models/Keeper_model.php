<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keeper_model extends CI_Model{
	private $number;
	private $username;
	private $password;
	private $firstname;
	private $lastname;

	public function __construct(){
		parent::__construct();
	}
	public function set_number($number){
		$this->number = $number;
	}
	public function set_username($username){
		$this->username = $username;
	}
	public function set_password($password){
		$this->password = $password;
	}
	public function set_firstname($firstname){
		$this->firstname = $firstname;
	}
	public function set_lastname($lastname){
		$this->lastname = $lastname;
	}
	public function get_number(){
		return $this->number;
	}
	public function get_username(){
		return $this->username;
	}
	public function get_password(){
		return $this->password;
	}
	public function get_firstname(){
		return $this->firstname;
	}
	public function get_lastname(){
		return $this->lastname;
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