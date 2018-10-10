<?php include('server.php'); ?>
<?php


	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>HOME PAGE</h2>
	</div>
	 
	 <div class="content">
	 	<?php if (isset($_SESSION['success'])): ?>
	 <div class="error success">
	 	<h3>
	 		<?php
	 		echo $_SESSION['success'];
	 		unset( $_SESSION['success']);
	 		?>
	 	</h3>
	 </div>
	<?php endif ?>

	<?php if (isset($_SESSION['username'])): ?>
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
	 	<?php endif ?>
	 </div>

</body>
</html>