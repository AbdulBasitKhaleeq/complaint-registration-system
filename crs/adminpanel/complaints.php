<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:index.php');
?> 
<!DOCTYPE html>
<html>
<head>
<title>complaints details</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  .dpet_info{
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
  <script>
  
  </script>
</head>
<body style=" background-image: url('background.jpg');	background-repeat: repeat;">
<div class="well" style="margin:0%;"><h2 style="text-align:center;">Manage Complaints</h2></div>
<br><br>
<div class="container">
<div class="row">		
		<div class="col-sm-10">

				
		<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>Qeued complaints</h4>
			</div>
			<div class='panel-body'>
			<table class='table table-striped' id="complaint_table">
			<thead>
			<tr><td>ID</td><td>discription</td><td>date</td><td>status</td><td>dept</td><td>feedback</td><td>applicant</td><td>Mark as commpleted</td></tr>
			</thead>
			<tbody>
				
			<?php
               	include('..\dbcon.php');
				$sql= "select * from complaints where complaint_status='qeued'";
				$result = mysqli_query($con,$sql);
		$no='1';
				while($row=mysqli_fetch_array($result)) {
					
				$no= $row['complaint_no'];
				$detail = $row['complaint_details'];
				$d = $row['complaint_date'];
				$status= $row['complaint_status'];
				$dept = $row['dept_no'];
				$feed = $row['feedback'];
				$apid= $row['app_id'];
				
				
				//echo "<tr><td>".$no ."</td><td>".$detail."</td><td>". $d ."</td><td>".$status."</td><td>".$dept."</td><td>".$feed."</td><td>".$apid."</td><td><input id='checked' onclick='' type='checkbox' name='marker'></td></tr>";
				echo "<tr><td>".$no ."</td><td>".$detail."</td><td>". $d ."</td><td>".$status."</td><td>".$dept."</td><td>".$feed."</td><td>".$apid."</td><td><label><input type='checkbox' id='$no' '></label> </td></tr>";
	}
				
			?>
			
			</tbody>
			<script>
						$(document).ready(function(){
							$("#complaint_table :input").change(function(){
								id= $(this).attr('id');
							
									if(this.checked){
										//$.post( "complete.php", { id: id } );	
										$.ajax({
										  type: "GET",
										  url:  "complete.php",
										  data: {id :id}, 
										 
										});
									}	
							});
							
						});
			</script>
			</table>
	</div>
	<div class="row">
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4">
	
	<a type="button" class="btn btn-danger btn-lg btn-block" href="complaints.php" role="button">Save</a>
	</div>
	<div class="col-sm-4">
	</div>
</div>	

</div>
</div>
</div>



<div class="container">
<div class="row">		
		<div class="col-sm-10">

				
		<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>Completed complaints</h4>
			</div>
			<div class='panel-body'>
			<table class='table table-striped'>
			<thead>
			<tr><td>ID</td><td>discription</td><td>date</td><td>status</td><td>dept</td><td>feedback</td><td>applicant</td></tr>
			</thead>
			<tbody>
				
			<?php
               	include('..\dbcon.php');
				$sql= "select * from complaints where complaint_status='completed'";
				$result = mysqli_query($con,$sql);
		
				while($row=mysqli_fetch_array($result)) {
					
				$no= $row['complaint_no'];
				$detail = $row['complaint_details'];
				$d = $row['complaint_date'];
				$status= $row['complaint_status'];
				$dept = $row['dept_no'];
				$feed = $row['feedback'];
				$apid= $row['app_id'];
				
				
				echo "<tr><td>".$no ."</td><td>".$detail."</td><td>". $d ."</td><td>".$status."</td><td>".$dept."</td><td>".$feed."</td><td>".$apid."</td></tr>";
				
				}
				
			?>
			
			</tbody>
			</table>
	</div>
</div>	

</div>
</div>
</div>


<div class="container">
<div class='row'>
<div class="col-sm-10">

		<br><br>
		<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>All complaints</h4>
			</div>
			<div class='panel-body'>
			<table class='table table-striped'>
			<thead>
			<tr><td>ID</td><td>discription</td><td>date</td><td>status</td><td>dept</td><td>feedback</td><td>applicant</td></tr>
			</thead>
			<tbody>
				
		<?php
               	include('..\dbcon.php');
				$sql= "select * from complaints";
				$result = mysqli_query($con,$sql);
		
				while($row=mysqli_fetch_array($result)) {
					
				$no= $row['complaint_no'];
				$detail = $row['complaint_details'];
				$d = $row['complaint_date'];
				$status= $row['complaint_status'];
				$dept = $row['dept_no'];
				$feed = $row['feedback'];
				$apid= $row['app_id'];
				
				
				echo "<tr><td>".$no ."</td><td>".$detail."</td><td>". $d ."</td><td>".$status."</td><td>".$dept."</td><td>".$feed."</td><td>".$apid."</td></tr>";
				
				}
				
			?>
			
			</tbody>
		</table>
		</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>