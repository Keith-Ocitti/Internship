<?php
require "config.php";

session_start();
if(isset($_POST['update'])){

	require 'config.php';
	$userprofile_id=$_POST['userprofile_id'];
	$first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
    $password=$_POST['password'];

    $sql="update userprofile set first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',address='$address',password='$password' where userprofile_id='$userprofile_id'";

    if($qsql = mysqli_query($con,$sql))
		{
			
			$_SESSION['alert msg']="true";
			header("location:index.php");
			
		}
		else
		{
			echo mysqli_error($con);
		}	


    }
?>