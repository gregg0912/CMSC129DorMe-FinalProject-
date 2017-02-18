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
		$query = "SELECT dorm.DormName, CONCAT(address.StreetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
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
			while(list($estName, $address, $owner, $housingType, $thumbnailpic) = mysqli_fetch_row($result)){
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
		<label><input type="checkbox" name="<?=$facilityNo?>"><?=$facilityName?></label>
	<?php
		}
	}
?>