<!-- <style>
  .apply-pop{
    /* display: none; */
    position: relative;
    left: 40%;
    top: -60%;
    width: 20%;
    height: 30%;
    background: red;
    padding: 10px;  
    z-index: 3;
    margin: 10px;
}
.apply-pop svg{
  width: 20%;
  margin-top: 5%;
  margin-left: 40%;
}
.apply-pop .pop-up-message{
  padding: 10px;
  margin-top: 10px;
  text-align: center;
  line-height: 2rem;
  font-size: 17px;
}
.apply-pop .ok-btn {
  border: none;
  padding: 10px;
  color: white;
  font-weight: bold;
  background-color: blue;
  border-radius: 2px;
  margin-top: 0px;
  margin-left: 70%;
} -->

</style>
<?php
session_start();
include 'header.php';
?>


    <!-- application form holder -->
    <div class="form-holder">
        <form method="POST"  name="form" action="apply_logic.php" onSubmit="return validateform()" enctype="multipart/form-data">
        <p>First Name</p>
        <input type="text" name="fname" value="<?php echo $_SESSION['firstName']; ?>" id="fname"/>
        <p>Last Name</p>
        <input type="text" name="lname" value="<?php echo $_SESSION['lastName']; ?>" id="lname"/>
        <p>Email</p>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" id="email"/>
        <p>Contact</p>
        <input type="text" name="phone" value="<?php echo $_SESSION['phone']; ?>" id="phone"/>
        <p>CGPA</p>
        <input type="decimal" name="CGPA" id="CGPA"/>
        <p>Experience level</p>
        <input type="number" name="working_experience" id="working_experience"/>
        <p>Qualification</p>
        <textarea type="text" name="qualification" id="qualification"></textarea>
        <p>Other certifications</p>
        <input type="text" name="other" id="other"/>
        <p>Resume/CV</p>
        <input type="file" class="file" id="file" name="file"/>
        <br/>
        <input type="number" name="jobposts_id" style="display:none" value="<?php echo $_SESSION['jobposts_id']; ?>"/>
        <input type="number" name="userprofile_id" style="display:none" value="<?php echo $_SESSION['userid']; ?>"/>
        
        <button name="apply" class="apply-button" onClick=" ">Apply</button>
        </form>
    </div>

    <!-- <div class="apply-pop">
      <svg xmlns="http://www.w3.org/2000/svg" 
      viewBox="0 0 512 512">
        <path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8
          0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
      </svg>
      <div class="pop-up-message">
        <p>Application Received</p>
        <button class="ok-btn">OK DONE!</button>
      </div>
    </div> -->

    <script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 


function validateform()
{
  if(document.form.fname.value == "")
  {
    alert("Applicants first name should not be empty..");
    document.form.fname.focus();
    return false;
  }
  else if(!document.form.fname.value.match(alphaspaceExp))
  {
    alert("Applicants first name not valid..");
    document.form.fname.focus();
    return false;
  }
  else if(document.form.lname.value == "")
  {
    alert("Applicants last name should not be empty..");
    document.form.lname.focus();
    return false;
  }
  else if(!document.form.lname.value.match(alphaspaceExp))
  {
    alert("Applicants last name valid..");
    document.form.lname.focus();
    return false;
  }
  else if(document.form.email.value == "")
  {
    alert("Applicants email should not be empty..");
    document.form.email.focus();
    return false;
  }
  else if(!document.form.email.value.match(emailExp))
  {
    alert("Applicants email valid..");
    document.form.email.focus();
    return false;
  }

  else if(document.form.working_experience.value == "")
  {
    alert("working_experience should not be empty..");
    document.form.working_experience.focus();
    return false;
  }
   else if(!document.form.working_experience.value.match(numericExpression))
  {
    alert("working_experience not valid..");
    document.form.working_experience.focus();
    return false;
  }
  else if(document.form.phone.value == "")
  {
    alert("phone should not be empty..");
    document.form.phone.focus();
    return false;
  }
  else if(document.form.phone.value.length < 10 || document.form.phone.length >14 )
  {
    alert("phone length should be between 10 and 14characters...");
    document.form.phone.focus();
    return false;
  }

  else if(document.form.other.value == "" )
  {
    alert("Please specify any other qualifications");
    document.form.other.focus();
    return false;
  }
  else if(document.form.other.value == "none"){
   alert("sucess");
  }
  
  else if(document.form.resume.value == "" )
  {
    alert("Kindly resume the status..");
    document.form.resume.focus();
    return false;
  }
  else
  {
    return true;
  }
}
</script>
</body>
</html>