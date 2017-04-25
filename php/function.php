<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/home.css" rel="stylesheet" type="text/css" />
<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/js.js"></script>
<script src="../js/jquery.js"></script>

<?php
	function dbconn(){
		$dbconn = mysqli_connect("localhost","root","","dorme") or die("Could not connect to database!");
		mysqli_select_db($dbconn, "dorme");
		return $dbconn;
	}

	function homequeryConstruct(){
		$query = "SELECT dorm.DormId, dorm.DormName, CONCAT(address.StreetName,', ',address.Barangay), owner.Name, dorm.HousingType, dorm.thumbnailpic
				FROM dorm, address, owner
				WHERE dorm.AddressId = address.AddressId AND dorm.OwnerId = owner.OwnerId
				ORDER BY votes DESC
				LIMIT 5";
		return $query;
	}

	function renderlist($res, $page, $count, $fromPage){
		if(mysqli_num_rows($res)){
		?>
			<section id="estab-list">
				<?php
				while(list($estId, $estName, $owner, $address,$housingType, $thumbnailpic) = mysqli_fetch_row($res)){
					$housingType = determine($housingType);
				?>
				<div class="establishment row">
					<div>
							<a href="viewdorm.php?dormId=<?=$estId?>">
							<img src="../img/error.JPG" class="img-rounded" alt="Image not found" /></a>
						<div class="caption">
				        	<label><span><?=$estName?></span></label>
				          	<p>
				          		<?=$owner?><br />
								<?=$address?><br />
								<?=$housingType?>
				        	</p>
		        		</div>
					</div>
				<?php
					if($fromPage == "viewOwner"){
				?>
					<a href="javascript:void(0)" name="delete" id="delete" data-pg = '<?=$estId?>'> Delete</a>
				<?php
					}
				?>
			
				</div>
				<?php
				}
				?>
			</section>
	<?php
		}
		else{
			if($fromPage == "view"){
	?>		
				<div id="establishment">
					<a href="javascript:void(0)"><img src="" alt="Image not found" /></a>
					<span>Your search returned no results!</span>
				</div>
	<?php
			}else if($fromPage == "viewOwner"){
	?>
				<div id="establishment">
					<a href="javascript:void(0)"><img src="" alt="Image not found" /></a>
					<span>You don't have any dormitories! Try adding one.</span>
				</div>
	<?php
			}
		}
		if(!empty($page)&&!empty($count)){
			pages($count, $page);
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
	function checkboxEst(){
		$query = "SELECT facilities.facilityName FROM facilities ORDER BY facilities.facilityName";
		$result = mysqli_query(dbconn(), $query);
		while(list($facilityName) = mysqli_fetch_row($result)){
		?>
			<label><input type="checkbox" name="facilityList[]" value="<?=$facilityName?>" /><?=$facilityName?></label>
		<?php
		}
	}
	function checkboxAdd(){
		$query = "SELECT * FROM add_on";
		$result = mysqli_query(dbconn(), $query);
		while(list($add_id, $add_item, $add_price) = mysqli_fetch_row($result)){
		?>
			<label><input type="checkbox" name="addOn[]" value="<?=$add_item.",".$add_price?>" /><?=$add_item?> - <?=$add_price?></label>
		<?php
		}
	}
	function ownerNav(){
	?>
		<nav id="gen-nav" class="nav navbar-inverse col-md-12 col-sm-12">
			<div class="container-fluid">
				<div class="navbar-headernav">
					<button id="menu" class="navbar-toggle" data-toggle="collapse" data-target="#glyph-menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
				</div>
				<div id="glyph-menu" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="home.php">Home</a></li>
						<li><a href="view.php">View</a></li>
						<li><a href="viewOwner.php">Manage Establishments</a></li>
						<li><a href="ownerNotifs.php">Notifications</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<?php
	}
	function adminNav(){
	?>
		<nav id="gen-nav" class="nav navbar-inverse col-md-12 col-sm-12">
			<div class="container-fluid">
				<div class="navbar-header">
					<button id="menu" class="navbar-toggle collapse" data-toggle="collapse" data-target="#glyph-menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
				</div>
				<div id="glyph-menu" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="home.php">Home</a></li>
						<li><a href="view.php">View</a></li>
						<li><a href="adminNotifs.php">Notifications</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<?php
	}
	function userNav(){
	?>
		<nav id="gen-nav" class="nav navbar-inverse col-md-12 col-sm-12">
			<div class="container-fluid">
				<div class="navbar-header">
					<button id="menu" class="navbar-toggle" data-toggle="collapse" data-target="#glyph-menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
				</div>
				<div id="glyph-menu" class="collapse navbar-collapse">
		    		<ul class="nav navbar-nav pull-left">
						<li class="fromLeft"><a href="home.php">Home</a></li>
						<li class="fromLeft"><a href="view.php">View</a></li>
						<li class="fromLeft"><a href="poll.php">Poll</a></li>
						<li class="fromLeft"><a href="about.php">About</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown"><a aria-expanded="true" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Log In</a>
							<ul class="dropdown-menu">
								<li><a href="adminlogin.php">Admin</a></li>
								<li><a href="login.php">Owner</a></li>
							</ul>
						</li>
						<li><a href="registration.php">Sign Up</a></li>
					</ul>
				</div>
	    	</div>
		</nav>

	<?php
	}
	function headerRender(){
	?>
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				    <li data-target="#carousel" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel" data-slide-to="1"></li>
				    <li data-target="#carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
			    	<div class="item active"><img class="carousel-image" src="../img/thumbnails/bettys.JPG" alt="image not found" /></div>
			    	<div class="item"><img class="carousel-image" src="../img/thumbnails/firstestate.JPG" alt="image not found" /></div>
			    	<div class="item"><img class="carousel-image" src="../img/thumbnails/foursisters.JPG" alt="image not found" /></div>
			  	</div>
			</div>
		<div id='dorme-main-header' class="col-md-10 col-sm-10">
			<h1>DorMe.</h1>
			<h2>your dorm. my dorm. our dorm.</h2>
			<p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
				Scroll through featured dormitories and apartments on our home page and <br />
				have an easy glimpse into finding your perfect second home!<br />
				Sit back and pick your like.
			</p>
		</div>
		<?php
		if(isset($_SESSION['userID'])){
			ownerNav();
		}else if(isset($_SESSION['adminID'])){
			adminNav();
		}else if(!isset($_SESSION['adminID'])&&!isset($_SESSION['userID'])){
			userNav();
		}
		?>
	<?php
	}
	function ownerRedirect(){
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
	function addressDataList($key){
	?>
		<datalist id="<?=$key?>">
			<?php
			if($key=="street")
				$query = "SELECT StreetName FROM address";
			else if($key=="barangay")
				$query = "SELECT Barangay FROM address";
			$result = mysqli_query(dbconn(), $query);
			while(list($names) = mysqli_fetch_row($result)){
			?>
				<option><?=$names?></option>
			<?php
			}
			?>
			</datalist>
	<?php
	}
	function addEst($dbconn, $ownerId, $estName, $streetName, $barangayName, $cellnum, $telnum, $loc, $hType, $facilityList, $addOn, $addItem, $addPrice, $typeOfPayment, $maxNum, $price){
		$errorMsg = "";
		$successMsg = "";
		$errors = 0;
		$estName1 = htmlspecialchars($estName, ENT_QUOTES);
		$estName2 = str_replace("'","\\'",$estName);
		$query = "SELECT * FROM dorm WHERE dorm.dormName LIKE '$estName1' OR dorm.dormName LIKE '$estName2'";
		$result = mysqli_query(dbconn(),$query);
		$flag = true;
		if(mysqli_num_rows($result)>=1){
			$errorMsg = $errorMsg."<br />$estName is already taken. Please input a different establishment name.";
			$errors++;
		}
		if(!(empty($telnum))&&!(preg_match("/^\d{3}-\d{4}?$/", $telnum))){
			$errorMsg = $errorMsg."<br />For the telephone number, please follow this format: (123-4567).";
			$errors++;
		}
		if(!(empty($cellnum))&&!(preg_match("~^(0|\+63)9\d{9}~",$cellnum))){
			$errorMsg = $errorMsg."<br />For the cellphone number, please follow this format: (09123456789 or +639123456789).";
			$errors++;
		}
		if(empty($loc)){
			$errorMsg = $errorMsg."<br />Location field was left blank. Please choose a location.";
			$errors++;
		}
		if(empty($hType)){
			$errorMsg = $errorMsg."<br />Housing Type field left blank. Please choose a housing type.";
			$errors++;
		}
		if(empty($facilityList)){
			$errorMsg = $errorMsg."<br />Facilities were left blank. Please choose one or more facilities.";
			$errors++;
		}
		if(empty($typeOfPayment)){
			$errorMsg = $errorMsg."<br />Type of payment was left blank. Please choose a payment type.";
			$errors++;
		}
		if($errors==0){
			if(!(preg_match("/St\.$/", $streetName))){
				$streetName = $streetName." St.";
			}
			if(!(preg_match("/^Brgy\. /", $barangayName))){
				$barangayName = "Brgy. ".$barangayName;
			}
			// $ownerId = $_SESSION['userID'];
			$estName = mysqli_real_escape_string(dbconn(), $estName);
			$query = "INSERT INTO request(`requestId`,`OwnerId`, `DormName`, `HousingType`, `Location`, `thumbnailpic`) VALUES(NULL, '$ownerId', '$estName', '$hType', '$loc', 'css/images/no_image.png')";
			$result = mysqli_query(dbconn(), $query);
			if($result){
				$requestId = mysqli_insert_id(dbconn());
				if(!empty($addOn)){
					foreach($addOn as $value){
						$addition = explode(",",$value);
						echo "$addition[0] : $addition[1] <br />";
						$query = "INSERT INTO request_add_on(`raId`, `requestId`, `add_item`, `add_price`) VALUES(NULL, '$requestId', '$addition[0]','$addition[1]')";
						echo "$query <br />";
						$result = mysqli_query(dbconn(),$query);
						if(!$result){
							$errors++;
							echo "<script type='text/javascript'>alert('Something went wrong while inserting an add on. Please try again.')</script>";
							$flag = false;
							break;
						}
					}
					if(!empty($addItem) && !empty($addPrice)){
						for($i = 0; ($i < count($addItem)) && ($i < count($addPrice)); $i++){
							$query = "INSERT INTO request_add_on(`raId`, `requestId`, `add_item`, `add_price`) VALUES(NULL, '$requestId', '$addItem[$i]','$addPrice[$i]')";
							$result = mysqli_query(dbconn(), $query);
							if(!$result){
								$errors++;
								echo "<script type='text/javascript'>alert('Something went wrong while inserting an add on 2. Please try again.')</script>";
								$flag = false;
								break;
							}
						}
					}
				}
				if($flag){
					if(!empty($cellnum)){
						$query = "INSERT INTO request_number(`rnId`, `requestId`, `NumType`, `Number`) VALUES(NULL, '$requestId', 'cp_no', '$cellnum')";
						$result = mysqli_query(dbconn(), $query);
						if(!$result){
							$errors++;
							echo "<script type='text/javascript'>alert('Something went wrong while inserting a cellphone number. Please try again.')</script>";
							$flag = false;
						}
					}
					if(!empty($telnum)){
						$query = "INSERT INTO request_number(`rnId`, `requestId`, `NumType`, `Number`) VALUES(NULL, '$requestId', 'tel_no', '$telnum')";
						$result = mysqli_query(dbconn(), $query);
						if(!$result){
							$errors++;
							echo "<script type='text/javascript'>alert('Something went wrong while inserting a telephone number. Please try again.')</script>";
							$flag = false;
						}
					}
					if($flag){
						foreach($facilityList as $value){
							$query = "INSERT INTO request_facility(`rfID`, `requestId`, `facilityName`) VALUES(NULL, '$requestId', '$value')";
							$result = mysqli_query(dbconn(),$query);
							if(!$result){
								$errors++;
								echo "<script type='text/javascript'>alert('Something went wrong while inserting a facility. Please try again.')</script>";
								$flag = false;
								break;
							}
						}
						if($flag){
							$flag = true;
							for($i = 0; ($i < count($maxNum))&&( $i < count($typeOfPayment))&&( $i < count($price)); $i++){
								$query = "INSERT INTO request_room(`rrID`, `requestId`, `MaxNoOfResidents`, `TypeOfPayment`, `Price`) VALUES(NULL, '$requestId', '$maxNum[$i]', '$typeOfPayment[$i]', '$price[$i]')";
								$result = mysqli_query(dbconn(), $query);
								if(!$result){
									$errors++;
									echo "<script type='text/javascript'>alert('Something went wrong while inserting a room. Please try again.')</script>";
									$flag = false;
									break;
								}
							}
							if($flag){
								$flag = true;
								$query = "SELECT adminId FROM admin";
								$result = mysqli_query(dbconn(), $query);
								while(list($adminId) = mysqli_fetch_row($result)){
									$seen_query = "INSERT INTO `admin_notif`(`NotifId`, `adminId`, `OwnerId`, `requestId`, `mark`) VALUES(NULL, '$adminId', '$ownerId', '$requestId', 'not_read')";
									$seen_result = mysqli_query(dbconn(), $seen_query);
									if(!$seen_result){
										$errors++;
										echo "<script type='text/javascript'>alert('Something went wrong while notifying the admin. Please try again.')</script>";
										$flag = false;
										break;
									}
								}
								if($flag){
									$successMsg = "Your request has been successfully added! Please wait for the approval of the admin.";
								}
								// else{
								// 	$errors++;
								// 	echo "<script type='text/javascript'>alert('Something went wrong. Please try again.')</script>";
								// }
							}
						}
					}
				}
			}else{
				$errors++;
				echo "<script type='text/javascript'>alert('Something went wrong while inserting in request. Please try again.')</script>";
			}
		}
		return array($errorMsg, $successMsg, $errors);
	}
	function pages($count, $page){

        parse_str($_SERVER["QUERY_STRING"], $url_array);
        unset($url_array['page']);
        $url = http_build_query($url_array);
        if($count > 1){
            if($page > 1){ ?>
                <li><a href="?page=<?php echo ($page-1); ?><?php echo isset($url) && !empty($url) ? "&" . $url : ""; ?>">&laquo;</a></li>
            <?php  
            }  
            for($x = 1; $x <= $count; $x++){
                if($x == $page){ ?>
                    <li><a class="current" href="?page=<?php echo $x; ?><?php echo isset($url) && !empty($url) ? "&" . $url : ""; ?>"><?=$x?></a></li>
                <?php
                }else{ ?>
                    <li><a href="?page=<?php echo $x; ?><?php echo isset($url) && !empty($url) ? "&" . $url : ""; ?>"><?=$x?></a></li>
                <?php      
                }   
            }

            if($page!=$count){ ?>
                <li><a href="?page=<?php echo ($page+1); ?><?php echo isset($url) && !empty($url) ? "&" . $url : ""; ?>">&raquo;</a></li>
            <?php   
            }
        } elseif ($count < 1) { ?>
        <?php 
        } 
    
	}
?>
