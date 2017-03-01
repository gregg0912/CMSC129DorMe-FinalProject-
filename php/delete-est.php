<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	$ownerID = $_SESSION['userID'];
		$del = $_POST['row'];
		$query = "DELETE FROM dorm WHERE DormId = '$del'";
		$result = mysqli_query($dbconn, $query);

		$query = "SELECT dorm.DormId, dorm.DormName, dorm.HousingType, owner.Name, dorm.Location, dorm.thumbnailpic, CONCAT(address.StreetName,', ',address.Barangay) FROM dorm, address, owner WHERE dorm.OwnerId = $ownerID AND owner.OwnerId= $ownerID AND dorm.AddressId = address.AddressId";
		$result = mysqli_query($dbconn, $query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Manage</title>
</head>
<body>
<nav id="manage-est">
	<a href="add-est.php">Add Establishment</a
</nav>
	<?php
		renderlist($result,"","","viewOwner");
	?>
</body>
</html>