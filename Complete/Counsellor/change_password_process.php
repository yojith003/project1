<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $conn = new mysqli('localhost', 'root', '', 'new');
    if ($conn->connect_error) {
        die('couldnt connect to database ');
    }
    $verifyQuery = $conn->query("SELECT * FROM counsellors WHERE code='$code'");
    if ($verifyQuery->num_rows == 0) {
        header("Location:counnewlogin.php");
        exit();

    }
    if (isset($_POST['change'])) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $changeQuery = $conn->query("UPDATE counsellors SET password = '$hash_password' WHERE mail='$email' and code='$code'");
        if ($changeQuery) {
            header("Location:success.html");

        }
    }
    $conn->close();
} else {
    header("Location:counnewlogin.php");
    exit();
}

?>