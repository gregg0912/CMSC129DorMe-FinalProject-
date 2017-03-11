<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	ownerRedirect();
	$ownerID = $_SESSION["userID"];
	// $query = "SELECT dorm.DormId, dorm.DormName, dorm.HousingType, owner.Name, dorm.Location, dorm.thumbnailpic, CONCAT(address.StreetName,', ',address.Barangay) FROM dorm, address, owner WHERE dorm.OwnerId = $ownerID AND owner.OwnerId= $ownerID AND dorm.AddressId = address.AddressId";
	
	if (isset($_POST['submit'])) {
		$newthumb = $_POST['thumbChange'];
		echo $newthumb.'<br />';
	}
	$query = "SELECT dorm.DormId, dorm.DormName, CONCAT(address.StreetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
		FROM dorm, address, owner
		WHERE dorm.OwnerId = $ownerID
		AND owner.OwnerId= $ownerID
		AND dorm.AddressId = address.AddressId";
	$result = mysqli_query($dbconn, $query) or die("Query failed.");

?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Manage</title>
	<script type="text/javascript" src="../js/js.js" ></script>
	<script type="text/javascript" src="../js/script.js" ></script>
</head>
<body>
<?=headerRender();?>
<nav id="manage-est">
	<a href="add-est.php">Add Establishment</a
</nav>
<div id="estab-list">
	<?php
		renderlist($result,"","","viewOwner");
	?>
</div>
</body>
</html>