<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wachtwoord extends CI_Controller {

    public function verander(){

        if($this->login->checkLogin()){
            $title['title'] = 'Wijzig wachtwoord | Optimise Hotpsot';

            $this->load->view('templates/head', $title);
            $this->load->view('pages//wachtwoord/veranderWachtwoord');
            $this->load->view('templates/footer');
            $this->load->view('templates/homeScripts');
        }
    }

    public function veranderWifi(){

        if($this->login->checkLogin()){
            $title['title'] = 'Wijzig wachtwoord | Optimise Hotpsot';

            $this->load->model('Site_model');
            $data['currentWifiPw'] = $this->Site_model->getWifiPassword();

            $this->load->view('templates/head', $title);
            $this->load->view('pages/wachtwoord/veranderWifiWachtwoord', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/homeScripts');
        }
    }

    public function setNewPassword(){

        $newPassword = $this->input->post('confirmPassword', TRUE);

        $this->load->model('Site_model');
        $this->Site_model->changePassword($newPassword, $_SESSION['uid']);

        $title['title'] =  'Succes | Optimise Hotpsot';

        $this->load->view('templates/head', $title);
        $this->load->view('pages/wachtwoord/veranderWachtwoordSucces');
        $this->load->view('templates/footer');
        $this->load->view('templates/homeScripts');
    }

    public function setNewWifiPassword(){

        $newPassword = $this->input->post('newWifiPw', TRUE);

        $this->load->model('Site_model');
        $this->Site_model->changeWifiPassword($newPassword, $_SESSION['uid']);

        $title['title'] =  'Succes | Optimise Hotpsot';

        $this->load->view('templates/head', $title);
        $this->load->view('pages/wachtwoord/veranderWifiWachtwoordSucces');
        $this->load->view('templates/footer');
        $this->load->view('templates/homeScripts');
    }

    public function checkUserPassword(){
        $passInput = $this->input->post('pass', TRUE);

        $this->load->model('Login_model');
        $password = $this->Login_model->getPasswordById($_SESSION['uid']);


        if (password_verify($passInput, $password)) {
            echo 'true';
        }else{
            echo 'false';
        }
    }
}