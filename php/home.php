<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php
	headerRender();
	?>
	<nav id="navigation">
		<ul>
			<li><a href="home.xhtml" class="active">Home</a></li>
			<li><a href="">View</a></li>
			<li><a href="">Poll</a></li>
			<li><a href="">About</a></li>
		</ul>
	</nav>
	
	<section id="establishments">
		<h2>Featured Establishments</h2>
		<?php
			$query = homequeryConstruct();
			$result = mysqli_query($dbconn, $query);
			renderlist($result, "", "");
		?>
		<a href="#header">Back to Top</a>
	</section>
	<section id='contacthome'>
		<h2>Contact Us</h2>
		<p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br>
			Send us an email at <strong><a href="javascript:void(0)">support@dorme.com</a></strong> and we'll get back to you as soon as possible.<br>
		</p>
	</section>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
</body>
</html>
