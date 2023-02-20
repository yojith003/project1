<?php 
	/* DATABASE CONNECTION ================================================ */
	$conn = new mysqli("localhost", "root", "", "new");

	/* PASSWORD ENCODING =================================================== */

    $password = 'sircrrengg';
    $enc_password = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("UPDATE `counsellors` SET `password`='$enc_password' WHERE 1 ");
?>