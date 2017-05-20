<!DOCTYPE html>

<html lang="en">
<head>
<!---<link rel="icon" href="favicon.jpg" type="image/x-icon" />-->

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
<script>
var attempt = 3; //Variable to count number of attempts

//Below function Executes on click of login button
function validate(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	if ( username == "admin" && password == "seecs@123"){
		alert ("Login successfully");
		window.location = "index.php"; //redirecting to other page
		return false;
	}
	else{
		attempt --;//Decrementing by one
		alert("You have left "+attempt+" attempt;");
		
		//Disabling fields after 3 attempts
		if( attempt == 0){
			document.getElementById("username").disabled = true;
			document.getElementById("password").disabled = true;
			document.getElementById("submit").disabled = true;
			return false;
		}
	}
}
</script>

  
    </head>
<body>

	
	<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="resource/complaint.jpg" alt="complaints" >
      </div>

      <div class="item">
        <img src="resource/govlogo.png" alt="govlogo" >
        
        </div>
    

    </div>
  </div>
	</div>
<nav class="navbar navbar-inverse fixed">
	<div class="container-fluid">
		<div class="navbar-header">	
			<a href="index.php" class="navbar-brand"style="font-size: 18px; font-weight: bold; margin-left:20px;">Home</a>
			<button type="button" class="navbar-toggle" data-toggle ="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
	<div class="collapse navbar-collapse" id="menu">	
	<ul class="nav navbar-nav" style="font-size: 18px; font-weight: bold; margin-left:20px;"> 
	<li><a href="method.php">Methodology</a></li>
	<li><a href="reports.php">Reports</a></li>
	<li><a href="app/index.html">APP</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<?php 
error_reporting(0);
session_start();
if(isset($_SESSION['admin'])){
	//header('location:index.php');
	print"<li><a href='http://inocentkillers.gear.host/adminpanel/index.php' title='adminPanel'>Go to adminPanel</a></li>";
}
else{
	print"<li><a href='#' data-toggle='modal' data-target='#myModal' id='loginplace'><span class='glyphicon glyphicon-log-in'></span>  Log in</a></li>";
}
?>
	
	
	</ul>
	</div>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header" style="background-color:rgba(26, 26, 26,.8); color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Admin Log in</h4>
        </div>
        <div class="modal-body">
          
		  
		  <form class="form-horizontal"  name="login-form" role="form" method="post" action="login.php">
    <div class="form-group " id="input1">
      <label class="control-label col-sm-2" for="email">USER NAME</label>
      <div class="col-sm-7" >
        <input type="TEXT" class="form-control" id="username" name="username" placeholder="Enter username" required>
		</div>
    </div>
    <div class="form-group" id="input2"> 
      <label class="control-label col-sm-2" for="passwordd">Password</label>
      <div class="col-sm-7" >
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
     </div>
    </div>
	<p id="errormessage"></p>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-7">
        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
		  
		  
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</nav>
</body>
</html>

