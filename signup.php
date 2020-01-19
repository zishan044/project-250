
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class ="signup">
		<form action="signup_process.php" method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Regester to my chat app</p>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" id="username" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" id="email" name="email" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="Password" id="pass1" name="password" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="Password"  id="pass2" name="cpassword" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="form-group">
				<label>Country</label>
				<select class="form-control" name="country" required="required">
					<option disabled="disabled">Select country</option>
					<option value="kenya">Kenya</option>
					<option value="uganda">Uganda</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="sudan">Sudan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select class="form-control" name="gender" required="required">
					<option disabled="disabled">Select gender</option>
					<option value="kenya">Male</option>
					<option value="uganda">Femail</option>
					<option value="Ethiopia">Other</option>
				</select>
			</div>
			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required="required" name="terms">I admit<a href="#">Terms And Conditions</a>&amp;<a href="#">Privacy nad Policy</a></label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="signup">Sign UP</button>
			</div>
		</form>
		<div class="text-center small" style="color: #600300;">All ready have an account<a href="signin.php">Login</div>
	</div>

</body>
</html>