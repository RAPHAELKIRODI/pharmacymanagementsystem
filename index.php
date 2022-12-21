<?php
//session start
session_start();
$conn=mysqli_connect('localhost','root','','medics');

//check if login data are inserted.
if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	//hashed password
	$hashed=sha1("$pass");

	$result=mysqli_query($conn,"SELECT * FROM admin WHERE username='$user' AND password='$hashed'");
	$count=mysqli_fetch_array($result);

	if($count>0){
		header("location:login.php");
	}
	else{
		echo "<h5><b><i>Wrong username or password!!</h5></b></i>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<title>login page</title>

  <style>
    body{
  background-image: url('image/photo.jpg');
}
 .color{
  background-color: rgb(30,110,40);
 }
 img{
  /* object-position: 80% 100%; */
  border-radius:50%;
  border: 5px solid green;  
background-color: lightgreen;  
object-fit: none;  
object-position: center top; 
float: right;
margin-top:0%;
 }
  </style>
</head>
<body class="bg-light" >
  <div align="center" class="color">
<h1>Hope medics&Cosmetics</h1>
   <h6>phone Number +255743489116/+255712243166, Email: raphaelkirodi22@gmail.com</h6>
</div>
  <div class="container">
    <div class="row mt-5 ">
      <div class="col-lg-4 bg-white m-left">
          <h5 class="text-center pt-3">Login [HMCS]</h5>

        <form action="index.php" method="POST">
            <div class="input-group mb-5">
             <span class="input-group-text"><i class="fa fa-user"></i></span>
             <input type="text" class="form-control" name="username" placeholder="Enter Username"  required>
            </div>
            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
              <input required type="password" class="form-control"  name="password" placeholder="Enter password">
            </div>
        
              <div class="col-md-12 text-center">
                <button type="submit" class="btn-success btn-sm" name="login" value="login">login</button>
          
               
          </div>
          <p>Forgot your password?<a href="">click here</a></p>
        </form>
        
      </div>
    </div>
  </div>
  <div>
  <img src="image/doctor.jpg" width="50%" height="20%"  margin="auto">  
</div>
</body>
</html>
