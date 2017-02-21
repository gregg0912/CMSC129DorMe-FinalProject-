<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
	$error=0;
if(isset($_SESSION['adminID'])){
	header("Location: home.php");
}
if(isset($_POST["submit"])){
	$username = $_POST["userName"];
	$password = MD5($_POST["password"]);
	$connect = mysqli_connect("localhost","root","","dorme") or die("Could not connect to the database.");
	$query = "SELECT username, password FROM admin WHERE admin.username='$username' AND admin.password='$password'";
	$result= mysqli_query($connect, $query) or die("Query failed.");


	if(mysqli_num_rows($result) == 1){
			$_SESSION["userName"] = $username;
			$query = "SELECT adminID FROM admin WHERE username='$username'";
			$result= mysqli_query($connect, $query);
			$row = mysqli_fetch_assoc($result);
			$_SESSION["adminID"] = $row['adminID'];
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
	<title>DorMe | Admin Login</title>
</head>
 <body>
	<?php
	headerRender();
	?>
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