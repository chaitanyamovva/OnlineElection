<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW RESULT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .sidebar
  {
	      background-color: black;
    height: 1000px;
	  
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
	<div  class="col-sm-9" align="center" >
	<h2>WELCOME TO ADMIN</h2>
	
	<?php 
		$election_sql = "SELECT * FROM `election_addelection` ";
		$election_res = $conn->query($election_sql);
		while($ele = $election_res->fetch_assoc()){
			echo "<h3>".$ele['electiontype']."</h3><small>".$ele['location']."</small>";
			$electionid = $ele['electionid'];
			$electiontype = $ele['electiontype'];
			$location = $ele['location'];
			$can_query = "SELECT * FROM `election_addcandidate` where electiontype = '$electiontype' and location = '$location' ";
			$can_query_res = $conn->query($can_query);
			while($can = $can_query_res->fetch_assoc()){ $candidatid = $can['candidatid'] ;?>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3"><img src="<?php echo $can['partysymbol']; ?>" class="can_img"></div>
					<div class="col-sm-2"><h3><?php echo $can['cadidatename']; ?></h3></div>
					<div class="col-sm-2">
					<?php
						$vote_query = "SELECT * FROM `election_votes` where ElectionId = '$electionid' and CandidateId = '$candidatid' ";
						$vote_query_res = $conn->query($vote_query);
						echo "<h3>".$vote_query_res->num_rows."</h3>";
					
					?>
					
					
					</div>
				
				</div>
				
				
				
				
			<?php }
		
		?>
			
			
			
			
			
		<?php }
	
	
	?> 
	
	
	
	
	
	<!-- <img src="admin.jpg" alt="Smiley face" height="500" width="1100"> -->
	
	</div>
  
  
  
  </div>
  
  
  
  
</div>

</body>
</html>