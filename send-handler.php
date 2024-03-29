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
        $mail->Username = $Username;
        $mail->Password = $Password;
        $mail->Port     = 465;     
        $name = $_POST['name'];
        $visitor_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $email_subject = "New Submission from $name.";
        $email_body = 
        "
        <html>
            <body>
                <h1>Thank you for your message</h1>
                <p>We will get back to you ASAP.</p>
                <p> Username = $name.</p>
                <p> Email = $visitor_email.</p>
                <p> Your Message = $message.</p>
            </body>
        </html>              
        ";
        //$email_body = file_get_contents('email_template.html');
        $mail->setFrom('Laicom@laicom.com.tw', 'Mailer');
        $mail->addAddress('mingo.lai@gmail.com', 'Mingo');     
        $mail->addAddress('laicom@hotmail.com', 'David');
        $mail->isHTML(true);
        $mail->Subject = $email_subject;
        $mail->Body    = $email_body;       

    $mail->send();
    echo "
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
