<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
?> 

<!DOCTYPE html>
<html>
<head>
<title>Employee's details</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
</head>
<body style=" background-image: url('background.jpg');	background-repeat: repeat;">
<div class="well" style="margin:0%;"><h2 style="text-align:center;">Employee's Details</h2></div>

<div class="container">
<div class="row">
		<br><br>
		<div class="col-sm-1"></div>
		
		<div class="col-sm-10">
			
			<?php
               	include('..\dbcon.php');
				$sql= "select * from employees";
				$result = mysqli_query($con,$sql);
				echo"<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>employees</h4>
			</div>
			<div class='panel-body'>
			<table class='table table-striped'>
			<thead>
			<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>DoB</td><td>Gender</td><td>Phone_no</td><td>cnic</td><td>hire_date</td></tr>
			</thead>
			<tbody>
		";
				while($row=mysqli_fetch_array($result)) {
					
				$emp_no= $row['emp_no'];
				$f_name = $row['first_name'];
				$l_name = $row['last_name'];
				$dob= $row['birth_date'];
				$gender = $row['gender'];
				$phone = $row['phone_no'];
				$cnic= $row['cnic'];
				$h_date = $row['hire_date'];
				
				echo "<tr><td>".$emp_no ."</td><td>".$f_name."</td><td>". $l_name ."</td><td>".$dob."</td><td>".$gender."</td><td>".$phone."</td><td>".$cnic."</td><td>".$h_date."</td></tr>";
				
				}
				
			?>
			
			</tbody>
		</div>
</div>
</div>
		<div class="col-sm-1"></div>
		
		
</div>

<br><br><br>
<div class="row">
<div class="col-sm-5">

</div>
</div>
</body>
</html>