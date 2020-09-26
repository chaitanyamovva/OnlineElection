<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .sidebar
  {
	      background-color: black;
    height: 720px;
	  
  }
  .navbar {
    margin-bottom: 0px !important;
}
.can_img{
		width: 130px;
		height: 130px;
		border: 1px solid #959a9e;
	}
  
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admindashboard.php">Admin</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container-fluid">
  <div class="row">
	<div class="col-sm-2 sidebar">
	<br>
		<a href= "addelection.php" class="btn btn-default btn-block">ADD ELECTION</a>
		<a href= "addcandidate.php" class="btn btn-default btn-block">ADD CANDIDATE</a>
		<a href= "addvoter.php" class="btn btn-default btn-block">ADD VOTER</a>
		<a href= "viewresult.php" class="btn btn-default btn-block">VIEW RESULT</a>
		
		
		
	</div>
	<div  class="col-sm-9" align="center">
	<h2>WELCOME TO ADMIN</h2>
	
	
	
	
	
	 <img src="admin.jpg" alt="Smiley face" height="500" width="1100"> 
	
	</div>
  
  
  
  </div>
  
  
  
  
</div>

</body>
</html>