<?php


include('dbconnect.php');

$valid = 0 ;
if(isset($_POST['submit']))
{
$electiontype=$_POST['electiontype'];
$location=$_POST['location'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$CreatedOn = date('Y-m-d h:i:s');

$sql="INSERT INTO `election_addelection`(`CreatedOn`, `electiontype`, `location`, `startdate`, `enddate`) VALUES ('$CreatedOn','$electiontype','$location','$startdate','$enddate')";
if($conn->query($sql) === TRUE){
	$valid = 1 ;
}
else{
	$valid = 2 ;
	
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>adding election</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .sidebar
  {
	      background-color: black;
    height: 620px;
	  
  }
  .navbar {
    margin-bottom: 0px !important;
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
	<div  class="col-sm-9">
	
	<body>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form  align="center" action="" method="POST" enctype="multipart/form-data">
				<h2 >ADDING ELECTION</h2>
				<hr>
				<?php if($valid == 1){ ?>
					<div class="alert alert-success">Successfully Created</div>
				<?php } elseif($valid == 2){ ?>
					<div class="alert alert-danger">NETWORK PROBLEM</div>
				<?php } ?>
			
			
			
			
				<input type="text" name="electiontype" placeholder="election type" class="form-control"><br><br>
				<select name="location" class="form-control">
					<option value="">Select Location</option>
					<option value="Vijayawada">Vijayawada
					<option value="Hyderabad">Hyderabad</option>
					<option value="Vizag">Vizag</option>
					<option value="Tirupati">Tirupati</option>
				</select><br><br>
				<input type="date" name="startdate" placeholder="start date" class="form-control">	<br><br>
				<input type="date" name="enddate" placeholder="end date" class="form-control">	
				<br><br>
				
				
				
		
				<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
			</form>
		
		</div>
		<div class="col-sm-4"></div>
		
		
		</div>
	</div>
	
	
	

	
	</body>
	</div>
  
  
  
  </div>
  
  
  
  
</div>

</body>
</html>