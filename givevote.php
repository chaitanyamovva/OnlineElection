<?php
	session_start();
	include('dbconnect.php');
	$location = $_SESSION['location'];
	$voterid = $_SESSION['voterid'];
	$date = date('Y-m-d');
	$sql="SELECT *FROM election_addelection where location = '$location' and startdate = '$date'  ";
	$result=$conn->query($sql);
	
	
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
			<div class="col-sm-12"  ><center><h1 style="color:black";>CAST YOUR VOTE</h1></center></div><br>
			
        </div>
    </div><br>
	<div class="alert alert-info" align="center">Welcome <?php echo $_SESSION['votername']; ?></div>
	
	
	<br>
<div class="container"  ><br>

	<div class="well">
	<?php 
	if($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()){
			$electionid = $row['electionid'];
			$voted_query = "select * from election_votes where ElectionId = '$electionid' and  VoterId = '$voterid' " ;
			$voted_query_result=$conn->query($voted_query);
			if($voted_query_result->num_rows == 0) {
			
			
	?>  
		<h3>Election Type : <?php echo $row['electiontype']; ?></h3>
		<p><?php echo $row['location']; ?></p>
		<small>Start date : <?php echo $row['startdate']; ?> to End Date : <?php echo $row['enddate']; ?></small><br>
		<?php
			$electiontype = $row['electiontype'];
			$location = $row['location'];
			$can_query = "select * from election_addcandidate where electiontype = '$electiontype' and  location = '$location' ";
			$can_res = $conn->query($can_query);
		?>
		<?php
		while($can_res1 = $can_res->fetch_assoc())
		{ ?>
			<div class="row"  >
				<div class="col-sm-3 "  align="center">
			
				<img src="<?php echo $can_res1['partysymbol']; ?>" class="img-responsive party_img"  alt="book" width="130px" height="130px"><br> <br>
			</div>
			<div class="col-sm-3 "  align="center">
			
				<img src="<?php echo $can_res1['candidateimage']; ?>" class="img-responsive can_img "  alt="book" width="130px" height="130px"><br> <br>
			</div>
			<div class="col-sm-3 "  align="center">
				<h3><?php echo $can_res1['cadidatename']; ?></h3><br><br>
			</div>
			<div class="col-sm-2 "  align="center" id="poll">		
				<a href= "make_vote.php?electionid=<?php echo $row['electionid']; ?>&candidatid=<?php echo $can_res1['candidatid']; ?>"  type="button" class="btn btn-default btn-block" >VOTE</a>
			</div>
			
			</div>
		   
		<?php } ?>
		
		<?php }} ?>
	</div>
	<?php }else { ?>
		<h2 align="center">No Elections are present today .. !!</h2>
	<?php } ?>
	
	
	

</div>
  

</body>
</html>