<?php
	session_start();
	require("function.php");
	$dbconn = dbconn();
	ownerRedirect();
	$ownerId = $_SESSION['userID'];
	$estName = "";
	$streetName = "";
	$barangayName = "";
	$cellnum = "";
	$telnum = "";
	$loc = "";
	$hType = "";
	$facilityList = "";
	$addOn = "";
	$addItem = "";		
 	$addPrice = "";
	$maxNum = "";
	$typeOfPayment = "";
	$price = "";
	$errorMsg = "";
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
		if(!empty($_POST['maxNum'])){
		$maxNum = $_POST['maxNum'];		
 		}		
 		if(!empty($_POST['price'])){		
 			$price = $_POST['price'];		
 		}		
 		if(!empty($_POST['add-item'])){		
 			$addItem = $_POST['add-item'];		
 		}		
 		if(!empty($_POST['add-price'])){		
 			$addPrice = $_POST['add-price'];		
		}		
list($errorMsg, $successMsg, $errors) = addEst($dbconn, $ownerId, $estName, $streetName, $barangayName, $cellnum, $telnum, $loc, $hType, $facilityList, $addOn, $addItem, $addPrice, $typeOfPayment, $maxNum, $price);		
 if($errors == 0){		
	$estName = "";		
	$streetName = "";		
	$barangayName = "";		
	$cellnum = "";		
	$telnum = "";		
	$loc = "";		
	$hType = "";		
	$facilityList = "";		
	$addOn = "";		
	$addItem = "";		
	$addPrice = "";		
	$maxNum = "";		
	$typeOfPayment = "";		
	$price = "";		
	$errorMsg = "";		
	}
		list($errorMsg, $successMsg) = addEst($estName, $streetName, $barangayName, $cellnum, $telnum, $loc, $hType, $facilityList, $addOn, $typeOfPayment, $maxNum, $price);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DorMe | Add Establishment</title>
	<script type="text/javascript" src="../js/js.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>

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
			<p>
			<?php
			if(!empty($errorMsg))		
 				echo "$errorMsg";		
 			else		
 				echo "$successMsg";		
 			?>
 			</p>
		<fieldset>
			<legend>Establishment Information</legend>
			<input type="text" name="estName" required="required" placeholder="Establishment Name" value="<?=$estName?>" />
			<input type="text" name="streetName" required="required" placeholder="Street Name" value="<?=$streetName?>" list="street" />
			<?=addressDataList("street");?>
			<input type="text" name="barangayName" required="required" placeholder="Barangay Name" value="<?=$barangayName?>" list=""barangay" />
				<?=addressDataList("barangay")?>
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
		<fieldset id="TextBoxesGroup" name="TextBoxesGroup">
			<legend>Facilities</legend>
			<div id="checkboxEstGroup">
			<?php
			checkboxEst();
			?>
			</div>
			<input type="button" class="add-btn" id="add-btn" name="add-btn" value="Add Option" />
		</fieldset>
		<fieldset id="RoomsGroup" name="RoomsGroup">
			<legend>Rooms</legend>
			<div id="roomDiv1">
			<label>Maximum number of residents: <input type="number" name="maxNum[]" min="1" value="1" /></label>
			<label>
				Type of Payment:
				<select name="typeOfPayment[]" id="typeOfPayment">
					<option value="by_room">Per Room</option>
					<option value="by_person">Per person</option>
				</select>
			</label>
			<label>Price: <input type="number" name="price[]" min="500" value="500" /></label>
			</div>
			<input type="button" class="add-btn" id="add-btn2" name="add-btn2" value="Add Option" />
		</fieldset>
		<fieldset id="AddOnGroup" name="AddOnGroup">
			<legend>Add-On</legend>
			<div id="checkboxAddGroup">
			<?=checkboxAdd();?>
			</div>
			<input type="button" name="add-btn" id="add-btn3" name="add-btn3" value="Add Option"/>
		</fieldset>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
</body>
</html>