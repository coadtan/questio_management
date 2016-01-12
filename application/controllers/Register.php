<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Keeper_model');
		$this->load->helper('form');
	}

	public function index(){
		$this->load->view(
			'register_page',array(
				'message' => ""
			)
		);
	}

	public function updatecheck(){
		$keeper = $this->Keeper_model;
		$keeperid = $this->db->count_all_results('keeper');
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];

		$keeperid++;

		$this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[16]|alpha_dash');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('passwordconf', 'passwordconf', 'required|min_length[8]|max_length[12]|matches[password]');
		$this->form_validation->set_rules('fname', 'fname', 'required|alpha');
		$this->form_validation->set_rules('lname', 'lname', 'required|alpha');
		$this->form_validation->set_rules('telephone', 'telephone', 'required|integer|max_length[10]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');

		if ($this->form_validation->run()==TRUE){
			if($keeper->addkeeper($keeperid, $username, $password, $fname, $lname, $telephone, $email)==TRUE){
				$this->load->view(
					'login_page'
				);
			}else{
				$this->load->view(
					'register_page',array(
					'message' => 'Register failed.'
					)
				);
			}

		}else{
			$this->load->view(
			'register_page',array(
				'message' => 'From validation error. please check again.'
				)
			);
		}
	}
}
