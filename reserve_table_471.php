<?php
	session_start();
	require_once("connection.php");
	$query1 = "select table_no,table_seat,reserve_status from reserve_table";
	$data1 = mysqli_query($con, $query1); 
	$email=$_SESSION['email'];
	$query2 = "select status,table_no from request_reserve where email='$email'";
	$data2 = mysqli_query($con, $query2); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve table | TableTop</title>

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
                        <a class="nav-link"  href="take_set_menu_471.php">Set Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_dessert_471.php">Desserts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="take_drinks_471.php">Drinks</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link"  href="reserve_table_471.php" style="color: gray;">Reserve Tables</a>
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
                        <a href="take_cart.php"><i class="far fa-shopping-bag"></i></a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
	<div class="categories">
	<br><br><br><br>
	<?php
	
		if(mysqli_num_rows($data2)>0){
			
			while($result2 = mysqli_fetch_array($data2)){
				
				if($result2[0]=='Accepted'){
				?>
					<center><h3>Congrats! Your request to reserve table no#<?php echo $result2[1];?> has been accepted.</h3></center>
				<?php }
				elseif($result2[0]=='Denied'){
				?>
					<center><h3>Sorry! Your request to reserve table no#<?php echo $result2[1];?> has been denied.</h3></center>
				<?php }
		}}?>
	</div>
	<br>
	<div class="categories">
	
       <h2 class="title">Table information</h2>
        <div class="small-container cart-page">
            <!-- TABLE -->
		<hr>
		<center>
		
		<table style="width: 500px;">
		<tr>
		<th style="text-align: center;">Table</th>
		<th style="text-align: center;">Seat</th>
		<th style="text-align: center;">Booked</th>
		</tr>
		
		<?php
		if(mysqli_num_rows($data1)>0){
			while($result = mysqli_fetch_array($data1)){?>
			<tr>
			<td style="text-align: center;"><?php echo $result[0];?></td>
			<td style="text-align: center;"><?php echo $result[1];?></td>
			<td style="text-align: center;"><?php echo $result[2];?></td>
			<?php
			if($result[2]=='No'){?>
			<td><form method="get">
        <a href="reserve_form_471.php?table_no=<?php echo $result[0];?>" class="signbtn"> <center>Reserve</center> </a>
		</form></td>
			<?php }?>
			</tr>
			<?php
						
						}
					}
					?>		
		
		</table>
		</center><br>
		<hr>
		
		</div>
		</div>
		
		
		
		
		
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>