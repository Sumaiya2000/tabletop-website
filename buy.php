<?php
	session_start();
	require_once("connection.php");
	
	if (isset($_GET['buy'])){
		$pid=$_GET['buy'];
		$type=$_GET['cus'];
		$table=$_GET['table'];
		if($table==="appetizer"){
			$query1="SELECT p.pid,p.model,p.price from product p, appetizer a where p.pid='$pid' and a.pid='$pid'";
		}
		elseif($table==="main_course"){
			$query1="select ac.img,p.model,p.price,p.pid from main_course AS ac inner join product AS p on ac.pid='$pid' and p.pid='$pid'";
		}
		elseif($table==="set_menu"){
			$query1="select m.img,p.model,p.price from set_menu m, product p where m.pid='$pid' and p.pid='$pid'";
		}
		elseif($table==="drinks"){
			$query1="select ip.img,p.model,p.price from drinks ip, product p where ip.pid='$pid' and p.pid='$pid'";
		}
		elseif($table==="dessert"){
			$query1="select w.img,p.model,p.price from dessert w, product p where w.pid='$pid' and p.pid='$pid'";
		}
		
		
		$data1=mysqli_query($con,$query1);
		$result=mysqli_fetch_array($data1);
		$model=$result[1];
		$price=$result[2];
		$quantity=1;
		$sub=$price*$quantity;
		$fetch="select email from temp where email!='NULL'";
		$w=mysqli_query($con,$fetch);
		$remail=mysqli_fetch_assoc($w);
		$t=$remail['email'];
		
		$deletenull="delete from temp where pid='-1'";
		mysqli_query($con,$deletenull);
		$query="insert into temp (pid,model,price,subprice,quantity,email) values ('$pid','$model','$price','$sub','$quantity','$t')";
		mysqli_query($con,$query);
		
		if($type=='dine'){
			if($table==="appetizer"){
				header("Location: dine_appetizer_471.php");
			}
			elseif($table==="main_course"){
				header("Location: dine_main_course_471.php");
			}
			elseif($table==="set_menu"){
				header("Location: dine_set_menu_471.php");
			}
			elseif($table==="dessert"){
				header("Location: dine_dessert_471.php");
			}
			elseif($table==="drinks"){
				header("Location: dine_drinks_471.php");
			}
									
		}
		else{
			if($table==="appetizer"){
				header("Location: take_appetizer_471.php");
			}
			elseif($table==="main_course"){
				header("Location: take_main_course_471.php");
			}
			elseif($table==="set_menu"){
				header("Location: take_set_menu_471.php");
			}
			elseif($table==="dessert"){
				header("Location: take_dessert_471.php");
			}
			elseif($table==="drinks"){
				header("Location: take_drinks_471.php");
			}
		}

		die;
		}
	elseif (isset($_GET['remove'])){
		$pid=$_GET['remove'];
		
		$q="Delete from temp where pid='$pid'";
		mysqli_query($con,$q);
		
		$type=$_GET['cus'];
		if($type=='dine'){
		header("Location: dine_cart_471.php");}
		else{
			header("Location: take_profile_471.php");
		}	}
	
	elseif(isset($_GET['tot'])){
		$tot=$_GET['tot'];
		$order="INSERT INTO `cart`(`total_cost`) VALUES ('$tot')";
		mysqli_query($con,$order);
		$order_no="select order_no from cart where total_cost='$tot'";
		$sssss=mysqli_query($con,$order_no);
		$sss=mysqli_fetch_assoc($sssss);
		$ss=$sss['order_no'];
		$cusID="select email from temp where email!='NULL'";
		$cus=mysqli_query($con,$cusID);
		$customer=mysqli_fetch_assoc($cus);
		$gives=$customer['email'];
		if($gives==$_SESSION['name']){
		$main="insert into orders (order_no,total_cost,gives,type) values ('$ss','$tot','$gives','dine')";}
		elseif($gives==$_SESSION['email']){
			$main="insert into orders (order_no,total_cost,gives,type) values ('$ss','$tot','$gives','take')";
		}
		mysqli_query($con,$main);
		$em="update cart set email='$gives' where total_cost='$tot'";
		mysqli_query($con,$em);
		$abcd="select * from temp";
		$x=mysqli_query($con,$abcd);
		if(mysqli_num_rows($x)>0){
			while($y=mysqli_fetch_array($x)){
		
		//insert into multi cart
		$a="insert into pid (order_no,pid) values ('$ss','$y[0]')";
		$b="insert into price (order_no,price,pid) values ('$ss','$y[2]','$y[0]')";
		$c="insert into model(order_no,model,pid) values('$ss','$y[1]','$y[0]')";
		$d="insert into quantity(order_no,quantity,pid) values ('$ss','$y[4]','$y[0]')";
		mysqli_query($con,$a);
		mysqli_query($con,$b);
		mysqli_query($con,$c);
		mysqli_query($con,$d);
		}}
		$deleteTemp="delete from temp";
		mysqli_query($con,$deleteTemp);
		
		header("Location: confirm_cart.php");
		
	
	}
	if(isset($_GET['noti'])){
		$noti=$_GET['noti'];
		$o=$_GET['order_no'];
		if($noti=='cook'){
		$n1="update orders set noti='cook' where order_no='$o'";
		$nq1 = mysqli_query($con, $n1);
		}
		elseif($noti=='done'){
		$n2="update orders set noti='done' where order_no='$o'";
		$nq2 = mysqli_query($con, $n2);
		}
		elseif($noti=='pick'){
		$n3="update orders set noti='pick' where order_no='$o'";
		$nq3 = mysqli_query($con, $n3);
		}
		elseif($noti=='send'){
		$n4="update orders set noti='send' where order_no='$o'";
		$nq4 = mysqli_query($con, $n4);
		}
		elseif($noti=='com'){
		$n5="update orders set noti='complete' where order_no='$o'";
		$nq5 = mysqli_query($con, $n5);
		$queery="update orders set status='Done' where order_no='$o'";
		$qqq = mysqli_query($con, $queery);
		}
	header("Location: chef_orders_471.php");
	}
	
?>	