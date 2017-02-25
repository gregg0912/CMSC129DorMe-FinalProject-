<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Poll</title>
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
	</header>
	<section id="establishments">
		<div id='pollform'>
			<form action="" method="post">
				<?php
					$query = "SELECT SUM(votes) FROM dorm";
					$result = mysqli_query($dbconn, $query);
					list($count) = mysqli_fetch_row($result);
					$query = "SELECT DormID,DormName, votes FROM dorm ORDER BY votes DESC";
					$result = mysqli_query($dbconn, $query);
					while(list($estID, $estName, $votes)=mysqli_fetch_row($result)){
				?>
					<div class="voteradio">
						<ul><li>
							<label class="radio inline">
							<?php
								if(!isset($_SESSION['voted'])){
							?>
								<input type="radio" name="dorm" value="<?=$estID?>">
							<?php
								}
							?><span><?=$estName?></span></label>
			    		</li></ul>
			    	</div>
				<?php
						if(isset($_SESSION['voted'])){
				?>
						<div class="voteresult" align='right'>
							<ul><li>
								<label><span><?=round($votes*100/$count)?>%</span></label>
				    		</li></ul>
				    	</div>
				<?php
						}
					}
					if(!isset($_SESSION['voted'])){
				?>  
						<div id='button' align='center'>
							<br><input type="submit" class='button'  name="vote" value="Vote">
						</div>
				<?php
					}else{
				?>
							<h3><br>You have already voted!</h3>
				<?php
					}
				?>
			</form>
			</div>
		</div>
		<footer>
			<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
		</footer>
	</section>
</body>
</html>