<?php
	session_start();
	if(isset($_POST['Accept'])||isset($_POST['Reject']))
	{
		if(!isset($_SESSION['username']))
	    header('location:signin.php');
	 $username=$_SESSION['username'];

	 $size=sizeof($_POST);
		$j=1;
		for($i=1; $i<=$size; $i++,$j++) { 
			$index=$username;
			if(isset($_POST[$index]))
				$prid[$i]=$_POST[$index];
			else
				$i--;
		}

	 $con=mysqli_connect('127.0.0.1','root');
	 mysqli_select_db($con,'syj');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
			<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<link rel="stylesheet" type="text/css" href="css/table.css">
	</head>
	<body>
		<div class="container">
			<header>
				<div class="login_img">
					<img src=images/<?php echo $_SESSION['username'];?>.jpeg alt=<?php echo $_SESSION['username'];?> height=50 width=50 border=5/><br>
					<?php echo "Welcome<br>".$_SESSION['username'];?>
				</div>
				<nav>
					<ul>
						<li><a href="LoginHome.php">LoginHome</a></li>
						<li><a href="dhistory.php">History</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">

					<?php
					if(isset($_POST['Accept'])){
					 $q="SELECT `drid` FROM `driver` WHERE `status`='$prid[1]'";
					 $result=mysqli_query($con,$q);
					 $row=mysqli_fetch_array($result);
					 $drid=$row[0];

					 $q1="UPDATE `passenger` SET `status`='$drid' WHERE prid='$prid[1]'";
					 $result1=mysqli_query($con,$q1);
					 if($result1)
					 {
					 	echo "Request acceted <br>";
					 }
					 else
					 {
					 	echo "failed";
					 }
					?>
						<img src=images/<?php echo $_SESSION['pusername'];?>Aadhaar.jpeg alt=<?php echo $_SESSION['pusername'];?> height=400 width=500 border=5/>
						<img src=images/<?php echo $_SESSION['pusername'];?>DL.jpeg alt=<?php echo $_SESSION['pusername'];?> height=400 width=500 border=5/>
				<?php }
						if(isset($_POST['Reject'])){
					 $q1="UPDATE `driver` SET `status`=0 WHERE `status`='$prid[1]'";
					 $result1=mysqli_query($con,$q1);
					 if($result1)
					 {
					 	echo "Request rejected <br>";
					 }
					 else
					 {
					 	echo "failed";
					 }
					} ?>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
	</body>
</html>