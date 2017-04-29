<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | About Us</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
				<?php
				if(isset($_SESSION['userID'])){ ?>
				<li><a href="viewOwner.php">View</a></li>
				<?php }
				else if(isset($_SESSION['adminID'])){ ?>
				<li><a href="view.php">View</a></li>	
				<?php } 
				 else{ ?> 
				<li><a href="view.php">View</a></li>
				<?php } ?>

				<?php
				if((!isset($_SESSION['userID'])) && (!isset($_SESSION['adminID']))){ ?>
				<li><a href="poll.php">Poll</a></li>
				<?php } ?>
				<li><a href="about.php">About</a></li>
				<?php
				if((!isset($_SESSION['userID'])) && (!isset($_SESSION['adminID']))){  ?>
				<li><a href="javascript:void(0)">Log in</a>
					<ul>
						<li><a href="adminlogin.php">Admin</a></li>
						<li><a href="login.php">Owner</a></li>
					</ul>
				</li>
				<li><a href="registration.php">Sign up</a></li>
				<?php }?>
				<?php
				if((isset($_SESSION['userID'])) || (isset($_SESSION['adminID']))){ ?>
				<li><a href="logout.php">Logout</a></li>
				<?php } ?>
				<?php if (isset($_SESSION['userID'])){ ?>
					<li><a href="ownerNotifs.php"></a></li>
				<?php } 
				
				else if(isset($_SESSION['adminID'])){ ?>
				<li><a href="adminNotifs.php">Notifications</a></li>
				<?php } ?>
			</ul>
		</nav>
	</header>
	<div id="about">
		<p>
			DorMe makes it easy for you to access our website of establishment listings located within the Universtity of the Philippines Miagao campus.
			Whether you're looking for a dormitory, apartment, or boarding house, DorMe offers convenience while you're at home or on-the-go.
			DorMe provides housing information for University of the Philippines Visayas' students in Miagao which is inline with their dyamic lifestyle.  
		</p>
		<h2>♦ Our Team ♦</h2>
		<div id='TEAM' align='center'>
		<div id='team1'>
			<ul>
				<li>
					<img src="css/images/gregg.jpg"/>
					<li><strong>Gregg Marionn Icay</strong></li>
					<li>Developer</li><br>
				</li>
				<li>
					<img src="css/images/shebna.jpg"/>
					<li><strong>Shebna Rose Fabilloren</strong></li>
					<li>Developer</li>
				</li>
			</ul>
		</div>
			<div id='team2'>
			<ul>
				<li>
					<img src="css/images/lincy.jpg"/>
					<li><strong>Lincy Legada</strong></li>
					<li>Developer</li><br>
				</li>
				<li>
					<img src="css/images/cyra.jpg"/>
					<li><strong>Cyra Dawn Montano</strong></li>
					<li>Designer</li>
				</li>
			</ul>
		</div>
	</div>
	</div>
	<div id='contacthome'>
		<h2>Contact Us</h2>
		<p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br>
			Send us an email at <strong><a href=''>support@dorme.com</a></strong> and we'll get back to you as soon as possible.<br>
		</p>
	</div>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
</body>
</html>
