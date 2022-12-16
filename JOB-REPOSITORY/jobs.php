
<?php
session_start();
  require 'config.php';
    $sql = "select * from jobposts";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    include 'header.php';
    
?>
<br/>
<br/>
    
   
    <!-- job-views -->
    
    <div class="main-job-view" style="margin-top:20px">
    
      
      <div class="individual-jobs">
      <?php
      
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="job-card">
          <form method="POST"  action="jobs_logic.php">
          <p class="job-card-title">'.$row['title'].'</p>
           <input name="input-id" type="number" style="display:none" value="'.$row['jobposts_id'].'"/>
           <p class="job-card-description">'.$row['description'].'<br/></p>
           
          <button name="readmore" class="readmore">Read more</button></form></div>';
        }
      
         
      ?>
      
      </div>
      <div class="job-description" >
        
        <h4>Job Description</h4>
        <p><?php echo $_SESSION['description'];?></p>
        <h4 style="margin-top: 10px;">Objectives of this Role</h4>
        <ul>
          <li><?php echo $_SESSION['job_objectives'];?></li>
        </ul>
        <h4 style="margin-top: 10px;">Skills and Qualification</h4>
        <ul>
        <li><?php echo $_SESSION['min_qualification'];?></li>
        </ul>
        <h4 style="margin-top: 10px;">Date posted</h4>
        <ul>
        <li><?php echo $_SESSION['date_posted'];?></li>
        </ul>

        <h4 style="margin-top: 10px;">Date of Expiry</h4>
        <ul>
        <li><?php echo $_SESSION['date_of_expiry'];?></li>
        </ul>

        <a href='apply.php'>
        <button class="apply-now">Apply now</button>
        </a>
      </div>
      
    </div>
  </body>
  <style>
.readmore{
  background-color: white;
  border: none;
  border-radius: 3px;
  padding: 5px;
  color:rgb(27, 163, 218);
  font-weight: bold;
  margin-left:10px;
  margin-bottom:10px;
}
.readmore:hover {
  cursor:pointer;
}
.apply-now{
  background-color:blue;
  border:none;
  color:white;
  padding:5px;
  margin-top:10px;
}
</html>
