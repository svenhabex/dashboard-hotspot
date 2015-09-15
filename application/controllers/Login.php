<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $data['error'] = $this->uri->segment(3);

        $this->load->view('pages/login', $data);
    }

    public function signIn()
    {
        if(isset($_SESSION['ref'])){
            $ref = $_SESSION['ref'];
            unset($_SESSION['ref']);
        }

        //gebruikersnaam en wachtwoord door de gebruiker ingevoerd
        $user = $this->input->post('user', TRUE);
        $password = $this->input->post('password', TRUE);

        //controleer of variabelen een waarde hebben
        if (isset($user, $password)) {
            $this->load->model('Login_model');
            $this->load->model('Site_model');
            //haal userid op
            $id = $this->Login_model->getIdByUsername($user);

            //genereer error als user niet bestaat
            if (is_null($id)) {
                redirect('Login/index/1', 'location');
                exit();
            }

            //haal het wachtwoord op van de gebruiker
            $pass = $this->Login_model->getPasswordById($id);

            //controleer of het wachtwoord correct is
            if (password_verify($password, $pass)) {
                session_regenerate_id();
                //maak de sessie variabelen aan
                $_SESSION['loginOK'] = true;
                $_SESSION['key'] = $this->Site_model->getKeyById($id);
                $_SESSION['username'] = $this->Site_model->getUsernameById($id);
                $_SESSION['name'] = $this->Site_model->getNameById($id);
                $_SESSION['uid'] = $id;

                //controleer of de gebruiker al ooit is ingelogd
                if($this->Login_model->getLogin($id)){
                    //update het login record
                    $this->Login_model->updateLogin($this->getRealIpAddr(), $id);
                }else{
                    //maak een nieuw login record aan
                    $this->Login_model->createLogin($this->getRealIpAddr(), $id);
                }
                if(isset($ref)){
                    redirect('../'.$ref, 'location');
                }

                redirect('', 'location');
                exit();

            } else {
                //genereer error als het wachtwoord fout is
                redirect('Login/index/2', 'location');
                exit();
            }
        }
    }

    public function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function changePassword()
    {

        $this->load->model('Site_model');
        $this->Site_model->changePassword();

    }
}