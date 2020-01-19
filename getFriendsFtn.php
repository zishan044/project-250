<?php

include ('connection.php');


function searchUser()
{
	# code...
	global $conn;
	if (isset($_GET['search_btn'])) {
		# code...
		$search = htmlentities($_GET['search']);
		$get_user = "select * from users_chat like '%search%'  or country ='%search%' "; 
	}
	else{
		$get_user = "select * from users_chat order by country , username DESC LIMIT 5";

	}
	$run_query = mysqli_query($conn , $get_user);
	$user_name = $run_query['username'];
	$userpic = $run_query['profile'];
	$country = $run_query['country'];
	$gender = $run_query['gender'];


	//outputing the detailes of the searched user

	echo "
	<div class='card'>
        <img src = '$userpic'>
        <h2>
          $user_name
        </h2>
        <p class='title'>$country</p>
        <p>$gender</p>
        <form method='POST'>
          <p><button name = 'add'>Chat with $user_name</button></p>
        </form>
	</div><br>


	";
	if (isset($_POST['add'])) {
		# code...
		echo "<script>window.open('home.php?user_name=$user_name' , '_self')</script>";
	}
}





?>