<?php
 session_start();
 if(!isset($_SESSION['username']))
    header('location:signin.php');
 $seat=$_POST['seat'];
 $VehicleNo=$_POST['VehicleNo'];
 $source=$_POST['source'];
 $destination=$_POST['destination'];
 $username=$_SESSION['username'];
 date_default_timezone_set('Asia/Calcutta');
 $date=date('Y-m-d H:i:s');

 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'syj');
 $q="insert into driver values(null,'$username','$seat','$VehicleNo','$source','$destination','$date','')";
 mysqli_query($con,$q);
 mysqli_close($con);
 header('location:dhistory.php');
?>