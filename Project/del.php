<?php

require("connection.php");
       

       $id=$_GET['id'];
       $sql="DELETE FROM result WHERE id='$id'";
      
      if(mysqli_query($con,$sql))
      {  
        echo '<script>alert("Data deleted.");</script>';
      	header("location:main_teacher.php");
      }
      else
      {
        echo '<script>alert("Data NOT deleted.");</script>';
      }



?>
