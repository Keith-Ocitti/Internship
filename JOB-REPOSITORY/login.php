<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require_once 'config.php';
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($email && $password){
		$sql="SELECT * FROM userprofile where username='".$email."' AND password='".$password."'";
		$result =mysqli_query($con,$sql);
		if($result->num_rows > 0){
			header("location: index.html");
		}
		else {
			header("location: login.php");
		}
		
	}
 

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./main.css" type="text/css" />
  </head>
  <body>
    <!-- header -->

    <!-- login holder -->
    <div class="login-holder">
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
      <form action="log.php" id="form" name="form" method="POST" >
        
          <p>Email</p>
          <input type="email" name="email" id="email"/>
          
       
        <p>Password</p>
        <input type="password" name="password" id="form" id="password"  />
        <button class="login-button" type="login" name="login" onClick=" return validate();">Login</button>
        <br />
        
        <p>Don't have an account?<a href="signup-user.php"> Sign Up</a></p>
        <br />
        
      </form>
    </div>
    <script>
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //
  function validate(){

if(document.form.email.value == ""){
  alert("Email is required");
  document.form.email.focus();
  return false;
 }
 else if(document.form.email.value.match(alphanumericExp)){
  alert("Wrong email provided");
  document.form.email.focus();
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
else{
  return true;
}
  }
</script>
  </body>
</html>
