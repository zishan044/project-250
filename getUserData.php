<?php
  include ('connection.php');


  $user = "SELECT * from chat_users";
  $exuser = mysqli_query($conn , $user);

  while ($numrow = mysqli_fetch_array($exuser)) {
  	# code...
  	$userId = $numrow['id'];
  	$user_name = $numrow['username'];
  	$userpic = $numrow['profile'];
  	$login = $numrow['login'];

  	echo"
  	<li>
  	<div class='chat_left-img'>
  	<img src='$userpic' alt='image'>
    </div>

  	<div class='chat_left-details'>
       <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
       if($login == "online"){
       	echo "<span><i class='fa fa-circle' aria-hidden='true'></i>online</span>";
       }
       else{
       	echo "<span><i class='fa fa-circle' aria-hidden='true'></i>offline</span>";

       }"

  	</div>



  	</li>



  	";
  }

?>