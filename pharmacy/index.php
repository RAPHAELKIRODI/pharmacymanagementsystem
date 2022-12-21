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
    $_SESSION['username']=$count[1];
    $_SESSION['admin_id']=$count[0];
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
    <style>
        h5{
        color: red;
        }

        
        .form{
                /*background-color: rgba(0,0,0,0.4);*/
            margin: auto;
            padding: 9px 2px ;
            text-align: center;
      width: 50%;
        }

                 p{
    color: black;
    font-size: 15px;
    background-color: rgba();
}
h6{
  text-align: center;
  color: black;/*
  background-color: blue;*/
}
input[type=number], select {
  width: 45%;
  padding: 3px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 20%;
  background-color:rgba(95,99,255,0.5);
  color: black;
  padding: 3px 4px;
  margin: 8px 0;
  border: none;
  border: 4px  green;
  cursor: pointer;
}
input[type=text], select {
   width: 45%;
  padding: 1px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
  width: 45%;
  padding: 3px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 45%;
  padding: 3px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
h1{
  text-align: center;
  font-size: 30px;
  color: black;
  background-color: rgba(95,99,255,0.5);
  font-family: "Times New Roman",Times,Serif;
   font-style: italic;
}
body{
  background-color: rgba(0,100,40,0.5);
}
.try{
  color: black;
  margin: auto;
  border: 3.6px solid green;
}
    </style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="project.css">
	<style>

	</style>
	<title>pharmacy</title>
</head>
<body>
     <h1>Hope medics & cosmetics</h1>

     <div class="form">
     	<p style="color: black"><b>ENTER YOUR CREDENTIALS</b></p>
      
     	<form action="index.php" method="POST">
        <div class="try">
     		<div class="btn-default">
          <label>username</label>
     		<input type="text" name="username"  required placeholder="Enter username"><br>
        <label>password</label>
     		<input required type="password" name="password" required placeholder="Enter your password"><br><br>

     		<input type="submit" name="login" value="login">
     		</div>
     	</form></div>
     </div>
     <br>
     <p style="text-align: center;">forgot password?</p>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <footer>
 	<p style="text-align: center;">Pharmarcy management system2022@All rights reserved</p>
 </footer>
</body>
</html>
