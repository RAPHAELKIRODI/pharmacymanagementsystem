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