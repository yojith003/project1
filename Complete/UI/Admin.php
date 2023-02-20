<?php require 'script.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="style2.css">

	<link rel="stylesheet" href="sample.css">
    <title>Tutorial</title>
</head>
<body>
<?php require '_nav.php' ?>
	<h1 style=" text-align: center; padding-top: 20px;" >Login</h1>
	<div class="center">
	<form action="" method="post" autocomplete="off">
		<div class="txt_field">
		
		<input placeholder="Username" type="text" name="username">
		</div>

		<div class="txt_field">
		
		<input placeholder="password" type="text" name="password">
		</div>

		<button type="submit" class="btn btn-primary" name="validate">Submit</button>

		<p class="error"><?php echo @$validation_error ?></p>
		<p class="success"><?php echo @$validation_success ?></p>
		<p class="error"><?php echo @$validation_iderror ?></p>
	</form>
	</div>

</body>
</html>