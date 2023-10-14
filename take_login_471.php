<?php 

session_start();

	include("connection.php");
	include("functions.php");
	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from login where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password )
						
					{	
							$_SESSION['email'] = $user_data['email'];
							$var= $user_data['email'];
							$q="insert into temp (pid,email) values (-1,'$var')";
							mysqli_query($con,$q);
							$q1="insert into temp_cus (email) values ('$var')";
							mysqli_query($con,$q1);
						
							header("Location: take_homepage_471.php");
							die;
						
						
					}
				}
			}
			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="common.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

</head>

<body style="background-image: linear-gradient(ghostwhite, floralwhite)">
    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container-fluid">
            <img src="image/tabletop.png" width = "40" height = "40"alt="">
            <!-- NAME -->
            TableTop
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link"  href="homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="appetizer_471.php">Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="drinks_471.php">Drinks</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link"  href="choose_acc_471.php">Account</a>
                    </li>
                   <li class="nav-item">
						            <li class="nav-item">
                        <form method="post">
                        <div class= "searchBox">
                          <input type="text" class= "searchText" name="search" placeholder = "Type to search...">
                          <a href = "#" class = "searchBtn"><i class="far fa-search"></i></a>
						</form>
							<?php	
							if(isset($_POST['search']))
								{
									//something was posted
									$device=$_POST['search'];
									$appetizer="appetizer";
									$maincourse="main course";
									$setmenu="set menu";
									$dessert="desserts";
									$drinks="drinks";
									
									if($device === $appetizer){
										header("Location: appetizer_471.php");
										die;
									}
									elseif($device === $maincourse){
										header("Location: main_course_471.php");
										die;
									}
									elseif($device === $setmenu){
										header("Location: set_menu_471.php");
										die;
									}
									elseif($device === $dessert){
										header("Location: dessert_471.php");
										die;
									}
									elseif($device === $drinks){
										header("Location: drinks_471.php");
										die;
									}
									
								}	
							?>
							</div>
                    </li>
				   
                </ul>
            </div>
        </div>
    </nav>
	<form method="post" action="#" class="signup-form">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
        <h1>TAKE-OUT CUSTOMER LOG IN</h1>

        <div class="txtb">
            <input type="text" name = "email" required>
            <span data-placeholder="Email"></span>
        </div>

        <div class="txtb">
            <input type="password" name = "password" required>
            <span data-placeholder="Password"></span>
        </div>
		
        <input id="button" type="submit" class="signbtn" value="Log In">
		

        <div class="bottom-text">
            Don't have an account? <a href="signup_471.php">Sign Up!</a>
        </div>
    </form>

    <!--<script>
        $(".txtb input").on("focus", function(){
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function(){
            if($(this).val() == "")
                $(this).removeClass("focus");
        })
    </script>-->
	<script src="main.js" type="text/javascript"></script>
</body>
</html>
