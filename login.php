<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

session_start(); // Starting Session
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");  
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

// SQL query to fetch information of registerd users and finds user match.
$sql = "SELECT * FROM accounts WHERE password='$password' AND username='$username'";
$result = mysqli_query($con,$sql);
$rows = mysqli_num_rows($result);

if ($rows == 1) {
	$_SESSION['login_user']=$username;
	header("location: index.php");
} 
else { header("location: login-page.php"); }
mysqli_close($con); // Closing Connection
?>