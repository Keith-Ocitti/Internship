<?php 
session_start();
if(isset($_POST['apply'])){
	if(empty($_POST['fname'])){
		echo "The name is required boss";
	}
	
	 require 'config.php';
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
    $path = "file/".$fileName;
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['phone'];
	$working_experience=$_POST['working_experience'];
    // $file=$_POST['file'];
	
    $CGPA=$_POST['CGPA'];
    $jobposts_id=$_POST['jobposts_id'];
    $userprofile_id=$_POST['userprofile_id'];
	$other=$_POST['other'];
	$qualification=$_POST['qualification'];
        

	
if($CGPA < 2 || $CGPA > 5){
	
	$sql="insert into nonsuccessful_applicants(first_name,last_name,email,phone,working_experience,resume,CGPA,jobposts_id,userprofile_id,other,qualification) values(?,?,?,?,?,?,?,?,?,?,?)";


}else{
	$sql="insert into application(first_name,last_name,email,phone,working_experience,resume,CGPA,jobposts_id,userprofile_id,other,qualification) values(?,?,?,?,?,?,?,?,?,?,?)";
	
	$insert=$con->prepare($sql);
	$insert->bind_param("ssssisdiiss",$fname,$lname,$email,$contact,$working_experience,$fileName,$CGPA,$jobposts_id,$userprofile_id,$other,$qualification);

	if($insert->execute()){
		if (move_uploaded_file($fileTmpName,$path )){
			echo "Sorry, there  uploading your file.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		if($insert){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Application Succesfully')
			window.location.href='index.php';
			</SCRIPT>");
		}	
	}else{
		if($insert){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Application Failed')
			</SCRIPT>");
		}
	}


}

}
?>