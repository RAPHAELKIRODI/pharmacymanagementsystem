<?php

//database connection
 $con=mysqli_connect('localhost','root','','medics');

 if(isset($_POST['Add'])){
     $name=$_POST['items'];
     $quantity=$_POST['quantity'];
     $price=$_POST['price'];
     $supplier=$_POST['supplier'];
     $today=$_POST['day'];
     
     if($quantity||$price){
     	$amount=$quantity*$price;
     }
     $sql="INSERT into item(items,quantity,unit_price 
  ,supplier,amount,date_supplied)VALUES('$name','$quantity','$price','$supplier','$amount','$today')";
     $result=mysqli_query($con,$sql);
     if($result){
           echo "Items entered successfully";;
     }else{
     	echo "Please fill the items";
     }
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="project.css">
	<title>item</title>
</head>     
<body> 
	  <h1>Hope medics & cosmetics</h1>
	  <div style="text-align: center;">
      <a href="login.php">Home</a>|<a href="stock.php">stock</a>|<a href="wastage.php">wastage</a>|<a href="item.php">Items</a>|<a href="index.php">Logout</a></div><div class="btn-default">
	  <b><p style="text-align: center;color: green;">Fill the information below about the items</p></b></div>
                 <b><h4 style="text-align: center;">Items'information</h4></b>
     <div class="form">   
	<form action="item.php" method="POST">
		<div class="btn-default">
      <div class="try">
		<input type="text" name="items" placeholder="Enter name of item"><br>
		<input type="number" name="quantity" placeholder="Enter the quantity"><br>
		<input type="number" name="price" placeholder="Enter price value "><br>
		<input type="text" name="supplier" placeholder="Enter supplier name"><br>
    <input type="date" name="day"><br>
		<input type="submit" name="Add" value="Add"></div>
	</form></div>
	</div> 
	 <br><br>
<br><br>
<br><br>
<br><br><br><br>


<footer>
  <p style="text-align: center;background-color: rgba(0,100,40,0.5);">Pharmarcy management system2022@All rights reserved</p>
 </footer>  
</body>
</html>