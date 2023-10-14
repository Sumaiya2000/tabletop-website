<?php 

session_start();

	include("connection.php");
	include("functions.php");
	
	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Type | TableTop</title>

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
	 <form method="get" action="#" class="signup-form">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
        <h1>Choose User Type</h1>

		
        <a href="dine_login_471.php" class="modbtn"><center><h3>Dine-in Customer</h3></center></a>
		<a href="take_login_471.php" class="modbtn"><center><h3>Take-out Customer</h3></center></a>
		<a href="admin_login_471.php" class="modbtn"><center><h3>Admin</h3></center></a>
		<a href="chef_login_471.php" class="modbtn"><center><h3>Chef</h3></center></a>

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
