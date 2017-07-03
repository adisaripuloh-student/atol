<?php
	$host	= "localhost";
	$user = "root";
	$password = "mei199627";
	$database = "atol";

	$db = mysqli_connect($host,$user,$password,$database);


if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
?> 