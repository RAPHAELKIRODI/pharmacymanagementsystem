
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="project.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<style>
		 
	</style>   
	<title>
		Login
	</title>
</head>
<body> 
	   <h1>Hope medics & cosmetics</h1>
	<div class="btn-default"><p style="color: green;text-align: center;font-size: 25px;"><marquee><i>Welcome Yohana, you may select the below options to perform your stuff.</i></marquee></p></div>
	<div style="text-align: center;">
      <a href="stocksale.php">stock&sales</a>|<a href="wastage.php">wastage</a>|<a href="update.php">update</a>|<a href="index.php">Logout</a></div>

      <div class="container">
	
	<input type="radio" name="rr" id="radio1">
	<input type="radio"  name="rr" id="radio2">
	<input type="radio" name="rr" id="radio3">

<div class="img1">
	<img src="./image/picture1.png" width="500px" height="auto">
</div>
<div>
	<img src="./image/picture2.png" width="500px" height="auto">
</div>
<div>
	<img src="./image/picture3.png" width="500px" height="auto">
</div>
</div>
<script type="text/javascript">
	var x=1;
	setInterval(function(){
		document.getElementById('radio'+x).checked=true;
		console.log(x);
		x++;
		if(x>3)
		{
			x=1;
		}
	},3000)
</script>
	 </form>

	 
	 <br><!-- <div class="btn-default"> -->
 <footer>
 	<br><br><br><br><br><br>
 	<h6>Pharmarcy management system2022@All rights reserved</h6>
 </footer></div>    
</body>
</html>