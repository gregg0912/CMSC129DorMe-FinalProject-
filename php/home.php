<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/home.css" rel="stylesheet" type="text/css" />
	<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/js.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
	<?php
	headerRender();
	?>
	<div class='body-content col-md-12 col-sm-12'>
		<div id="establishments">
			<h2>Featured Establishments</h2>
			<?php
				$query = homequeryConstruct();
				$result = mysqli_query($dbconn, $query);
				renderlist($result, "", "", "home");
			?>
		</div>
		<div id='contacthome'>
			<h2>Contact Us</h2>
			<p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br>
				Send us an email at <strong><a href="javascript:void(0)">support@dorme.com</a></strong> and we'll get back to you as soon as possible.<br>
			</p>
		</div>
			<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
	</div>
	<a id="back-to-top" href="#" class="btn btn-default btn-lg to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

</body>
</html>
