<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();

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
</body>
</html>