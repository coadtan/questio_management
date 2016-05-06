<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addnews extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('News_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
	}

	public function index(){
		$placedata = $this->getplace();
		$this->load->view(
			'addnews_page',array(
				'message' => "",
				'placedata' => $placedata
			)
		);
	}

	public function addnewscheck(){
		$placedata = $this->getplace();
		$news = $this->News_model;
		$placeid = $this->input->post('placeid');
		$newsheader = $this->input->post('newsheader');
		$newsdetails = $this->input->post('newsdetails');
		$datestarted = $this->input->post('datestarted');
		$dateended = $this->input->post('dateended');

		$this->form_validation->set_rules('newsheader', 'newsheader', 'required|max_length[100]');
		$this->form_validation->set_rules('newsdetails', 'newsdetails', 'required');
		
		if ($datestarted < $dateended && $this->form_validation->run()==TRUE){
			if($news->addNews($placeid, $newsheader, $newsdetails, $datestarted, $dateended)==TRUE){

				echo "add_news_success";
				// $this->load->view(
				// 	'addnews_page',array(
				// 		'message' => 'Add news successful.',
				// 		'placedata' => $placedata
				// 	)
				// );
			}else{

				echo "add_news_failed";
				// $this->load->view(
				// 	'addnews_page',array(
				// 		'message' => 'Add news failed.',
				// 		'placedata' => $placedata
				// 	)
				// );
			}

		}else{

			echo "add_news_error";
			// $this->load->view(
			// 'addnews_page',array(
			// 	'message' => 'Form validation error. please check again.',
			// 	'placedata' => $placedata
			// 	)
			// );
		}
		
		

	}

	public function getplace(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$placedata = $this->Place_model->getplacedata($keeperid);
		return $placedata;
	}

}