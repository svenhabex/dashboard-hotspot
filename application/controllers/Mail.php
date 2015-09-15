<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'assets/mail/vendor/autoload.php';

class Mail extends CI_Controller {

    public function index()
    {
        if($this->login->checkLogin()){
            $title['title'] = 'Dashboard | Optimise Hotpsot';

            $this->load->view('templates/head', $title);
            $this->load->view('pages/mail');
            $this->load->view('templates/footer');
            $this->load->view('templates/homeScripts');
        }
    }

    public function sendNieuwsbrief(){
        $this->load->model('Checkin_model');
        $text = $this->input->post('text', TRUE);
        $option = $this->input->post('option', TRUE);

        $mails = $this->Checkin_model->getMailVisitors($option);

        $mails2 = array();

        foreach($mails as $mail){
            $mails2[] = $mail->email;
        }

        $mails2 = array_unique($mails2);

        ini_set('max_execution_time', 300); //300 seconds = 5 minute
        foreach($mails2 as $mail2){
            //verstuur mail naar leverancier
            $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUsername('optimisenews@gmail.com')
                ->setPassword('Optimise369');
            $mailer = Swift_Mailer::newInstance($transporter);
            $message = Swift_Message::newInstance()
                ->setSubject('Optimise nieuwsbrief')
                ->setFrom(array('optimisenews@gmail.com' => 'Optimise News'))
                ->setTo(array($mail2))
                ->setBody(
                    '<html>'
                    . ' <head></head>'
                    . ' <body>'
                    . '<p>'.$text.'</p>'
                    . '<p>Met vriendelijke groeten, <br /> <br /> Optimise News </p>'
                    . ' </body>'
                    . '</html>',
                    'text/html'
                );
            $mailer->send($message);
        }
    }
}
