<?php

session_start();
include("connection.php");
if(isset($_SESSION['email']))
{	$email=$_SESSION['email'];
	$q="delete from temp_auth where email='$email'";
	mysqli_query($con,$q);
	unset($_SESSION['email']);

}

header("Location: choose_acc_471.php");
die;
?>