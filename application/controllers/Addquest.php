<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addquest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Quest_model');
		$this->load->model('Rewards_model');
		$this->load->model('Quiz_model');
		$this->load->model('Riddle_model');
		$this->load->helper('form');
	}

	public function add($zoneid){
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$this->load->view(
			'addquest_page',array(
				'message' => "",
				'zoneid' => $zoneid,
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward
			)
		);
	}

	public function addquestcheck(){
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$questname = $_POST['questname'];
		$questdetails = $_POST['questdetails'];
		$questtypeid = $_POST['questtypeid'];
		$zoneid = $_POST['zoneid'];
		$diffid = $_POST['diffid'];
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}

		$this->form_validation->set_rules('questname', 'questname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($quest->addquest($questname, $questdetails, $questtypeid, $zoneid, $diffid, $rewardid)==TRUE){
				$this->load->view(
					'addquest_page',array(
					'message' => 'Add quest successful.',
					'zoneid' => $zoneid,
					'questtype' => $questtype,
					'difficulty' => $difficulty,
					'reward' => $reward
					)
				);
			}else{
				$this->load->view(
					'addquest_page',array(
					'message' => 'Add quest failed.',
					'zoneid' => $zoneid,
					'questtype' => $questtype,
					'difficulty' => $difficulty,
					'reward' => $reward
					)
				);
			}

		}else{
			$this->load->view(
			'addquest_page',array(
				'message' => 'Form validation error. please check again.',
				'zoneid' => $zoneid,
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward
				)
			);
		}
	}

	public function addQuiz($questid){
		$seqid = $this->Quiz_model->getseqidfromquestid($questid);
		$this->load->view(
			'add_quiz',array(
				'message' => "",
				'questid' => $questid,
				'seqid' => $seqid
			)
		);
	}

	public function addQuizCheck(){
		$quiz = $this->Quiz_model;
		$questid = $_POST['questid'];
		$seqid = $_POST['seqid'];
		$question = $_POST['question'];
		$choicea = $_POST['choicea'];
		$choiceb = $_POST['choiceb'];
		$choicec = $_POST['choicec'];
		$choiced = $_POST['choiced'];
		$answerid = $_POST['answerid'];
		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('choicea', 'choicea', 'required');
		$this->form_validation->set_rules('choiceb', 'choiceb', 'required');
		$this->form_validation->set_rules('choicec', 'choicec', 'required');
		$this->form_validation->set_rules('choiced', 'choiced', 'required');

		if ($this->form_validation->run()==TRUE){
			if($quiz->addquiz($questid, $seqid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid)==TRUE){
				$seqid = $this->Quiz_model->getseqidfromquestid($questid);
				$this->load->view(
					'add_quiz',array(
					'message' => 'Add quiz successful.',
					'questid' => $questid,
					'seqid' => $seqid
					)
				);
			}else{
				$seqid = $this->Quiz_model->getseqidfromquestid($questid);
				$this->load->view(
					'add_quiz',array(
					'message' => 'Add quiz failed.',
					'questid' => $questid,
					'seqid' => $seqid
					)
				);
			}

		}else{
			$seqid = $this->Quiz_model->getseqidfromquestid($questid);
			$this->load->view(
			'add_quiz',array(
				'message' => 'Form validation error. please check again.',
				'questid' => $questid,
				'seqid' => $seqid
				)
			);
		}

	}

	public function addRiddle($ridid){
		$riddle = $this->Riddle_model;
		$qrcode = $riddle->getqrcode();
		$sensorid = $riddle->getsensorid();
		$this->load->view(
			'add_riddle',array(
				'message' => "",
				'qrcode' => $qrcode,
				'sensorid' => $sensorid
			)
		);
	}

	public function addPuzzle($puzzleid){
		$this->load->view(
			'add_puzzle',array(
				'message' => ""
			)
		);
	}
}
