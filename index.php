<?php require 'script.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Tutorial</title>
</head>
<body>

	<h1>Hash a password and store it in the database</h1>

	<form action="" method="post" autocomplete="off">
		<label>Type a username</label>
		<input type="text" name="username">

		<label>Type a password</label>
		<input type="text" name="password">

		<button type="submit" name="record">Submit</button>

		<p class="error"><?php echo @$record_error ?></p>
		<p class="success"><?php echo @$record_success ?></p>
	</form>









</body>
</html>