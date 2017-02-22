<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();

	ownerRedirect();
	$ownerID = $_SESSION["userID"];
	$query = "SELECT dorm.DormName, dorm.HousingType, owner.Name, dorm.Location, dorm.thumbnailpic, CONCAT(address.StreetName,', ',address.Barangay) FROM dorm, address, owner WHERE dorm.OwnerId = $ownerID AND owner.OwnerId= $ownerID AND dorm.AddressId = address.AddressId";
	$result = mysqli_query($dbconn, $query) or die("Query failed.");

?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Manage</title>
</head>
<body>
<?=headerRender();?>
<nav id="manage-est">
	<a href="add-est.php">Add Establishment</a>
</nav>
	<?php
		renderlist($result,"","");
	?>
</body>
</html>