<?php

include ('connection.php');

if (isset($_POST['signup'])) {
	//filter the data and create variables to hold them
	  	$username = mysqli_real_escape_string($conn,$_POST['username']);
	  	$email = mysqli_real_escape_string($conn,$_POST['email']);
	  	$country = mysqli_real_escape_string($conn,$_POST['country']);
	  	$password = mysqli_real_escape_string($conn,$_POST['password']);
	  	$password1 = mysqli_real_escape_string($conn,$_POST['cpassword']);
	  	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $date = date("y-m-d  h:i:sa");
        $login = "offline";
	//create random numbers
	$random = rand(1,2);

	if (!empty($name)) {
		echo "<script>alert('username is empty')</script>";
	}

		if (strlen($password) < 8) {
		echo "<script>alert('Password must be over 8 characters long')</script>";
	}

	$lookEmail = "SELECT * from chat_users where email = '$email'";
	$query = mysqli_query($conn,$lookEmail);
    $numRow = mysqli_num_rows($query);


    if ($numRow >1){
       echo "<script>alert('Email Already exists')</script>";
       echo "<script>window.open('signup.php', '_self')</script>";	
       exit();
    }
    else{
    	    if ($random ==1){
    	    	//give a progile pic

    	$profile_pic = "/opt/lampp/htdocs/chatting/1.jpg";    
    	}
    	else{
    	$profile_pic = "/opt/lampp/htdocs/chatting/1.jpg";	
    	}

    	$insert = "INSERT into chat_users (username ,email , password , country , gender ,profile,n_date,login) values('$username','$email','$password','$country' ,'$gender' , '$profile_pic','$date' , '$login')";

    	$query = mysqli_query($conn, $insert);
    	if ($query){
    		echo "<script>alert('You Have Successfully regeesterd into the chat app..feel relaxed and start chatting')</script>";
    		echo "<script>window.open('signin.php', '_self')</script>";
    	}
    	else{
    		echo "<script>alert('Regestration Failed...An error occured please try again')</script>" ;
            echo 'OOps An Error Occured : '.mysqli_error($conn);
            echo "$date";
    		//echo "<script>window.open('signup.php', '_self')</script>";
    	}
    	}


    }

?>