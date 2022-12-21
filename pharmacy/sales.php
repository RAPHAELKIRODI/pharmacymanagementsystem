<?php
$con=mysqli_connect('localhost','root','','medics');
   
   if(isset($_POST['sale'])){
     $item=$_POST['item'];
     $price=$_POST['price'];
     $quantity=$_POST['quantity'];
     // $amount=$_POST['amount'];
     // $day=$_POST['date_supplied'];
     //if quantity and price already entered
      if($quantity||$price){
      $amount=$quantity*$price;
     }

     $sql="INSERT INTO `sales`(item,price,quantity,amount)VALUES('$item','$price','$quantity','$amount')";
     $result=mysqli_query($con,$sql);
     if($result){
      echo "data entered successfully";
     }else{
      echo "data not entered";
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
  <h1>Hope medics & cosmetics</h1>
    <div style="text-align: center;">
      <a href="login.php">Home</a>|<a href="item.php">item</a>|<a href="wastage.php">wastage</a>|<a href="update.php">update</a>|<a href="stock.php">Stock</a><a href="index.php">Logout</a></div><div class="btn-default">
  <form action="sales.php" method="POST">
    <div class="btn-default">
      <div class="try">
    <input type="text" name="item" placeholder="Enter item name"><br><br>
    <input type="number" name="price" placeholder="Enter price"><br><br>
    <input type="" name="quantity" placeholder="Enter quantity"><br><br>
    <input type="date" name="date_supplied"><br>
    <!-- <input type="number" name="amount" placeholder="Enter item name"><br>
 -->
     <input type="submit" name="sale" value="sale"></div>
  </form>
      </div>
</body>
</html>