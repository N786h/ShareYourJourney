<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
			<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<header>
				<nav>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="signin.php">SingIn</a></li>
						<li><a href="registration.php">SingUp</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">

				<div class="login-form boxed">
					<?php
					if(isset($_POST['loginbutton']))
					{
					 session_start();
					 $_SESSION['username']=$_POST['username'];
					 $username=$_SESSION['username'];
					 $dob=$_POST['dob'];
					 $mobileNo=$_POST['mobileNo'];
					 $Ques1=$_POST['Ques1'];
 					 $Ques2=$_POST['Ques2'];
 					 $Ques3=$_POST['Ques3'];

					 $con=mysqli_connect('127.0.0.1','root');
					 mysqli_select_db($con,'syj');
					 $q="select * from registration where username='$username' && dob='$dob' && mobileNo='$mobileNo' && Ques1='$Ques1' && Ques2='$Ques2' && Ques3='$Ques3'";
					 $result=mysqli_query($con,$q);
					 $row_count=mysqli_num_rows($result);
					 if($row_count==1)
					 {
					  $row=mysqli_fetch_array($result);
					  $message="Your password is ".base64_decode($row['password']);
					  echo "<script> alert('$message'); </script>";
					?>
					  <a href="http://localhost:8080/syj/ChangePassword.php" value="$username">ChangePassword</a>
					  <?php
					  echo "</mark><br>";
					 }
					 else
					  echo "<script> alert('DOB or mobile no. or security answer is incorrect'); </script>";
				}?>
					<form action="#" method="post" id="loginForm">
						<center><h2>personal Information</h2></center>
						<label for="username">Username :</label>
						<input type="text" name="username" id="username" autofocus required /> <br />
						<label>Date of birth* :</label>
						<input type="date" name="dob" Required><br/>
						<label>Mobile No.* :</label>
						<input type="tel" name="mobileNo" pattern="[0-9]{10}" Required><br/>
						<center><h2>Security Questions</h2></center>
						<label>Who is you favorite teacher?</label>
						<input type="text" name="Ques1" required /><br/>
						<label>What was your first school name?</label>
						<input type="text" name="Ques2" required /><br/>
						<label>What was your favorite fruit as a child?</label>
						<input type="text" name="Ques3" required /><br/>
						<input type="submit" name="loginbutton" value="Show Password">
						<input type="reset" name="cancelbutton" value="Cancel">
					</form>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
		
	</body>
</html>