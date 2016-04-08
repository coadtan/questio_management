<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Keeper_model');
	}

	public function index(){
		$this->load->view("login_page");
	}



	public function dbcheck($password){
		$keeper = $this->Keeper_model;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$result = $keeper->login_check($username, $password);
		if ($result){
			$session_array = array();
			foreach($result as $row){
				$session_array = array(
					'keeperid' => $row->keeperid,
					'username' => $row->username,
					'firstname' => $row->fname,
					'lastname' => $row->lname
				);
				$this->session->set_userdata('logged_in',
					$session_array);
			}
			echo "login_success";
		}
		else{
			echo "login_error";
		}
	}

}
