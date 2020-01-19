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
	<title>Change Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="changePassword.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="row">
		<div class="col-sm-2">
		</div>
			<?php
	 $user = $_SESSION['username'];
	 $get = "select * from user_chats where username = '$user'";
	 $run = mysqli_query($conn , $get);
	 $row = mysqli_fetch_array($run);
	 $current = $row['password'];

	 $username = $row['username'];

	 ?>
	 <div class="col-sm-8">
	 	<form action=" " method="post" enctype="multipart/form-data">
	 		<table class="table table-bordered table-hover">
	 			<tr align="center">
	 				<td colspan="5" class="active"><h2>Change password</h2></td>
	 			</tr>
	 			<tr>
	 				<td style="font-weight: bold;">Current password</td>
	 				<td>
	 					<input placeholder="Current Password" type="password" name="current" class="form-control" required="required" id="password">
	 				</td>
	 			</tr>
	 			<tr>
	 				<td style="font-weight: bold;">New password</td>
	 				<td>
	 					<input placeholder="new  Password" type="password" name="pass1" class="form-control" required="required" id="password" >
	 				</td>
	 			</tr>
	 			<tr>
	 				<td style="font-weight: bold;" >Confirm password</td>
	 				<td>
	 					<input placeholder="Confirm Password" type="password" name="pass2" class="form-control" required="required"  id="password">
	 				</td>
	 			</tr>
	 			<tr align="center">
	 				<td colspan="6">
	 					<input type="submit" name="change" value="Change" class="btn btn-info">
	 				</td>
	 			</tr>
	 	</form>


	 	<?php
	 	if (isset($_POST['change'])) {
	 		# code...
	 		$current = $_POST['current'];
	 		$pass1 = $_POST['pass1'];
	 		$pass2 = $_POST['pass2'];



	 		$user = $_SESSION['username'];
	 		$get = "select * from useers_chat where username = '$username'";
	 		$run_get = mysqli_query($conn , $get);
	 		$row = mysqli_fetch_array($run_get);


	 		$user_pass = $row['password'];

	 		if ($pass1 !== $user_pass) {
	 			echo "
	 			<div class='alert alert-danger'>
	 			<strong>Your Old Password Did not mUch</strong>
	 			</div>

	 			";
	 			# code...
	 		}

	 		if ($pass1 !=$pass2) {
	 			echo "
	 			<div class='alert alert-danger'>
	 			<strong>Both Password Must mUch</strong>
	 			</div>

	 			";
	 			# code...
	 		}


	 		if ($pass1 < 8 and  $pass2 < 8 ) {
	 			echo "
	 			<div class='alert alert-danger'>
	 			<strong>You must use more than 8 characters</strong>
	 			</div>

	 			";
	 			# code...
	 		}

	 		if ($pass1 == $pass2 and $current == $user_pass) {
	 			# code...
	 			$change  = mysqli_query($conn , "update user_chats set password  = '$pass1' where username = '$username' ");
	 			echo "
	 			<div alert alert-danger>
	 			   <strong>Your Password has changed successfully</strong>
                     
	 			</div>

	 			";
	 		}
	 	}





	 	?>
	 </div>

	</div>

</body>
</html>
<?php }?>