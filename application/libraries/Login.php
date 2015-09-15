<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login {

    public function checkLogin(){
        if (!(isset($_SESSION['loginOK']) && $_SESSION['loginOK'] == true)) {
            $_SESSION['ref'] = trim($_SERVER['REQUEST_URI'], '/');
            redirect('Login', 'location');
            return false;
        }else{
            return true;
        }
    }
}
