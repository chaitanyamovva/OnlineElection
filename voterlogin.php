<?php
session_start();
include('dbconnect.php');
$valid=0;
if(isset($_POST['submit'])){

		$votercardnum=$_POST['votercardnum'];
		$voteradharnum=$_POST['voteradharnum'];
		$sql="SELECT *  FROM election_addvoter WHERE  `votercardnum` = '$votercardnum' and `voteradharnum` = '$voteradharnum'  ";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$_SESSION['location'] = $row['location'];
			$voterid = $row['voterid'];
			$_SESSION['voterid'] = $row['voterid'];
			$_SESSION['votername'] = $row['votername'];
			header('location:givevote.php');
		$valid =1;
		}
		else
		{	
		$valid =2;
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
<form action="voterlogin.php" method="post"> 

<h1>voter Login</h1><br>


<?php if($valid == 1){ ?>
					<div class="alert alert-success">Successfully login</div>
				<?php } elseif($valid == 2){ ?>
					<div class="alert alert-danger">YOUR ARE NOT REGISTERED</div>
				<?php } ?>
				
<input type="text" name="votercardnum"  placeholder="enter votercardnum " style="border:1px solid blue;"class=""   ><br><br>
<input type="text" name="voteradharnum"  placeholder="enter voteradhar " style="border:1px solid blue;"class=""><br><br>
<input type="submit" name="submit" value="Login" style="background-color:green;color:white" text-align="center">
<br><br><br>

</form>
</body>
</html>