<?php
$con=mysqli_connect('localhost','root','','medics');
  
  $result=mysqli_query($con,"SELECT * FROM sold, stock WHERE sold.item = stock.stock_id");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="project.css">
  <title>view stock</title>
</head>
<body>
   <h1>Hope medics & cosmetics</h1><div class="btn-default">
   <p style="text-align: center;color: green;font-size: 18px;"><b>Manage sales on your items</p></b>  
</div>
     <a href="stocksale.php">Back</a>
       <table border="1" align="center">
      <tr class="btn-success">
        <th>S/No</th>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
      <?php
      // while($row=mysqli_num_rows($result));
        while($row=mysqli_fetch_array($result)){
        ?>
        <tr class="btn-default">
        <td><?php echo $row['id'];?><br></td>
        <td><?php echo $row['item_name'];?><br></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['quantity'];?><br></td>
        <td><?php echo $row['price'] * $row['quantity'];?><br></td>
        <td><?php echo $row['today'];?><br></td>


        <!--creating edit and update button-->
        <td><a href="edit_sales.php?action=edit=<?php echo $data['stock_id']; ?>" class="btn btn btn btn-primary">Edit</a></td>
        <b><td><a href="delete_sales.php?action=delete=<?php echo $data['id']; ?>" class="btn btn btn btn btn-primary">Delete</a></td></b>
         </tr>
      <?php } ?>
    </table>

</body>
</html>