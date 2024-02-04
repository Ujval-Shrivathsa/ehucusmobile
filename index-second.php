<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "connectwithujval@gmail.com";
    $mail->Password = "tvxq smpi fhwc xdjr";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom("connectwithujval@gmail.com");

    $mail->addAddress("connectwithujval@gmail.com");
    $mail->addCC("lokeshjsu@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "Your Meeting Sir";
    
    $mail->Body = "Your Meeting starts after 15 minutes, Your Meeting Id is";

    $mail->send();

    echo "
    <script>alert('Sent');</script>
    document.location.href = './index-second.php';
    ";

    header("Location: ./index-second.php");
}
?>