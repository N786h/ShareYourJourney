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
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">
				<div class="login-form boxed">
<?php
	if(isset($_POST['loginbutton'])){
	 session_start();
	 $username=$_POST['username'];
	 $password=base64_encode($_POST['password']);
	 $npassword=base64_encode($_POST['npassword']);

	  $con=mysqli_connect('127.0.0.1','root');
		 mysqli_select_db($con,'syj');
		 $q="select * from registration where username='$username' && password='$password'";
		 $result=mysqli_query($con,$q);
		 $row_count=mysqli_num_rows($result);
		 if($row_count==1)
		 {
		  	$q1="UPDATE `registration` SET `password`='$npassword' WHERE `username`='$username'";
		  	$result1=mysqli_query($con,$q1);
		  	if($result1)
		  		echo "<script>alert('Password changed sucessfully')</script>";
		  	else
		  		echo "Error";
		 }
	else
		echo "<script>alert('Username or old password is incorrect')</script>";
}
?>
					<form action="#" method="post" id="loginForm">
						<label for="password">Username :</label>
						<input type="text" name="username" id="usernmae" autofocus required /> <br />
						<label for="password">Old Password :</label>
						<input type="password" name="password" id="password" required /> <br />
						<label for="password">New Password :</label>
						<input type="password" name="npassword" id="npassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /> <br />
						<label for="password">Confirm New Password:</label>
						<input type="password" name="cpassword" id="cpassword" required /> <br />
						<input type="submit" name="loginbutton" value="Change" id="matchRoot">
						<input type="reset" name="cancelbutton" value="Cancel">
					</form>
				</div>
			</section>

			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
		<script type="text/javascript">
	var password = document.getElementById("npassword")
  , cpassword = document.getElementById("cpassword");

function validatePassword(){
  if(npassword.value != cpassword.value) {
    cpassword.setCustomValidity("Passwords don't match with confirm password");
  } else {
    cpassword.setCustomValidity('');
  }
}

npassword.onchange = validatePassword;
cpassword.onkeyup = validatePassword;
</script>
	</body>
</html>