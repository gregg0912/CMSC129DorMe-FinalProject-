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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/home.css" rel="stylesheet" type="text/css" />
	<link href="../css/view.css" rel="stylesheet" type="text/css" />
	<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/js.js"></script>
	<script src="../js/jquery.js"></script>
</head>
<body>
	<?php
	headerRender();

	?>
	<div class='body-content col-md-12 col-sm-12'>
		<div class="col-md-3 col-sm-3">
		<form id="filter" class="filter" method="get">
			<div class="input-group search-input-group">
	            <input type="text" id="noborder" name="keyword" class="form-control"  placeholder="Search" >
	            <span class="input-group-addon">
	            <button type="submit">
	            <span class="glyphicon glyphicon-search"></span>
	            </button>  
	            </span>
	        </div>
	        <br />
			<fieldset>
				<legend>FILTER:</legend>
				<div class="opt">
				<?php
				$query2 = "SELECT * FROM facilities";
				$result = mysqli_query($dbconn, $query2);
				checkbox($result);
				?>
				</div>
				<hr />
					<div class="location opt">
						<label class="radio inline">
							<input type="radio" name="loc" value="dormArea" />
							<span>Dorm Area</span>
						</label>
						<label class="radio inline">
							<input type="radio" name="loc" value="banwa" />
							<span>Banwa</span>
						</label>
					</div>
					<div class="btn-group" role="group">
					  <button type="button submit" class="btn btn-default">Filter</button>
					  <button type="button reset" class="btn btn-default" href="javascript:void(0)">Clear</button>
					</div>
				</div>
			</fieldset>
		</form>
		</div>
		<div id="establishments" class="col-md-8 col-sm-8">
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
		</div>
	</div>
	<footer>
		<p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
	</footer>
	<a id="back-to-top" href="#" class="btn btn-default btn-lg to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
</body>
</html>
