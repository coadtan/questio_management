<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Keeper_model');
	}

	public function index(){
		$this->form_validation->set_rules('username','username','trim|required');
  		$this->form_validation->set_rules('password','password','trim|required|callback_dbcheck');
  
  		if($this->form_validation->run() == false){
  			$this->load->view('login_page');
  		}else{
  			redirect('mainpage','refresh');
  		}
	}



	public function dbcheck($password){
		$keeper = $this->Keeper_model;
		$username = $_POST['username'];
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
			return true;
		}
		else{
			$this->form_validation->set_message('dbcheck', 'invalid username or password.');
 			return false;
		}
	}

}
