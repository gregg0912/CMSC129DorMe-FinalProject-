<?php
	session_start();
	require("function.php");
	require ('viewdorm.php');
	$dbconn = dbconn();

	$image = $_POST['image'];
	$DormId = $_GET['dormId'];
	$query = "INSERT INTO `dorm_pictures`(`dormpicID`, `DormId`, `imgurl`, `imgdesc`) VALUES (NULL,$DormId,'$image','NULL')";
		$result = mysqli_query (dbconn(), $query);

		retrieveGallery($dbconn, $id, $dormName);
}

?>