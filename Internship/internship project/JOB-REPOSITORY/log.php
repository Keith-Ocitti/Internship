<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
require_once 'config.php';
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM signup where username='".$email."' AND password='".$password."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if($row["usertype"]=="admin"){
header("location: jobs.html");
}
else if($row["usertype"]=="employee"){
header("location: homepage.html");
 }else if($row['usertype']==""){
 header("location: homepage.html");
}else{
	echo "User doesnot exists";
	header("Location: login.php");
}
}

?>