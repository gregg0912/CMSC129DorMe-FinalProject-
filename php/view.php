<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | View Dorm</title>
</head>
<body>
	<header id="header">
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/bettys.JPG" alt="image not found" />
		</div>
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/firstestate.JPG" alt="image not found" />
		</div>
		<div id="estab fade">
			<img src="../../../CMSC127_DORME/thumbnails/foursisters.JPG" alt="image not found" />
		</div>
		<h1>DorMe.</h1>
		<h2>your dorm. my dorm. our dorm.</h2>
		<p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
			Scroll through featured dormitories and apartments on our home page and <br />
			have an easy glimpse into finding your perfect second home!<br />
			Sit back and pick your like.
		</p>
		<nav id="gen-nav">
			<ul>
				<li><a href="home.php" class="active">Home</a></li>
				<li><a href="view.php">View</a></li>
				<li><a href="poll.php">Poll</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="javascript:void(0)">Log in</a></li>
				<li><a href="javascript:void(0)">Sign up</a></li>
			</ul>
		</nav>
		<div id="header2">
			<h1>Search. See. Stay.</h1>
			<p> Search for you desired facilities. <br />
			See what establishment offers your wants. <br />
			Filter your needs.
			</p>
		</div>
	</header>
	<form id="filter" class="filter" method="get">
		<fieldset>
			<legend>FILTER:</legend>
			<input type="text" name="keyword" placeholder="Search" class="form-control-srch" id="noborder" />
			<?php
			$query = "SELECT * FROM facilities";
			$result = mysqli_query($dbconn, $query);
			?>
			
			<a href="javascript:void(0)"><strong>Remove Filter</strong></a>
		</fieldset>
	</form>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
</body>
</html>
