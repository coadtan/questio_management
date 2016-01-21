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

}
