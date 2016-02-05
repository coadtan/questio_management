<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editquest extends CI_Controller {

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
				$this->load->view(
					'questoverview_page',array(
						'zoneid' => $zoneid,
						'questdata' => $questdata
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

	public function editQuiz($quizid){
		$quizdata = $this->Quiz_model->getQuizByQuizId($quizid);
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
		$this->load->view(
			'editquest_quiz_page',array(
				'message' => "",
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward,
				'quizdata' => $quizdata,
				'questdata' => $questdata
			)
		);
	}

	public function editQuizCheck(){
		$quiz = $this->Quiz_model;
		$quest = $this->Quest_model;
		$questid = $_POST['questid'];
		$questname = $_POST['questname'];
		$questdetails = $_POST['questdetails'];
		$diffid = $_POST['diffid'];
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}
		$quizid = $_POST['quizid'];
		$question = $_POST['question'];
		$choicea = $_POST['choicea'];
		$choiceb = $_POST['choiceb'];
		$choicec = $_POST['choicec'];
		$choiced = $_POST['choiced'];
		$answerid = $_POST['answerid'];

		$this->form_validation->set_rules('questname', 'questname', 'required|max_length[100]');
		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('choicea', 'choicea', 'required|max_length[100]');
		$this->form_validation->set_rules('choiceb', 'choiceb', 'required|max_length[100]');
		$this->form_validation->set_rules('choicec', 'choicec', 'max_length[100]');
		$this->form_validation->set_rules('choiced', 'choiced', 'max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($quest->updateQuest($questid, $questname, $questdetails, $diffid, $rewardid)==TRUE && $quiz->updateQuiz($quizid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid)==TRUE){
						$quizdata = $quiz->getQuizByQuizId($quizid);
						$questtype = $quest->getquesttypedata();
						$difficulty = $quest->getdifficulty();
						$reward = $this->Rewards_model->getRewardFromType(4);
						$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
						$this->load->view(
							'editquest_quiz_page',array(
								'message' => "Edit Quiz Successful.",
								'questtype' => $questtype,
								'difficulty' => $difficulty,
								'reward' => $reward,
								'quizdata' => $quizdata,
								'questdata' => $questdata
						)
					);
				
			}else{
				$quizdata = $quiz->getQuizByQuizId($quizid);
				$questtype = $quest->getquesttypedata();
				$difficulty = $quest->getdifficulty();
				$reward = $this->Rewards_model->getRewardFromType(4);
				$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
				$this->load->view(
					'editquest_quiz_page',array(
						'message' => "Edit Quiz Failed.",
						'questtype' => $questtype,
						'difficulty' => $difficulty,
						'reward' => $reward,
						'quizdata' => $quizdata,
						'questdata' => $questdata
					)
				);
			}

		}else{
			$quizdata = $quiz->getQuizByQuizId($quizid);
			$questtype = $quest->getquesttypedata();
			$difficulty = $quest->getdifficulty();
			$reward = $this->Rewards_model->getRewardFromType(4);
			$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
			$this->load->view(
			'editquest_quiz_page',array(
				'message' => 'Form validation error. please check again.',
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward,
				'quizdata' => $quizdata,
				'questdata' => $questdata
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
				$zoneid = $this->Quest_model->getZoneIdByQuestId($ridid);
				$questdata = $this->Quest_model->getQuestByZone($zoneid);
				$this->load->view(
					'questoverview_page',array(
						'zoneid' => $zoneid,
						'questdata' => $questdata
					)
				);
			}else{
				$qrcode = $riddle->getqrcode();
				$sensorid = $riddle->getsensorid();
				$this->load->view(
					'add_riddle',array(
						'message' => 'Add riddle failed.',
						'ridid' => $ridid,
						'qrcode' => $qrcode,
						'sensorid' => $sensorid
					)
				);
			}

		}else{
			$qrcode = $riddle->getqrcode();
			$sensorid = $riddle->getsensorid();
			$this->load->view(
			'add_riddle',array(
				'message' => 'Form validation error. please check again.',
				'ridid' => $ridid,
				'qrcode' => $qrcode,
				'sensorid' => $sensorid
				)
			);
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

		if(empty($_FILES['puzzlepic']['name'])){
			$imageurl = "/pictures/puzzle/blank.png";
			$this->form_validation->set_rules('puzzlepic', 'puzzlepic', 'required');
		}
		$this->form_validation->set_rules('helperanswer', 'helperanswer', 'max_length[100]');
		$this->form_validation->set_rules('correctanswer', 'correctanswer', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			$config['upload_path'] = './pictures/puzzle';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';


			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('puzzlepic')){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error) ;
			}else{
				$uploaddata = $this->upload->data();
				$imageurl = substr($uploaddata['full_path'], strpos($uploaddata['full_path'],"questio_management")+18);
			}
			if($puzzle->addpuzzle($puzzleid, $imageurl, $helperanswer, $correctanswer)==TRUE){
					$zoneid = $this->Quest_model->getZoneIdByQuestId($puzzleid);
					$questdata = $this->Quest_model->getQuestByZone($zoneid);
					$this->load->view(
						'questoverview_page',array(
						'zoneid' => $zoneid,
						'questdata' => $questdata
					)
				);
			}else{
				$this->load->view(
					'add_puzzle',array(
						'message' => 'Add puzzle failed.',
						'puzzleid' => $puzzleid
					)
				);
			}

		}else{
			$this->load->view(
			'add_puzzle',array(
				'message' => 'Form validation error. please check again.',
				'puzzleid' => $puzzleid
				)
			);
		}
	}
}
