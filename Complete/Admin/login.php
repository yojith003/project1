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

	<h1>Login</h1>

	<form action="" method="post" autocomplete="off">
		<label>Type a username</label>
		<input type="text" name="username">

		<label>Type a password</label>
		<input type="text" name="password">

		<button type="submit" name="validate">Submit</button>

		<p class="error"><?php echo @$validation_error ?></p>
		<p class="success"><?php echo @$validation_success ?></p>
		<p class="error"><?php echo @$validation_iderror ?></p>
	</form>

</body>
</html>