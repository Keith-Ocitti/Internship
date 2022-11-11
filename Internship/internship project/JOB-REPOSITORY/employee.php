<?php 
if(isset($_POST['signup'])){
	require 'config.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$password=md5($_POST['password']);
	

	$sql="insert into signup(FirstName,LastName,email,contact,password) values(?,?,?,?,?)";
	
	$insert=$con->prepare($sql);
	$insert->bind_param("sssss",$fname,$lname,$email,$contact,$password);

	if($insert->execute()){
		echo "sign up succesful";
	}else{
		echo "Olimba ";
	}
}
			 ?>