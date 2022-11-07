<?php 
if(isset($_POST['signup'])){
	require 'config.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$password=$_POST['password'];
	

	$sql="insert into userprofile(first_name,last_name,email,phone,address,password) values(?,?,?,?,?,?)";
	
	$insert=$con->prepare($sql);
	$insert->bind_param("ssssss",$fname,$lname,$email,$contact,$address,$password);

	if($insert->execute()){
		echo "sign up succesful";
		header ("location:login.php");
	}else{
		echo "sign up failed ";
	}
}
?>