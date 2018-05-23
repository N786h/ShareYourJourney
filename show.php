<?php
 session_start();
 $con=mysqli_connect('127.0.0.1','root');
 mysqli_select_db($con,'syj');
 $q="select * from registration where username='".$_SESSION['username']."'";
 $result=mysqli_query($con,$q);
 $row_count=mysqli_num_rows($result);
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
				<nav>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="OurTeam.html">OurTeam</a></li>
						<li><a href="signin.php">SignIn</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">
					<h2><mark>You have registred Successfully</mark></h2>
					  <table id="questiontable">
						<?php
							for($i=0;$i<$row_count;$i++)
							{
							  $row=mysqli_fetch_array($result);
						?>
						 <tr class="odd" >
						 	<th>Name</th>
							<td><?php echo $row['Name']; ?></td>
						</tr>
						<tr>
						 	<th>Father`s Name</th>
							<td><?php echo $row['FatherName']; ?></td>
						</tr>
						<tr class="odd">
						 	<th>Gender</th>
							<td><?php echo $row['Gender']; ?></td>
						</tr>
						<tr>
						 	<th>DOB</th>
							<td><?php echo $row['dob']; ?></td>
						</tr>
						<tr class="odd">
						 	<th>Mobile No.</th>
							<td><?php echo $row['mobileNo']; ?></td>
						</tr>
						<tr>
						 	<th>Email</th>
							<td><?php echo $row['email']; ?></td>
						</tr>
						<tr class="odd">
						 	<th>Username</th>
							<td><?php echo $row['username']; ?></td>
						</tr>
							  
						<?php } ?>
					 </table>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
	</body>
</html>
<?php session_destroy(); ?>
