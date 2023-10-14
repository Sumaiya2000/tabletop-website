<?php

session_start();
include("connection.php");
if(isset($_SESSION['name']))
{	$email=$_SESSION['name'];
	$q="delete from temp_cus where email='$email'";
	mysqli_query($con,$q);
	unset($_SESSION['name']);

}

header("Location: choose_acc_471.php");
die;
?>