<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);
    try {
        //Server settings   
        //$mail->SMTPDebug = 2; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port     = 465;     

        //Content
        $name = $_POST['name'];
        $visitor_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $email_subject = "New Submission from $name.";
        $email_body = "<BR>User Name: $name.</BR>
                        <BR>User Email: $visitor_email.</BR>
                        User Message: $message.";
        //Recipients
        $mail->setFrom('Laicom@laicom.com.tw', 'Mailer');
        $mail->addAddress('mingo.lai@gmail.com', 'Mingo');     
        
        //Content
        $mail->isHTML(true);
        $mail->Subject = $email_subject;
        $mail->Body    = $email_body;
        

    $mail->send();
    echo 
    "
    <script>
    alert('Thank you, your message has been sent');
    document.location.href='contact.html';
    </script>
    ";
    //header("Location: contact.html");
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
} 
?>