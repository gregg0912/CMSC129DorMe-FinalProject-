<?
	session_start();
	require "function.php";
	$dbconn = dbconn();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>DorMe | View Dorm</title>
</head>
<body>
	<nav id="navigation">
		<ul>
			<li><a href="home.xhtml" class="active">Home</a></li>
			<li><a href="">View</a></li>
			<li><a href="">Poll</a></li>
			<li><a href="">About</a></li>
		</ul>
	</nav>
		<div>
			Want to advertise your establishment? <a href="">Log In</a> or <a href="">Sign Up</a> now!
		</div>
		<section>
			<img src="img/thumbnails/bettys.JPG"/>
			<p>Betty's Boarding House</p>
			<p>Brgy.Somewhere,Miagao</p>
			<p> Leny Fortaleza </p>
		</section>
		<section>
			<img src="img/thumbnails/firstestate.JPG"/>
			<p>First Estate Dormitory</p>
			<p>Hollywood St., Mat-y,Miagao</p>
			<p> Cheery Joy Mayormente </p>
		</section>
		<section>
			<img src="img/thumbnails/foursisters.JPG"/>
			<p>Four Sisters Apartment</p>
			<p>Brgy.Overthere,Miagao</p>
			<p> Ate Staff </p>  <!--clarify who is owner -->
		</section>
		<section>
			<img src="img/thumbnails/gabons.JPG"/>
			<p>Gabon's Place</p>
			<p>Paguntalan St.,Miagao</p>
			<p> Emiliana Gabon </p>
		</section>
		
		<ul>
			<li><a href="page1.html"> 1 </a></li>
			<li><a href="page2.html"> 2 </a></li>
			<li><a href="page3.html"> 3 </a></li>
			<li><a href="page4.html"> 4 </a></li>
			<li><a href="page5.html"> 5 </a></li>
		</ul>
	
	<section>
  		<input type="text" name="search" value="search"/>
  		<input type="submit" name="submit" value="search"/>
		<form>
			<input type="checkbox" name="kitchen" value="kitchen"/>Kitchen 
			<input type="checkbox" name="common" value="common_cr"/>Common CR 
			<input type="checkbox" name="wifi" value="wifi"/>WiFi 
			<input type="checkbox" name="lobby" value="lobby"/>Lobby 
			<input type="checkbox" name="fire" value="fire"/>Fire Extinguisher
			<input type="checkbox" name="water" value="water"/>I have a car
			<input type="checkbox" name="dirty" value="dirty"/>Dirty Kitchen
			<input type="checkbox" name="television" value="television"/>Television 
			<input type="checkbox" name="elights" value="elights"/>Emergency Lights
			<input type="checkbox" name="canteen" value="canteen"/>Canteen
			<input type="checkbox" name="gazebo" value="gazebo"/>Gazebo
			<input type="checkbox" name="study" value="study"/>Study Area 
			<input type="checkbox" name="lavatory" value="lavatory"/>Lavatory per Room
			<input type="checkbox" name="cooler" value="cooler"/>Water Cooler 
		</form>
	</section>
</body>
</html>
