<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION FORM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>REGISTER</h2>
  </div>
 <form action="register.php" method="POST">
 	<?php include('errors.php'); ?>
 	<div class="input-group">
  	<label>UserName</label>
  	<input type="text" name="username" placeholder="Enter your Username" value="<?php  echo $username; ?>">
  </div>
  <div class="input-group">
  	<label>Email</label>
  	<input type="text" name="email" placeholder="Enter your Email" value="<?php  echo $email; ?>">
  </div>
  
  <div class="input-group">
  	<label>Password</label>
  	<input type="password" name="password_1" placeholder="Password">
  </div>
  <div class="input-group">
  	<label>Confirm Password</label>
  	<input type="password" name="password_2" placeholder="Password">
  </div>
  <div class="input-group">
  	<button type="submit" name="register" class="btn" >Register</button>
  </div>
  <p>
  	Already a member? <a href="login.php">Sign in</a>
  </p>
  </form>
</body>
</html>