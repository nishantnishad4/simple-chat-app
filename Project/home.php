<?php
  
  require("connection.php");
  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home Page</title>


  <link rel="stylesheet"  href="css/sheet2.css"/>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


</head><br>
<h1><div id="h1" align="center" style="word-spacing: 7px" >STUDENT RESULT MANAGEMENT SYSTEM </div></h1>
<div class="marquee">
<marquee style="color:red;">Result Management System For University Students</marquee>
</div>
<body style="background-image: url(image/80.jpg); background-repeat: no-repeat;  background-size: cover; position: relative;" >
<br>
<div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="image/1.jpeg" alt="This is NSIT" style="width:100%;">
        <div class="carousel-caption">
          <h3>NSIT main gate</h3>
          <p>situated in Dwarka</p>
        </div>
      </div>

      <div class="item">
        <img src="image/2.jpeg" alt="This is NSIT" style="width:100%;">
        <div class="carousel-caption">
          <h3>NSIT top view</h3>
          <p>Lush green campus</p>
        </div>
      </div>
    
      <div class="item">
        <img src="image/3.jpeg" alt="This is NSIT" style="width:100%;">
        <div class="carousel-caption">
          <h3>Ceremony</h3>
          <p>Leaders in campus</p>
        </div>
      </div>
       <div class="item">
        <img src="image/4.jpeg" alt="This is NSIT" style="width:100%;">
        <div class="carousel-caption">
          <h3>Students</h3>
          <p>Nation's future</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<ul>
  <div id="option">
    <br><br>
    <div class="input">

  <li><a href="student_reg.php">Student Registration</a></li><br>   
         

  </div>

<div class="input">

    <li><a href="teacher_reg.php">Teacher Registration</a></li><br>

    </div>

<div class="input">

    <li><a href="student_login.php">Student Login</a></li><br>  

    </div>     

<div class="input">

          <li><a href="teacher_login.php">Teacher Login</a></li><br>

  </div>

    
    
    
  </div>
</ul>


  </body>

  <br><br><br>
<footer><CENTER style="word-spacing: 5px;">Developed by <a class="btn btn-danger" href="https://www.linkedin.com/in/sahil-bidlan-68aa8b146/" target="_blank">Sahil Bidlan</a> and <a class="btn btn-danger" href="https://www.facebook.com/profile.php?id=100011478823585" target="_blank"> Nishant Kumar Nishad</a></CENTER></footer>

<br><br><br>





</html>