<?php 
session_start();
require_once ('../../db.php');

if (isset($_POST['btn-login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	  
	  $sql = "SELECT username, password FROM pengguna WHERE username = '$username' and password = '$password'";
	  $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result);
	  
	  $count = mysqli_num_rows($result);

	  if($count == 1) {
	     $_SESSION['username'] = $username;
	     
	     header("location: ../dashboard.php");
	  }else {
	     header("location: ../?act=fail-login");
	  }
}
?>