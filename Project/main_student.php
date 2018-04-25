<?php
	
	require("connection.php");
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
{
    echo '<script>alert("You are not logged in !!");</script>';
    header("location:student_login.php");
}

if(isset($_POST['log-out']))
{
  session_destroy();
  unset($_SESSION['roll']);
  unset($_SESSION['password']);
  unset($_SESSION['email']);
  header("location:home.php");
}



 if (isset($_POST['changePass'])) 
 {
       $email=$_SESSION['email'];
       $roll=$_SESSION['roll'];
       $password=$_POST['newpass'];
       $pass=$password;
       $password=md5($password);
       $sql="UPDATE studentdb SET Password = '$password' WHERE Roll_Number='$roll' ";
       $newPass=mysqli_query($con,$sql)or die(mysqli_error($con));
       
          echo '<script>alert("Password Updated!! your new password is '.$pass.' ");</script>';
       
 }




?>


<?php  


if(isset($_POST["download"])) 

{ 
require_once("pdf/fpdf.php");
$a=new FPDF();
      $a->AddPage();   
      $a->SetTitle('Result Report');   
      $a->Image('image/logo.png',10,6);
      $a->Image('image/clg.jpg',50,90);
      $a->SetTextColor(0,0,0);  
      $a->Ln();    
      $a->SetXY(95,40);
      $a->SetFontSize(10);
      //$a->SetY(-15);
      $a->SetFont('Arial', 'B', 30); 
      $a->Cell(10,10,"Result Report",0,1,'C'); 
      $a->Ln();
      $a->SetFont('Arial', 'B', 15); 
      $a->Cell(10,10,"This report is for Roll Number ",0,0,'200'); 
      $roll = $_SESSION['roll'];
      $a->SetY(60);
      $a->SetX(105);
      $a->Cell(10,10,$roll,1,1,'C'); 
      $a->Ln();
      $a->SetFont('Times','B',12);
      $a->Cell(100,10,'Subject Name',1,0,'L');
      $a->Cell(25,10,'Max. Marks',1,0,'L');
      $a->Cell(35,10,'Obtained Marks',1,0,'L');
      $a->Cell(30,10,'Percentage',1,0,'L');

      $a->SetFont('Times','',12);
      $roll = $_SESSION['roll'];
      $sql=$con->query("SELECT * FROM result where roll = '$roll' order by subject_name");
if (mysqli_num_rows($sql)>0)
 {     $a->Ln();
  $total=0;$total_max=0;$total_per=0;
     while($row = $sql->fetch_assoc())
     {  
        $a->Cell(100,10,$row['subject_name'],1,0,'L');
        $a->Cell(25,10,$row["tot"],1,0,'C');
        $a->Cell(35,10,$row["marks"],1,0,'C');
        $a->Cell(30,10,round(($row["marks"]/$row["tot"])*100,2).'%',1,0,'C');
        $a->Ln();
        $total=$total+$row["marks"];
        $total_max=$total_max+$row["tot"];
        $total_per=$total/$total_max*100;
      }
      $a->Ln();$a->Ln();
      $a->SetFont('Times','B',12);
      $a->Cell(100,10,'RESULT',1,0,'L');
      $a->Cell(25,10,'Max. Marks',1,0,'L');
      $a->Cell(35,10,'Obtained Marks',1,0,'L');
      $a->Cell(30,10,'Percentage',1,0,'L');
      $a->Ln();
      $a->Cell(100,10,'GRAND TOTAL',1,0,'L');
      $a->Cell(25,10,$total_max,1,0,'C');
      $a->Cell(35,10,$total,1,0,'C');
      $a->Cell(30,10,round($total_per,3).'%',1,0,'C');

      }
      $a->SetY(240);
      $a->SetX(150);
      $a->Write(10,"Teacher's signature.");
      $a->SetY(240);
      $a->SetX(20);
      $a->Write(10,"Remarks");

     
      function Footer()
{
    $a->SetY(-15);
    $a->SetFont('Arial','I',8);
    $a->Cell(0,10,'Page '.$a->PageNo().'/{nb}',0,0,'C');
}
     

      
      $a->Ln();

      $a->Ln(20);
      $a->Footer();
      $a->output();  

}


 ?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <!--     Bootstrap CSS         -->
  <link href= "css/bootstrap.min.css" rel="stylesheet"/> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href= "css/sheet4.css" rel="stylesheet" >    
  <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">

<title>STUDENT ACCOUNT</title>

<style type="text/css">
  .wrapper
  {
    background-color: white;
  }
</style>


</head>

<!--=========== LOOK AT THE BODY TAG CAREFULLY, THERE ARE TOO MANY TAGS USED JUST TO FIT THE BACKGROUND IMAGE IN THE SCREEN
                THE GAME CHANGER HERE IS THE "background-repeat: no-repeat;" COMMAND THAT FITS THE IMAGE 
                CSS FILE WAS NOT WORKING DESPITE TRYING SO MANY TIMES    =====================================================================-->

  <body id="body" >
    <p style="color: white;" >This account belongs to roll number '<?php echo $_SESSION['roll']; ?>'</p>   
    <div class="pageheader" style="background-color: #EFE7CD ;">
      <center><strong style="font-size: 50px; color: #41A3AA; font-family: tahoma;" >STUDENT DASHBOARD</strong></center>
    </div><br>
        
<body  style="background-image: url(image/80.jpg); background-repeat: no-repeat;  background-size: 100%;"   >
<div class="container-fluid">
  <button href="#collapse" class="btn-xs btn-info" data-toggle="collapse"> Change Password</button>
  <div id="collapse" class="collapse">
    <form id="updatePassword" action="main_student.php" method ="POST">
         <input type="text" placeholder="New Password" name="newpass">
         <button type="submit" value="Save" class="btn-xs btn-default" name="changePass">Submit</button>
    </form>
  </div>
</div>
<!--  NAVBAR STARTS HERE  -->
 <div class="container-fluid">

          <div class="nav navbar-light" style="border-radius: 10px; padding-right: 5%; " >
                <form method="POST" action="main_student.php" >  
                     
                      <button class="btn btn-danger pull-right" name="log-out" type="submit">
                            <span class="glyphicon glyphicon-log-out"  style="padding: 5px;  " ></span>  LOGOUT&nbsp;
                      </button>  
               </form>
          </div>


<div class="container">
<div class="wrapper">
  <table class="table table-hover table-bordered" style="border: 10px double black;" >
    <thead style="background-color: lightyellow;" >
      <tr style="border: 10px double black;">
        <th>Subject Name</th>
        <th>Maximum marks</th>
        <th>MARKS OBTAINED</th>
        <th>Percentage</th>
      </tr> 
    </thead>
      <tbody>
        <tr>

      <?php
           if('view')
           {
               
              $roll = $_SESSION['roll'];
              $total=0;$total_max=0;$total_per=0;
              $viewsql = mysqli_query($con,"SELECT * FROM result where roll = '$roll' order by subject_name");
              
               if (mysqli_num_rows($viewsql)>0)
               {     
                   while($row = $viewsql->fetch_assoc())
                   {
                          echo "<tr><td>".$row["subject_name"]."</td><td>".$row["tot"]."</td><td>".$row["marks"]."</td><td>".round(($row["marks"]/$row["tot"])*100,2)."%</td></tr>";
                          $total=$total+$row["marks"];
                          $total_max=$total_max+$row["tot"];
                          $total_per=$total/$total_max*100;
                          
                   }
               }
               else 
               {
                echo "<b>N.A.<b>"; 
               }
             }
?>
        </tr>
        <tr>
          <td><b>Grand Total</td><td><?php echo $total_max ?></td><td><?php echo $total ?></td><td><?php echo round($total_per,2);echo "%"; ?><b></td>
        </tr>
       
     </tbody>
  </table>

</div>
        <form method="POST" action="main_student.php" >  
        <button class="btn btn-primary" name="download" type="submit">
             <span class="glyphicon glyphicon-download-alt" target="_blank" style="padding: 5px;"></span> Download Result&nbsp;
        </button>
        </form>
</div>






  </body>
</html>



