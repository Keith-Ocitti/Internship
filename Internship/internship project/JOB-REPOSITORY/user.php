<?php 
if(isset($_POST['submit'])){
	require 'config.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contact=$_POST['contact'];

	$sql="insert into signup(first_name,last_name,email,phone, password) values(?,?,?,?,?)";
	
	$insert=$con->prepare($sql);
	$insert->bind_param("sssss",$fname,$lname,$email,$contact,$password);

	if($insert->execute()){
		echo "sign up succesful";
	}else{
		echo "Olimba ";
	}
}
			 ?>