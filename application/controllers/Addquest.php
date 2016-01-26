<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addquest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Quest_model');
		$this->load->model('Rewards_model');
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


}
