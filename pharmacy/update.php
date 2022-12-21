<?php
//database connection
$conn=mysqli_connect('localhost','root','','medics');
  if(isset($_POST['update'])){
  	$pass=$_POST['pass1'];
  	$password=$_POST['pass2'];
  	$psw=$_POST['pass3'];

  	//encrypt password
  	$hash=sha1("$psw");
  	//conditions for password
  	if($password==$hash||$hash!=$pass){
  	
  		$result=mysqli_query($conn,"UPDATE admin SET password='$hash'  WHERE admin_id='3'");
  	}
  		if ($result) {
  		echo "password Changes successfully";
  	}
  	else{
  		echo "password does not match";
  	}
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="project.css">
	<title>update</title>
</head>
<body>
	 <h1>Hope medics & cosmetics</h1>
	<div style="text-align: center;">
      <a href="update.php">update</a>|<a href="index.php">Logout</a>

  	</div>
      <h4 style="text-align: center; font-style: italic;font-size: 16px">Update Account password</h4>
	    <div class="form">
			<form method="POST" action="update.php">
			<div class="btn-default">
			<div class="try">
			
				
					<input type="password" name="pass1" placeholder="re-write character password"></label>
			         <br>
			
				
					<input type="password" name="pass2" required placeholder="new password">
			
			        <br>
				
					<input type="password" name="pass3" required placeholder="confirm password"></label>
			
			<br>
				<input type="submit" name="update" value="update">
			</div>
		</form></div>
		   </div>
	</div>
   <footer>
 	<h6>Pharmarcy management system2022@All rights reserved</h6>
 </footer>
</body>
</html>