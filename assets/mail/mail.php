<?php

//require_once 'vendor/autoload.php';
//require_once '../classes/Controller/UserDB.php';
//require_once '../classes/Controller/ResetPassDB.php';
$root = $_SERVER['DOCUMENT_ROOT'] . "Nemo/";
require_once $root . 'vendor/autoload.php';
require_once $root . 'mail/vendor/autoload.php';
require_once $root . 'classes/Controller/UserDB.php';
require_once $root . 'classes/Controller/ResetPassDB.php';


if(isset($_GET['address']) && ($usrId = getIdByUserMail($_GET['address']))){
$name = getFullNameById($usrId);
$token = createResetToken($usrId, getRealIpAddr());
// Create the Transport
$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('mhealthunit@gmail.com')
  ->setPassword('Healer123');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transporter);
$message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject('Nemo Platform Forgot password')

  // Set the From address with an associative array
  ->setFrom(array('mhealthunit@gmail.com' => 'Mobile Health Unit'))

  // Set the To addresses with an associative array
  ->setTo(array($_GET['address'] => $name[1] . " " . $name[0]))
  //->setTo(array('thomas.reyskens@gmail.com' => 'Thomas Reyskens'))        

  // Give it a body
  ->setBody(
          '<html>' 
          . ' <head></head>' 
          . ' <body>' 
          . '<h2>Hello '.$name[0].'</h2><p>This is an automated message from the Nemo Platform. '
          . 'If you did not recently initiate the Forgot Password process, please disregard this email.</p>'
          . '<p>You indicated that you forgot your login password. We generated a link for you to reset your password.</p>'
          . '<p>Please click <a href="http://localhost:8888/Nemo/forgotPass.php?code='. $token .'">here</a> To change your password.</p>'
          . '<p>If you do not click the link in this email, no changes will be made to your account.</p> '
          . '<p>Kind regards, <br /> <br /> Mobile Health Unit </p>'
          . ' </body>' 
          .  '</html>',
          'text/html'
          );
          
  // And optionally an alternative body
  //->addPart('<q>Here is the message itself</q>', 'text/html');


if ($mailer->send($message))
{
  echo "Sent\n";
}
else
{
  echo "Failed\n";
}
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
  ->setBody('Here is the message itself')
  ;

}

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}