
<?php
session_start();
require 'config.php';
		$id=$_POST['input-id'];
		$sql = "select * from jobposts where jobposts_id=".$id;
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
	if(isset($_POST['readmore'])){
		
		$_SESSION['jobposts_id']= $row['jobposts_id'];
		$_SESSION['title']= $row['title'];
		$_SESSION['description']= $row['description'];
		$_SESSION['min_qualification']= $row['min_qualification'];
		$_SESSION['date_posted']= $row['date_posted'];
		$_SESSION['date_of_expiry']= $row['date_of_expiry'];
		$_SESSION['job_objectives']= $row['job_objectives'];
		header("location: jobs.php");

				
		
	}
	
?>
</body>
</html>


