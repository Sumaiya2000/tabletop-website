<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$img=$_POST['image'];
		$pid = $_POST['pid'];
		$model=$_POST['name'];
		$avail=$_POST['availability'];
		$price=$_POST['price'];
		$desc=$_POST['description'];

		if(!empty($pid) && !empty($model))
		{
			//save to database
			
			$query2 = "insert into `dessert` (img,pid,description) values ('$img','$pid','$desc')";
			$query1 = "INSERT INTO `product`(`PID`, `availability`, `Model`, `Price`, `Stored in`) VALUES ('$pid','$avail','$model','$price','')";
	
			mysqli_query($con, $query1);
			mysqli_query($con, $query2);

			header("Location: admin_dessert_471.php");
			die;
		}else
		{
			echo "Please enter valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Dessert | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="common.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
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
                        <a class="nav-link"  href="admin_homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_appetizer_471.php">Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_dessert_471.php" style="color: gray;">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_drinks_471.php">Drinks</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link"  href="admin_reserve_table_471.php">See Reserved Tables</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link"  href="admin_profile.php">Profile</a>
                    </li>
					<li class="nav-item">
                       <a class="nav-link"  href="admin_orders_471.php">Orders</a>
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
										header("Location: admin_appetizer_471.php");
										die;
									}
									elseif($device === $maincourse){
										header("Location: admin_main_course_471.php");
										die;
									}
									elseif($device === $setmenu){
										header("Location: admin_set_menu_471.php");
										die;
									}
									elseif($device === $dessert){
										header("Location: admin_dessert_471.php");
										die;
									}
									elseif($device === $drinks){
										header("Location: admin_drinks_471.php");
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

        <h1 style="padding-top: 130px">New Dessert</h1>
        <div class="txtb">
            <input id="text" type="text" name="image" required>
            <span data-placeholder="Image path"></span>
        </div>
		<div class="txtb">
            <input id="text" type="number" name="pid" required>
            <span data-placeholder="Product ID"></span>
        </div>
        <div class="txtb">
            <input id="text" type="text" name="name" required>
            <span data-placeholder="Name"></span>
        </div>
        <div class="txtb">
            <input id="text" type="text" name="availability" required>
            <span data-placeholder="Available"></span>
        </div>
		<div class="txtb">
            <input id="text" type="number" name="price" required>
            <span data-placeholder="Price"></span>
        </div>
		<div class="txtb">
            <input id="text" type="text" name="description">
            <span data-placeholder="Description"></span>
        </div>

		<input id="button" type="submit" class="signbtn" value="ADD">
	</form>
    <script src="main.js" type="text/javascript"></script>

    

</body>
</html>