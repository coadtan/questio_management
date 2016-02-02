<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoverview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Quest_model');
		$this->load->model('Quiz_model');
		$this->load->model('Riddle_model');
		$this->load->model('Puzzle_model');
		$this->load->helper('form');
	}

	public function getquest($zoneid){
		$questdata = $this->Quest_model->getQuestByZone($zoneid);
		$this->load->view(
			'questoverview_page',array(
				'questdata' => $questdata,
				'zoneid' => $zoneid
			)
		);
	}

	public function quizoverview($questid){
		$quizdata = $this->Quiz_model->getQuizByQuestId($questid);
		$this->load->view(
			'quiz_overview',array(
				'questid' => $questid,
				'quizdata' => $quizdata
			)
		);
	}

	public function riddleoverview($ridid){
		$riddledata = $this->Riddle_model->getRiddleFromRidId($ridid);
		$this->load->view(
			'riddle_overview',array(
				'ridid' => $ridid,
				'riddledata' => $riddledata
			)
		);
	}

	public function puzzleoverview($puzzleid){
		$puzzledata = $this->Puzzle_model->getPuzzleFromPuzzleId($puzzleid);
		$this->load->view(
			'puzzle_overview',array(
				'puzzleid' => $puzzleid,
				'puzzledata' => $puzzledata
			)
		);
	}


}
