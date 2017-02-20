<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	ownerRedirect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Add Establishment</title>
</head>
<body>
<?=headerRender();?>
<div id="header2">
	<h1>• Add Information •</h1>
	<p>	Know an establishment that needs to be featured here?<br>
		Are you an owner who wants to advertise their establishment?<br>
		Simply input your information into our database now!
	</p>
</div>
<div>
	<form method="POST" action="" id="add-form">
		<div class="msg">
			<p><?=$errorMsg?></p>
		</div>
		
	</form>
</div>
</body>
</html>