<?php 
	/* DATABASE CONNECTION ================================================ */
	$conn = new mysqli("localhost", "root", "", "new");

	/* PASSWORD ENCODING =================================================== */
	if(isset($_POST['record'])){
		if(!empty(trim($_POST['password'])) && !empty(trim($_POST['username']))){
			$userid = $_POST['userid'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fromRange = $_POST['fromRange'];
			$toRange = $_POST['toRange'];
			$usermail = $_POST['usermail'];
			$mobileNumber = $_POST['mobilenumber'];

			$enc_password = password_hash($password, PASSWORD_DEFAULT);

			$conn->query("INSERT INTO counsellors(id, password, username, usermail, FromRange, ToRange, mobilenumber) VALUES('$userid','$enc_password','$username','$usermail','$fromRange','$toRange', '$mobileNumber' )");
		} 
		else {
			$record_error = "Both fields must have values";
		}
	}

	/* PASSWORD VALIDATION =================================================== */
	if(isset($_POST['validate'])){
		$username = $_POST['username'];
		$raw_password = $_POST['password'];
//
		$q = $conn->query("SELECT id FROM administrator WHERE id = '$username'");
	if ($q->fetch_assoc() == null) {
		$validation_iderror = 'invalid id';
	}
	else{
		$res = $conn->query("SELECT password FROM administrator WHERE id = '$username'");

		$hashed_password = $res->fetch_assoc()['password'];
		#echo $hashed_password;
		if(!password_verify($raw_password, $hashed_password)){
			$validation_error = "Wrong password";
		}else{
			$validation_success = "Your password is valid";
			header("Location: admininterface.php");
		}
	}
//
		

	}