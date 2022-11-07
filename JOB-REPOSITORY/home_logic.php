<?php
$server="localhost";
$username="root";
$password="1234";
$dbname="mydb_jobportal";
$con= new mysqli($server,$username,$password,$dbname);
if($con->connect_error){
echo "Connection error".$con->connect_error;
}else{
	//echo "Connection successful";
}
?>