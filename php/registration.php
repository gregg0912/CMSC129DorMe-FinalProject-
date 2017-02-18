<?php
session_start();
require "function.php";
$dbconn = dbconn();

$emailError = false;
$nameError = false;
$userNameError = false;
$passwordError = false;
$formError = false;
if(isset($_POST['submit']) ) { 
	$name = ($_POST['name']);
	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password = ($_POST['password']);
	$retype = ($_POST['retype']);

	if ($name == "" || $username == "" || $email == "" || $password == "" || $retype == "") {
		$formError = true;
	}

	if ($name == ""){
		$nameError = true;
	}

	//check username if duplicate
	$checkUserQuery = "SELECT Username from owner WHERE Username = '$username'";
	$dupUserRes = mysqli_query($dbconn,$checkUserQuery);
	if(mysqli_num_rows($dupUserRes) != 0){
		$userNameError = true;
	}



	//check email if duplicate
	$checkEmailQuery = "SELECT Email from owner WHERE Email = '$email'";
	$dupEmailRes = mysqli_query($dbconn,$checkEmailQuery);
	if(mysqli_num_rows($dupEmailRes) != 0){
		$emailError = true;
	}

	//match password and retype password
	if($password != $retype){
		$passwordError = true;
	}


	//add details to database
	if(!$formError && !$nameError && !$emailError && !$userNameError && !$passwordError){
		$addQuery = "INSERT INTO owner(Username, Name, Password, Email) VALUES('{$_POST['username']}','{$_POST['name']}',MD5('{$_POST['password']}'),'{$_POST['email']}')";
		echo $addQuery;
		$addRes = mysqli_query($dbconn,$addQuery);
		//if(mysqli_num_rows($addQuery) != 0){
			header('Location: login.php');
		//	echo $addQuery;
		//}else{
			echo "Hala!";
		//}
	}

}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>DorMe | Sign Up</title>
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
			<h1> CREATE ACCOUNT </h1>
			<form method = "post">
						<?php if($formError): ?>
				  			<span class="error">Please fill the form completely</span>
				  		<?php endif; ?>
				  		<input type="text" id="name" name="name" pattern="^[a-zA-Z\s]+" value="<?php if(isset($_POST['submit'])) echo ($_POST['name']); ?>" placeholder="Name">
						
				  		<input type="text" id="username" name="username"  value="<?php if(isset($_POST['submit']) && !$userNameError) echo ($_POST['username']); ?>" placeholder="Username">
				  		<?php if($userNameError): ?>
				  			<span class="error">Username already exists!</span>
				  		<?php endif; ?>

				  		<input pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" type="password" id="password" name="password" placeholder="Password(at least 8 alphabet characters and 1 no.)">

				  		<!-- Need to retype password for verification. -->
				  		<input type="password" name="retype" placeholder="Retype Password">
				  		<?php if($passwordError): ?>
				  			<span class="error">Retype password does not match password input.</span>
				  		<?php endif; ?>


				 		<input type="email" name="email"  value="<?php if(isset($_POST['submit']) && !$emailError) echo ($_POST['email']); ?>" placeholder="Email (example123@sample.com)">
				  		<?php if($emailError): ?>
				  			<span class="error">Email is already taken.</span>
				  		<?php endif; ?>


						<input type="submit" name="submit" value="CREATE">
						<p>YOU HAVE AN ACCOUNT?</p>
						<a href="login.php">LOGIN</a>
			</form>
	</body>
</html>