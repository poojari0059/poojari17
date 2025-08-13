<?php
    require 'PHPMailer/PHPMailerAutoload.php';
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
            
            $mail->setFrom('adaventure17@gmail.com', 'Team Adaventure');
            //$mail->addAddress('jabhinav11@gmail.com');
            $mail->addAddress($mailAddress);
            //$mail->addReplyTo('adaventure17@gmail.com', 'Information');

            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            $mail->isHTML(true);

            //$mail->Subject = 'Testing mail';
            $mail->Subject = $mailSubject;
            //$mail->Body    = 'Hello from team <b>Adaventure</b>';
            $mail->Body    = $mailBody;

            //$mail->AltBody = 'body in plain text for non-HTML mail clients';

            if($mail->send()) {
                //echo 'Mail has been sent';
                return true;
            } else {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                return false;
            }
        }
    }
    //echo 'hello';
    $phpmail = new phpmailer_class();
    //$phpmail->sendmail('jabhinav11@gmail.com','Welcome','Hello from team <b>Adaventure</b>');
?>