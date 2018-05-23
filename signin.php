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
						<li><a href="registration.php">SingUp</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<marquee direction=right scrollamount=10 bgcolor=#ffc456><h2>Login Form</h2></marquee>
				<div id="section">

				<div class="login-form boxed">
					<?php
					if(isset($_POST['loginbutton'])){
					 session_start();
					 $username=$_POST['username'];
					 $password=base64_encode($_POST['password']);

					 //Establish Connection with mysql
					 $con=mysqli_connect('127.0.0.1','root');
					 mysqli_select_db($con,'syj');
					 $q="select * from registration where username='$username'&& password='$password'";
					 $result=mysqli_query($con,$q);
					 $row_count=mysqli_num_rows($result);
					 if($row_count==1)
					 {
					  $row=mysqli_fetch_array($result);
					  $_SESSION['username']=$row['username'];
					  header('location:LoginHome.php');
					 }
					 else
					  echo "<mark>Incorrect username or password</mark><br>";;
					} ?>
					<form action="#" method="post" id="loginForm">
						<label for="username">Username :</label>
						<input type="text" name="username" id="username" autofocus required /> <br />
						<label for="password">Password :</label>
						<input type="password" name="password" id="password" required /> <br />
						<label><a href="forget.php">ForgetPassword</a>
						<a href="ChangePassword.php">ChangePassword</a></label><br>
						<input type="submit" name="loginbutton" value="Login">
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