<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'config.php';
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($email !=null && $password !=null){
		$sql1="SELECT * FROM userprofile";
		$sql2="SELECT * FROM company"; 

		$result3 = mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_assoc($result3);
		$_SESSION['title']= $row3['title'];
		$_SESSION['description']= $row3['description'];
		$_SESSION['min_qualification']= $row3['min_qualification'];
		$_SESSION['date_posted']= $row3['date_posted'];
		$_SESSION['date_of_expiry']= $row3['date_of_expiry'];
		$_SESSION['job_objectives']= $row3['job_objectives'];

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
				$_SESSION['jobposts_id']= $row3['jobposts_id'];

				

				header("location: index.php");
				exit();

			}
		}		
		
		
		while($row = mysqli_fetch_assoc($result2)){
			if ($row['company_email'] == $email && $row['company_password'] == $password){
				$_SESSION['companyId']= $row['company_id'];
				$_SESSION['companyName']= $row['company_name'];
				header("location: employee.php");
				exit();

			}
		}		
		header("location: login.php");
	}
	

}


?>