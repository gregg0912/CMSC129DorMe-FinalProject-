<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
	$error=0;
if(isset($_SESSION['userID'])){
	header("Location: view.php");
}
if(isset($_POST["submit"])){
	$username = $_POST["userName"];
	$password = MD5($_POST["password"]);
	$connect = mysqli_connect("localhost","root","","dorme") or die("Could not connect to the database.");
	$query = "SELECT Username, Password FROM owner WHERE owner.Username='$username' AND owner.Password='$password'";
	$result= mysqli_query($connect, $query) or die("Query failed.");


	if(mysqli_num_rows($result) == 1){
			$_SESSION["userName"] = $username;
			$query = "SELECT ownerID FROM owner WHERE Username='$username'";
			$result= mysqli_query($connect, $query);
			$row = mysqli_fetch_assoc($result);
			$_SESSION["userID"] = $row['ownerID'];
			$_SESSION["adminID"] = null;
			header("Location:view.php");
	}
	else{
		$error = 1;
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Owner Login</title>
</head>
 <body>
	<header id="header">
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/bettys.JPG" alt="image not found" />
		</div>
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/firstestate.JPG" alt="image not found" />
		</div>
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/foursisters.JPG" alt="image not found" />
		</div>
		<h1>DorMe.</h1>
		<h2>your dorm. my dorm. our dorm.</h2>
		<p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
			Scroll through featured dormitories and apartments on our home page and <br />
			have an easy glimpse into finding your perfect second home!<br />
			Sit back and pick your like.
		</p>
		<nav id="gen-nav">
			<ul>
				<li><a href="home.php" class="active">Home</a></li>
				<li><a href="view.php">View</a></li>
				<li><a href="poll.php">Poll</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="javascript:void(0)">Log in</a>
					<ul>
						<li><a href="adminlogin.php">Admin</a></li>
						<li><a href="login.php">Owner</a></li>
					</ul>
				</li>
				<li><a href="registration.php">Sign up</a></li>
			</ul>
		</nav>
		<div id="header2">
			<h1>Search. See. Stay.</h1>
			<p> Search for you desired facilities. <br />
			See what establishment offers your wants. <br />
			Filter your needs.
			</p>
		</div>
	</header>
		<form method="post">
				<label for="userName">USERNAME</label>
		  		<input type="text" required id="userName" name="userName">
		  		<label for="password">PASSWORD</label>
		  		<input type="password" required id="password" name="password">
		  		<?php 
				if($error == 1){ ?>
					<span class="error"><?="The username/password you entered is incorrect."?></span>
				<?php } ?>
		  		<input type="submit" name="submit" value="LOGIN">
		</form>
	</div>
</body>