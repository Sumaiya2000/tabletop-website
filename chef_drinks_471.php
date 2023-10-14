<?php
	session_start();
	require_once("connection.php");
	
	$query1 = "select d.img,p.model,p.price,d.description,p.pid,p.availability from drinks AS d inner join product AS p on d.pid=p.PID";
	$data1 = mysqli_query($con, $query1); 

	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drinks | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="products.css">

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
                        <a class="nav-link"  href="chef_homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="chef_appetizer_471.php">Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="chef_main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="chef_set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="chef_dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="chef_drinks_471.php" style="color: gray;">Drinks</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link"  href="chef_profile_471.php">Profile</a>
                    </li>
					<li class="nav-item">
                       <a class="nav-link"  href="chef_orders_471.php">Orders</a>
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
										header("Location: chef_appetizer_471.php");
										die;
									}
									elseif($device === $maincourse){
										header("Location: chef_main_course_471.php");
										die;
									}
									elseif($device === $setmenu){
										header("Location: chef_set_menu_471.php");
										die;
									}
									elseif($device === $dessert){
										header("Location: chef_dessert_471.php");
										die;
									}
									elseif($device === $drinks){
										header("Location: chef_drinks_471.php");
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
	  <div class="categories">
        <h2 class="title">Drinks</h2>
        <div class="small-container">
            <div class="row">
                <?php
				$table="drinks";
				if(mysqli_num_rows($data1)>0){
					while($result = mysqli_fetch_array($data1)){?>
				<div class="col-3">
					
                    <img src=<?php echo $result[0]; ?> alt="">
					<br>
					<br>
                    <h4><?php echo $result[1]; ?> </h4>
					<p>Product ID: <?php echo $result[4];?></p>
                    <p>৳  <?php echo $result[2]; ?>/-</p>
					<p>Available: <?php echo $result[5]; ?></p> 
                    <p class="desc">
                        <?php echo $result[3]; ?> <br>
                        
                    </p>
					
					
					
					
				<?php
					if (isset($_POST['modify'])){
						$pid=$_POST['pid'];
						$avl=$_POST['availability'];
						
						if(!empty($avl)){
						
						$del="UPDATE `product` SET `availability`='$avl' WHERE pid='$pid'";
						}
						mysqli_query($con,$del);
						header("Location: chef_drinks_471.php");
						die;
				}
				?>	 
					<form method="post">
					<div class="txtb">
					<input id="text" type="number" name="pid" class="cartbtn"  placeholder="Product ID" required>
					<span data-placeholder="Product ID"></span>
					</div>
					
					<br>
					<div class="txtb">
					<input id="text" type="text" name="availability" class="cartbtn" placeholder="Available" >
					<span data-placeholder="Available"></span>
					</div>
					<br>
                    <input id="button" type="submit" class="signbtn" name="modify" value="Modify"> <br>

					</form>
				
					</div>
					
					
				 <?php
			
						}
					}
					?>
               
            </div>
            
        </div>
    </div>
    