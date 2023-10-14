<?php
session_start();
	include("connection.php");
	include("functions.php");
	$queryx="select email from temp_cus";
	$datax=mysqli_query($con,$queryx);
	$dx=mysqli_fetch_assoc($datax);
	$emailx=$dx['email'];
	//read from database from customer table
	$query1 = "select customer_id, name, email, phone, building, road, city from customer where email='$emailx'";
	$data1 = mysqli_query($con, $query1);
	$total = mysqli_num_rows($data1);
	if($total>0){
		while($result = mysqli_fetch_array($data1)){
			$customerID = $result[0];
			$name = $result[1];
			$email = $result[2];
			$phone = $result[3];
			$building = $result[4];
			$road = $result[5];
			$city = $result[6];
		}
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="products.css">
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
                        <a class="nav-link"  href="take_homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_appetizer_471.php" >Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_drinks_471.php">Drinks</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link"  href="reserve_table_471.php">Reserve Tables</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link"  href="take_logout_471.php">Log Out</a>
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
										header("Location: take_appetizer_471.php");
										die;
									}
									elseif($device === $maincourse){
										header("Location: take_main_course_471.php");
										die;
									}
									elseif($device === $setmenu){
										header("Location: take_set_menu_471.php");
										die;
									}
									elseif($device === $dessert){
										header("Location: take_dessert_471.php");
										die;
									}
									elseif($device === $drinks){
										header("Location: take_drinks_471.php");
										die;
									}
									
								}	
							?>
							</div>
                    </li>
				 <li class="nav-item">
                        <a href="take_cart_471.php"><i class="far fa-shopping-bag"></i></a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
	<div class="categories">
		<br><br><br><br><br><br><br>
        <h2 class="title">Profile</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Customer ID</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $customerID; ?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Name</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $name;?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Email</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $email; ?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Phone</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $phone; ?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Building</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $building; ?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">Road</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $road; ?></td>
                </tr>
              </table>
            </center>
            <center>
              <table style="width: 500px;">
                <tr>
                  <th style="text-align: center;">City</th>
                </tr>
                <tr>
                  <td style="text-align: center;"><?php echo $city; ?></td>
                </tr>
              </table>
            </center>
  
	<center>
	<table><tr><td>
				<form method="get">
                    <a href="update_pro_471.php?mail=<?php echo $email;?>&id=<?php echo $customerID;?>?>" class="modbtn"> <center>Update profile</center> </a>
					</form></td>
					</tr>
					</table>
				</center>	
				<br>
				<br>
				      </div>
    </div>
	<center>
	
		<form method="get">
                <a href="confirm_cart.php?email=<?php echo $email;?>" style="color: rgb(100, 100, 100); font-size: 30px;"><b>View Cart</b></a>
		</form>
        </center><br><br>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>