<?php
	session_start();
	require_once("connection.php");
	$query1 = "select * from reserve_table";
	$data1 = mysqli_query($con, $query1); 
	$query2 = "select * from request_reserve where status='Pending'";
	$data2 = mysqli_query($con, $query2); 
	if(isset($_GET['yes'])){
		
		$table=$_GET['table_no'];
		$name=$_GET['name'];
		$email = $_GET['email'];
		$info="select phone,guest_amount,date from request_reserve where table_no='$table' and name='$name' and email='$email'";
		$infosql=mysqli_query($con, $info);
		$infofetch=mysqli_fetch_array($infosql);
		$phone=$infofetch[0];
		$guest =$infofetch[1];
		$date=$infofetch[2];
		$accept="UPDATE `reserve_table` SET `reserve_status`='Yes',`name`='$name',`mail`='$email',`phone`='$phone',`guest_amount`='$guest',`date`='$date' WHERE table_no='$table'";
		mysqli_query($con, $accept);
		$acp="UPDATE `request_reserve` SET `status`='Accepted' WHERE  email='$email'";
		mysqli_query($con, $acp);
		header("Location: admin_reserve_table_471.php");
	}
	if(isset($_GET['no'])){
		$table=$_GET['table_no'];
		$name=$_GET['name'];
		$email = $_GET['email'];
		$reject="UPDATE `request_reserve` SET `status`='Denied' WHERE  email='$email'";
		mysqli_query($con, $reject);
		header("Location: admin_reserve_table_471.php");
	}
	if(isset($_GET['vac'])){
		$table=$_GET['table_no'];
		
		$vac="UPDATE `reserve_table` SET `reserve_status`='No',`name`=Null,`mail`=Null,`phone`=Null,`guest_amount`=Null,`date`=Null WHERE table_no='$table'";
		mysqli_query($con, $vac);
		header("Location: admin_reserve_table_471.php");
	}
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
                        <a class="nav-link"  href="admin_reserve_table_471.php" style="color: gray;">See Reserved Tables</a>
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
	
	 
	<div class="categories">
		<br><br><br><br><br><br><br>
		
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
		<th style="text-align: center;">Name</th>
		<th style="text-align: center;">Email</th>
		<th style="text-align: center;">Phone</th>
		<th style="text-align: center;">Guest Number</th>
		<th style="text-align: center;">Date</th>
		<th style="text-align: center;"></th>
		</tr>
		
		<?php
		if(mysqli_num_rows($data1)>0){
			while($result = mysqli_fetch_array($data1)){?>
			<tr>
			<td style="text-align: center;"><?php echo $result[0];?></td>
			<td style="text-align: center;"><?php echo $result[1];?></td>
			<td style="text-align: center;"><?php echo $result[2];?></td>
			<td style="text-align: center;"><?php echo $result[3];?></td>
			<td style="text-align: center;"><?php echo $result[4];?></td>
			<td style="text-align: center;"><?php echo $result[5];?></td>
			<td style="text-align: center;"><?php echo $result[6];?></td>
			<td style="text-align: center;"><?php echo $result[7];?></td>
			<td><form method="get">
        <a href="admin_reserve_table_471.php?vac=<?php echo 'vacate';?>&table_no=<?php echo $result[0];?>" class="signbtn"> <center><span style="padding-left:20px;"></span>Vacate<span style="padding-right:20px;"></span></center> </a>
		</form></td>
			</tr>
			<?php
						
						}
					}
					?>		
		
		</table>
		</center><br>
		<hr>
		
		<hr>
		<h2 class="title">Requests</h2>
		<center>
		
		<table style="width: 500px;">
		<tr>
		<th style="text-align: center;">Table</th>
		<th style="text-align: center;">Name</th>
		<th style="text-align: center;">Email</th>
		<th style="text-align: center;">Phone</th>
		<th style="text-align: center;">Guest Number</th>
		<th style="text-align: center;">Date</th>
		<th></th>
		<th></th>
		</tr>
		
		<?php
		if(mysqli_num_rows($data2)>0){
			while($result2 = mysqli_fetch_array($data2)){?>
			<tr>
			<td style="text-align: center;"><?php echo $result2[0];?></td>
			<td style="text-align: center;"><?php echo $result2[1];?></td>
			<td style="text-align: center;"><?php echo $result2[2];?></td>
			<td style="text-align: center;"><?php echo $result2[3];?></td>
			<td style="text-align: center;"><?php echo $result2[4];?></td>
			<td style="text-align: center;"><?php echo $result2[5];?></td>
			
			
		<td style="text-align: center;">
		<form method="get">
        <a href="admin_reserve_table_471.php?yes=<?php echo 'yes';?>&table_no=<?php echo $result2[0];?>&name=<?php echo $result2[1];?>&email=<?php echo $result2[2];?>" class="signbtn"> <center> <span style="padding-left:20px;"></span>Accept<span style="padding-right:20px;"></span> </center> </a>
		</form></td>

		<td style="text-align: center;"><form method="get">
        <a href="admin_reserve_table_471.php?no=<?php echo 'no';?>&table_no=<?php echo $result2[0];?>&name=<?php echo $result2[1];?>&email=<?php echo $result2[2];?>" class="modbtn"> <center><span style="padding-left:20px;"></span>Deny<span style="padding-right:20px;"></span> </center> </a>
		</form></td>
			
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