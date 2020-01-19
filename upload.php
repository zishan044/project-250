<?php 

session_start(); 
include ('connection.php');
include ('headbar.php');


if (!isset($_SESSION['username'])) {
	# code...
	header("location:signin.php");
}
else{
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="upload.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<?php
		 $user = $_SESSION['username'];
		 $get = "select * from chat_users where username = '$user'";
		 $run = mysqli_query($conn , $get);
		 $row = mysqli_fetch_array($run);

		 $username = $row['username'];
		 $profile = $row['profile'];

	 ?>
			 <div class='card'>
			 	<
			<img src='<?php echo $profile; ?>'>
			<h1><?php echo $username; ?></h1>
			<form method='post' enctype='multipart/form-data' action="">
			<label id='change'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
			<input type='file' name='image' size='65'>
			</label>
			<button id='btn-profile' name='change'><i class='fa fa-heart' aria-hidden='true'></i>Change Image</button>
			</form>
			 </div><br><br>

	 <?php
	 if (!isset($_POST['change']))  {
	 	echo "<script>window.open('setting.php')</script>";
	 	# code...
	 }
	 else{
	 	# code...
	 	$image = $_FILES['image']['name'];
	 	$image_tmp = $_FILES['image']['tmp_name'];
	 	$randNumber = rand(1,99);


	 	if ($image = '') {
	 		# code...
	 		echo "<script>alert('Select image for profile')</script>";
	 	echo "<script>window.open('upload.php','_self')</script>";
	 	exit();

	 	}

	 	else{
	 		// move_uploaded_file(filename, destination)
	 		move_uploaded_file($image_tmp, '/images/$image_tmp');
	 		$change = "update chat_users set profile = 'images/$image' where username = '$username'";
	 	}   $run_change = mysqli_query($conn , $change);


	 	if ($run_change) {
	 		# code...
	 			echo "<script>alert('Image Changed Welll')</script>";
	 		echo "<script>window.open('upload.php','_self')</script>";
	 	}
	 	else{
	 			echo "<script>alert('OOPs an error occurered')</script>";
	 		echo "<script>window.open('upload.php')</script>";

	 	}
	 }


	 ?>

</body>
</html>
<?php }?>