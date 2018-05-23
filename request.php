<?php
 session_start();
 if(!isset($_SESSION['username']))
    header('location:signin.php');
 $username=$_SESSION['username'];

 $size=sizeof($_POST);
	$j=1;
	for($i=1; $i<=$size; $i++,$j++) { 
		$index=$username;
		if(isset($_POST[$index]))
			$drid[$i]=$_POST[$index];
		else
			$i--;
	}


 $con=mysqli_connect('127.0.0.1','root');
 mysqli_select_db($con,'syj');

 $q1="select max(prid) from passenger";
 $result1=mysqli_query($con,$q1);
 $row1=mysqli_fetch_array($result1);
 $prid=$row1[0];

 $q="update driver set status='$prid' where drid='$drid[1]'";
 $result=mysqli_query($con,$q);

 /*$q2="INSERT INTO `driver_passenger`(`drid`, `prid`) VALUES ('$drid[1]','$prid')";
 mysqli_query($con,$q2);*/

 if($result)
 {
 	header('location:phistory.php');
 }
 else
 {
 	echo "failed";
 }

?>