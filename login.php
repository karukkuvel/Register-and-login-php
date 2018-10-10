<?php
    include ('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>LOGIN</h2>
	</div>
	<form action="login.php" method="POST">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter the Username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Sign in</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Register</a>
		</p>
	</form>

</body>
</html>