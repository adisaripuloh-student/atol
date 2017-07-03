<?php
   include('../db.php');
   session_start();
   
   $username = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"SELECT username, password FROM pengguna WHERE username = '$username'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:/admin/?act=must-login");
   }
?>