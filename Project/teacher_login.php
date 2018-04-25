 <?php
	
	require("connection.php");
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      header('location:main_teacher.php');
}

	if(isset($_POST["submit"]))
 {
       $username=$_POST['username'];
       $password=md5($_POST['password']);
       $login=mysqli_query($con,"SELECT * FROM teacherdb where Username = '$username' AND Password = '$password'");
       $rows = mysqli_fetch_array($login);
      if($rows['Username']==$username && $rows['Password']==$password) 
        {  
          $_SESSION['email'] = $email;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['loggedin'] = true;
          header('location:main_teacher.php'); 
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
       $forgotPass=mysqli_query($con,"SELECT*FROM teacherdb WHERE Email = '$email'");
       $rows = mysqli_num_rows($forgotPass);

    if ($rows>0)
      {
        $random = rand(72891, 92729);
        $new_password = $random;
        $email_password = $new_password;
        $new_password = md5($new_password);

        $sql=mysqli_query($con,"UPDATE teacherdb SET Password='$new_password' WHERE Email='$email'"); 

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

	<center><h1>TEACHER LOGIN FORM</h1></center>
<div class="container">              
            <a  class="btn btn-success" href="home.php">
              <span class="glyphicon glyphicon-home"></span>  Back to HOME
            </a>
          </div>
	<div id ="wrapper">
	<div id="formdiv">
	    <form action="teacher_login.php" method ="POST" > 
		   	<br>	 
			 <div class= "input">
			 <input type="text" class="form-control" name="username" placeholder="Username" required  > <br>
       </div>
       <div class= "input">			
			 <input type="password" class="form-control" name="password" placeholder="Password" required  > <br>
       </div>			
			 <input class="btn btn-primary btn-block" type="submit" id="submit" name="submit"  > <br>

             Not yet a member ?<a class="btn-xs btn-link" href="teacher_reg">Sign up</a>

		   </form><br>
		<div class="container">
  <button href="#collapse" class="btn-xs btn-info" data-toggle="collapse"> Forgot Password ?</button>
  <div id="collapse" class="collapse">
    <form id="editform" action="teacher_login.php" method ="POST">
         <input type="email" placeholder="Email"  name="email">
         <input type="submit" value="Submit" class="btn btn-success" name="forgotPass">
    </form>
  </div>
</div>
	    </div>	
    </div>

</body><br><br>
<footer><CENTER style="word-spacing: 5px;">Developed by <a class="btn btn-danger" href="https://www.linkedin.com/in/sahil-bidlan-68aa8b146/" target="_blank">Sahil Bidlan</a> and Nishant Kumar Nishad</CENTER></footer>

<br><br><br>
</html>