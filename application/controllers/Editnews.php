<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editnews extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('News_model');
		$this->load->model('Place_model');
		$this->load->helper('form');
	}

	public function edit($newsid){
		$newsdata = $this->News_model->getNewsByNewsId($newsid);
		$placedata = $this->getplace();
		$this->load->view(
			'editnews_page',array(
				'message' => "",
				'placedata' => $placedata,
				'newsdata' => $newsdata
			)
		);
	}

	public function editnewscheck(){
		$placedata = $this->getplace();
		$news = $this->News_model;
		$newsid = $_POST['newsid'];
		$placeid = $_POST['placeid'];
		$newsheader = $_POST['newsheader'];
		$newsdetails = $_POST['newsdetails'];
		$datestarted = $_POST['datestarted'];
		$dateended = $_POST['dateended'];

		$this->form_validation->set_rules('newsheader', 'newsheader', 'required|max_length[100]');
		$this->form_validation->set_rules('newsdetails', 'newsdetails', 'required');
		$this->form_validation->set_rules('datestarted', 'datestarted', 'required');
		$this->form_validation->set_rules('dateended', 'dateended', 'required');

		if ($this->form_validation->run()==TRUE){
			if($news->updateNews($newsid, $placeid, $newsheader, $newsdetails, $datestarted, $dateended)==TRUE){
				$newsdata = $this->News_model->getNewsByNewsId($newsid);
				$this->load->view(
					'editnews_page',array(
						'message' => 'Edit news successful.',
						'placedata' => $placedata,
						'newsdata' => $newsdata
					)
				);
			}else{
				$newsdata = $this->News_model->getNewsByNewsId($newsid);
				$this->load->view(
					'editnews_page',array(
						'message' => 'Edit news failed.',
						'placedata' => $placedata,
						'newsdata' => $newsdata
					)
				);
			}

		}else{
			$newsdata = $this->News_model->getNewsByNewsId($newsid);
			$this->load->view(
			'editnews_page',array(
				'message' => 'Form validation error. please check again.',
				'placedata' => $placedata,
				'newsdata' => $newsdata
				)
			);
		}

	}

	public function getplace(){
		$session_data = $this->session->userdata('logged_in');
		$keeperid = $session_data['keeperid'];
		$placedata = $this->Place_model->getplacedata($keeperid);
		return $placedata;
	}

}