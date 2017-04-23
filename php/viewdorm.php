<?php
	session_start();
	require "function.php";
	$dbconn = dbconn();
	viewDormRedirect();
	$id = $_GET['dormId'];
	$result = viewdormQuery($dbconn, $id);
	list($dormName, $housingType, $ownerName, $location, $thumbnailpic, $address) = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | View</title>
		<script type="text/javascript" src="../js/js.js" ></script>
	<script type="text/javascript" src="../js/script.js" ></script>
</head>
<body>
<?php
	headerRender();
?>
	<div id='back'>
		<button class="back" id="back" onclick="history.go(-1);">Back</button>
	</div>
	<div id="content">
		<h1><?=$dormName?></h1>
		<div id="info">
			<h2>Establishment Details</h2>
			<img src="<?$thumbnailpic?>" alt="Image Not Found" />
			<div id="est">
				<dl>
					<dt>Owner</dt>
					<dd><?$ownerName?></dd>
					<dt>Housing Type</dt>
					<dd><?=determine($housingType)?></dd>
					<dt>Location</dt>
					<dd><?=determineLoc($location)?></dd>
					<dt>Address</dt>
					<dd><?=$address?></dd>
					<dt>Telephone Number</dt>
					<dd><?php
						numType("tel_no",$id,$dbconn);
					?></dd>
					<dt>Cellphone Number</dt>
					<dd><?php
						numType("cp_no",$id,$dbconn);
					?></dd>
				</dl>
			</div>
		</div>
		<div id="roomdetails">
			<h2>Room Details</h2>
			<dl>
				<?=retrieveRooms($dbconn, $id)?>
			</dl>
		</div>
		<div id="facilities">
			<h2>Facilities</h2>
			<ul>
				<?=retrieveFacilities($dbconn, $id, $dormName)?>
			</ul>
		</div>
		<div id="add_payments">
			<h2>Additional Payments</h2>
			<?=retrieveAdd($id, $dbconn, $dormName)?>
		</div>
		<div id="gallery">
			<h2>Gallery</h2>
			<div id="slider">
				<?=retrieveGallery($dbconn, $id, $dormName)?>
			</div>

			<?=uploadPics();?>
		</div>
			
	</div>
</body>
</html>