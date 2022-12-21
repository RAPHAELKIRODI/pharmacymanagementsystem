<?php
 $conn=mysqli_connect('localhost','root','','medics');

 if(isset($_POST['Record'])){
     $name=$_POST['name'];
     $quantity=$_POST['quantity'];
     $cost=$_POST['cost'];

     $sql="INSERT into wastage(name,quantity,cost)VALUES('$name','$quantity','$cost')";
     $result=mysqli_query($conn,$sql);

     if($result){
     	header("location:wastagee.php");
     }else{
     	echo "WRONG WASTAGE ACCOUNT";
     }

 }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="project.css">
	<title>wastage</title>
</head>
<body>
	<h1>Hope medics & cosmetics</h1>
	 <div style="text-align: center;">
      <a href="login.php">Home</a>|<a href="stock.php">stock&sales</a>|<a href="update.php">Update</a>|<a href="index.php">Logout</a></div>
	<div class="btn-default"><p style="color: green;font-size: 18px;text-align: center;">Please fill the wastage Account</p></div>
	<div class="form">
	<form method="POST" action="wastage.php">
		<div class="btn-default">
      <div class="try">
		<input type="text" name="name" placeholder="Enter name of wastage"><br>
		<input type="number" name="quantity" placeholder="Enter the quantity"><br>
        <input type="number" name="cost" placeholder="Enter the cost"><br>
      
        <input type="submit" name="Record" value="Record">|<a href="wastagee.php">View</a></div>
	</form></div>
     </div>
     <footer>
 	<h6 style="text-align: center;">Pharmarcy management system2022@All rights reserved</h6>
 </footer> 
</body>
</html>