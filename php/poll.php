<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Poll</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<?php headerRender(); ?>
		
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
