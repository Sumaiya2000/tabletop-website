<?php
session_start();
	require_once("connection.php");
	if(!empty($_SESSION['name'])){
	$name=$_SESSION['name'];}
	if(!empty($_SESSION['email'])){
	$email=$_SESSION['email'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders | TableTop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="products.css">

</head>
<body>
<?php 
if(!empty($name)){?>
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
                        <a class="nav-link"  href="dine_homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dine_appetizer_471.php">Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dine_main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dine_set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dine_dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="dine_drinks_471.php">Drinks</a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link"  href="confirm_cart.php">Orders</a>
                    </li>
					<li class="nav-item">
                <a class="nav-link"  href="dine_logout_471.php">Leave</a>
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
										header("Location: dine_appetizer_471.php");
										die;
									}
									elseif($device === $maincourse){
										header("Location: dine_main_course_471.php");
										die;
									}
									elseif($device === $setmenu){
										header("Location: dine_set_menu_471.php");
										die;
									}
									elseif($device === $dessert){
										header("Location: dine_dessert_471.php");
										die;
									}
									elseif($device === $drinks){
										header("Location: dine_drinks_471.php");
										die;
									}
									
								}	
							?>
							</div>
                    </li>
				 <li class="nav-item">
                        <a href="dine_cart_471.php"><i class="far fa-shopping-bag"></i></a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
	
	 <div class="categories">
        <h2 class="title">Order</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
	
	<?php
	
		$msg='Order received.';
		$query5="select order_no,noti from orders where gives='$name' and status='Pending'";
		$ordernum=mysqli_query($con, $query5);
		if(mysqli_num_rows($ordernum)>0){
		$on=mysqli_fetch_array($ordernum);
		$o=$on['order_no'];
		if($on[1]=='cook'){$msg='Your order is being cooked.';}
		elseif($on[1]=='done'){$msg='Your order is done cooking.';}
		elseif($on[1]=='pick'){$msg='Please pick up your food from the counter.';}
		elseif($on[1]=='send'){$msg='Your order is sent to your location.';}
		elseif($on[1]=='complete'){$msg='Your order is completed. Thank you for ordering!';}
		
		$query1="SELECT p.pid,q.quantity,m.model,price.price from pid p,quantity q, model m, price where p.pid=q.pid and p.pid=m.pid and p.pid=price.pid and p.order_no='$o' and m.order_no='$o' and q.order_no='$o' and price.order_no='$o'";
		$data1=mysqli_query($con, $query1);
		
	
	?>

	<h3><b>Order status: <?php echo $msg;?></b></h3>	<br>
	<table>
				<tr>
					<th>Product ID</th>
					<th>Quantity</th>
					
					<th>Product</th>
					<th>Subtotal</th>
				</tr>
                <!-- FIXME: Example Product 1 -->
				<?php
				if(mysqli_num_rows($data1)>0){
					$sum=0;
					while($result = mysqli_fetch_array($data1)){
						?>
				
				<tr>	
					<td><?php echo $result[0]; ?></td> <!-- Product ID here -->
					<td><?php echo $result[1]; ?></td> <!--quantity-->
					<td>
                        <div class="cart-info">
                            <div>
                                <br>
                                <p><b><?php echo $result[2]; ?></b></p> <!--  name here -->
                                <p> ৳ <?php echo $result[3]; ?>/-</p> <!-- Unit Price here -->
                                
                            </div>
                        </div>
                       
                    </td>
					<td> ৳ <?php echo $result[1]*$result[3];
							$sum=$sum+($result[1]*$result[3]);?>/-</td> <!-- TODO: Subtotal = Price x Quantity here -->
				</tr>
				<?php
				}}
				?>
                

			</table>
            
            <!-- TOTAL -->
            <div class="total-price">
                <table>
                    <tr>
                        <td><b>Total</b> ৳ <?php echo $sum;?>/- </td> <!-- TODO: Total = Sum of Subtotals * 32% of Subtotals -->
                        
                    </tr>
                  
                </table>
            </div>
        </div>
    </div>
	
		<?php } }
elseif(!empty($email)){?>
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
                        <a class="nav-link"  href="take_appetizer_471.php">Appetizer</a>
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
                       <a class="nav-link"  href="take_profile_471.php">Profile</a>
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
        <h2 class="title">Order</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
	
	<?php
	
		$msg='Order received.';
		$query5="select order_no,noti from orders where gives='$email' and status='Pending'";
		$ordernum=mysqli_query($con, $query5);
		if(mysqli_num_rows($ordernum)>0){
		$on=mysqli_fetch_array($ordernum);
		$o=$on['order_no'];
		if($on[1]=='cook'){$msg='Your order is being cooked.';}
		elseif($on[1]=='done'){$msg='Your order is done cooking.';}
		elseif($on[1]=='pick'){$msg='Please pick up your food from the counter.';}
		elseif($on[1]=='send'){$msg='Your order is sent to your location.';}
		elseif($on[1]=='complete'){$msg='Your order is completed. Thank you for ordering!';}
		
		
		$query1="SELECT p.pid,q.quantity,m.model,price.price from pid p,quantity q, model m, price where p.pid=q.pid and p.pid=m.pid and p.pid=price.pid and p.order_no='$o' and m.order_no='$o' and q.order_no='$o' and price.order_no='$o'";
		$data1=mysqli_query($con, $query1);
		
	
	?>
	
	<h3><b>Order status: <?php echo $msg;?></b></h3><br>
	<table>
				<tr>
					<th>Product ID</th>
					<th>Quantity</th>
					
					<th>Product</th>
					<th>Subtotal</th>
				</tr>
                <!-- FIXME: Example Product 1 -->
				<?php
				if(mysqli_num_rows($data1)>0){
					$sum=0;
					while($result = mysqli_fetch_array($data1)){
						?>
				
				<tr>	
					<td><?php echo $result[0]; ?></td> <!-- Product ID here -->
					<td><?php echo $result[1]; ?></td> <!--quantity-->
					<td>
                        <div class="cart-info">
                            <div>
                                <br>
                                <p><b><?php echo $result[2]; ?></b></p> <!--  name here -->
                                <p> ৳ <?php echo $result[3]; ?>/-</p> <!-- Unit Price here -->
                                
                            </div>
                        </div>
                       
                    </td>
					<td> ৳ <?php echo $result[1]*$result[3];
							$sum=$sum+($result[1]*$result[3]);?>/-</td> <!-- TODO: Subtotal = Price x Quantity here -->
				</tr>
				<?php
				}}
				?>
                

			</table>
            
            <!-- TOTAL -->
            <div class="total-price">
                <table>
                    <tr>
                        <td><b>Total</b> ৳ <?php echo $sum;?>/- </td> <!-- TODO: Total = Sum of Subtotals * 32% of Subtotals -->
                        
                    </tr>
                  
                </table>
            </div>
        </div>
		</div>
		<?php } } ?>
