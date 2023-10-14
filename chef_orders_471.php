<?php
	session_start();
	require_once("connection.php");
	
	$query1 = "select o.order_no,o.gives,o.total_cost,o.phone,o.type from orders o where status='Pending'";
	$data1 = mysqli_query($con, $query1); 
	$query2 = "select item,bought,remain,cost from stock";
	$data2 = mysqli_query($con, $query2); 
	$earn="select sum(total_cost) from orders";
	$earnq=mysqli_query($con, $earn); 
	$totearn=mysqli_fetch_array($earnq);
	$cost="select sum(cost) from stock";
	$costq=mysqli_query($con, $cost); 
	$totcost=mysqli_fetch_array($costq);
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
                        <a class="nav-link"  href="chef_appetizer_471.php" >Appetizer</a>
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
                       <a class="nav-link"  href="chef_profile_471.php">Profile</a>
                    </li>
					<li class="nav-item">
                       <a class="nav-link"  href="chef_orders_471.php" style="color: gray;">Orders</a>
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
		<br><br><br><br><br><br><br>
		
       <h2 class="title">All orders</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
		<hr>
		<center>
		
		<table style="width: 500px;">
		<tr>
		<th style="text-align: center;">Order no#</th>
		<th style="text-align: center;">Customer name</th>
		<th style="text-align: center;">Contact number</th>
		<th style="text-align: center;">Total bill</th>
		<th style="text-align: center;"></th>
		<th></th>
		</tr>
		
		<?php
		if(mysqli_num_rows($data1)>0){
			while($result = mysqli_fetch_array($data1)){?>
			<tr>
			<td style="text-align: center;"><?php echo $result[0];?></td>
			<td style="text-align: center;"><?php echo $result[1];?></td>
			<td style="text-align: center;"><?php echo $result[3];?></td>
			<td style="text-align: center;">৳ <?php echo $result[2];?></td>
			<td><center>
				<form method="get">
                    <a href="chef_order_details_471.php?dets=<?php echo 'chef';?>&order_no=<?php echo $result[0];?>&type=<?php echo $result[4];?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Details<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			
			</tr>
			<?php
						
						}
					}
					?>		
				
						
		</table>
		</center>
		
		<br>
		<hr>
		
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
			while($result2 = mysqli_fetch_array($data2)){?>
			<tr>
			<td style="text-align: center;"><?php echo $result2[0];?></td>
			<td style="text-align: center;"><?php echo $result2[1];?></td>
			<td style="text-align: center;"><?php echo $result2[2];?></td>
			<td style="text-align: center;">৳ <?php echo $result2[3];?></td>
			
			<td><center>
				<form method="get">
                    <a href="update_stock_471.php?name=<?php echo $result2[0];?>&table=<?php echo 'chef';?>" class="purbtn"><center><span style="padding-left:20px;"></span> Update <span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			
			</tr>
			<?php
						
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