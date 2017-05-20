
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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/home.css" rel="stylesheet" type="text/css" />
		<link href="../css/registration.css" rel="stylesheet" type="text/css" />
		<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/js.js"></script>
		<script src="../js/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</head>
	<body>
	<?php
	headerRender();
	?>
	<div class='body-content col-md-12 col-sm-12'>
		<form method = "post">
			<div class="well">
			<h3> CREATE ACCOUNT </h3>
			<?php if($formError): ?>
		 			<span class="error">Please fill the form completely</span>
			<?php endif; ?>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user"></span></span>
		  			<input type="text" id="name" name="name" pattern="^[a-zA-Z\s]+" aria-describedby="sizing-addon2" class="form-control" value="<?php if(isset($_POST['submit'])) echo ($_POST['name']); ?>" placeholder="Name">
		  		</div>
		  		<br />
		  		<div class="input-group">
		  			<span class="input-group-addon" id="sizing-addon2">@</span>	
					<input type="text" id="username" name="username"  aria-describedby="sizing-addon2" class="form-control" value="<?php if(isset($_POST['submit']) && !$userNameError) echo ($_POST['username']); ?>" placeholder="Username">
					<?php if($userNameError): ?>
						<span class="error">Username already exists!</span>
					<?php endif; ?>
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-lock"></span></span>
					<input pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" type="password" id="password" name="password" aria-describedby="sizing-addon2" class="form-control" placeholder="Password(at least 8 alphabet characters and 1 no.)">

					<!-- Need to retype password for verification. -->
				</div>
				<br />
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-repeat"></span></span>
					<input type="password" name="retype" aria-describedby="sizing-addon2" class="form-control" placeholder="Retype Password">
					<?php if($passwordError): ?>
					<span class="error">Retype password does not match password input.</span>
					<?php endif; ?>
				</div>
				<br />
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-envelope"></span></span>
					<input type="email" name="email"  aria-describedby="sizing-addon2" class="form-control" value="<?php if(isset($_POST['submit']) && !$emailError) echo ($_POST['email']); ?>" placeholder="Email (example123@sample.com)">
					<?php if($emailError): ?>
						<span class="error">Email is already taken.</span>
					<?php endif; ?>
				</div>
				<br />

				<input type="submit" name="submit" class="btn btn-primary pull-right" value="CREATE">
				<div id="accAsk">
					<p>ALREADY HAVE AN ACCOUNT? <a href="login.php">LOGIN</a> </p>
				</div>
			</div>
			</div>
		</form>
		<footer>
			<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
		</footer>
	</div>
	</body>
</html>