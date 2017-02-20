<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
<<<<<<< d4ed795bc3935ae781d4f516825d4b0c325cde42
	ownerRedirect();
=======
	$ownerID = $_SESSION["userID"];
	echo $ownerID;
	$query = "SELECT dorm.DormName, dorm.HousingType, owner.Name, dorm.Location, dorm.thumbnailpic, CONCAT(address.StreetName,', ',address.Barangay) FROM dorm, address, owner WHERE dorm.OwnerId = $ownerID AND owner.OwnerId= $ownerID AND dorm.AddressId = address.AddressId";
	$result = mysqli_query($dbconn, $query) or die("Query failed.");
	
>>>>>>> ViewDorm of Owner
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Manage</title>
</head>
<body>
<?=headerRender();?>
<nav id="manage-est">
	<?php
		renderlist($result);
	?>
	<a href="add-est.php">Add Establishment</a>
</nav>
</body>
</html>