<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
?> 

<!DOCTYPE html>
<html>
<head>
<title>Working Zones</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  .a_info{
  font-size: 16px;
  line-height:87.0%;
  color: Black;
  }
 </style> 
 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
	  height:350px;
  }
  </style>
</head>
<body style=" background-image: url('background.jpg');	background-repeat: repeat;">
<div class="well" style="margin:0%;"><h2 style="text-align:center;">Working Zones</h2></div>

<div class="container">
<div class="row">
		
		<div class="col-sm-3"></div>
		
		<div class="col-sm-5">
		<br><br>
			<h3>Zones in the City</h3>
			<br>
			<?php
               	include('..\dbcon.php');
				$sql_qury= "select * from locations group by location_no";
				$run_sql = mysqli_query($con , $sql_qury);
				
				while($row=mysqli_fetch_array( $run_sql )) {
					
				$loc_no= $row['location_no'];
				$loc_name = $row['loc_name'];
				
				echo "<p class='a_info'>".$loc_no .". ".$loc_name."</p>";
				
				}
				
			?>
			
			
		</div>

		<div class="col-sm-3"></div>
		
		
</div>

<br><br><br>
<div class="row">
<div class="col-sm-5">

<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#editname">Edit Zone Name</button>
  <div id="editname" class="collapse">
  
				<h3>Edit Zone Name</h3>
					<form class="form-horizontal" method="post" action="zone.php">
				
				<div class="form-group" id="input1">
					<div class="row">
						<label class="control-label col-sm-4" for="name">Old Name</label>
						<div class="col-sm-7" >
						<input type="text" class="form-control" name="oldname" id="oldname" placeholder="Old Name"  required>
						</div>
					</div>
				</div>				
				
				
				<div class="form-group" id="input2">
					<div class="row">
						<label class="control-label col-sm-4" for="name">New Name</label>
						<div class="col-sm-7" >
						<input type="text" class="form-control" name="newname" id="newname" placeholder="new Name"  required>
						</div>
					</div>
				</div>				
				
				<button type="submit" class="btn btn-danger" name="editbtn">Update Name</button>
				</form>
	</div>	
</div>






<div class="col-sm-5">
<div class="row">
<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#insertdept">Insert new Zone</button>
  <div id="insertdept" class="collapse">
  
				<h3>Insert Zone</h3>
					<form class="form-horizontal" method="post" action="zone.php">
				
				<div class="form-group" id="input1">
					<div class="row">
						<label class="control-label col-sm-4" for="name">zone Name</label>
						<div class="col-sm-7" >
						<input type="text" class="form-control" name="dname" id="dname" placeholder="Zone Name"  required>
						</div>
					</div>
				</div>				
				
				<button type="submit" class="btn btn-danger" name="insertbtn">Insert</button>
				</form>
	</div>
	</div>
	<br>
	<div class="row">
<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#deletezone">Delete a Zone</button>
  <div id="deletezone" class="collapse">
  
				<h3>Delete zone</h3>
					<form class="form-horizontal" method="post" action="zone.php">
				
				<div class="form-group" id="input1">
					<div class="row">
						<label class="control-label col-sm-4" for="name">zone Name</label>
						<div class="col-sm-7" >
						<input type="text" class="form-control" name="zname" id="zname" placeholder="zone Name"  required>
						</div>
					</div>
				</div>				
				
				<button type="submit" class="btn btn-danger" name="deletebtn">Delete Zone</button>
				</form>
	</div>	
</div>
</div>
	<div class="col-sm-2"></div>
	
	</div>

<br><br>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4"> </div>
<div class="col-sm-4"></div>

</div>



<?php
		
		include('..\dbcon.php');
	if(isset($_POST['insertbtn']))
	{
     $locname=test_input($_POST['dname']);
	 
	$sqlin="Insert INTO locations (loc_name) value('$locname')";
	$resultin=mysqli_query($con, $sqlin);
	 if($resultin)
		echo"<script>alert('locations table successfully entered, Relaod page to see changes'); </script>";
	else echo "Error: " . $sqlin . "<br>" . mysqli_error($con);

	
	}

if(isset($_POST['deletebtn']))
	{
     $locname=test_input($_POST['zname']);
	 
	$sqlin="delete from locations where loc_name='$locname'";
	$resultin=mysqli_query($con, $sqlin);
	 if($resultin)
		echo"<script>alert('locations table successfully entered, Relaod page to see changes'); </script>";
	else echo "Error: " . $sqlin . "<br>" . mysqli_error($con);

	
	}

	
	 if(isset($_POST['editbtn']))
	{
     $oname=test_input($_POST['oldname']);
	 $nname=test_input($_POST['newname']);

	 $sql="update locations set loc_name='$nname' where loc_name='$oname';";
	$result=mysqli_query($con, $sql);
	 if($result)
		echo"<script>alert('Successfully updated, Relaod page to see changes'); </script>";

	else echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	
	 

	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>
 </body>
 </html>