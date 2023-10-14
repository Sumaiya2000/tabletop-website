<?php
	session_start();
	require_once("connection.php");
	

	$query2 = "select item,bought,remain,cost from stock";
	$data2 = mysqli_query($con, $query2); 
	
	if(isset($_GET['name'])){
		$name=$_GET['name'];
		$table=$_GET['table'];
	}
	if (isset($_POST['confirm'])){
	
		$newb=$_POST['bought'];
		$newr=$_POST['remain'];
		$newc=$_POST['cost'];
		if(!empty($newb)){
		$q="UPDATE stock set bought='$newb' where item='$name'";
		$x=mysqli_query($con,$q);}
		if(!empty($newr)){
			$nameq="UPDATE stock set remain='$newr' where item='$name'";
			$nameqex=mysqli_query($con,$nameq);

		}
		if(!empty($newc)){
			$phoneq="UPDATE stock set cost='$newc' where item='$name'";
			$phoneqex=mysqli_query($con,$phoneq);

		}
		if($table=='admin'){
		header("Location: admin_orders_471.php");}
		elseif($table=='chef'){
			header("Location: chef_orders_471.php");
		}
	}
	
		
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="common.css">
	<link rel="stylesheet" href="products.css">
</head>
<body>
 <?php
 if($table=='chef'){?>
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
                        <a class="nav-link"  href="chef_drinks_471.php">Drinks</a>
                    </li>
                   <li class="nav-item">
                <a class="nav-link"  href="auth_logout_471.php">Log Out</a>
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
 <?php }?>
  <?php
 if($table=='admin'){?>
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
                        <a class="nav-link"  href="admin_dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="admin_drinks_471.php">Drinks</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link"  href="admin_reserve_table_471.php">See Reserved Tables</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link"  href="admin_profile_471.php">Profile</a>
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
  <?php }?>
	 
	<div class="categories">
		<br><br><br><br><br><br><br>
	
		
		<hr>
		<h2 class="title">Inventory stock</h2>
		<center>
		
		<table style="width: 500px;">
		<tr>
		<th style="text-align: center;">Items</th>
		<th style="text-align: center;">Bought</th>
		<th style="text-align: center;">Remaining</th>
		<th style="text-align: center;">Cost</th>

		<th></th>
		</tr>
		
		<?php
		if(mysqli_num_rows($data2)>0){
			while($result2 = mysqli_fetch_array($data2)){
				if($result2[0]==$name){?>
			<form method="post" action="#" class="signup-form">
			<tr>
			<td style="text-align: center;"><?php echo $result2[0];?>
			<td style="text-align: center;"><?php echo $result2[1];?>
			<center>
					<div class="txtb">
					<input id="text" type="text" name="bought" value="">				<!-- Quantity here -->
					
					<span data-placeholder="bought"></span>
					</div>
					</center>
			</td>
			<td style="text-align: center;"><?php echo $result2[2];?><center>
					<div class="txtb">
					<input id="text" type="text" name="remain" value="">				<!-- Quantity here -->
					
					<span data-placeholder="remain"></span>
					</div>
					</center>
					</td>
			<td style="text-align: center;">৳ <?php echo $result2[3];?>
			<center>
					<div class="txtb">
					<input id="text" type="number" name="cost" value="">				<!-- Quantity here -->
					
					<span data-placeholder="cost"></span>
					</div>
					</center>
					</td>
			<td><input id="button" type="submit" class="signbtn" name="confirm" value="Confirm" style="height: 30px; ">
			</td>
			
			</tr>
			</form>
			<?php
				}
				else{
				
					?>
					<tr>
					<td style="text-align: center;"><?php echo $result2[0];?></td>
			<td style="text-align: center;"><?php echo $result2[1];?></td>
			<td style="text-align: center;"><?php echo $result2[2];?></td>
			<td style="text-align: center;">৳ <?php echo $result2[3];?></td></tr>
					<?php
				}
						}
					}
					?>		
		
							
		</table>
		</center>
		<br>
			 
		<br>
		<hr>
		
		</div>
		</div>
		
		
		
		
		
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>