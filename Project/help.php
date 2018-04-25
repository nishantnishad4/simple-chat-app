

<?php
/*
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
{
 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo 'kindly Provide Valid Email';
 } else {
  $body = $name."\n".$email."\n".$message;
  if(mail('your receive e-mail ', 'Response ', $body , 'From: your sender e-mail')){
   echo '<color font="black">Thanks for your contacting.</font>';
  
 }
 
 } else {
  echo 'ALL Fields are required.';
 }
}   
else {
 echo 'ok';
}
*/




 function fetch_data()
      {
         $viewsql=mysqli_query($con,"SELECT * FROM studentdb INNER JOIN result ON studentdb.Roll_Number=result.roll order by subject_name");

               if (mysqli_num_rows($viewsql)>0)
               {      echo "done";
                   while($row = $viewsql->fetch_assoc())
                   {
                          echo "<tr><td>" . $row["subject_name"]. "</td><td>" . $row["tot"]. "</td><td>" . $row["marks"] . "</td></tr>";
                   }
               }
               else 
               {
                echo '<script>alert("Result not available for this subject/Roll number.");</script>';
               }
             }
      
  $obj=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj->SetCreator(PDF_CREATOR);
  $obj->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
  $obj->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj->SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj->SetDefaultMonospaceFont('helvetica');
  $obj->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
  $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5"> 
      <tr>  
                <th width="5%">ID</th>  
                <th width="30%">Name</th>  
                <th width="10%">Gender</th>  
                <th width="45%">Designation</th>  
                <th width="10%">Age</th>  
           </tr>  
      '; 
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I'); 
}

?>






<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Popover Test</title>
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css" />
    <style>
      .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0; 
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
<script type="text/javascript">

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

  </head>
  <body>
    <!-- Button to open the modal login form -->
<button onclick="document.getElementById('id01').style.display='block'">Login</button>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <img src="image/bg1.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
  </body>
</html>


/*
if('download')
{
  require_once("pdf/fpdf.php");
     class myPDF extends FPDF
     {
          function header()
          {
            $a->Image('image/logo.png',10,6);
            $a->SetFont('Arial','B',14);
            $a->Cell(276,5,'RESULT REPORT',0,0,'');
            $a->Ln();
            $a->SetFont('Times','',12);
            $a->Cell(276,5,'NSIT',0,0,'');
            $a->Ln(20);
          }
          function footer()
          {
            $a->SetY(-15);
            $a->SetFont('Arial','',8);
            $a->Cell(0,10,'Page '.$a->PageNo().'/{nb}',0,0,'C');
          }
          function HeaderTable()
          {
            $a->SetFont('Times','B',12);
            $a->Cell(100,10,'Subject Name',1,0,'');
            $a->Cell(40,10,'Total Marks',1,0,'');
            $a->Cell(40,10,'Obtained Marks',1,0,'');
            $a->Ln();
          }
          function viewTable($con)
          {
            $a->SetFont('Times','',12);
            $roll = $_SESSION['roll'];
            $stmt=$con->query("SELECT * FROM result where roll = '$roll' order by subject_name");
            while (mysqli_fetch_assoc($stmt))
            {
              $a->Cell(100,10,$data->subject_name,1,0,'');
              $a->Cell(40,10,$data->tot,1,0,'');
              $a->Cell(40,10,$data->marks,1,0,'');
              $a->Ln();
            }

          }
      }


  $pdf= new myPDF();
  $pdf->AliasNBPages();
  $pdf->AddPage('L','A4',0);
  $pdf->HeaderTable();
  $pdf->viewTable($con);
  $pdf->Output();


}