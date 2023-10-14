<?php
	session_start();
	require_once("connection.php");
	
	$query1 = "select sm.img,p.model,p.price,sm.description,p.pid from set_menu AS sm inner join product AS p on sm.pid=p.PID";
	$data1 = mysqli_query($con, $query1); 
	if(isset($_GET['asc'])){
		$query1 = "select sm.img,p.model,p.price,sm.description,p.pid from set_menu AS sm inner join product AS p on sm.pid=p.PID order by p.price asc";
	$data1 = mysqli_query($con, $query1); 
	}
	if(isset($_GET['desc'])){
		$query1 = "select sm.img,p.model,p.price,sm.description,p.pid from set_menu AS sm inner join product AS p on sm.pid=p.PID order by p.price desc";
	$data1 = mysqli_query($con, $query1); 
	}
	?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Menu | TableTop</title>

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
                        <a class="nav-link"  href="take_homepage_471.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_appetizer_471.php">Appetizer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_main_course_471.php">Main Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_set_menu_471.php" style="color: gray;">Set Menu</a>
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
        <h2 class="title">Set menu</h2>
		<h5><span style="padding-left:200px;"></span>Filter by:</h5>
			<form method="get">
    <a href="take_set_menu_471.php?asc=<?php echo 'asc';?>" > <span style="padding-left:200px;"></span>Price low to high </a>
	</form>	
	<form method="get">
    <a href="take_set_menu_471.php?desc=<?php echo 'desc';?>" > <span style="padding-left:200px;"></span>Price high to low</a>
	</form>	
	<br><hr><br>
        <div class="small-container">
            <div class="row">
                <?php
				$table="set_menu";
				if(mysqli_num_rows($data1)>0){
					while($result = mysqli_fetch_array($data1)){?>
				<div class="col-3">
					
                    <img src=<?php echo $result[0]; ?> alt="">
					<br>
					<br>
                    <h4><?php echo $result[1]; ?> </h4>
                    <p>৳  <?php echo $result[2]; ?>/-</p>
                    <p class="desc">
                        <?php echo $result[3]; ?> <br>
                        
                    </p>
				<form method="get">
                    <a href="buy.php?buy=<?php echo $result['pid'];?>&table=<?php echo $table;?>" class="signbtn"> <center>Add to cart</center> </a>
				</form>	
                </div>
                	<?php
						
						}
					}
					?>
                    
                   
   
                </div>
            </div>
        </div>
    </div>

        <footer class="mt-5 py-5">
      <div class="row ">
        <div class="footer-one col-lg-12 col-md-6 col-12">
          <p style="text-align: center; color: white; font-size: 30px">TableTop</p>
         
        </div>
      </div>
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-12 col-md-6 col-12">
          <center>
          <a href="https://www.facebook.com/"><img src="image/—Pngtree—facebook white icon_3570425.png" alt="" width="100"></a>
          <a href="https://www.instagram.com/"><img src="image/logo-instagram-png-41284.png" alt="" width="70"></a>
          <a href="https://www.twitter.com/"><img src="image/twitter-512.png" alt="" width="80"></i></a>
        </center>
        

          <h5 class="pb-2">Contact Us</h5>
          <div>
            <h6 class="text-uppercase">Address</h6>
            <p style = "text-align: center; color: white;">66 Mohakhali, Dhaka 1212</p>
          </div>
          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p style = "text-align: center; color: white;">+880 12 3456 7890</p>
          </div>
          <div>
            <h6 class="text-uppercase">Email</h6>
            <p style = "text-align: center; color: white;">contact@tabletop.com.bd</p>
          </div>
        </div>
        
      </div>
      <div class="copywrite mt-5">
        <div class="row container mx-auto">
           <div class="col-lg-12 col-md-6 col-12 text-nowrap">
             <p>TableTop & copy 2021. All Rights Reserved.  </p>
           </div>
           
        </div>

      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>