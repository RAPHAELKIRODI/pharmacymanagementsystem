<?php
$con=mysqli_connect('localhost','root','','medics');
  
  $result=mysqli_query($con,"SELECT * FROM item");
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<title></title>
</head>
<body>
	
	<p>LIST OF ITEMS</p>
	<table border="1">
		<tr>
			<th>id</th>
			<th>items</th>
			<th>quantity</th>
			<th>unit_price</th>
			<th>supplier</th>
			<th>amount</th>
       <th>Edit</th>
        </tr>
        <?php
        while(mysqli_num_rows($result)){
        	$count=mysqli_fetch_array($result);
        ?>
          <tr>
          	<td><?php echo $count['id'];?></td>
          	<td><?php echo $count['items'];?></td>
          	<td><?php echo $count['quantity'];?></td>
          	<td><?php echo $count['unit_price'];?></td>
          	<td><?php echo $count['supplier'];?></td>
          	<td><?php echo $count['amount'];?></td>
          
          </tr>
      <?php }  ?>
</table>
<footer>
 	<p style="text-align: center;background-color: rgba(0,100,40,0.5);">Pharmarcy management system2022@All rights reserved</p>
 </footer>  
</body>
</html>