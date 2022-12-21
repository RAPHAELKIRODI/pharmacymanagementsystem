<?php
  $con=mysqli_connect('localhost','root','','medics');

  if(isset($_POST['Edit'])){
  	 $id=$_POST['id'];
     $ite=$_POST['item'];
     $pric=$_POST['price'];
     $quantit=$_POST['quantity'];
     $toda=$_POST['day'];

     if($pric||$quantit){
      $amoun=$pric*$quantit;
     }
     $query="UPDATE sold SET item,price,quantity,amount,today WHERE id='$id'";
     $result=mysqli_query($con,$query);
     if($result){
     	echo "update successfully";
     }
     else{
     	echo "Items failed to update";
     }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>sales</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="project.css">
</head>
<body>
  <div class="btn-default">
    <p style="text-align: center;color: green;"><b>Manage sales on your items</p></b></div>
  <div class="btn-default">
  <form action="edit_sales.php" method="POST">
    <div class="btn-default">
      <div class="try">
    <input type="number" name="id" placeholder="Enter item ID"><br>    
    <input type="text" name="item" placeholder="Enter item name"><br>
    <input type="number" name="price" placeholder="Enter price"><br>
    <input type="number" name="quantity" placeholder="Enter quantity"><br>
    <input type="date" name="day"><br>
     <input type="submit" name="Edit" value="Edit">
  </form>
      </div>
    <!--script for dealing with sales on items within the stock-->
	<footer>
 	<h6 style="text-align: center;">Pharmarcy management system2022@All rights reserved</h6>
 </footer> 
</body>
</html>  