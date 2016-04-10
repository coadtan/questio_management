<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Keeper_model');
	}

	public function index(){
		$this->form_validation->set_rules('email','email','trim|required|valid_email|callback_dbcheck');
		
		if($this->form_validation->run() == false){
			$this->load->view('forgotpassword_page');
		}else{
			$this->load->view('forgotpassword_success');
		}
	}

	public function dbcheck($email){
		$keeper = $this->Keeper_model;
		$result = $keeper->email_check($email);
		if ($result){	
			return true;
		}
		else{
			$this->form_validation->set_message('dbcheck', 'invalid e-mail.');
			return false;
		}
	}
}