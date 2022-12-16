<?php
session_start();
require_once("header.php");
?>
<style>
.update-btn{
    color:white;
    font-weight:bold;
    padding:5px;
    background-color:blue;
    border:1px blue solid;
    margin-left:auto;
    margin-right:auto;
    display:block;  
}
.update-btn:hover {
    color:blue;
    background-color:white;
    cursor:pointer;
}
.person-icon {
  width:16%;
  margin-left:auto;
  margin-right:auto;
  display:block;
  margin-top:10px;
}
</style>
<body>
   
    <!-- application form holder -->
    <div class="form-holder">
      <br/>
        <div class="person-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="108" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
`       </div>
        <form method="POST" action="updateuserprofile.php" name="form" onSubmit="return validateform()">
        <p>First Name</p>
        <input type="text" name="fname" id="fname" value="<?php echo $_SESSION['firstName']; ?>"/>
        <p>Last Name</p>
        <input type="text" name="lname" id="lname" value="<?php echo $_SESSION['lastName']; ?>"/>
        <p>Email</p>
        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"/>
        <p>Phone</p>
        <input type="text" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>"/>
        <p>Address</p>
        <input type="text" name="address" id="address" value="<?php echo $_SESSION['address']; ?>"/>
        <p>password</p>
        <input type="password" name="password" id="password" value="<?php echo $_SESSION['address']; ?>"/>
        <input type="number" name="jobposts_id" style="display:none" value="<?php echo $_SESSION['jobposts_id']; ?>"/>
        <input type="number" name="userprofile_id" style="display: none;" value="<?php echo $_SESSION['userid']; ?>"/><br>
        
        <button name="update" class="update-btn">Update Profile</button>
        </form>
    </div>
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

  else if(document.form.password.value == "" )
  {
    alert("Please specify any password qualifications");
    document.form.password.focus();
    return false;
  }
  else if(document.form.other.value.length < 8){
   alert("password must be 8 characters long");
   document.form.password.focus();
    return false;

  }
  
  else if(document.form.address.value == "" )
  {
    alert("Kindly provide the address..");
    document.form.address.focus();
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