<?php

function check_login($con)
{

	if(isset($_SESSION['email']))
	{

		$id = $_SESSION['email'];
		$query = "select * from login where email = '$email' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			if(email=='email'){
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;}
		}
	}

	//redirect to login
	header("Location: login1.php");
	die;

}

