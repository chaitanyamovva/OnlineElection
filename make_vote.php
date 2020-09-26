<?php
	session_start();
	include('dbconnect.php');
	$location = $_SESSION['location'];
	$voterid = $_SESSION['voterid'];
	
	$candidatid = $_GET['candidatid'];
	$electionid = $_GET['electionid'];
	$CreatedOn = date('Y-m-d h:i:s');
		
	
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CAST YOUR VOTE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	
	.img{
		width:95px; 
		height:159px;
		
	}
	.imgg{
		border: 1px solid green;
	}
	.party_img
	{
		width: 130px;
		height: 130px;
		border: 1px solid #959a9e;
	}
	.can_img{
		width: 130px;
		height: 130px;
		border: 1px solid #959a9e;
	}
  </style>
 


</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12"  ><center><h1 style="color:black";>Confirmation of vote</h1></center></div><br>
			
        </div>
    </div>
	<div class="container">
		<?php
			$sql="SELECT * FROM election_votes where CandidateId = '$candidatid' and ElectionId = '$electionid' and VoterId = '$voterid' ";
			$result=$conn->query($sql);
			if($result->num_rows > 0){ ?>
				<div class="alert alert-danger" align="center">!! .. Already Voted for this Election .. !!</div>	
			<?php }
			else{ 
				$insert_query = "INSERT INTO `election_votes`(`CandidateId`, `ElectionId`, `VoterId`, `CreatedOn`) VALUES ('$candidatid','$electionid','$voterid','$CreatedOn')";
				if($conn->query($insert_query) === TRUE)
				{ ?>
					<div class="alert alert-success" align="center">!! .. Thanks for vote , your vote is accepted .. !!</div>
					
				<?php }else{ ?>
					<div class="alert alert-danger" align="center">!! .. NETWORK ERROR .. !!</div>	
				<?php } ?>
		<?php	} ?>
		
		<div align="center">
			<a href= "givevote.php" class="btn btn-warning">Go Back</a>
		
		</div>
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>