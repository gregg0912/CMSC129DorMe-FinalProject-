<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	$ownerID = $_SESSION['userID'];
		$del = $_POST['row'];
		$queries = array("DELETE FROM dorm_number WHERE DormId = '$del'",
						"DELETE FROM dorm_pictures WHERE DormId = '$del'",
						"DELETE FROM dorm_room WHERE DormId = '$del'",
						"DELETE FROM facility_dorm WHERE DormId = '$del'",
						"DELETE FROM dorm WHERE DormId = '$del'");

		foreach ($queries as $query) {
			$result = mysqli_query($dbconn, $query);
			if(!$result){
			?>
				<script type='text/javascript'>alert('Something went wrong. Please try again.')</script>
			<?php
			}
		}

		$query = "SELECT dorm.DormId, dorm.DormName,CONCAT(address.StreetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
				FROM dorm, address, owner
				WHERE dorm.OwnerId = $ownerID AND owner.OwnerId= $ownerID AND dorm.AddressId = address.AddressId";
		$result = mysqli_query($dbconn, $query);


		renderlist($result,"","","viewOwner");
?>