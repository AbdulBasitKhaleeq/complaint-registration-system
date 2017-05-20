<?php include"header.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Project CRS</title>

</head>

<body>

	
	
<div class="container text-center">
</div>
<div class="container">
<div class="row">
<div class="col-sm-8">
<h2>Complaint Registration Application for Town Municipal Authority</h2>
<p>It has been observed that it is very difficult to submit a complaint in Town Municipal Offices throughout the province.
 And even after the complaint has been registered, it is not possible check the status of our complaint, nor can we conveniently provide
 feedback about the workers to Town Municipal Officer(TMO) or some other 
government employee to ensure that the person who is bottlenecking the complaint process is reported to higher officials .</p>
<p>Our goal is to develop a mobile application that could assist the public and the officers in accomplishment of tasks and resolving
 the complaints efficiently accompanied with some check and balance upon the workers. This mobile application will allow us to register
 a complaint without having to go to office and also provide feedback on the level of coherence to the task by the worker and officers assigned
 the task. A complete record of complaints will be managed and weekly report will be generated and provided to the concerned 
authorities who will be able to check the progress of their concerned officers and workers ensuring the wellbeing of the citizens. </p>
<h3>Departments covered under this project:</h3>
<br>
<ul class="lsit-group">
<?php 
include "dbcon.php";
				$get_dept= "select * from departments";
				$run_cats = mysqli_query($con,$get_dept);
				
				while($row_cats=mysqli_fetch_array($run_cats)) {
					
				$cat_title = $row_cats['dept_name'];
				
				echo"<li>$cat_title</li>";
				
				}

?>
</ul>
</div>
<div class="col-sm-4">
<div class="panel panel-primary">
	<div class="panel-heading"><b>Developer's Info</b></div>
	<div class="panel-body" style="padding-left:5px;">
	<p><img src="resource/bilal.jpg" class="img-circle responsive" height="100px" width="100px"> Hi guys I'm Muhammad Bilal Khaleeq, an enthusiastic programmer always try to solve social problems. Here I tried my best to solve intense problem.</p>
	<br>
	
	</div>
	</div>
</div>

</div>

</div>

   <footer class="text-center" style="background-color:rgba(26, 26, 26,1); color:gray;font-size: 18px; font-weight: bold; padding:15px;">Powered By <a href="#">CRS</a></footer>



</body> 
</html>