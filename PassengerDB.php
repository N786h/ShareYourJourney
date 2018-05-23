<?php
 session_start();
 if(!isset($_SESSION['username']))
    header('location:signin.php');
 $seat=$_POST['seat'];
 $source=$_POST['source'];
 $destination=$_POST['destination'];
 $username=$_SESSION['username'];
 date_default_timezone_set('Asia/Calcutta');
 $date=date('Y-m-d H:i:s');

 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'syj');
 if(isset($_POST['submit'])){
 $q="insert into passenger values(null,'$username','$seat','$source','$destination','$date','')";
 mysqli_query($con,$q);}

 $q1="select * from driver where source='$source' && destination='$destination' && status=0";
 $result=mysqli_query($con,$q1);
 $row_count=mysqli_num_rows($result);
 mysqli_close($con);

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
						<li><a href="http://localhost:8080/syj/LoginHome.php">LoginHome</a></li>
						<li><a href="phistory.php">History</a></li>
						<li><a href="http://localhost:8080/syj/logout.php">Logout</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">
					<form action="request.php" method="post">
						<table id="questiontable">
							<tr class="headrow">
								<th>Username</th>
							  <th>Seat</th>
							  <th>Source</th>
							  <th>Destination</th>
							  <th>Choose for request</th>
							</tr>
							<?php
								  for($i=1;$i<=$row_count;$i++)
								  {
								  	$row=mysqli_fetch_array($result);
							?>
							<tr class="<?php if($i%2==1) echo "odd"; ?>">
								<td><?php echo $row['username']; ?></td>
							  <td><?php echo $row['seat']; ?></td>
							  <td><?php echo $row['source']; ?></td>
							  <td><?php echo $row['destination']; ?></td>
							  <td><input type="radio" value="<?php echo $row['drid']; ?>" name="<?php echo $username?>"/></td>
							</tr>
							<?php }?>
						</table>
						<input type="submit" value="Request" id="matchRoot">
					</form>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 email : shareyourjourney03@gmail.com
			</footer>
		</div>
	</body>
</html>