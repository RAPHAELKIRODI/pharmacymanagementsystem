<?php
session_start();
 $con=mysqli_connect('localhost','root','','medics');
  if(!$con)
  {
  echo " not connected check your connection";
  }

 if(isset($_POST['submit'])){

     $name=$_POST['item_name'];
     $quantity=$_POST['quantity'];
     $price=$_POST['price'];
     $day=$_POST['day'];
     $supplier=$_POST['supplier'];

     if(isset($_SESSION['username'])){
      $id=$_SESSION['admin_id'];
      $user=$_SESSION['username'];
     }

     if($quantity||$price){
     	$amount=$quantity*$price;
     }
    
     $sql="INSERT into stock(item_name,quantity,price 
              ,total_amount,date_supplied,supplier)VALUES('$name','$quantity','$price','$amount','$day','$supplier')";
     $result=mysqli_query($con,$sql);
     if($result){
          echo "data entered successfully";
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
	<title>stock</title>

</head>     
<body> 
	  <h1>Hope medics & cosmetics</h1>
    <div style="text-align: center;">
      <a href="login.php">Home</a>|<a href="wastage.php">wastage</a>|<a href="update.php">update</a>|<a href="index.php">Logout</a></div><div class="btn-default">
	  <p style="text-align: center;color: green;"><b>Fill your available stock</p></b></div>
     <div class="form">   
	<form action="stocksale.php" method="POST">
		<div class="btn-default">
      <div class="try">
		<input type="text" name="item_name" placeholder="Name"><br>
		<input type="number" name="quantity" placeholder=" Quantity"><br>
		<input type="number" name="price" placeholder=" Price"><br>

    <input type="date" name="day"><br>
    <input type="text" name="supplier" placeholder="Enter supplier name"><br>
		<input type="submit" name="submit" value="submit">|<a href="stockk.php">View</a></div>	
	</form>
   </div>
  
<?php
$con=mysqli_connect('localhost','root','','medics');
  if(isset($_POST['Export'])){

    $item=$_POST['item'];
    $quantit=$_POST['quantity'];

    $check_item = mysqli_query($con, "SELECT quantity FROM stock WHERE stock_id = $item");
    $check_item_array = mysqli_fetch_array($check_item);
    $current_quantity = $check_item_array['quantity'];

    if($current_quantity < $quantit) {
      echo "your are out of stock <b> Current quntity is $current_quantity and<b> sold quentity $quantit";
    }

    else {
     
      $sql="INSERT INTO sold(item,quantity)VALUES('$item','$quantit')";

      $query=mysqli_query($con,$sql);

      if($query){
        echo "sales done successfully";
        $update_stock = mysqli_query($con, "UPDATE stock SET quantity = quantity - $quantit where stock_id=$item");
        if($update_stock) {
          echo "and stock update";
        }
        else {
          echo "and stock not update";
        }
      }else{
        echo "wrong data entered";
        // die(mysqli_error($con));
      }
    }
  }

     $stock_query = mysqli_query($con, "SELECT * FROM `stock` WHERE quantity > 0");
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
  <form action="stocksale.php" method="POST">
    <div class="btn-default">
      <div class="try">
        <select name="item" required>
          <option  value="">---select item---</option>
          <?php while ($stock_item = mysqli_fetch_array($stock_query)) { ?>

            <option id ="p" value="<?php echo $stock_item['stock_id']; ?>">
              <?php echo $stock_item['item_name'] ;?>    
            </option>
          <?php } ?>
        </select>
        <input type="number" name="quantity" placeholder="Enter quantity"><br>
        <input type="submit" name="Export" value="Export">|<a href="itemmm.php">View</a>
  </form>
      </div>
    
	<footer>
 	<h6 style="text-align: center;">Pharmarcy management system<?php echo date('Y'); ?>@All rights reserved</h6>
 </footer> 
</body>
</html>  