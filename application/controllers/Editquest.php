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

	public function edit($questid){
		$quest = $this->Quest_model;
		$questdata = $quest->getQuestFromQuestId($questid);
		$zoneid = $this->Quest_model->getZoneIdByQuestId($questid);
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$this->load->view(
			'editquest_page',array(
				'message' => "",
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward,
				'questdata' => $questdata
			)
		);
	}

	public function editquestcheck(){
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$questid = $_POST['questid'];
		$questname = $_POST['questname'];
		$questdetails = $_POST['questdetails'];
		$diffid = $_POST['diffid'];
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}

		$this->form_validation->set_rules('questname', 'questname', 'required|max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($quest->updateQuest($questid, $questname, $questdetails, $diffid, $rewardid)==TRUE){
				echo "edit_quest_success";
				//$questdata = $this->Quest_model->getQuestByZone($zoneid);
				//$this->load->view(
				//	'editquest_page',array(
				//	'message' => "",
				//	'questtype' => $questtype,
				//	'difficulty' => $difficulty,
				//	'reward' => $reward,
				//	'questdata' => $questdata
				//	)
				//);
			}else{
				echo "edit_quest_failed";
				//$this->load->view(
				//	'editquest_page',array(
				//	'message' => "Edit quest failed",
				//	'questtype' => $questtype,
				//	'difficulty' => $difficulty,
				//	'reward' => $reward,
				//	'questdata' => $questdata
				//	)
				//);
			}

		}else{
			echo "edit_quest_error";
			//$this->load->view(
			//'editquest_page',array(
			//		'message' => "Form validation error. please check again.",
			//		'questtype' => $questtype,
			//		'difficulty' => $difficulty,
			//		'reward' => $reward,
			//		'questdata' => $questdata
			//	)
			//);
		}
	}

	public function editQuiz($quizid){
		$quizdata = $this->Quiz_model->getQuizByQuizId($quizid);
		$zoneid = $this->Quest_model->getZoneIdByQuestId($quizdata['questid']);
		$this->load->view(
			'editquest_quiz_page',array(
				'message' => "",
				'quizdata' => $quizdata,
				'zoneid' => $zoneid
			)
		);
	}

	public function editQuizCheck(){
		$quiz = $this->Quiz_model;
		$quest = $this->Quest_model;
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
			if($quiz->updateQuiz($quizid, $question, $choicea, $choiceb, $choicec, $choiced, $answerid)==TRUE){
				echo "edit_quiz_success";
					//$quizdata = $quiz->getQuizByQuizId($quizid);
					//$questtype = $quest->getquesttypedata();
					//$difficulty = $quest->getdifficulty();
					//$reward = $this->Rewards_model->getRewardFromType(4);
					//$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
					//$this->load->view(
					//	'editquest_quiz_page',array(
					//		'message' => "Edit Quiz Successful.",
					//		'questtype' => $questtype,
					//		'difficulty' => $difficulty,
					//		'reward' => $reward,
					//		'quizdata' => $quizdata,
					//		'questdata' => $questdata
					//)
				//);

			}else{
				echo "edit_quiz_failed";
				//$quizdata = $quiz->getQuizByQuizId($quizid);
				//$questtype = $quest->getquesttypedata();
				//$difficulty = $quest->getdifficulty();
				//$reward = $this->Rewards_model->getRewardFromType(4);
				//$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
				//$this->load->view(
				//	'editquest_quiz_page',array(
				//		'message' => "Edit Quiz Failed.",
				//		'questtype' => $questtype,
				//		'difficulty' => $difficulty,
				//		'reward' => $reward,
				//		'quizdata' => $quizdata,
				//		'questdata' => $questdata
				//	)
				//);
			}

		}else{
			echo "edit_quiz_error";
			//$quizdata = $quiz->getQuizByQuizId($quizid);
			//$questtype = $quest->getquesttypedata();
			//$difficulty = $quest->getdifficulty();
			//$reward = $this->Rewards_model->getRewardFromType(4);
			//$questdata = $quest->getQuestFromQuestId($quizdata['questid']);
			//$this->load->view(
			//'editquest_quiz_page',array(
			//	'message' => 'Form validation error. please check again.',
			//	'questtype' => $questtype,
			//	'difficulty' => $difficulty,
			//	'reward' => $reward,
			//	'quizdata' => $quizdata,
			//	'questdata' => $questdata
			//	)
			//);
		}

	}

	public function editRiddle($ridid){
		$riddledata = $this->Riddle_model->getRiddleFromRidId($ridid);
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$questdata = $quest->getQuestFromQuestId($ridid);
		$zoneid = $this->Quest_model->getZoneIdByQuestId($ridid);
		$this->load->view(
			'editquest_riddle_page',array(
				'message' => "",
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward,
				'riddledata' => $riddledata[0],
				'questdata' => $questdata,
				'zoneid' => $zoneid
			)
		);
	}

	public function editRiddleCheck(){
		$riddle = $this->Riddle_model;
		$quest = $this->Quest_model;
		$questname = $_POST['questname'];
		$questdetails = $_POST['questdetails'];
		$diffid = $_POST['diffid'];
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}
		$ridid = $_POST['ridid'];
		$riddetails = $_POST['riddetails'];
		$scanlimit = $_POST['scanlimit'];
		$hint1 = $_POST['hint1'];
		$hint2 = $_POST['hint2'];
		$hint3 = $_POST['hint3'];
		$this->form_validation->set_rules('questname', 'questname', 'required|max_length[100]');
		$this->form_validation->set_rules('riddetails', 'riddetails', 'required');
		$this->form_validation->set_rules('hint1', 'hint1', 'max_length[100]');
		$this->form_validation->set_rules('hint2', 'hint2', 'max_length[100]');
		$this->form_validation->set_rules('hint3', 'hint3', 'max_length[100]');

		if ($this->form_validation->run()==TRUE){
			if($quest->updateQuest($ridid, $questname, $questdetails, $diffid, $rewardid)==TRUE && $riddle->updateRiddle($ridid, $riddetails, $scanlimit, $hint1, $hint2, $hint3)==TRUE){
					echo "edit_riddle_success";
					//$riddledata = $this->Riddle_model->getRiddleFromRidId($ridid);
					//$quest = $this->Quest_model;
					//$questtype = $quest->getquesttypedata();
					//$difficulty = $quest->getdifficulty();
					//$reward = $this->Rewards_model->getRewardFromType(4);
					//$questdata = $quest->getQuestFromQuestId($ridid);
					//$this->load->view(
					//	'editquest_riddle_page',array(
					//		'message' => 'Edit riddle successful.',
					//		'questtype' => $questtype,
					//		'difficulty' => $difficulty,
					//		'reward' => $reward,
					//		'riddledata' => $riddledata[0],
					//		'questdata' => $questdata
					//	)
					//);
			}else{
				echo "edit_riddle_failed";
				//$riddledata = $this->Riddle_model->getRiddleFromRidId($ridid);
				//$quest = $this->Quest_model;
				//$questtype = $quest->getquesttypedata();
				//$difficulty = $quest->getdifficulty();
				//$reward = $this->Rewards_model->getRewardFromType(4);
				//$questdata = $quest->getQuestFromQuestId($ridid);
				//$this->load->view(
				//	'editquest_riddle_page',array(
				//		'message' => 'Edit riddle failed.',
				//		'questtype' => $questtype,
				//		'difficulty' => $difficulty,
				//		'reward' => $reward,
				//		'riddledata' => $riddledata[0],
				//		'questdata' => $questdata
				//	)
				//);
			}

		}else{
			echo "edit_riddle_error";
			//$riddledata = $this->Riddle_model->getRiddleFromRidId($ridid);
			//$quest = $this->Quest_model;
			//$questtype = $quest->getquesttypedata();
			//$difficulty = $quest->getdifficulty();
			//$reward = $this->Rewards_model->getRewardFromType(4);
			//$questdata = $quest->getQuestFromQuestId($ridid);
			//$this->load->view(
			//'editquest_riddle_page',array(
			//		'message' => 'Form validation error. please check again.',
			//		'questtype' => $questtype,
			//		'difficulty' => $difficulty,
			//		'reward' => $reward,
			//		'riddledata' => $riddledata[0],
			//		'questdata' => $questdata
			//	)
			//);
		}
	}

	public function editPuzzle($puzzleid){
		$puzzledata = $this->Puzzle_model->getPuzzleFromPuzzleId($puzzleid);
		$quest = $this->Quest_model;
		$questtype = $quest->getquesttypedata();
		$difficulty = $quest->getdifficulty();
		$reward = $this->Rewards_model->getRewardFromType(4);
		$questdata = $quest->getQuestFromQuestId($puzzleid);
		$zoneid = $this->Quest_model->getZoneIdByQuestId($puzzleid);
		$this->load->view(
			'editquest_puzzle_page',array(
				'message' => "",
				'questtype' => $questtype,
				'difficulty' => $difficulty,
				'reward' => $reward,
				'puzzledata' => $puzzledata[0],
				'questdata' => $questdata,
				'puzzleid' => $puzzleid
			)
		);
	}

	public function editPuzzleCheck(){
		$puzzle = $this->Puzzle_model;
		$quest = $this->Quest_model;
		$questname = $_POST['questname'];
		$questdetails = $_POST['questdetails'];
		$diffid = $_POST['diffid'];
		if($_POST['rewardid'] != 0){
			$rewardid = $_POST['rewardid'];
		}else{
			$rewardid = null;
		}
		$puzzleid = $_POST['puzzleid'];
		$helperanswer = $_POST['helperanswer'];
		$correctanswer = $_POST['correctanswer'];

		$imageurl = $_POST['imageurl'];

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

			if($quest->updateQuest($puzzleid, $questname, $questdetails, $diffid, $rewardid)==TRUE && $puzzle->updatePuzzle($puzzleid, $imageurl, $helperanswer, $correctanswer)==TRUE){
					echo "edit_puzzle_success";
					//$puzzledata = $this->Puzzle_model->getPuzzleFromPuzzleId($puzzleid);
					//$quest = $this->Quest_model;
					//$questtype = $quest->getquesttypedata();
					//$difficulty = $quest->getdifficulty();
					//$reward = $this->Rewards_model->getRewardFromType(4);
					//$questdata = $quest->getQuestFromQuestId($puzzleid);
					//$this->load->view(
					//	'editquest_puzzle_page',array(
					//		'message' => "Edit puzzle successful.",
					//		'questtype' => $questtype,
					//		'difficulty' => $difficulty,
					//		'reward' => $reward,
					//		'puzzledata' => $puzzledata[0],
					//		'questdata' => $questdata
					//	)
					//);
			}else{
				echo "edit_puzzle_failed";
				//$puzzledata = $this->Puzzle_model->getPuzzleFromPuzzleId($puzzleid);
				//$quest = $this->Quest_model;
				//$questtype = $quest->getquesttypedata();
				//$difficulty = $quest->getdifficulty();
				//$reward = $this->Rewards_model->getRewardFromType(4);
				//$questdata = $quest->getQuestFromQuestId($puzzleid);
				//$this->load->view(
				//	'editquest_puzzle_page',array(
				//		'message' => "Edit puzzle failed.",
				//		'questtype' => $questtype,
				//		'difficulty' => $difficulty,
				//		'reward' => $reward,
				//		'puzzledata' => $puzzledata[0],
				//		'questdata' => $questdata
				//	)
				//);
			}

		}else{
			echo "edit_puzzle_error";
			//$puzzledata = $this->Puzzle_model->getPuzzleFromPuzzleId($puzzleid);
			//$quest = $this->Quest_model;
			//$questtype = $quest->getquesttypedata();
			//$difficulty = $quest->getdifficulty();
			//$reward = $this->Rewards_model->getRewardFromType(4);
			//$questdata = $quest->getQuestFromQuestId($puzzleid);
			//$this->load->view(
			//	'editquest_puzzle_page',array(
			//		'message' => 'Form validation error. please check again.',
			//		'questtype' => $questtype,
			//		'difficulty' => $difficulty,
			//		'reward' => $reward,
			//		'puzzledata' => $puzzledata[0],
			//		'questdata' => $questdata
			//	)
			//);
		}
	}
}
