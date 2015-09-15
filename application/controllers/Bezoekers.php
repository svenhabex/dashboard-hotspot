<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bezoekers extends CI_Controller {

    public function index()
    {
        if($this->login->checkLogin()){
            $title['title'] = 'Dashboard | Optimise Hotpsot';

            //get aantal bezoekers
            $this->load->model('Checkin_model');
            $data['visitors'] = $this->Checkin_model->visitorsCurrentWeek();

            $this->load->view('templates/head', $title);
            $this->load->view('pages/bezoekers', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/homeScripts');
        }
    }

    public function changeTable()
    {
        $value = $this->input->post('value', TRUE);

        $this->load->model('Checkin_model');

        if($value == 1){
            $data['visitors'] = $this->Checkin_model->visitorsCurrentWeek();
        }elseif($value == 2){
            $data['visitors'] = $this->Checkin_model->visitorsLastMonth();
        }elseif($value == 3){
            $data['visitors'] = $this->Checkin_model->visitorsLast6Months();
        }

        $this->load->view('templates/bezoekers/tableBezoekers', $data);
    }
}
