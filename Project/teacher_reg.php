<?php
	
	require("connection.php");
	if(isset($_POST["submit"]))
 {
 	  $fname=  ($_POST["fname"]);
 	  $lname=  ($_POST["lname"]);
 	  $email=  ($_POST["email"]);
 	  $username=  ($_POST["username"]);
 	  $password=  md5($_POST["password"]);
 	  $ConfirmPassword= md5($_POST["ConfirmPassword"]);
 	   
      if ($password !== $ConfirmPassword)
      {
        echo '<script>alert(" Password does not match.");</script>';
      }
      else 
      {     
        $insertQuery= "INSERT INTO teacherdb(First_Name,Last_Name,Username,Email,Password) VALUES('$fname','$lname','$username','$email','$password')";
        if(!mysqli_query($con,$insertQuery))
       {
        die('Error: '.mysqli_error($con));
        }
        else
        { 
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $_SESSION['username'] = $username;
          $_SESSION['loggedin'] = true;
          header('location:main_teacher.php'); 
        }
      }
}
 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<title> Registration Form</title>
			<link rel="stylesheet"  href="css/sheet1.css"/>
	
</head>
<body style="background-image: url(image/bg.jpg); background-repeat: no-repeat;  background-size: cover; position: relative;" >
	<center><h1>TEACHER REGISTRATION FORM</h1></center>
<div class="container">              
            <a  class="btn btn-success" href="home.php">
              <span class="glyphicon glyphicon-home"></span>  Back to HOME
            </a>
          </div>
	<div id ="wrapper">
    <div id="formdiv">
   <form action="teacher_reg.php" method ="POST">
<br>
<div class="input">
       <input type="text" class="form-control" name="fname" placeholder="First Name" required  >  <br>
       </div>
<div class="input">
       <input type="text" class="form-control" name="lname" placeholder="Last Name" required  >  <br>
       </div>
<div class="input">
       <input type="text" class="form-control" name="username" placeholder="Username" required  > <br>
       </div>
<div class="input">
       <input type="email" class="form-control" name="email" placeholder="email" required  > <br>
       </div>
<div class="input">     
       <input type="password" class="form-control" name="password" placeholder="Password" required  > <br>
       </div>
<div class="input">
       <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password" required  > <br>
       </div>

<input class="btn btn-secondary btn-block" type="submit"  name="submit"   > <br>
           Already a member ? <a class="btn-xs btn-link" href="teacher_login.php">Sign in</a>    
     </form>
		  </div>
	    	
    </div>

</body><br><br>

<footer><CENTER style="word-spacing: 5px;">Developed by <a class="btn btn-danger" href="https://www.linkedin.com/in/sahil-bidlan-68aa8b146/" target="_blank">Sahil Bidlan</a> and Nishant Kumar Nishad</CENTER></footer>
<br><br><br>
</html>