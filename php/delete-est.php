<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();

		$del = $_POST['row'];
		$query = "DELETE FROM dorm WHERE DormId = '$del'";
		$result = mysqli_query($dbconn, $query);

		$query = "SELECT * FROM dorm WHERE OwnerId = '$_SESSION[userID]'";
		$result = mysqli_query($dbconn, $query);

?>
	<div id='manage-est'>
		<?php
			renderlist($result,"","");
		?>
	</div>
