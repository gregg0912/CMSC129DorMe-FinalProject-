<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
	$error=0;
if(isset($_SESSION['userID'])){
	header("Location: home.php");
}
else if(isset($_SESSION['adminID'])){
	header("Location: home.php");
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
			header("Location:home.php");
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" />
	<link href="../css/home.css" rel="stylesheet" type="text/css" />
	<link href="../css/login.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
		<form method="post">
			<div class="well">
				<h3> OWNER LOG IN </h3>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user"></span></span>
			  		<input type="text" id="userName" name="userName" aria-describedby="sizing-addon2" class="form-control" placeholder="Username">
			  	</div>
			  	<br />
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" id="password" name="password" aria-describedby="sizing-addon2" class="form-control" placeholder="Password">
				</div>

			  	<?php 
					if($error == 1){ ?>
						<span class="error"><?="The username/password you entered is incorrect."?></span>
					<?php } ?>
				<br />
			  	<input type="submit" name="submit" class="btn btn-primary pull-right" value="LOGIN">
			</div>
		</form>
	</div>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
	</div>
</body>
</html>