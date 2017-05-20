<?php include"header.php"?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<title>Reports</title>

 <script src=""></script>
  
  
<script>
</script>

</head>
<body>
<div class="container">
<div class="row">
<h2>Analysis reports</h2>
<div class="col-sm-4">
<div class="panel panel-primary">
		<div class='panel-heading'>
			<h4>Location wise comaplaints</h4>
			   
			</div>
			<div class='panel-body'>
			
			<table class='table table-striped'>
			<thead>
			<tr><th>location Name</th><th>No of complaints</th></tr>
			</thead>
			<tbody>
			
			<?php 
			include "dbcon.php";
			$sql="select location,count(*) as count from complaint_report group by location;";
			$result = mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)) {
					
				$loc= $row['location'];
				$no= $row['count'];
			echo "<tr><td>".$loc."</td><td>".$no."</td></tr>";
			}
			?>
			</tbody>
			</table>
			</div>

</div>
</div>
<div class="col-sm-4">

<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>Monthly completed complaintsx</h4>
			   
			</div>
			<div class='panel-body'>
			
			<table class='table table-striped'>
			<thead>
			<tr><th>Department Name</th><th>No of complaints</th></tr>
			</thead>
			<tbody>
			
			<?php 
			include "dbcon.php";
			//$sql="select dept_name,count(*) as count from complaints c,departments d where(c.dept_no=d.dept_no and complaint_date < date_sub('2001-01-25', interval 30 DAY)) group by c.dept_no order by c.dept_no";
			$sql="select dept, count(*) AS counts from complaint_Report where complaint_status='Completed' group by dept";
			$result = mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)) {
					
				$dept= $row['dept'];
				$no= $row['counts'];
			echo "<tr><td>".$dept."</td><td>".$no."</td></tr>";
			}
			?>
			</tbody>
			</table>
			</div>
</div>

	<div class='panel panel-success'>
			<div class='panel-heading'>
			<h4>Feedback</h4>
			</div>
			<div class="panel-body">
			<?php 
			include "dbcon.php";
			$sql="select sum(feedback) as totals,count(*) as s from complaint_report where(complaint_status='completed');";
			$result = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result); 
			$sum=$row['totals'];
			$no=$row['s'];
			echo "<p>Compalints completed ".$no."</p>";
			$no=$no*5;
			$avg_feedback=5*($sum/$no);
			echo "<p>Avg Feedback is ".$avg_feedback."</p>";
			
			?>
			
			</div>
						
	</div>
	

</div>

</div>

<div class= "row">
	<div class="container">
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages'😞'corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			
			
			var data = google.visualization.arrayToDataTable([
			['Location', 'Hours per Day'],
			['North', 11],
			['South',  2],
			['East',  2],
			['West', 2]
		]);

        var options = {
          title: 'Location Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	 <div id="piechart" style="width: 900px; height: 500px;"></div>
	</div>
</div>

</div>


<footer class="text-center" style="background-color:rgba(26, 26, 26,1); color:gray;font-size: 18px; font-weight: bold; padding:15px;">Powered By <a href="#">CRS</a></footer>
</body>
</html>


