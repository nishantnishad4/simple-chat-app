<?php
  
  require("connection.php");
  if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
  {
    echo '<script>alert("You are not logged in !!");</script>';
    header("location:teacher_login.php");
  }

  if(isset($_POST["save"]))
  {
    if(isset($_POST['roll'] ) && isset($_POST['max']) && isset($_POST['subname']) && isset($_POST['marks']) )
    {
      
    
              $tot = $_POST['max'];
              $subname = $_POST['subname'];
      
      
              $count = count($_POST['roll']);
            for($i=0;$i<$count;$i++)
            {
               $roll = $_POST['roll'][$i];
               $mark = $_POST['marks'][$i];
               $sql = "INSERT INTO result (roll,subject_name,marks,tot) VALUES ('$roll','$subname','$mark','$tot')" ;
               $query = mysqli_query($con,$sql);
               echo '<script>alert("Data Sent to Database.");</script>';
            }
      
    }
    else
    {
      echo '<script>alert("There is some issue.");</script>';
    }
  }

if(isset($_POST['logout']))
{
  session_destroy();
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  unset($_SESSION['username']);
  header("location:home.php");
}



 if (isset($_POST['changePass'])) 
 {
       $email=$_SESSION['email'];
       $username=$_SESSION['username'];
       $password=$_POST['newpass'];
       $pass=$password;
       $password=md5($password);
       $sql="UPDATE teacherdb SET Password = '$password' WHERE Username='$username' AND Email='$email' ";
       mysqli_query($con,$sql)or die(mysqli_error($con));
       
       echo '<script>alert("Password Updated!! your new password is '.$pass.' ");</script>';
       
 }



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>FACULTY ACCOUNT</title>
      <link href= "css/bootstrap.min.css" rel="stylesheet"/> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href= "css/sheet4.css" rel="stylesheet" >    
      <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">

</head>       <!-- -->
<body style="background-image: url(image/80.jpg); background-repeat: no-repeat;  background-size: 100%;"   >
  <p style="color: white;" >This account belongs to username '<?php echo $_SESSION['username']; ?>' with email '<?php echo $_SESSION['email']; ?>'</p>
  <div class="container">
<div class="head-tag" style="padding:0.01px; margin-top: 2px;   background-color: black;color: #5200a5;
                             font-family: tahoma; margin-bottom:  10px; border-radius: 5px;" >
  <strong><h1><b><center style="font-size: 50px;" >TEACHER &nbsp;DASHBOARD</center></b></h1></strong>
</div>
</div>

<!--  NAVBAR STARTS HERE  -->


<div class="container-fluid">


          <div class="nav navbar-light" style="border-radius: 10px; padding-right: 1%; margin-top: 0px; " >
            
              <form method="POST" action="main_teacher.php" >  
                  <button class="btn btn-danger btn-sm pull-right" class="logout-btn" name="logout" type="submit">
                        <span class="glyphicon glyphicon-log-out"  style="padding: 1px;  " ></span>  LOGOUT&nbsp;
                  </button>  
              </form>

              <a href="#collapse" class="btn btn-sm btn-primary " data-toggle="collapse"> Change Password</a>
          <div id="collapse" class="collapse">
            <form id="updatePassword"  action="main_teacher.php" method ="POST">
                 <input type="text" placeholder="Password" name="newpass" required>
                 <button type="submit" class="btn btn-sm btn-default" name="changePass">Submit</button>
            </form>
          </div>
          </div>


</div>
<!--  NAVBAR ENDS HERE  -->

<div class="container-fluid">
<div class="row"  >

        <div class="col-xs-12 col-md-6" style="text-align: center;">
        <H2 style="color: red ; " >ADD RESULT</H2>
        <div class="container-fluid "  style="background-image: url(image/7.jpg); min-height: 50px; " >
            <form id="teacherform" action="main_teacher.php" method ="POST">
                <br>
                    <div class="input-group" >
                              <label for="subname"> SUBJECT NAME : &nbsp;</label>
                             <select name="subname"  id="subject">
                               <option>IT-311 Multimedia</option>
                               <option>IT-312 Software Engineering</option>
                               <option>IT-313 Introduction to Coding Techniques</option>
                               <option>IT-604 Theory Of Computation</option>
                               <option>IT-315 Microwave and Satellite Communication</option>
                               <option>IT-316 Multimedia Lab</option>
                               <option>IT-317 Software Engineering Lab</option>
                               <option>IT-318 Advanced Coding Techniques Lab</option>
                               <option>IT-319 Microwave and Satellite Communication Lab</option>
                             </select>
                    </div>
                
                    <div class="input-group">
                              <label for="max"> MAXIMUM MARKS : &nbsp;</label>
                             <input type="number" name="max" id="max" maxl="10" >  <br>
                    </div>



                <div class="container-fluid">
                      <div class="row"  >
                              <div id="items">
                                      <input type="text " name="roll[]" placeholder="roll" >&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="text " name="marks[]" placeholder="marks" > 
                              </div>
                      <button type="button " class="btn btn-primary" id="add" name="add" >Add More</button>
                      </div>
               </div>                <br><br><br>
                <button type="submit" name="save" class="btn btn-success btn-lg pull-center" style="padding:15px 50px; border-radius: 50px; " > 
                  <span class="glyphicon glyphicon-floppy-disk" style="font-size: 1.5em;" ></span>
                                &nbsp;&nbsp;   SAVE
                </button><br><br>
                
            </form>
            </div>
          </div>

        <div class="col-xs-6 col-md-6 " style="text-align: center;" > 
        <H2 style="color: red;"  >VIEW RESULT</H2>
        <div class="container-fluid"  style="background-image: url(image/7.jpg); min-height: 500px; max-height: 470px; overflow-y: scroll;"  >
        <form id="teacherform" action="main_teacher.php" method ="POST">
          <label for="subname"> Show result for : &nbsp;</label>
                             <!-- <input type="text" name="subname" id="subject" size="60" >  <br> -->
                             <select name="subname"  id="subject">
                               <option>IT-311 Multimedia</option>
                               <option>IT-312 Software Engineering</option>
                               <option>IT-313 Introduction to Coding Techniques</option>
                               <option>IT-604 Theory Of Computation</option>
                               <option>IT-315 Microwave and Satellite Communication</option>
                               <option>IT-316 Multimedia Lab</option>
                               <option>IT-317 Software Engineering Lab</option>
                               <option>IT-318 Advanced Coding Techniques Lab</option>
                               <option>IT-319 Microwave and Satellite Communication Lab</option>
                             </select><input type="submit" name="show">
        </form>                     
  <table class="table table-hover table-bordered" border="1px;" >
    <thead style="background-color: lightyellow;" >
      <tr>
        <th>Roll Number</th>
        <th>Maximum marks</th>
        <th>Obtained marks</th>
        <th>Percentage</th>
        <th  style="color: red;" >Remove/Edit</th>
        <!-- <th  style="color: blue;" ></th> -->
      </tr> 
    </thead>
      <tbody >
  

  <?php
      
      if(isset($_POST['show']))
      {
        $subname=$_POST['subname'];
        $final=mysqli_query($con,"SELECT DISTINCT * FROM result where subject_name='$subname' order by roll");
        if ($final->num_rows > 0) 
           {
               while($row = $final->fetch_assoc())
               {   
                echo "<tr>";
                echo "<td>".$row['roll']."</td>";
                echo "<td>".$row['tot']."</td>";
                echo "<td>".$row['marks']."</td>";
                echo "<td>".(($row['marks']/$row['tot'])*100)."%</td>";
                echo  "<td><a class='btn-warning btn-sm' href=del.php?id=".$row['id']."> &times; </a>";
                }
                  }
         else 
            {
             echo "<b>N.A.<b>"; 
            }
      }

    ?>

     </tbody>
  </table>
          
        </div>
        </div> 
          </div></div>       
<script src = "js/bootstrap.min.js" ></script>
  <script src = "js/jquery.min.js" ></script>
  
  <script src = "js/npm.js" ></script>     
  <script src="js/newfields.js"></script>     

  </body>
</html>