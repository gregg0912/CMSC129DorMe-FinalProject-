<?php
	function dbconn(){
		$dbconn = mysqli_connect("localhost","root","","dorme") or die("Could not connect to database!");
		mysqli_select_db($dbconn, "dorme");
		return $dbconn;
	}

	function pagination($currentPage, $itemCount, $itemsPerPage, $adjacentCount, $pageLinkTemplate, $showPrevNext = true) {
		$firstPage = 1;
		$lastPage  = ceil($itemCount / $itemsPerPage);
		if ($lastPage == 1) {
			return;
		}
		if ($currentPage <= $adjacentCount + $adjacentCount) {
			$firstAdjacentPage = $firstPage;
			$lastAdjacentPage  = min($firstPage + $adjacentCount + $adjacentCount, $lastPage);
		} elseif ($currentPage > $lastPage - $adjacentCount - $adjacentCount) {
			$lastAdjacentPage  = $lastPage;
			$firstAdjacentPage = $lastPage - $adjacentCount - $adjacentCount;
		} else {
			$firstAdjacentPage = $currentPage - $adjacentCount;
			$lastAdjacentPage  = $currentPage + $adjacentCount;
		}
		echo '<ul style="clear:both; bottom:0;" class="pagination" id="pagination">';
		if ($showPrevNext) {
			if ($currentPage == $firstPage) {
				echo '<li><span><span class="glyphicon glyphicon-triangle-left"></span></span></li>';
			} else {
				echo '<li><a href="' . (is_callable($pageLinkTemplate) ? $pageLinkTemplate($currentPage - 1) : sprintf($pageLinkTemplate, $currentPage - 1)) . '"><span class="glyphicon glyphicon-triangle-left"></span></a></li>';
			}
		}
		if ($firstAdjacentPage > $firstPage) {
			echo '<li><a href="' . (is_callable($pageLinkTemplate) ? $pageLinkTemplate($firstPage) : sprintf($pageLinkTemplate, $firstPage)) . '">' . $firstPage . '</a></li>';
			if ($firstAdjacentPage > $firstPage + 1) {
				echo '<li><span>...</span></li>';
			}
		}
		for ($i = $firstAdjacentPage; $i <= $lastAdjacentPage; $i++) {
			if ($currentPage == $i) {
				echo '<li><span><b>' . $i . '</b></span></li>';
			} else {
				echo '<li><a href="' . (is_callable($pageLinkTemplate) ? $pageLinkTemplate($i) : sprintf($pageLinkTemplate, $i)) . '">' . $i . '</a></li>';
			}
		}
		if ($lastAdjacentPage < $lastPage) {
			if ($lastAdjacentPage < $lastPage - 1) {
				echo '<li><span>...</span></li>';
			}
			echo '<li><a href="' . (is_callable($pageLinkTemplate) ? $pageLinkTemplate($lastPage) : sprintf($pageLinkTemplate, $lastPage)) . '">' . $lastPage . '</a></li>';
		}
		if ($showPrevNext) {
			if ($currentPage == $lastPage) {
				echo '<li><span><span class="glyphicon glyphicon-triangle-right"></span></span></li>';
			} else {
				echo '<li><a href="' . (is_callable($pageLinkTemplate) ? $pageLinkTemplate($currentPage + 1) : sprintf($pageLinkTemplate, $currentPage + 1)) . '"><span class="glyphicon glyphicon-triangle-right"></span></a></li>';
			}
		}
		echo '</ul>';
	}
	function homequeryConstruct(){
		$query = "SELECT dorm.DormId, dorm.DormName, CONCAT(address.StreetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
				FROM dorm, address, owner
				WHERE dorm.AddressId = address.AddressId AND dorm.OwnerId = owner.OwnerId
				ORDER BY votes DESC
				LIMIT 5";
		return $query;
	}
	function renderlist($result){
	?>
		<section id="estab-list">
			<?php
			while(list($estId, $estName, $address, $owner, $housingType, $thumbnailpic) = mysqli_fetch_row($result)){
				$housingType = determine($housingType);
			?>
			<div id="establishment">
				<a href="javascript:void(0)"><img src="<?=$thumbnailpic?>" alt="Image not found" /></a>
				<span><?=$estName?></span> | <?=$owner?> | <?=$address?> | <?=$housingType?>
			</div>
			<?php
			}
			?>
		</section>
	<?php
	}
	function determine($housingType){
		if($housingType == "apartment")
			return "Apartment";
		if($housingType == "bedspace")
			return "Bedspace";
		if($housingType == "boardinghouse")
			return "Boarding House";
		return "Dormitory";
	}
	function checkbox($result){
		while(list($facilityNo, $facilityName) = mysqli_fetch_row($result)){
	?>
		<label><input type="checkbox" name="facilityList[]" value="<?=$facilityNo?>" /><?=$facilityName?></label>
	<?php
		}
	}
	function ownerNav(){
	?>
		<nav id="gen-nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="viewOwner.php">View</a></li>
				<li><a href="ownerNotifs.php">Notifications</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	<?php
	}
	function adminNav(){
	?>
		<nav id="gen-nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="view.php">View</a></li>
				<li><a href="adminNotifs.php">Notifications</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	<?php
	}
	function userNav(){
	?>
		<nav id="gen-nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="view.php">View</a></li>
				<li><a href="poll.php">Poll</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="javascript:void(0)">Log In</a>
					<ul>
						<li><a href="adminlogin.php">Admin</a></li>
						<li><a href="login.php">Owner</a></li>
					</ul>
				</li>
				<li><a href="registration.php">Sign Up</a></li>
			</ul>
		</nav>
	<?php
	}
	function headerRender(){
	?>
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
			<?php
			if(isset($_SESSION['userID'])){
				adminNav();
			}else if(isset($_SESSION['adminID'])){
				ownerNav();
			}else if(!isset($_SESSION['adminID'])&&!isset($_SESSION['userID'])){
				userNav();
			}
			?>
		</header>
	<?php
	}
?>