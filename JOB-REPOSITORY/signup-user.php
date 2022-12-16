<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="./main.css" type="text/css" />
  </head>
  <body>
    <!-- header -->

    <!-- signup holder -->
    <div class="signup-holder">
      <br />

      <div class="icon-holder">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="15%"
          height="15%"
          fill="rgb(38, 37, 37)"
          class="bi bi-person-circle"
          viewBox="0 0 16 16"
        >
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path
            fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
          />
        </svg>
      </div>
      <form action="signup_logic.php" method="POST" name="form" onSubmit="return validateform();">
        <p>First Name</p>
        <input type="text" name="fname" id="fname" />
        <p>Last Name</p>
        <input type="text" name="lname" id="lname" />
        <p>E-mail</p>
        <input type="email" name="email" id="email" />
        <p>Contact</p>
        <input type="text" name="contact" id="contact"/>
        <p>Address</p>
        <input type="text" name="address" id="address" />
        <p>Password</p>
        <input type="password" name="password" id="password" />
        <button class="signup-button" type="submit" name="signup">Sign Up</button>

        <p>Already have an account?<a href="login.php"> Login</a></p>
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
  
  else if(document.form.contact.value == "")
  {
    alert("contact should not be empty..");
    document.form.contact.focus();
    return false;
  }
  else if(document.form.contact.value.length < 10 || document.form.contact.length >14 )
  {
    alert("phone length should be between 10 and 14characters...");
    document.form.contact.focus();
    return false;
  }

  else if(document.form.address.value == "" )
  {
    alert("Please specify any address qualifications");
    document.form.address.focus();
    return false;
  }
  else if(document.form.password.value == ""){
  alert("password is required");
  document.form.password.focus();
  return false;
  
}
else if(document.form.password.value.length < 8){
  alert("password length should be atleast 8 characters");
  document.form.password.focus();
  return false;
  
}else if(document.form.password.value.match(alphanumericEXp)){
  alert("password should contain alpha numeric values");
  document.form.password.focus();
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