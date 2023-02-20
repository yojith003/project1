<?php
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $id = $_POST['id'];
} else {
    exit();
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'mrdsuresh2002@gmail.com'; //SMTP username
    $mail->Password = 'khjjyaczxammwpoh'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mrdsuresh2002@gmail.com', 'admin');
    $mail->addAddress($email); //Add a recipient

    $code = substr(str_shuffle('123456780QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Password reset';
    $mail->Body = 'To reset your password click <a href="http://localhost/Complete/Counsellor/change_password.php?code=' . $code . '">here</a>.</br>reset your password in a day';

    $conn = new mysqli('localhost', 'root', '', 'new');
    if ($conn->connect_error) {
        die('couldnt connect to db');
    }
    $verifyQuery = $conn->query("SELECT mail FROM counsellors WHERE  id='$id'");
    $temp = $verifyQuery->fetch_assoc()['mail'];
    if ($temp == $email) {
        if ($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE counsellors SET code ='$code' WHERE mail='$email'");
            $mail->send();
            echo 'Message has been sent check ur email';
        }
        $conn->close();
    } else {
        echo ' email does not matched to your id';
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>