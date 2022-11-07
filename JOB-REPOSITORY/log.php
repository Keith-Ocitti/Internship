<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'config.php';
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($email !=null && $password !=null){
		$sql1="SELECT * FROM userprofile";
		$sql2="SELECT * FROM company"; 

		$result1 = mysqli_query($con,$sql1);
		$result2 = mysqli_query($con,$sql2);
		while($row = mysqli_fetch_assoc($result1)){
			if ($row['email'] == $email && $row['password'] == $password){
				$_SESSION['userid']= $row['userprofile_id'];
				$_SESSION['firstName']= $row['first_name'];
				$_SESSION['lastName']= $row['last_name'];
				$_SESSION['email']= $row['email'];
				$_SESSION['phone']= $row['phone'];
				$_SESSION['address']= $row['address'];
				header("location: index.php");
				exit();

			}
		}		
		
		
		while($row = mysqli_fetch_assoc($result2)){
			if ($row['company_email'] == $email && $row['company_password'] == $password){
				$_SESSION['companyId']= $row['company_id'];
				header("location: employee.php");
				exit();

			}
		}		
		header("location: login.php");
	}
	

}


?>