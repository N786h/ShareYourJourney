<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
		<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="./js/registration.js" ></script>
	</head>
	<body>
		<div class="container">
			<header class="boxed">
				<nav>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="signin.php">SingIn</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>
				<div>
					<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
				</div>
			</header>
			<section id="main" class="boxed">
				<marquee direction=right scrollamount=10 bgcolor=#ffc456><h2>REGISTRATION FORM</h2></marquee>
				<div class="login-form boxed">
					<form action="doRegistration.php" method="post" enctype="multipart/form-data">
						<center><h2>Personal Details</h2></center>
						<label>Name : </label>
						<input type="text" placeholder="Enter your name here" name="name" Required autofocus><br/>
						<label>Father`s Name :</label>
						<input type="text" size=50 placeholder="Enter your father`s name here" name="FatherName" Required><br/>
						<label>Gender :</label> 
						<input type="radio" name="gender" placeholder="Gender" value="Male" Required>Male
						<input type="radio" name="gender" value="Female" Required>Female<br/><br/>
						<label>Date of birth :</label>
						<input type="date" placeholder="Date of birth" name="dob" min='<?php date_default_timezone_set('Asia/Calcutta'); echo date('Y')-100;echo date('-m-d'); ?>' max='<?php date_default_timezone_set('Asia/Calcutta'); echo date('Y')-10;echo date('-m-d'); ?>' Required><br/>
						<label>Mobile No. :</label>
						<input type="tel" placeholder="Mobile No." name="mobileNo" pattern="[0-9]{10}" Required><br/>
						<label>E-mail :</label>
						<input type="email" placeholder="E-mail" name="email" size="25" Required><br>
						<label>Username :</label>
						<input type="text" name="username" placeholder="Username" id="username" required onkeyup="checkname(this.value)"/><span id="spanmsg"></span><br />
						<label>Password :</label>
						<input type="password" placeholder="Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /> <br />
						<label>Confirm Password :</label>
						<input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required /><br>
						<center><h2>Upload Documents</h2></center>
						<label>Upload Image :</label>
						<input type="file" name="myfile" accept="image/jpg, image/jpeg" required /><br/>
						<label>Upload Aadhaar :</label>
						<input type="file" name="myfile1" accept="image/jpg, image/jpeg" required /><br/>
						<label>Upload DL* :</label>
						<input type="file" name="myfile2" accept="image/jpg, image/jpeg" /><br/>
						<center><h2>Security Questions</h2></center>
						<label>Who is you favorite teacher?</label>
						<input type="text" name="Ques1" required /><br/>
						<label>What was your first school name?</label>
						<input type="text" name="Ques2" required /><br/>
						<label>What was your favorite fruit as a child?</label>
						<input type="text" name="Ques3" required /><br/>
						<details><summary>Click here for further information</summary>
							<b><u>Note 1:</u></b> All fields are fill mandatory.<br>
							<b><u>Note 1:</u></b> * field is optional.<br>
							<b><u>Note 2:</u></b> Password must contain at least one number, one uppercase, one lowercase letter and at least 8 or more characters.
						</details><br>
						<input type="submit" name="loginbutton" value="Submit"  />
						<input type="reset" name="cancelbutton" value="Reset">
					</form>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
		<script type="text/javascript">
	var password = document.getElementById("password")
  , cpassword = document.getElementById("cpassword");

function validatePassword(){
  if(password.value != cpassword.value) {
    cpassword.setCustomValidity("Passwords don't match with confirm password");
  } else {
    cpassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
cpassword.onkeyup = validatePassword;
</script>
	</body>
</html>