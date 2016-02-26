<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addquest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Quest_model');
		$this->load->model('Rewards_model');
		$this->load->model('Quiz_model');
		$this->load->model('Riddle_model');
		$this->load->model('Puzzle_model');
		$this->load->helper('form');
		$this->load->library('upload');
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
				$questdata = $this->Quest_model->getQuestByZone($zoneid);
				echo "add_quest_success";
				//$this->load->view(
				//	'questoverview_page',array(
				//		'zoneid' => $zoneid,
				//		'questdata' => $questdata
				//	)
				//);
			}else{
				echo "add_quest_failed";
				//$this->load->view(
				//	'addquest_page',array(
				//	'message' => 'Add quest failed.',
				//	'zoneid' => $zoneid,
				//	'questtype' => $questtype,
				//	'difficulty' => $difficulty,
				//	'reward' => $reward
				//	)
				//);
			}

		}else{
			echo "add_quest_error";
			//$this->load->view(
			//'addquest_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'zoneid' => $zoneid,
			//	'questtype' => $questtype,
			//	'difficulty' => $difficulty,
			//	'reward' => $reward
			//	)
			//);
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
		$this->form_validation->set_rules('choicea', 'choicea', 'required|max_length[100]');
		$this->form_validation->set_rules('choiceb', 'choiceb', 'required|max_length[100]');
		$this->form_validation->set_rules('choicec', 'choicec', 'max_length[100]');
		$this->form_validation->set_rules('choiced', 'choiced', 'max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($quiz->addquiz($questid, $seqid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid)==TRUE){
				echo "add_quiz_success";
				//$zoneid = $this->Quest_model->getZoneIdByQuestId($questid);
				//$questdata = $this->Quest_model->getQuestByZone($zoneid);
				//$this->load->view(
				//	'questoverview_page',array(
				//		'zoneid' => $zoneid,
				//		'questdata' => $questdata
				//	)
				//);
			}else{
				echo "add_quiz_failed";
				//$seqid = $this->Quiz_model->getseqidfromquestid($questid);
				//$this->load->view(
				//	'add_quiz',array(
				//	'message' => 'Add quiz failed.',
				//	'questid' => $questid,
				//	'seqid' => $seqid
				//	)
				//);
			}

		}else{
			echo "add_quiz_error";
			//$seqid = $this->Quiz_model->getseqidfromquestid($questid);
			//$this->load->view(
			//'add_quiz',array(
			//	'message' => 'Form validation error. please check again.',
			//	'questid' => $questid,
			//	'seqid' => $seqid
			//	)
			//);
		}

	}

	public function addRiddle($ridid){
		$riddle = $this->Riddle_model;
		$qrcode = $riddle->getqrcode();
		$sensorid = $riddle->getsensorid();
		$this->load->view(
			'add_riddle',array(
				'message' => "",
				'ridid' => $ridid,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid
			)
		);
	}

	public function addRiddleCheck(){
		$riddle = $this->Riddle_model;
		$ridid = $_POST['ridid'];
		$riddetails = $_POST['riddetails'];
		$qrcode = $_POST['qrcode'];
		$sensorid = $_POST['sensorid'];
		$scanlimit = $_POST['scanlimit'];
		$hint1 = $_POST['hint1'];
		$hint2 = $_POST['hint2'];
		$hint3 = $_POST['hint3'];
		$this->form_validation->set_rules('riddetails', 'riddetails', 'required');
		$this->form_validation->set_rules('hint1', 'hint1', 'max_length[100]');
		$this->form_validation->set_rules('hint2', 'hint2', 'max_length[100]');
		$this->form_validation->set_rules('hint3', 'hint3', 'max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($riddle->addriddle($ridid, $riddetails, $qrcode, $sensorid, $scanlimit, $hint1, $hint2, $hint3)==TRUE){
				echo "add_riddle_success";
				//$zoneid = $this->Quest_model->getZoneIdByQuestId($ridid);
				//$questdata = $this->Quest_model->getQuestByZone($zoneid);
				//$this->load->view(
				//	'questoverview_page',array(
				//		'zoneid' => $zoneid,
				//		'questdata' => $questdata
				//	)
				//);
			}else{
				echo "add_riddle_failed";
				//$qrcode = $riddle->getqrcode();
				//$sensorid = $riddle->getsensorid();
				//$this->load->view(
				//	'add_riddle',array(
				//		'message' => 'Add riddle failed.',
				//		'ridid' => $ridid,
				//		'qrcode' => $qrcode,
				//		'sensorid' => $sensorid
				//	)
				//);
			}

		}else{
			echo "add_riddle_error";
			//$qrcode = $riddle->getqrcode();
			//$sensorid = $riddle->getsensorid();
			//$this->load->view(
			//'add_riddle',array(
			//	'message' => 'Form validation error. please check again.',
			//	'ridid' => $ridid,
			//	'qrcode' => $qrcode,
			//	'sensorid' => $sensorid
			//	)
			//);
		}
	}

	public function addPuzzle($puzzleid){
		$this->load->view(
			'add_puzzle',array(
				'message' => "",
				'puzzleid' => $puzzleid
			)
		);
	}

	public function addPuzzleCheck(){
		$puzzle = $this->Puzzle_model;
		$puzzleid = $_POST['puzzleid'];
		$helperanswer = $_POST['helperanswer'];
		$correctanswer = $_POST['correctanswer'];

		$imageurl = null;

		if(!empty($_FILES['puzzlepic']['name'])){
			
			$config['upload_path'] = './pictures/puzzle';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';


			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('puzzlepic')){
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
		}
		$this->form_validation->set_rules('helperanswer', 'helperanswer', 'max_length[100]');
		$this->form_validation->set_rules('correctanswer', 'correctanswer', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			
				if($puzzle->addpuzzle($puzzleid, $imageurl, $helperanswer, $correctanswer)==TRUE){
					echo "add_puzzle_success";
					//$zoneid = $this->Quest_model->getZoneIdByQuestId($puzzleid);
					//$questdata = $this->Quest_model->getQuestByZone($zoneid);
					//$this->load->view(
					//	'questoverview_page',array(
					//	'zoneid' => $zoneid,
					//	'questdata' => $questdata
					//)
				);
			}else{
				echo "add_puzzle_failed";
				//$this->load->view(
				//	'add_puzzle',array(
				//		'message' => 'Add puzzle failed.',
				//		'puzzleid' => $puzzleid
				//	)
				//);
			}

		}else{
			echo "add_puzzle_error";
			//$this->load->view(
			//'add_puzzle',array(
			//	'message' => 'Form validation error. please check again.',
			//	'puzzleid' => $puzzleid
			//	)
			//);
		}
	}
}
