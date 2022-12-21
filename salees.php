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
     <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="project.css">
</head>
<body class="bg-white">
  <div class="container">
  <div class="row mt-5">
  <div class="col-lg-4 bg-white m-auto">
    <div style="text-align: center;">
      <a href="stocksale.php">stock</a>|<a href="salees.php">sales</a>|<a href="update.php">update</a>|<a href="index.php">Logout</a></div>
    <h4 class="text-center pt-3">Perform sales on your stock</h4>

  <form action="salees.php" method="POST">
  
            <div class="input-group mb-5">
        <select name="item" required>
          <option  value="">---select item---</option>
          <?php while ($stock_item = mysqli_fetch_array($stock_query)) { ?>

            <option id ="p" value="<?php echo $stock_item['stock_id']; ?>">
              <?php echo $stock_item['item_name'] ;?>    
            </option>
          <?php } ?>
        </select>
      </div>
        <input required="required" type="number" name="quantity" placeholder="Enter quantity"><br>
          <div class="col-md-12 ">
        <button type="submit" name="Export" value="Export" class="btn- success btn-sm">Export</button>|<a href="itemmm.php">View</a> </div>
  </form>
      </div>
      </div>
    </div>
  </div>
	 
</body>
</html>  