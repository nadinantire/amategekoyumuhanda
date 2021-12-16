<?php
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

//data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg_subject']) && isset($_POST['message'])){
    
    $name = $_POST['name'];
    $emailFrom = $_POST['email'];
    $subject = $_POST['msg_subject'];
    $message = $_POST['message'];

    require '../libraries/PHPMailer/src/Exception.php';
    require '../libraries/PHPMailer/src/PHPMailer.php';
    require '../libraries/PHPMailer/src/SMTP.php';

    $smtpUsername = "Befalanguage@gmail.com";
    $smtpPassword = "Password@2021";

    
    $emailTo = "befalanguage@gmail.com";
    $emailToName = "Befa Language";

    $mail = new PHPMailer;
    $mail->isSMTP(); 
    $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is depracated
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = false;
    $mail->do_debug = 0;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->setFrom($emailFrom, $name);
    $mail->addAddress($emailTo, $emailToName);
    $mail->Subject = $subject;
    $mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->AltBody = 'HTML messaging not supported';
    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

    if(!$mail->send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "success";
    }
}else{

    exit();

}

?>