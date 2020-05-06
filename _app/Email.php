<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $mail = \stdClass::class;

    public function __construct() {
        //$email = new PHPMailer(); 
        $this->mail = new PHPMailer(true);

        //Server settings
        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                          // Enable verbose debug output
        $this->mail->isSMTP();                                                 // Send using SMTP
        $this->mail->Host = 'mail.samirnachef.me';                             // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                        // Enable SMTP authentication
        $this->mail->Username = 'sender@samirnachef.me';                     // SMTP username
        $this->mail->Password = 'teste@123';                               // SMTP password
        $this->mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port = 587;                                         // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $this->mail->CharSet = 'utf-8';
        //$this->mail->setLanguage('br');                                    
        //$this->mail->isHTML(true);
        //Recipients
        //$mail->setFrom('samirnachefnbs@gmail.com', 'Samir');
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
    {

        $this->mail->Subject = (string) $subject; 
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $exception) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$exception->getMessage()}";
        }
        
    }
}
