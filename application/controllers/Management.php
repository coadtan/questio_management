<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	public function index(){
			$this->load->view('management_page');
	}
	public function load_contact(){
			$this->load->view('contact_page');
	}
}
