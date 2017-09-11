<?php
   session_start();
   $user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");  
   $ses_sql = mysqli_query($con,"SELECT * FROM accounts WHERE username='$user_check' AND status='Y'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $username = $row['username'];
   $name = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login-page.php");
   }
?>