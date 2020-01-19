<?php
session_start();
include ('connection.php');

if (isset($_POST['change'])) {
	//filter the data and create variables to hold them
	  	$email = mysqli_real_escape_string($conn,$_POST['email']);
	  	$password = mysqli_real_escape_string($conn,$_POST['password']);
	  	$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

	  	if ($password == $cpassword) {
	  		# code...
	  		$check = "SELECT * from chat_users where email ='$email'";
	  		$excheck = mysqli_query($conn , $check);
	  		$numRow = mysqli_num_rows($excheck);

	  		if ($numRow ==1) {
	  			# code...
	  			$checkpass = "SELECT * from chat_users where password = '$password' and email = '$email'";
	  			$excheckpass = mysqli_query($conn , $checkpass);
	  			$passNumRow = mysqli_num_rows($excheckpass);
	  			 //return error if there is a match
	  			if ($passNumRow >0) {
	  				# code...
	  				echo "You cannot use password twice please input another password";
	  			}
	  			else{
	  				$update = "UPDATE chat_users set password = '$password' where email = '$email'";
	  				$exupdate = mysqli_query($conn , $update);
	  				if ($exupdate) {
	  					# code...
	  					echo "Successfully Updated your password..a confirmation mail will be send to you sooner";
	  					header("location : signin.php");
	  				}
	  				else{
	  					echo "OOPs an Error occured";
	  				}
	  			}



	  		}
	  		else{
	  			echo "Email does noot exists";
	  		}
	  	}
	  	else{
	  		echo "Please note that password must match";
	  	}
	  	
	  }
?>