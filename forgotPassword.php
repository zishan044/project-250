<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="forgetPassword.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class ="forgot">
		<form action="forgetPassword_process.php" method="post">
			<div class="form-header">
				<h2>Change Password</h2>
				<p>Please change your password</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" autocomplete="off" required="required" placeholder="Enter Your Email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="Password" name="password" class="form-control" autocomplete="off" required="required" placeholder="Enter New Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="Password" placeholder="Confirm New password" name="cpassword" class="form-control" autocomplete="off" required="required">
			</div>
			
			<div class="form-group">
				<label class="">Have An account <a href="signin.php"> click here</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Update</button>
			</div>
		</form>
		<div class="text-center small" style="color: #600300;">Not Regestered <a href="signup.php">signup</a></div>
	</div>

</body>
</html>