<?php 
	/* DATABASE CONNECTION ================================================ */
	$conn = new mysqli("localhost", "root", "", "new");

	/* PASSWORD VALIDATION =================================================== */
	if(isset($_POST['validate'])){
		$userid = $_POST['userid'];
		$raw_password = $_POST['password'];
//
		$q = $conn->query("SELECT password FROM counsellors WHERE id = '$userid'");
	if ($q->fetch_assoc() == null) {
		$validation_iderror = 'invalid id';
	}
	else{
		$res = $conn->query("SELECT password FROM counsellors WHERE id = '$userid'");

		$hashed_password = $res->fetch_assoc()['password'];
		#echo $hashed_password;
		if(!password_verify($raw_password, $hashed_password)){
			$validation_error = "Wrong password";
		}else{
			$validation_success = "Your password is valid";
			header("Location: fileupload.php");
		}
	}
//
		

	}