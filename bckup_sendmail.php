<?php
    require 'ADAPRIME/class/PHPMailer/PHPMailerAutoload.php';
    class phpmailer_class{
        public function sendmail($mailAddress, $mailSubject, $mailBody){
            
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            //$mail->Host = 'smtp.gmail.com';
            $mail->Host = gethostbyname("smtp.gmail.com");
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;

            $mail->Username = "adaventure17@gmail.com";
            $mail->Password = "adaventure17@17";
            
            $mail->setFrom('adaventure@pragyan.org', 'Team Adaventure');
            //$mail->addAddress('jabhinav11@gmail.com');
            $mail->addAddress($mailAddress);
            //$mail->addReplyTo('adaventure17@gmail.com', 'Information');

            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->isHTML(true);

            //$mail->Subject = 'Testing mail';
            $mail->Subject = $mailSubject;
            //$mail->Body    = 'Hello from team <b>Adaventure</b>';
            $mail->Body    = $mailBody;

            //$mail->AltBody = 'body in plain text for non-HTML mail clients';
            
            //$mail->addAttachment($mailAttachment);
            $mail->addAttachment('/var/www/html/bckup.zip', 'backup');
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            if($mail->send()) {
                //echo 'Mail has been sent';
                return true;
            } else {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                return false;
            }
        }
    }
    //$bckup = $_REQUEST['path'];
    $phpmail = new phpmailer_class();
    $phpmail->sendmail('adaventure17@gmail.com','Backup Mail','<b>Adaventure</b> database backup.');
?>