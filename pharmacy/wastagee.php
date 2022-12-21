<?php
$con=mysqli_connect('localhost','root','','medics');
  
  $result=mysqli_query($con,"SELECT * FROM wastage");
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		table{
			border-collapse: collapse;
		}
		a{
 width: 15%;
  padding: 10px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: rgba(0,100,40,0.5);
  text-decoration: none;
}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="project.css">
	<title></title>
</head>
<body>
	<h1>Hope medics & cosmetics</h1>
    <div class="btn-default">
	<p style="text-align: center;color: green;font-size: 18px;"><b>Manage your wastage items</p></b></div>
    <a href="wastage.php">Back</a>
	<table border="1" align="center">
		<tr class="btn-success">
			<th>S/No</th>
			<th>name</th>
			<th>quantity</th>
			<th>cost</th>
      <th>Edit</th>
      <th>Delete</th>
			
        </tr>
        <?php
        
        while($count=mysqli_fetch_array($result)){
        ?>
          <tr class="btn-default">
          	<td><?php echo $count['id'];?></td>
          	<td><?php echo $count['name'];?></td>
          	<td><?php echo $count['quantity'];?></td>
          	<td><?php echo $count['cost'];?></td>
            <!--edit and delete button-->
          	<td><a href="edit_wastage.php?edit=<?php echo $data['stock_id']; ?>" class="btn btn-default">Edit</a></td>
        <td><a href="delete_wastage.php?delete=<?php echo $data['stock_id']; ?>" class="btn btn-default">Delete</a></td>
         
          </tr>
      <?php }  ?>
</table>
<footer>
  <br><br><br><br><br><br>
 	<p style="text-align: center;">Pharmarcy management system2022@All rights reserved</p>
 </footer>  
</body>
</html>