
<?php
session_start();
if(!isset($_SESSION['userid'])){
  header("location: login.php");
}
  require 'config.php';
    $sql = "select * from jobposts  where date_posted<=date_of_expiry";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

include 'header.php';
if(isset($_SESSION['alert msg'])){
  if($_SESSION['alert msg'] == "true"){
    echo "<script>
  alert('Profile updated sucessfully')
			</script>";
     
      $_SESSION['alert msg'] = "false";
         
  }

  
}

?>
<!-- css -->
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
.apply-button a{
  width: 15%;
  text-decoration: none;
  color: white;
  font-weight: bold;
}
/*  */
</style>

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
    
    <!-- job-views --> 
    
    <div class="main-job-view" style="margin-top:20px">
      <div class="individual-jobs">
      <?php
      //  $substring(description, 1, 30)
      
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="job-card">
          <form method="POST"  action="home_logic.php">
          <p class="job-card-title">'.$row['title'].'</p>
           <input name="input-id" type="number" style="display:none" value="'.$row['jobposts_id'].'"/>
           <p class="job-card-description">'.$row['description'].'<br/></p>
           
          <button name="readmore" class="readmore">Read more...</button></form></div>';
        }
      
         
      ?>
      
      </div>
      <div class="job-description" >
      <h3 class="time-btn"><?php if(isset($_SESSION['title'])){echo $_SESSION['title']; }?></h3>
      <br>
        <h4>Job Description</h4>
        <p><?php if(isset($_SESSION['description'])){echo $_SESSION['description']; }?></p>
        <h4 style="margin-top: 10px;">Objectives of this Role</h4>
        <ul>
          <li><?php echo $_SESSION['job_objectives']; ?></li>
        </ul>
        <h4 style="margin-top: 10px;">Skills and Qualification</h4>
        <ul>
        <li><?php echo $_SESSION['min_qualification'];?></li>
        </ul>
        <h4 style="margin-top: 10px;">Date posted</h4>
        <button class="time-btn">
        <?php echo $_SESSION['date_posted'];?></li>
        </button>

        <h4 style="margin-top: 10px;">Date of Expiry</h4>
        <button class="time-btn">
        <?php echo $_SESSION['date_of_expiry'];?>
        </button>

        <button class="apply-button"><a href='apply.php'>Apply now</a></button>

      </div>
      
    </div>
  </body>
 <style>
  .time-btn {
    padding:4px;
    margin-top:5px;
    background-color:rgb(229, 227, 227);
    color:black;
    border:none;
    font-weight:bold;
    border-radius:3px;
    padding-left:5px;
    padding-right:5px;
  }
 </style>
 <script>
  
  function short(length) {
    let s = document.getElementsByClassName("job-card-description");
    var len = s.length;

    for(var i = 0; i < len; i++) {
       var g = s[i].innerHTML;
       var leng = length-5;
       var html = g.substring(0, leng)+"";
       var allHTML = html;
       s[i].innerHTML = allHTML;
    }

}
short(140);
  
 </script>
</html>
