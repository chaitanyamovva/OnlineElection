<?php
include('dbconnect.php');
$valid=0;
if(isset($_POST['submit'])){

		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * FROM `election_adminlogin` WHERE `email` = '$email' and `password` = '$password' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
		 $valid=1;
		header('location:admindashboard.php');
		}
		else
		{
		$valid=2;
		}
}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
form
{
	border:2px solid green;
	width:500px;
	height:320px;
	padding:20px;
	border-radius:20px;
	
	
}
</style>
</head>
<body>
<center><br><br><br><br><br><br>
<form action="adminlogin.php" method="post"> 
<h1>Admin Login</h1><br>

<?php if($valid == 1){ ?>
					<div class="alert alert-success">Successfully Created</div>
				<?php } elseif($valid == 2){ ?>
					<div class="alert alert-danger">DATA NOT ENTERED CORRECTLY</div>
				<?php } ?>

<input type="text" name="email"  placeholder="enter email" style="border:1px solid blue;" class="id"><br><br>
<input type="password" name="password" placeholder="enter password" style="border:1px solid blue;"class=""><br><br>
<input type="submit" name="submit" value="Login" style="background-color:green;color:white" text-align="center">
<br><br><br>

</form>
</body>
</html>