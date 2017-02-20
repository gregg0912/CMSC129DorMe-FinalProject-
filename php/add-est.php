<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	ownerRedirect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Add Establishment</title>
</head>
<body>
<?=headerRender();?>
<div id="header2">
	<h1>• Add Information •</h1>
	<p>	Know an establishment that needs to be featured here?<br>
		Are you an owner who wants to advertise their establishment?<br>
		Simply input your information into our database now!
	</p>
</div>
<div>
	<form method="POST" action="" id="add-form">
		<div class="msg">
			<p><?=$errorMsg1?></p>
		</div>
		<fieldset>
			<legend>Establishment Information</legend>
			<input type="text" name="dormName" required="required" placeholder="Establishment Name" value="<?=$estName?>" />
			<input type="text" name="streetName" required="required" placeholder="Street Name" value="<?=$streetName?>" />
			<input type="text" name="barangayName" required="required" placeholder="Barangay Name" value="<?=$barangayName?>" />
		</fieldset>
		<fieldset>
			<legend>Contact Information</legend>
			<input pattern="^\d{3}(-\d{4})?$" type="text" name="cellnum"  placeholder="Telephone: (ex. 123-456)" value="<?=$cnum?>" />
			<input pattern="\b\d{11}\b" type="text" name="telnum" placeholder="Cellphone: (ex. 09123456789)" value="<?=$pnum?>" />
		</fieldset>
		<div class="msg">
			<p><?=$errorMsg2?></p>
		</div>
		<fieldset>
			<legend>Establishment Location</legend>
			<label class="radio inline"><input type="radio" name="loc" value="dormArea" /><span>Dorm Area</span></label>
			<label class="radio inline"><input type="radio" name="loc" value="banwa" /><span>Banwa</span></label>
		</fieldset>
		<div class="msg">
			<p><?=$errorMsg3?></p>
		</div>
		<fieldset>
			<legend>Housing Type</legend>
			<label class="radio inline"><input type="radio" name="hType" value="apartment" /><span>Apartment</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="bedspace" /><span>Bedspace</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="boardinghouse" /><span>Boarding House</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="dormitory"><span>Dormitory</span></label>
		</fieldset>
		<div class="msg">
			<p><?=$errorMsg4?></p>
		</div>
		<fieldset>
			<legend>Facilities</legend>
			<?php
			$query = "SELECT * FROM facilities ORDER BY facilities.facilityName";
			$result = mysqli_query($dbconn, $query);
			?>
		</fieldset>
	</form>
</div>
</body>
</html>