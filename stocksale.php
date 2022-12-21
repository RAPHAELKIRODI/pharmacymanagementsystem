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
          echo "stock entered successfully";
     }else{
     	echo "Please fill the items";
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="project.css">
	<title>stock</title>
    <style>
      
 a{
 width: 15%;
  padding: 2px 5px;
  margin: 4px 0;
  display: inline-block;
  border: 3.6px solid green;
  border-radius: 2px;
  box-sizing: border-box;
  background-color: rgba(95,99,255,0.5);
  text-decoration: none;
  color: black;
    </style>
</head>     
<body class="bg-light"> 
	<div class="container">
    <div class="row mt-5 ">
      <div class="col-lg-4 bg-white m-auto">
        <div style="text-align: center;">
      <a href="stocksale.php">stock</a>|<a href="salees.php">sales</a>|<a href="update.php">update</a>|<a href="index.php">Logout</a></div>
          <h4 class="text-center pt-3">Fill your stock here</h4>

        <form action="stocksale.php" method="POST">
            <div class="input-group mb-4">
         <input type="text" class="form-control" name="item_name" placeholder="Enter name of item"  required>
            </div>
            <div class="input-group mb-4">
             
              <input required type="number" class="form-control"  name="quantity" placeholder="Enter quantity">
            </div>

             <div class="input-group mb-4">
            <input required type="number" class="form-control"  name="price" placeholder="Enter price">
            </div>

            <div class="input-group mb-4">
            <input required type="date" class="form-control"  name="day" >
            </div>

            <div class="input-group mb-4">
            <input required type="text" class="form-control"  name="supplier" placeholder="Supplier name">
            </div>




        
              <div class="col-md-12 text-center">
                <button type="submit" class="btn-success btn-sm" name="submit" value="submit">submit</button>
        
               
               <a href="stockk.php">view stock</a>
          </div>

      
        </form>
      </div>
    </div>
  </div>
