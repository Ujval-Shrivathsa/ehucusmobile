<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $name = $_POST['fname'];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $interwhat = $_POST["interin"];
    $officenear = $_POST["ofiicenearyou"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ehcus";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Failed to connect: ".mysqli_connect_error());
    }
    else{
        echo "Success";
    }

    $sql = "INSERT INTO `dataforehcus`(`firstname`, `lastname`, `email`, `interested`, `officenear`, `phone`) VALUES ('$name', '$lname', '$email', '$interwhat', '$officenear', '$phone')";
    $result = mysqli_query($conn, $sql);

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

    $mail->isHTML(true);

    $mail->Subject = "New Message From". " " . $_POST["fname"];
    $mail->Body = "Name: $name <br> Last Name: $lname <br> Email: $email <br> Phone: $phone <br> They Are Interested In: $interwhat <br> Office Near them: $officenear";

    $mail->send();

    echo "
    <script>alert('Sent');</script>
    document.location.href = './index.html';
    ";

    header("Location: ./another-suii.html");
}
?>