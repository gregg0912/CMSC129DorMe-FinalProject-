<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	ownerRedirect();
	$estName = "";
	$streetName = "";
	$barangayName = "";
	$cellnum = "";
	$telnum = "";
	$loc = "";
	$hType = "";
	$facilityList = "";
	$maxNum = "";
	$typeOfPayment = "";
	$price = "";
	$errorMsg1 = "";
	$errorMsg2 = "";
	$errorMsg3 = "";
	$errorMsg4 = "";
	$successMsg = "";
	if(isset($_POST['submit'])){
		$estName = $_POST['estName'];
		$streetName = $_POST['streetName'];
		$barangayName = $_POST['barangayName'];
		$cellnum = $_POST['cellnum'];
		$telnum = $_POST['telnum'];
		$price = $_POST['price'];
		$maxNum = $_POST['maxNum'];
		$price = $_POST['price'];
		if(!empty($_POST['loc'])){
			$loc = $_POST['loc'];
		}
		if(!empty($_POST['hType'])){
			$hType = $_POST['hType'];
		}
		if(!empty($_POST['facilityList'])){
			$facilityList = $_POST['facilityList'];
		}
		if(!empty($_POST['addOn'])){
			$addOn = $_POST['addOn'];
		}
		if(!empty($_POST['typeOfPayment'])){
			$typeOfPayment = $_POST['typeOfPayment'];
		}
		list($errorMsg, $successMsg) = addEst($estName, $streetName, $barangayName, $cellnum, $telnum, $loc, $hType, $facilityList, $addOn);
	}
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
	<p>	Want to advertise a new establishment?<br />
		Simply input your information into our database now!
	</p>
</div>
<div>
	<form method="POST" action="" id="add-form">
		<div class="msg">
			<p><?=$errorMsg?></p>
		<fieldset>
			<legend>Establishment Information</legend>
			<input type="text" name="estName" required="required" placeholder="Establishment Name" value="<?=$estName?>" />
			<input type="text" name="streetName" required="required" placeholder="Street Name" value="<?=$streetName?>" />
			<input type="text" name="barangayName" required="required" placeholder="Barangay Name" value="<?=$barangayName?>" />
		</fieldset>
		<fieldset>
			<legend>Contact Information</legend>
			<input type="text" name="telnum"  placeholder="Telephone: (ex. 123-4567)" value="<?=$telnum?>" />
			<input type="text" name="cellnum" placeholder="Cellphone: (ex. 09123456789 or +639123456789)" value="<?=$cellnum?>" />
		</fieldset>
		<fieldset>
			<legend>Establishment Location</legend>
			<label class="radio inline"><input type="radio" name="loc" value="dormArea" /><span>Dorm Area</span></label>
			<label class="radio inline"><input type="radio" name="loc" value="banwa" /><span>Banwa</span></label>
		</fieldset>
		<fieldset>
			<legend>Housing Type</legend>
			<label class="radio inline"><input type="radio" name="hType" value="apartment" /><span>Apartment</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="bedspace" /><span>Bedspace</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="Boardinghouse" /><span>Boarding House</span></label>
			<label class="radio inline"><input type="radio" name="hType" value="dormitory"><span>Dormitory</span></label>
		</fieldset>
		<fieldset>
			<legend>Facilities</legend>
			<?php
			checkboxEst();
			?>
			<input type="button" class="add-btn" id="add-btn" name="add-btn" value="Add Option" />
		</fieldset>
		<fieldset>
			<legend>Rooms</legend>
			<label>Maximum number of residents: <input type="number" name="maxNum" min="1" value="1" /></label>
			<label>
				Type of Payment:
				<select name="typeOfPayment" id="typeOfPayment">
					<option value="by_room">Per Room</option>
					<option value="by_person">Per person</option>
				</select>
			</label>
			<label>Price: <input type="number" name="price" min="500" value="500" /></label>
			<input type="button" class="add-btn" id="add-btn2" name="add-btn2" value="Add Option" />
		</fieldset>
		<fieldset>
			<legend>Add-On</legend>
			<?=checkboxAdd();?>
		</fieldset>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
</body>
</html>