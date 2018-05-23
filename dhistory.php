<?php
 session_start();
 if(!isset($_SESSION['username']))
    header('location:signin.php');
 $con=mysqli_connect('127.0.0.1','root');
 mysqli_select_db($con,'syj');
 $username=$_SESSION['username'];

 $q="select * from driver where username='$username'";
 $result=mysqli_query($con,$q);
 $row_count=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
			<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="./css/style.css">
    	<link rel="stylesheet" type="text/css" href="./css/table.css">
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
						<li><a href="driver.php">NewEntry</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">
						<form method="post" action="PassengerDetails.php">
							<div id="tablediv">
							  <table id="questiontable">
								<tr class="headrow">
								  <th>Seat</th>
								  <th>Vehicle No.</th>
								  <th>Source</th>
								  <th>Destination</th>
								  <th>Date & Time</th>
								  <th>Status</th>
								</tr>
								<?php
									for($i=0;$i<$row_count;$i++)
									{
									  $row=mysqli_fetch_array($result);
								?>
								<tr class="<?php if($i%2==1) echo "odd"; ?>">
								  <td><?php echo $row['seat']; ?></td>
								  <td><?php echo $row['VehicleNo']; ?></td>
								  <td><?php echo $row['source']; ?></td>
								  <td><?php echo $row['destination']; ?></td>
								  <td><?php echo $row['date']; ?></td>
								  <?php if($row['status']!=0) {  ?>
										  <td><input type="radio" value="<?php echo $row['status']; ?>" name="<?php echo $username?>" required/>
										  </td>
								  <?php	  } ?>
								</tr>
								  <?php	  } ?>
							  </table>
						  </div>
						<input type="submit" value="Details" id="matchRoot"> 
					 </form>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
	</body>
</html>