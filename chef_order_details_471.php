<?php
session_start();
	include("connection.php");
	include("functions.php");
	
	if(isset($_GET['dets'])){
		$o=$_GET['order_no'];
		$table=$_GET['dets'];
		$type=$_GET['type'];
		if(!empty($o)){
	
		$query1="SELECT p.pid,q.quantity,m.model,price.price,c.total_cost from pid p,quantity q, model m, price,cart c where c.order_no='$o' and p.pid=q.pid and p.pid=m.pid and p.pid=price.pid and p.order_no='$o' and m.order_no='$o' and q.order_no='$o' and price.order_no='$o'";
		$data1 = mysqli_query($con, $query1);
		$total1 = mysqli_num_rows($data1);
		if($table=='chef'){
			$stat="select noti from orders where order_no='$o'";
			$statq = mysqli_query($con, $stat);
			$statres = mysqli_fetch_array($statq);
		}
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
        <h2 class="title">Order details</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
			<table>
				<tr>
					<th>Order no#</th>
					<th>Product ID</th>
					<th>Quantity</th>
					<th>Product Name</th>
					<th>Bill</th>
				</tr>
				
				<?php
			if(mysqli_num_rows($data1)>0){
			while($result = mysqli_fetch_array($data1)){
			
				$orderID = $o;
				$pid = $result[0];
				$quantity = $result[1];
				$model = $result[2];
				$price = $result[3];
				$totalCost = $result[4];
			?>
                <tr>
                    <!--table data here -->
                    <td><?php echo $orderID; ?></td>
                    <td><?php echo $pid; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $model; ?></td>
                    <td>৳ <?php echo $price; ?>/-</td>
                </tr>
				<?php
					}
	}
		?>
            </table>
		</div>
		
        <h3><p align="right"><b>Total Bill: </b>৳  <?php echo $totalCost; ?>/-</p></h3><br>
		<hr>
		<center><h3><b>Order status: <?php echo $statres[0]; ?></b></h3></center>
		<br>
		<?php
		if(!empty($type)){
			$noti="select cook,done,pick,done,complete from noti";
			$notiq = mysqli_query($con, $noti);
		if($type=='dine'){
			?>
	<div class="categories">
        
        <div class="small-container cart-page">
            <!-- TABLE -->
			<table>
				<tr>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'cook';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Cooking<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'done';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Done cooking<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'pick';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Notify to pickup<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'com';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Complete<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
				</tr></table>
			</div>
			</div>
			<?php
		}
		elseif($type=='take'){
			
			?>
			
			<div class="categories">
        
        <div class="small-container cart-page">
            <!-- TABLE -->
			<table>
				<tr>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'cook';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Cooking<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'done';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Done cooking<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'send';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Sent to location<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
			<td><center>
				<form method="get">
                    <a href="buy.php?noti=<?php echo 'com';?>&order_no=<?php echo $o;?>" class="purbtn"> <center><span style="padding-left:20px;"></span>Complete<span style="padding-right:20px;"></span></center> </a>
					</form>
				</center></td>
				</tr></table>
			</div>
			</div>
			
			
			
			
			<?php
		}
	}
		?>
		
    </div>
</body>
</html>
