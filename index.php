<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer;

//var_dump($email);

$novoEmail = new Email();
$novoEmail->sendMail("Assunto de teste", "<p>Esse é um e-mail de <b>teste</b>!</p>","samirnachef@outlook.com.br","Samir Nachef", "samirnachefnbs@gmail.com", "Samir");

var_dump($novoEmail);
