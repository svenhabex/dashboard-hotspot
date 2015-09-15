<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if($this->login->checkLogin()){
            $title['title'] = 'Dashboard | Optimise Hotpsot';

            //get aantal bezoekers
            $this->load->model('Checkin_model');
            $data['numberVisitors'] = $this->Checkin_model->numberVisitorsCurrentWeek();
            $data['visits'] = $this->Checkin_model->NumberVisitorsLastMonth();

            $this->load->view('templates/head', $title);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/homeScripts');
        }
    }
}
