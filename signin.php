<!DOCTYPE html>
<html>
<head>
	<title>Sign In page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="signin.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class ="signin">
		<form action="signin_process.php" method="post">
			<div class="form-header">
				<h2>Sign In</h2>
				<p>Login to my chat app</p>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="Password" name="password" class="form-control" autocomplete="off" required="required">
			</div>
			
			<div class="form-group">
				<label class="">Forgot Password <a href="forgotPassword.php"> click here</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="signin">SignIn</button>
			</div>
		</form>
		<div class="text-center small" style="color: #600300;">Not Regestered <a href="signup.php">signup</a></div>
	</div>

</body>
</html>