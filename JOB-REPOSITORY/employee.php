<?php 
session_start();
if(!isset($_SESSION['companyId'])){
  header("location: login.php");
}
?>
<style>
  .flex-holder {
  width: 100%;
  margin-top: 60px;
  display: flex;
  justify-content: space-around;
}
.post-job-div {
  width: 45%;
  background-color: white;
}
.post-job {
  background-color: white;
  padding-top: 10px;
  padding-bottom: 10px;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}
.post-job input {
  background-color: rgb(229, 227, 227);
  border: none;
  padding: 5px;
  margin-bottom: 5px;
  width: 100%;
}
.post-job textarea {
  background-color: rgb(229, 227, 227);
  border: none;
  padding: 5px;
  margin-bottom: 5px;
  width: 100%;
}
.post-job button {
  background-color: blue;
  border: none;
  padding: 5px 5px 5px 5px;
  color: white;
  border-radius: 2px;
}
textarea{
  resize: none;
}
.check-job-div {
  width: 50%;
  padding-top: 10px;
  padding-left: 10px;
  background-color: white;
}
.select-job-div select {
  width: 60%;
  border: none;
  padding: 5px;
  margin-bottom: 10px;
  background-color: rgb(229, 227, 227);
}
.applicant-div table {
  width: 90%;
  border-collapse: collapse;
}
.applicant-div td,
th {
  padding: 8px;
  border: 1px solid #dddddd;
  
}

.applicant-div tr:hover {
  background-color: #dddddd;
}
.search-bar {
  border: none;
  background-color: rgb(229, 227, 227);
  width: 450px;
  height: 40px;
  border-radius: 3px;
  margin-top: 10px;

}
.names{
  text-transform: capitalize;
}
td{
  color: blue;
}
td a{
  color: blue;
  text-decoration: none;
}
td:hover{
  cursor:pointer;
}
.job-btn{
  border:none;
  text-transform: capitalize;
  color: black;
  font-weight:bold;
  background:none;
}
.job-btn:hover {
  cursor:pointer;
  color:blue;
}
a{
  text-decoration: none;
}

</style>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>employee</title>
    <link rel="stylesheet" href="main.css" type="text/css"/>
  </head>
  <body>
    <div class="header-home">
      <h1 style="margin-top: 10px">Job Repository</h1>
      <div class="dropdown" >
      <a href=""
        ><button class="profile-btn">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="28"
            height="30"
            fill="currentColor"
            class="bi bi-person-circle"
            viewBox="0 0 16 16"
          >
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path
              fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
            />
          </svg>
          <p><?php echo $_SESSION['companyName'];?></p>
        </button></a>
        <div class="dropdown-options">
    
    <a href="logout.php">Logout</a>
</div>
</div>
    </div>
    <br />
    <!-- flex holder -->
    <div class="flex-holder">
      <div class="post-job-div">
        <div class="post-job">
          <form action="postjob_logic.php" method="POST">
            <p>Job Title</p>
            <input type="text" name="jobtitle" />
            <p>Job Description</p>
            <textarea
              name="Job_description"
              id=""
              cols="30"
              rows="10"
            ></textarea>
            <p>Job Objectives</p>
            <textarea
              name="Job_objectives"
              id=""
              cols="30"
              rows="10"
            ></textarea>
            <p>Minimum qualification</p>
            <textarea
              name="min_qualification"
              id=""
              cols="30"
              rows="10"
            ></textarea>
            <p>Date of expiry</p>
            <input type="date" name="dateofexpiry"/>
            <br />
            <input name="company_id" value="<?php echo $_SESSION['companyId']; ?>" style="display:none"/>
            <button class="post-job-button" name="post-job">Post Job</button>
          </form>
        </div>
      </div>
      <div class="check-job-div">
        <div class="select-job-div">
          <p>Select Job Posts</p>
          <div class="applicant-div">
          <div class="table-div">
            <table>
            <?php
            require 'config.php';
            $sql = "select * from jobposts where company_id =".$_SESSION['companyId']." and date_posted<=date_of_expiry" ;
            $result = mysqli_query($con,$sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
             
              echo '
                  <tr>
                    <td>
                    <form method="POST"  action="applicantList_logic.php">                 
                    <input type="number" name="jobId[]" value="'.$row['jobposts_id'].'" style="display:none"/>
                    <input type="text" name="jobId[]" value="'.$row['title'].'" style="display:none"/>
                    <button name="updateList" class="job-btn">'.$row['title'].'</button> 
                    </form>
                    </td>
                  </tr>';
            }
            
            ?>
            </table>
          </div>
        </div>
        <br/>
        <div class="applicant-div">
          <p> <?php echo 'Applications Received for: <strong style="text-transform: capitalize;">' .$_SESSION['title'].'</strong>'; ?> </p>
          <div class="table-div">
            <table>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>CGPA</th>
                <th>Resume</th>
              </tr>

            <?php
            require 'config.php';
            if(isset($_SESSION['jobposts_id'])){
              $sql = "select * from application where jobposts_id =".$_SESSION['jobposts_id'];
            $result = mysqli_query($con,$sql);
                      
            
            while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['filename'] = $row['resume'];
            $_SESSION['name'] = $row['first_name'];
              
                echo '
                  <tr>
                    <td style="text-transform: capitalize;">'.$row['first_name'].''." ".''.$row['last_name'].'</td>
                    <td><a href="https:/www.gmail.com/">'.$row['email'].'</td>
                    <td>'.$row['CGPA'].'</td>
                    <td> <a href="download.php?file=<?php echo '.$row['resume'].' ?>">Download <a/></td>
                  </tr>';
              
            
          }
            }
            
            
            ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
