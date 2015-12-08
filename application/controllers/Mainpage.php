<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$this->load->view('main_page', $data);
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('mainpage','refresh');
	}
}