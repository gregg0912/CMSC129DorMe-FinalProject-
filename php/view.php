<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	$query = "SELECT dorm.DormId,dorm.DormName, CONCAT(address.streetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
			FROM dorm, address, owner
			WHERE dorm.AddressId = address.AddressId
			AND dorm.OwnerId = owner.OwnerId";
	if(isset($_GET['submit'])){
		if(!empty($_GET['loc'])){
			$area = $_GET['loc'];
			$area = "dorm.location = '".$area."'";
			$query = $query . " AND $area";
		}
		if(!empty($_GET['keyword'])){
			$key1 = htmlspecialchars($_GET['keyword'], ENT_QUOTES);
			$key2 = str_replace("'", "\\'",$_GET['keyword']);
			$query = $query . " AND dorm.DormId IN (SELECT dorm.DormId
											FROM dorm
											WHERE dorm.DormName LIKE '%$key1%' OR dorm.DormName LIKE '%$key2%')";
		}
		if(!empty($_GET['facilityList'])){
			$facilities = $_GET['facilityList'];
			$size = count($facilities);
			$query = $query . " AND dorm.DormId IN (SELECT all_facilities.DormId
								FROM all_facilities
								WHERE all_facilities.facilityNo IN ('".implode("','",$facilities)."')
								GROUP BY all_facilities.DormId
								HAVING COUNT(all_facilities.facilityNo)>=$size)";
			unset($facilities);
		}
	}


	// $res = mysqli_query($dbconn, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | View Dorm</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<?php
	headerRender();

	?>
	<form id="filter" class="filter" method="get">
		<fieldset>
			<legend>FILTER:</legend>
			<input type="text" name="keyword" placeholder="Search" class="form-control-srch" id="noborder" />
			<?php
			$query2 = "SELECT * FROM facilities";
			$result = mysqli_query($dbconn, $query2);
			checkbox($result);
			?>
			<div class="location">
				<label class="radio inline">
					<input type="radio" name="loc" value="dormArea" />
					<span>Dorm Area</span>
				</label>
				<label class="radio inline">
					<input type="radio" name="loc" value="banwa" />
					<span>Banwa</span>
				</label>
			</div>
			<input type="submit" name="submit" value="Filter" />
			<a href="javascript:void(0)"><strong>Remove Filter</strong></a>
		</fieldset>
	</form>
	<section id="establishments">
		<?php
		 $result = mysqli_query($dbconn, $query);


		$start = 0;
		$lim = 4;

		if (isset($_GET['page'])) {
			$page=$_GET['page'];
			$start=($page-1) * $lim;
		}
		else{
			$page = 1;
		}

		$count = mysqli_affected_rows($dbconn);
		$count = ceil($count/$lim);

		$query = $query . " LIMIT $start, $lim";
		$res = mysqli_query($dbconn, $query);

		renderlist($res, $page, $count,"view");

		?>
	</section>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
</body>
</html>
