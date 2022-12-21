<?php
//database connection
$conn=mysqli_connect('localhost','root','','medics');

//check if password are already entered
  if (isset($_POST['Generate'])) {
  	$pass=$_POST['pass3'];
  	$password=$_POST['pass2'];

  	//hashing password
  	$hashed=sha1("password");

  	if($pass==$hashed){
      $result=mysqli_query($conn,"UPDATE admin SET password='$hashed' WHERE admin_id='3'");
  	}
  	if($result){
  		header("location:index.php");
  	}
  	else{
  		echo "password not generated";
  	}
  } 
?>
<!DOCTYPE html>
 <html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="project.css">
	<title>renew password</title>
</head>
<body>
	 <h1>Hope medics & cosmetics</h1>
	<div style="text-align: center;">
     <a href="error.php">Generate</a>|<a href="index.php">Sign up</a>

  	</div>
      <h4 style="text-align: center; font-style: italic;font-size: 16px">Generate Account password</h4>
	    <div class="form">
			<form method="POST" action="index.php">
			<div class="btn-default">
			<div class="try">
			
				
			         
			
				
					<input type="password" name="pass1" required placeholder="new password">
			
			        <br> <br> <br>
				
					<input type="password" name="pass2" required placeholder="confirm password"></label>
			
			<br>
				<input type="submit" name="Generate" value="Generate">
			</div>
		</form></div>
		   </div>
	</div>
   <footer>
 	<h6>Pharmarcy management system2022@All rights reserved</h6>
 </footer>
</body>
</html>