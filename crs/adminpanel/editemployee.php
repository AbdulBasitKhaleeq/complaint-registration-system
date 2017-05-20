<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
?> 

<!DOCTYPE html>
<html>
<head>
<title>Employee Edit Form</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style=" background-image: url('background.jpg');	background-repeat: repeat;">
	<div class="well" style="margin:0%;"><h2 style="text-align:center;">Edit Employee</h2></div>
	
	<div class="container">
	
			
	<?php
	include('..\dbcon.php');

	if(isset($_POST['edit']))
	{ 
		$id=$_POST['id'];		
		$sql="select * from Employeeview where emp_no='$id'";
		$run = mysqli_query($con,$sql);
				echo "<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>employees</h4>
			</div>
			<div class='panel-body'>
			<table class='table table-striped'>
			<thead>
			<tr><td>Emp ID</td><td>First Name</td><td>Last Name</td><td>job title</td><td>department</td><td>Salary</td><td>location</td><td>hire date</td></tr>
			</thead>
			<tbody>";
				while($row=mysqli_fetch_array($run)) {
					
				$emp_no= $row['emp_no'];
				$fname= $row['first_name'];
				$lname= $row['last_name'];
				$title= $row['title'];
				$salary= $row['salary'];
				$loc=$row['loc_name'];
				$dept_name = $row['dept_name'];
				$h_date = $row['hire_date'];
		echo "<tr><td>".$emp_no."</td><td>".$fname."</td><td>". $lname ."</td><td>".$title."</td><td>".$dept_name."</td><td>".$salary."</td><td>".$loc."</td><td>".$h_date."</td></tr></tbody></table></div></div></div>";
		
		//echo "<tr><td>".$emp_no."</td><td>".$fname."</td><td>". $lname ."</td><td> <input type='text' class='form-control' name='jobtitle' id='jobtitle' //value='$title' //required>".$title."</td><td>".$dept_name."</td><td>".$salary."</td><td>".$loc."</td><td>".$h_date."</td></tr></tbody></table></div></div></div>";
			
			}
	}
	else
	   echo "<p>No such employee exsists<p>";	

	?>
	
</body>
</html>