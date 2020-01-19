<?php

$host = "localhost";
$user = "steve";
$pass = "steve";
$db = "chatapp";

$conn= mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
	echo 'OOps An Error Occured During connection : '.mysqli_connect_error();
}
?>