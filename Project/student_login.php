<?php
	
  	require("connection.php");
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      header('location:main_student.php');
    }

  	if(isset($_POST["submit"]))
    {
       $roll=$_POST['roll'];
       $password=md5($_POST['password']);
       $login=mysqli_query($con,"SELECT * FROM studentdb where Roll_Number = '$roll' AND Password = '$password'");
       $rows = mysqli_num_rows($login);
      if($rows > 0) 
        { 
          $_SESSION['roll'] = $roll;
          $_SESSION['password'] = $password;
          $_SESSION['email']=$email;
          $_SESSION['loggedin'] = true;
          header('location:main_student.php'); 
        }
        else
        {
           echo '<script>alert("Wrong roll number/password combination.");</script>';
        }
   
    }
?>
<?php
 if (isset($_POST['forgotPass'])) 
 {
       $email=$_POST['email'];
       $forgotPass=mysqli_query($con,"SELECT*FROM studentdb WHERE Email = '$email'");
       $rows = mysqli_num_rows($forgotPass);

    if ($rows>0)
      {
        $random = rand(72891, 92729);
        $new_password = $random;
        $email_password = $new_password;
        $new_password = md5($new_password);

        $sql=mysqli_query($con,"UPDATE studentdb SET Password='$new_password' WHERE Email='$email'"); 

        $subject = "Login Information";
        $message = "Your password has been changed to $email_password";
        $from = 'From: sahilperfect786@gmail.com'."\r\n".
        'MIME-Version:1.0'."\r\n".
        'Content-Type:text/html; charset=utf-8';
        
        $res=mail($email, $subject, $message, $from);
       
        echo '<script>alert("Your new password has been sent to your mail.");</script>';
      }
      else {  echo "string";
        echo '<script>alert("Email does not exist.!!");</script>';
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
     <title> Login Form</title>
	 <link rel="stylesheet"  href="css/sheet1.css"/>

</head>
<body style="background-image: url(image/bg.jpg); background-repeat: no-repeat;  background-size: cover; position: relative;" >

	<center><h1>STUDENT LOGIN FORM</h1></center>
<div class="container">              
            <a  class="btn btn-success" href="home.php">
              <span class="glyphicon glyphicon-home"></span>  Back to HOME
            </a>
          </div>
	<div id ="wrapper">
	    <div id="formdiv">
		   <form action="student_login.php" method ="POST" > <br>

       <div class= "input">
			 <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll Number" required  > <br>  
       </div>
       <div class= "input">			
			 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required  > <br> 
       </div>			
			 <input class="btn btn-primary btn-block" type="submit" id="submit" name="submit"  > <br>

             Not yet a member ?  <a type="button " class="btn-xs btn-link" href="student_reg.php" >Sign up</a> <br><br>
</form>

<div class="container">
  <button href="#collapse" class="btn-xs btn-info" data-toggle="collapse"> Forgot Password ?</button>
  <div id="collapse" class="collapse">
    <form id="editform" action="student_login.php" method ="POST">
         <input type="email" placeholder="Email"  name="email">
         <input type="submit" value="Submit" class="btn btn-success" name="forgotPass">
    </form>
  </div>
</div>

		  
		  </div>
	    </div>	

<script src="bootstrap/js/bootstrap.min.css" ></script>
	<script src="bootstrap/jquery.min.css" ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    
</body><br><br>
<footer><CENTER style="word-spacing: 5px;">Developed by <a class="btn btn-danger" href="https://www.linkedin.com/in/sahil-bidlan-68aa8b146/" target="_blank">Sahil Bidlan</a> and Nishant Kumar Nishad</CENTER></footer>
<br><br><br>
</html>