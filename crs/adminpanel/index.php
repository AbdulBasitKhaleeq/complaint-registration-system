<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
?> 


<!DOCTYPE html>
<html>
<head>
<title>Admin panel</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  .post-footer{
  font-size: 12px;
  line-height:87.0%;
  color: gray;
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
<div class="well" style="margin:0%;"><h2 style="text-align:center;">Admin Panel</h2></div>

<div class="container">
<div class="row">
<div class="col-sm-5">
		<h3>Welcome!</h3>
		<a type="button" class="btn btn-danger btn-lg btn-block" href="employeeform.php" role="button">Employees</a>
		<a type="button" class="btn btn-danger btn-lg btn-block" href="departments.php" role="button">Departments</a>
		
</div>
<div class="col-sm-2"></div>
<div class="col-sm-5">
<?php 
date_default_timezone_set("Asia/Karachi");
echo "<h3>" .date('h:i:sa'), " ".date('y.m.d'),"</h3>";
?>
<a type="button" class="btn btn-danger btn-lg btn-block" href="complaints.php" role="button">Complaints</a>
<a type="button" class="btn btn-danger btn-lg btn-block" href="zone.php" role="button">Zones</a>
</div>
</div>
<br><br>
<div class="row">
<div class="col-sm-4"></div><div class="col-sm-4"> 
<a type="button" class="btn btn-success btn-lg btn-block" href="logout.php">Log Out</a></div>
<div class="col-sm-4"></div>

</div>
</body>
</html>