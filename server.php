<?php
    session_start();

   $username ="";
   $email = "";
   $errors = array();
   // connect to the database
   $db = mysqli_connect('localhost','root','java','registration');

   //if register button is clicked
   if (isset($_POST['register'])){

   	$username = mysql_real_escape_string($_POST['username']);
   	$email = mysql_real_escape_string($_POST['email']);
   	$password_1 = mysql_real_escape_string($_POST['password_1']);
   	$password_2= mysql_real_escape_string($_POST['password_2']);

    //user exists


   	//ensure that form field are filled properly
   	if (empty($username)) {
   		array_push($errors,"Username is required"); //add errors to error array
   	}
   	if(empty($email)){
   		array_push($errors,"Email is required");
   	}
   	if(empty($password_1)){
   		array_push($errors,"Password is reqiured");
   	}
   	if($password_1 != $password_2){
   		array_push($errors,"Password doesnt matches");
   	}

    //users exits
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
  
      if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
    }

      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
    }
}
    //if same username or email appears

   	//if there are no errors , save user to database
   	if(count($errors)==0){
   		$password = md5($password_1);
   		$sql = "INSERT INTO users(username,email,password) VALUES ('$username','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "you are logged in";
        //redirect to home page
        header('location: index.php'); 
   	}
   }

   if(isset($_POST['login'])){
   	$username = mysql_real_escape_string($_POST['username']);
   	$password = mysql_real_escape_string($_POST['password']);
   	
   	//ensure that form field are filled properly
   	if (empty($username)) {
   		array_push($errors,"Username is required"); //add errors to error array
   	}
   	if(empty($password)){
   		array_push($errors,"password is required");
   	}

   	if(count ($errors) == 0){
   		$password = md5($password);
   		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
   		$result = mysqli_query($db, $query);
   		if (mysqli_num_rows($result) == 1 ) {

   		    $_SESSION['username'] = $username;
          $_SESSION['success'] = "you are logged in";
        //redirect to home page
          header('location: index.php'); 	
   		}else{
   			array_push($errors, "Check username and password combination");

   		}
   	}

   }


   //logout 
   if (isset($_GET['logout'])) {
   	 session_destroy();
   	 unset($_SESSION['username']);
   	 header('location: login.php');
   }
   ?>