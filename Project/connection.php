<?php 


$con=mysqli_connect("localhost","root","","myproject");
session_start();
if(mysqli_connect_errno())
{
	echo "CONNECTION ERROR !! ".mysqli_connect_errno(); 
}


 ?>