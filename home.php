<?php 

session_start(); 
include ('connection.php');


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
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xl-3 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center><a href="findFriends.php"><button class="btn btn-default search-icon " name="searchUser" type="submit">Add User</button></a></center>
					</div>
				</div>
				<div class="left-chat">
					<UL>
						<?php include 'getUserData.php';  ?>
					</UL>
				</div>
			</div>
			<div class="col-md-9 col-xs-12 col-sm-9">
				<div class="row">
					<!--user datetails of logged in user-->
					<?php
					$sender_username = $_SESSION['username'];
					$getUser = "SELECT * from chat_users  where username = '$sender_username'";
					$exUser = mysqli_query($conn,$getUser);
					$numRow = mysqli_fetch_array($exUser);
					$userId = $numRow['id'];
					$sender_name =$numRow['username'];


					?>

					<?php
					//get user data after a click for who to send to the messages
					if (isset($_GET['user_name'])) {
						$find_username = $_GET["user_name"];
						//echo "$find_username";
						$findHim = "SELECT  * from chat_users where username = '$find_username'";
						$exUser = mysqli_query($conn,$findHim);
						$numRow = mysqli_fetch_array($exUser);
						$receiver_name = $numRow['username'];
						//echo "$receiver_name";
						//$userPic = $numRow['profile'];
						$userPic = "/opt/lampp/htdocs/chatting/1.jpg";


					
					//get the total messages from chats of the two hosts

					$totalMsg = "SELECT * from chat_msgs where (senderName = '$sender_name' and receiverName = '$receiver_name') or (senderName = '$receiver_name' and receiverName = '$sender_name')";
					$exmsgs = mysqli_query($conn,$totalMsg );
					$total = mysqli_num_rows($exmsgs);

					?>
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="<?php echo'$userPic';?>">
						</div>
						<div class="right-header-details">
							<form method="POST">
								<p><?php echo"$username";?></p>
								<span><?php echo $total;?> Messsages</span>&nbsp &nbps
								<button name="logout" class="btn btn-danger">Logout</button>
							</form>

							<?php

							//change to offline
							if (isset($_POST['logout'])) {
								# code...
								$update = "UPDATE chat_users  set login = 'offline' where username = '$sender_name'";
								$exUpdate = mysqli_query($conn , $update);
								//yet to create logout file
								header("location : logout.php");
								exit();


							}

							?>
						</div>
					</div>

				</div>
				<div class="row">
					<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
						<?php
						$update = mysqli_query($conn , "UPDATE  chat_msgs set msgStatus = 'read' where senderName='$sender_name' and receiverName ='$receiver_name'");
						$selectMsg = "SELECT * from chat_msgs where (senderName ='$sender_name' and receiverName = '$receiver_name') or(receiverName ='$sender_name' and senderName = '$receiver_name')";
						$exSel = mysqli_query($conn , $selectMsg);
						//echo "mysqli_error($conn)";
						while($numRow = mysqli_fetch_array($exSel)){
//working well
						$sender_username = $numRow['senderName'];
						$receiver_username = $numRow['receiverName'];
						$msgContent = $numRow['msgContent'];
						$msgDate = $numRow['msgDate'];

						?>

						<ul>
							<?php
							if ($sender_name == $sender_username and $receiver_name==$receiver_username) {
								# code... sender
								echo "
								<li>
								<div class='rightside-right-chat'> <span>$sender_name <small> $msgDate</small>
								</span>
								<p>$msgContent</p>

								</div>

								</li>


								";
							}
							else if ($sender_name = $receiver_username and $receiver_name=$sender_username) {
								# code...
								echo "
								<li>
								<div class='rightside-left-chat'> <span>$receiver_name <small> $msgDate</small>
								</span><br><br>
								<p>$msgContent</p>

								</div>

								</li>


								";}


							?>
						</ul>
						<?php
					}


						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 right-chat-textbox">
						<form method="POST">
							<input type="text" name="msg_content" placeholder="Write your msg" autocomplete="off">
							<button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	  if (isset($_POST['submit'])) {
	  	# code...
	  	$msg = htmlentities($_POST['msg_content']);
	  	if ($msg == "") {
	  		# code...
	  		echo "<div class='alert alert-danger'>
	  		<strong>
	  		<center>Message was empty</center></strong>

	  		</div>";
	  		
	  	}

	  	else if (strlen($msg) > 100) {
	  		# code...
	  		echo "<div class='alert alert-danger'>
	  		<strong>
	  		<center>Message was very long</center></strong>

	  		</div>";
	  		
	  	}
	  	else{
	  		$insert = "INSERT into chat_msgs(senderName ,receiverName , msgContent , msgStatus , msgDate) values('$sender_name' ,'$receiver_name' ,'$msg', 'unread' , NOW())";
	  		$exInsert = mysqli_query($conn, $insert);
	  	}
	  }
 


	?>

</body>
</html>
<?php }}?>