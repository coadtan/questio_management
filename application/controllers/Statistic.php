<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Place_model');
    }

    public function index(){
        $session_data = $this->session->userdata('logged_in');
        $this->load->view('statistics_page', array(
                    'keeperplace' => $this->Place_model->showPlaceManagement($session_data['keeperid'])
                    ));
    }

    public function adventurercount(){
        $x = array(
                '2013-10-04 22:23:00',
                '2013-11-04 22:23:00',
                '2013-12-04 22:23:00'
            );
        $y = array(
                1,
                3,
                6
            );
        $this->load->view('adventurer_count', array(
                                        'x' => $x,
                                        'y' => $y
                                    ));
    }
}
