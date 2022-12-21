<?php
$conn=mysqli_connect('localhost','root','','medics');


	$result=mysqli_query($conn,"SELECT supplier FROM item");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<title>suppliers</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>name</th>
		</tr>
     <?php
     while(mysqli_num_rows($result)){
      	$count=mysqli_fetch_array($result);
       ?>
         <tr>
          	<td><?php echo $count['supplier'];?></td>
          </tr>
          <?php }  ?>
	</table>
</body>
</html>