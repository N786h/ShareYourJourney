<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('location:signin.php');
	?>

<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
		<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/Location.js"></script>
    	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container" id="container">
			<header>
				<div class="login_img">
					<img src=images/<?php echo $_SESSION['username'];?>.jpeg alt=<?php echo $_SESSION['username'];?> height=50 width=50 border=5/><br>
					<?php echo "Welcome<br>".$_SESSION['username'];?>
				</div>
				<nav>
					<ul>
						<li><a href="LoginHome.php">LoginHome</a></li>
						<li><a href="phistory.php">History</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<img src=images/logo.jpg height=100 width=100 border=5/>
			</header>
			<section id="main" class="boxed">



				<div id="dvMap" style="width: 1330px; height: 500px"></div>

				 

			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnrc0Wajsrk-wo5HbGnSpnF9qW-YFbrE0&callback=loadMap"></script>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	</body>
</html>