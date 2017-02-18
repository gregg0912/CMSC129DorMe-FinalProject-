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