<?php
session_start();
if(!isset($_SESSION['userid'])){
  header("location: login.php");
}
include 'header.php';
?>

    <!-- main view -->
    <div class="home-feed">
      <div class="text-div">
        <h1>Apply for jobs within</h1>
        <h1>your country and abroad at the</h1>
        <h1>comfort of your home</h1>
        <p>Join a network of the world's best workers & get full-time, long-term remote and on site jobs with
           better compensation and career growth.</p>
        <p>We are here to provide you with the best career opportunities all over the world</p>
        <button class="apply-button" style="float:left">Apply now</button>
      </div>
      <div class="picture-div">
        <img src="./work.jpg" alt="home-feed-pic"/>
      </div>
      
    </div>
    <!-- job catergories -->
    <div class="job-catergory">
      <p>Engineering</p>
      <p>Bussiness Administration</p>
      <p>Computing and ICT</p>
      <p>Medical Services</p>
      <p>Education and Training</p>
      <p>Social Works</p>
      <p>Construction and Building</p>
    </div>
    <br/>
<?php
require "config.php";
if(isset($_POST['search'])){

    $sear=$_POST['searched'];
   // $search=preg_replace("#[^0-9a-z]#i","",$sear);
    $query= "select * from jobposts where title='$sear'";

  // FETCHING DATA FROM DATABASE
  
  $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="job-card">
          <form method="POST"  action="home_logic.php">
          <p class="job-card-title">'.$row['title'].'</p>
           <input name="input-id" type="number" style="display:none" value="'.$row['jobposts_id'].'"/>
           <p class="job-card-description">'.$row['description'].'<br/></p>
           <p class="job-card-description">'.$row['date_of_expiry'].'<br/></p>
           <p class="job-card-description">'.$row['date_posted'].'<br/></p>
           <p class="job-card-description">'.$row['job_objectives'].'<br/></p>
          <button name="readmore" class="readmore"><a href=" apply.php">Apply now</a></button></form></div>';  

      }
  
    }
    
    
?>
</body>
</html>