<?php
 session_start();
 $name=$_POST['name'];
 $FatherName=$_POST['FatherName'];
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $mobileNo=$_POST['mobileNo'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $password=base64_encode($_POST['password']);
 $_SESSION['username']=$username;
 $Ques1=$_POST['Ques1'];
 $Ques2=$_POST['Ques2'];
 $Ques3=$_POST['Ques3'];

 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'syj');
 $q="insert into registration(Name,FatherName,Gender,DOB,mobileNo,email,username,password,Ques1,Ques2,Ques3) values ('$name','$FatherName','$gender','$dob','$mobileNo','$email','$username','$password','$Ques1','$Ques2','$Ques3')";
 mysqli_query($con,$q);

//upload image
$username=$_POST['username'];
$f=$_FILES['myfile'];
if(file_exists("images/".$f['name']))
	echo $f['name']." already exists";
else if($f['type']=="image/jpeg")
	move_uploaded_file($f['tmp_name'], "images/".$username.".jpeg");
else
	echo "File formate is not valid, unable to upload";

//upload Aadhaar
$f1=$_FILES['myfile1'];
if(file_exists("images/".$f1['username']."Aadhaar"))
	echo $f1['name']." already exists";
else if($f1['type']=="image/jpeg")
	move_uploaded_file($f1['tmp_name'], "images/".$username."Aadhaar".".jpeg");
else
	echo "File formate is not valid, unable to upload";

//upload DL
$f2=$_FILES['myfile2'];
if(file_exists("images/".$f2['username']."Aadhaar"))
	echo $f2['name']." already exists";
else if($f2['type']=="image/jpeg")
	move_uploaded_file($f2['tmp_name'], "images/".$username."DL".".jpeg");
else
	echo "File formate is not valid, unable to upload";

 mysqli_close($con);
 header('location:show.php');

?>