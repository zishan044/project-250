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
	<title>Account settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<?php
		 $user = $_SESSION['username'];
		 $get = "select * from chat_users where username = '$user'";
		 $run = mysqli_query($conn , $get);
		 $row = mysqli_fetch_array($run);

		 $username = $row['username'];
		 $email = $row['email'];
		 $profile = $row['profile'];
		 $country = $row['country'];
		 $gender = $row['gender'];
		 $password = $row['password'];


		?>
		<div class="col-sm-8">
			<form action="" method="post" enctype="multipart/form-data" contenteditable="contenteditable">
				<table class="table table-bordered">
					<tr align="center">
						<td colspan="5" class="active"><h2>Change Account setting</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your Username</td>
						<td>
							<input type="text" name="username" class="form-control" required="required" value="<?php echo$username; ?>" contenteditable="true" >
						</td>
					</tr>
					<tr>
						<td></td><td><a class="btn btn-default" style="text-decoration: none; font-size: 16px;" href="upload.php"><i class="fa fa-user" aria-hidden='true'></i>Cheange Profile</a></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your Email</td>
						<td>
							<input type="email" name="email" class="form-control"  required="required" value="<?php echo $email; ?>" >
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Countyr</td>
						<td>
							<select class="form-control" name="country">
								<option><?php echo $country; ?></option>
								<option value="USA">Usa</option>
								<option value="Iran">Iran</option>
								<option value="Somali">somalia</option>
								<option value="Iraque">Iraq</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">GEnder</td>
						<td>
							<select class="form-control" name="gender">
								<option><?php echo $gender; ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Forgoten Pasword</td>
						<td>
							<button type="button" class="btn btn-default" data-toggle='modal' data-target= 'modal'></button>
							<div id="modal" class="modal fade " role='dialog'>
								<div class="modai-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<form action="recovery.php?id=<?php echo $id ;?> method='post' id='f'" >
											<strong>What is your favourite Person</strong>
											<textarea name="content" class="form-control" cols="10" rows="3" placeholder="favourite person"></textarea><br><br>
											<input type="submit" name="submit" value="su
											bmit" style="width: 100px;" class="btn btn-default"><br><br>
											<pre>Anwers ther above questions we will ask you if you dont remember again</pre><br><br>
										</form>
										<?php 
										if (isset($_POST['submit'])) {
											$msg = htmlentities($_POST['content']);
											# code...
											if ($msg == '') {
												# code...
												echo "<script>alert('Please enter the name;')</script>";
												echo "<script>windows.open('setting.php',_self')</script";
												exit();
											}
											else{
												$update =
												"update  chat_users set forgottext = '$msg'";
												$run_update=mysqli_query($conn,$run_update);

												if ($run_update) {
													# code...
													echo "<script>alert('Successfully set;')</script>";
													echo "<script>windows.open('setting.php',_self')</script";

												}
												else{
													echo "<script>alert('OOPs An error Occured while updating;')</script>";
													echo "<script>windows.open('setting.php',_self')</script";
												}
											}
										}

										?>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss='modal' >close</button>
									</div>
								</div>
							</div>
						
					</tr>
					<tr><td></td><td><a class="btn btn-default" style="text-decoration: none; font-size:16px;"  href="changePassword.php">Change Password</td></tr>
						<tr align="center">
							<td colspan="6">
								<input type="submit" name="update" class="btn btn-info" value="Submit">
							</td>
						</tr>
				</table>
			</form>
			<?php
			if (isset($_POST['update'])) {
				# code...
				$username=htmlentities($_POST['username']); 
				$email=htmlentities($_POST['email']);
				$gender =htmlentities($_POST['gender']);
				$country = htmlentities($_POST['country']);


				//udatting
				$change = "update chat_users set username = '$username' ,email = '$email' , gender = '$gender' , country = '$country' where username = '$username'";

				$run_change = mysqli_query($conn , $change);

				if ($run_change) {
					# code...
					echo "<script>window.open('setting.php')</script>";
				}
				else{
					echo "Error while processing";
					echo "<script>window.open('setting.php')</script>";
				}

			}




			?>
		</div>
	</div>
</body>
</html>
<?php }?>