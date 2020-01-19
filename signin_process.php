
<?php
session_start();
  include ('connection.php');
  if (isset($_POST['signin'])) 
   {
         $user = mysqli_real_escape_string($conn,$_POST['username']);
         $pass = mysqli_real_escape_string($conn,$_POST['password']);

        //check if username is found

         $check = "SELECT * from chat_users  where username = '$user' ";

         //query the results
         $results = mysqli_query($conn , $check);

         //create the record rows
         $row =mysqli_num_rows($results);


         //check number of rows to be one
         if ($row == 1) 
         {
         	$_SESSION['username'] = $user;
         	$change = "UPDATE chat_users set login = 'online' where username = '$user'";
         	$update = mysqli_query($conn , $change);
         	$username = $_SESSION['username'];
         	$getUser = "SELECT * from chat_users where username = '$username'";
         	$exUser = mysqli_query($conn , $getUser);
         	$numRow = mysqli_fetch_array($exUser);
         	$username = $numRow['username'];
         	echo "<script>window.open('home.php?username=$username','_self')</script>";

       	}
       	else{
       		echo "
       		<div class='alert alert-danger'>
       		<strong>Check Your email or password again</strong></div>";
       	}


       
    }

?>