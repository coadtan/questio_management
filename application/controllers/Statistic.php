<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Place_model');
        $this->load->model('Statistics_model');
    }

    public function index(){
        $session_data = $this->session->userdata('logged_in');
        $this->load->view('statistics_page', array(
                    'keeperplace' => $this->Place_model->showPlaceManagement($session_data['keeperid'])
                    ));
    }

    public function adventurercount(){
        $statistics = $this->Statistics_model;
        $type = $_GET['type'];
        $placeid = $_GET['placeid'];
        $x = $statistics->getEnterDateByPlaceAndType($placeid, $type);
        $y = $statistics->getAdventurerCountByPlaceAndType($placeid, $type);

        $this->load->view('adventurer_count', array(
                                        'x' => $x,
                                        'y' => $y
                                    ));
    }
    public function questplayed(){
        $statistics = $this->Statistics_model;
        $placeid = $_GET['placeid'];
        $x = $statistics->getQuestNamePlayedByPlaceId($placeid);
        $y = $statistics->getCountQuestPlayedByPlaceId($placeid);

        $this->load->view('quest_played', array(
                                        'x' => $x,
                                        'y' => $y
                                    ));
    }
}
