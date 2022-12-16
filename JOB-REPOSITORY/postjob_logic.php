<?php
session_start();
if(isset($_POST['post-job'])){
	require 'config.php';
	$jobtitle=$_POST['jobtitle'];
	$jobdesc=$_POST['Job_description'];
	$jobobj=$_POST['Job_objectives'];
	$minqual=$_POST['min_qualification'];
	$dateofex=$_POST['dateofexpiry'];
    $companyid=$_POST['company_id'];
    $def=1;
	$sql="insert into jobposts(title,description,min_qualification,date_of_expiry,company_id,job_objectives) values(?,?,?,?,?,?)";
	$insert=$con->prepare($sql);
	$insert->bind_param("ssssis",$jobtitle,$jobdesc,$minqual,$dateofex,$companyid,$jobobj);
	
	if($insert->execute()){
		
		header ("location:employee.php");
	}else{
	echo "Failed to post".mysqli_error();
	}

	$not_sql="insert into notifications(title,read_n) values(?,?)";
	$inserted=$con->prepare($not_sql);
	$inserted->bind_param("si",$jobtitle,$def);

    if($inserted->execute()){
		
		header ("location:employee.php");
	}else{
	echo "Failed to post".mysqli_error();
	}

}

?>