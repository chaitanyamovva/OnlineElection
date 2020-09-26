<?php
	include('dbconnect.php');
	$valid=0;
	$ans=0;
	$election = "select * from 	election_addelection ";
	$res = $conn->query($election);
	if(isset($_POST['submit']))
	{
		$candidatename=$_POST['candidatename'];
		$candidateparty=$_POST['candidateparty'];
		$electiontype=$_POST['electiontype'];
		$location=$_POST['location'];
		if(isset($_FILES["candidateimage"]))
		{
			$path="uploads/";
			$target_path=$path.basename($_FILES["candidateimage"]["name"]);
			if(move_uploaded_file($_FILES["candidateimage"]["tmp_name"],$target_path))
			{
				
			}
		}
		if(isset($_FILES["partysymbol"]))
		{
			$path="uploads/";
			$target_path_partysymbol=$path.basename($_FILES["partysymbol"]["name"]);
			if(move_uploaded_file($_FILES["partysymbol"]["tmp_name"],$target_path_partysymbol))
			{
				$sql="INSERT INTO election_addcandidate (cadidatename, candidateparty, candidateimage, partysymbol, electiontype, location) VALUES ('$candidatename', '$candidateparty', '$target_path', '$target_path_partysymbol', '$electiontype', '$location');";
				
				if($conn->query($sql) === TRUE)
				{
					$valid =1;
				}
				else
				{
					$valid = 2;
				}
			}
		}
		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>adding candidate</title>
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

.col-sm-4 {
    width: 41.333333% !important;
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
		<div  class="col-sm-9">
	
	<body>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form  align="center" action="" method="POST" enctype="multipart/form-data">
				<h2 >ADD CANDIDATE</h2>
				<hr>
				<?php if($valid == 1){ ?>
					<div class="alert alert-success">Successfully Created</div>
				<?php } elseif($valid == 2){ ?>
					<div class="alert alert-danger">DATA DATA NOT SUFFICIENT</div>
				<?php } ?>
			    <input type="text" name="candidatename" placeholder="CandidateName" class="form-control"><br><br>				
				<input type="text" name="candidateparty" placeholder="CandidateParty"  class="form-control"><br>
				<h5>CANDIDATE IMAGE</h5><input type="file" name="candidateimage" value="CandidateImage" style="padding-top:15px"  class="form-control"><br>
				<h5>PARTY IMAGE</h5><input type="file" name="partysymbol" value="PartyImage" style="padding-top:15px"  class="form-control"><br><br>
				<select  name="electiontype" class="form-control" >
					<option value="election type">Election type</option>
					
					<?php while($row = $res->fetch_assoc()){ ?>
							<option value="<?php echo $row['electiontype'] ;?>"><?php echo $row['electiontype'] ;?></option>					
					<?php } ?>
				</select>
				<br><br>
				<select name="location" class="form-control">
					<option value="">Select Location</option>
					<option value="Vijayawada">Vijayawada
					<option value="Hyderabad">Hyderabad</option>
					<option value="Vizag">Vizag</option>
					<option value="Tirupati">Tirupati</option>
					
				</select><br><br>
				
				
		
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