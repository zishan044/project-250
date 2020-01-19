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
		<li><a style="color:white;text-decoration: none;font-size: 24;" href="setting.php">Setting</li>
	</ul>
</nav>