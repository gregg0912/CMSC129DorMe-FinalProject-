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
		if(mysqli_num_rows($result)){
		?>
			<section id="estab-list">
				<?php
				while(list($estId, $estName, $address, $owner, $housingType, $thumbnailpic) = mysqli_fetch_row($result)){
					$housingType = determine($housingType);
				?>
				<div id="establishment">
					<a href="viewdorm.php?dormId=<?=$estId?>"><img src="<?=$thumbnailpic?>" alt="Image not found" /></a>
					<span><?=$estName?></span> | <?=$owner?> | <?=$address?> | <?=$housingType?>
				</div>
				<?php
				}
				?>
			</section>
	<?php
		}else{
	?>
			<div id="establishment">
				<a href="javascript:void(0)"><img src="" alt="Image not found" /></a>
				<span>Your search returned no results!</span>
			</div>
	<?php
		}
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
				<li><a href="view.php">View</a></li>
				<li><a href="viewOwner.php">Manage Establishments</a></li>
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
				ownerNav();
			}else if(isset($_SESSION['adminID'])){
				adminNav();
			}else if(!isset($_SESSION['adminID'])&&!isset($_SESSION['userID'])){
				userNav();
			}
			?>
		</header>
	<?php
	}
	function oswnerRedirect(){
		if(!isset($_SESSION['userID'])){
			header("Location:home.php");
		}
	}
	function viewDormRedirect(){
		if(isset($_GET['dormId'])==""||empty($_GET['dormId'])){
			header("Location:view.php");
		}
	}
	function determineLoc($location){
		if($location == "banwa")
			return "Banwa";
		return "Dorm Area";
	}
	function viewdormQuery($dbconn,$id){
		$query = "SELECT dorm.DormName, dorm.HousingType, owner.Name, dorm.Location, dorm.thumbnailpic, CONCAT(address.StreetName,', ',address.Barangay)
				FROM dorm, address, owner
				WHERE dorm.OwnerId = owner.OwnerId AND dorm.AddressId = address.AddressId
				AND dorm.DormId = '".$id."'";
		$result = mysqli_query($dbconn, $query);
		return $result;
	}
	function retrieveGallery($dbconn, $id, $dormName){
		$query = "SELECT dorm_pictures.imgurl, dorm_pictures.imgdesc
				FROM dorm_pictures
				WHERE dorm_pictures.DormId = '".$id."'";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_num_rows($result) > 0){
		?>
			<ul>
		<?php
			while(list($imgurl, $imgdesc) = mysqli_fetch_row($result)){
			?>
				<li><img src="<?=$imgurl?>" width = "400px" /></li>
			<?php
			}
			?>
			</ul>
		<?php
		}else{
		?>
			<ul>
				<li>No available images in the database for <?=$dormName?></li>
			</ul>
		<?php
		}
	}
	function retrieveFacilities($dbconn, $id, $dormName){
		$query = "SELECT facilities.facilityName
				FROM facilities, facility_dorm
				WHERE facilities.facilityNo = facility_dorm.facilityNo
				AND facility_dorm.DormID ='".$id."'";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_num_rows($result)>0){
			while(list($facilityName) = mysqli_fetch_row($result)){
			?>
				<li><?=$facilityName?></li>
			<?php
			}
		}else{
		?>
			<li>No recorded facilities for <?=$dormName?></li>
		<?php
		}
	}
	function retrieveRooms($dbconn, $id){
		$query = "SELECT room.MaxNoOfResidents, room.TypeOfPayment, room.Price,dorm_room.Availability
				FROM dorm_room, room
				WHERE dorm_room.DormId = '".$id."' AND room.RoomNo = dorm_room.RoomNo";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_num_rows($result) > 0){
			while(list($maxNum,$typeofpayment,$price,$availability)=mysqli_fetch_row($result)){
			?>
				<dt>Maximum No. of Residences</dt>
				<dd><?=$maxNum?></dd>
				<dt>Type of Payment</dt>
				<dd><?=determineTOP($typeofpayment)?></dd>
				<dt>Price</dt>
				<dd><?=$price?></dd>
				<dt>Availability</dt>
				<dd><?=$availability?></dd>
			<?php
			}
		}else{
		?>
			<dt>Maximum No. of Residences</dt>
			<dd>N/A</dd>
			<dt>Type of Payment</dt>
			<dd>N/A</dd>
			<dt>Price</dt>
			<dd>N/A</dd>
			<dt>Availability</dt>
			<dd>N/A</dd>
		<?php
		}
	}
	function determineTOP($typeofpayment){
		if($typeofpayment=="by_person")
			return "By Person";
		return "By Room";
	}
	function numType($numType, $dormID, $dbconn){
		$query = "SELECT Number
				FROM dorm_number
				WHERE NumType = '".$numType."' AND DormID = '".$dormID."'";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_num_rows($result)!=0){
			while(list($number)=mysqli_fetch_row($result)){
	?>
			<span><?=$number?></span><br />
	<?php	}
		}else{
	?>
			<span>N/A</span>
	<?php	}
	}
	function retrieveAdd($dormID, $dbconn, $dormName){
		$query = "SELECT add_on.add_item, add_on.add_price
				FROM dorm_addon, add_on
				WHERE dorm_addon.DormID = '".$dormID."'
				AND dorm_addon.add_id = add_on.add_id";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_num_rows($result) > 0){
		?>
			<ul>
			<?php
				while(list($addItem, $addPrice)=mysqli_fetch_row($result)){
				?>
					<li><strong><?=$addItem?></strong> - <?=$addPrice?></li>
				<?php
				}
			?>	
			</ul>
		<?php
		}else{
		?>
			<ul><li>No Additional Payments for <?=$dormName?></li></ul>
		<?php
		}
	}

	function elipse($string){
		if(strlen($string)<20){
			echo $string;
		}
		else{
			echo substr($string, 0, 20) . "...";
		}
	}
?>