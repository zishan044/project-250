<?php 

session_start(); 
include ('connection.php');
include ('getFriendsFtn.php');


if (!isset($_SESSION['username'])) {
	# code...
	header("location:signin.php");
}
else{
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>H0ome Page for the chat app</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="findFriend.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a  class="navbar-brand" href="#">
			<?php
			$user = $_SESSION['username'];
			$getuser = "select * from chat_users where username = '$user'";
			$run_user = mysqli_query($conn , $getuser);
			$row = mysqli_fetch_array($run_user);
			$username = $row['username'];
			echo "<a class='navbar-brand' href='home.php?username=$username'>Mychat</a>";

			?>

		</a>
		<ul class="navbar-nav">
			<li><a style="color:white;text-decoration: none;font-size: 24;" href="setting.php">Setting</a></li>
		</ul>
	</nav><br><br>
	<div class="row">
		<div class="col-sm-4">
			<form class="search_form" action="">
				<input type="text" name="search" placeholder="Search user" autocomplete="off">
				<button class="btn " type="submit" name="search_btn">Search</button>
			</form>
		</div>
		<div class="col-sm-4">
			
		</div>
	</div><br><br>
	<?php searchUser(); ?>
</body>
</html>
<?php }?>