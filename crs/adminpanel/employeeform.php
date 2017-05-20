<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
?> 

<!DOCTYPE html>
<html>
<head>
<title>Employee Form</title>

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
   input[type=number]::-webkit-inner-spin-button, 
 input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
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
	<div class="well" style="margin:0%;"><h2 style="text-align:center;">Employee Form</h2></div>
<div class="container">
	<div class="row">
		<br><br><br>
		<div class="col-sm-3">
		
		<button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="collapse" data-target="#editempolyee">Edit Employee</button>
		<div id="editempolyee" class="collapse">
		<br>
		<form class="form-horizontal" method="post" action="editemployee.php">
		 <div class="form-group" id="input1">
		<div class="row">
			<label class="control-label col-sm-4" for="id">Employee Id</label>
			<div class="col-sm-7" >
			<input type="number" class="form-control" name="id" id="id" placeholder="Id" min="1"  required>
			</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
			<div class="col-sm-offset-4 col-sm-7">
			<button type="submit" name="edit" class="btn btn-danger btn-lg btn-block">edit</button>
			 </div>
		</div>
    </div>
	</form>
		</div>
		<br>
		<a type="button" class="btn btn-danger btn-lg btn-block" href="employees.php" role="button">View Employees</a>
		</div>
		<div class="col-sm-5">
		<button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="collapse" data-target="#addemployee">add empolyee</button>
  <div id="addemployee" class="collapse">

		<h3 style="text-align:center;">Add empolyee</h3>
	<form class="form-horizontal" method="post" action="employeeform.php">
    
    <div class="form-group" id="input1">
		<div class="row">
			<label class="control-label col-sm-4" for="name">First NAME</label>
			<div class="col-sm-7" >
			<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"  required>
			</div>
		</div>
    </div>
	
	<div class="form-group" id="input2">
		<div class="row">
			<label class="control-label col-sm-4" for="name">Last NAME</label>
			<div class="col-sm-7" >
			<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name"  required>
			</div>
		</div>
    </div>
	
	<div class="row">
		<div class="form-group " id="input3">
				<label class="control-label col-sm-4" for="DoB">DoB</label>
				<div class="col-sm-7" >
				<input type="Date" class="form-control" id="date" name="date" placeholder="Date of Birth" required>
				</div>
		</div>
	</div>
    
	<div class="row">
		<div class="form-group" id="input4"> 
		
			<label class="control-label col-sm-4" for="designation">Gender</label>
			<div class="col-sm-7" >
			<select class="form-control" name="gender">
			<option value="M">Male</option>
			<option value="F">Female</option>
			</select>
			</div>
		</div>	
    </div>

	
	<div class="row">
		<div class="form-group" id="input5"> 
				
				<label class="control-label col-sm-4" for="joindate">Hire Date</label>
				<div class="col-sm-7" >
				<input type="date" class="form-control" name="hiredate" id="hiredate" placeholder="hire date" required>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group" id="input6"> 
		
			<label class="control-label col-sm-4" for="designation">Job Title</label>
			<div class="col-sm-7" >
			<input type="text" class="form-control" name="jobtitle" id="jobtitle" placeholder="" required>
			</div>
		</div>	
    </div>
	<div class="row">
		<div class="form-group" id="input7"> 
		
			<label class="control-label col-sm-4" for="phone">Phone No.</label>
			<div class="col-sm-7" >
			<input type="number" class="form-control" name="phone" id="phone" placeholder="03351758820" min="01000000000" max="03999999999" required>
			</div>
		</div>	
    </div>
	<div class="row">
		<div class="form-group" id="input8"> 
		
			<label class="control-label col-sm-4" for="designation">CNIC No.</label>
			<div class="col-sm-7" >
			<input type="number" class="form-control" name="cnic" id="cnic" placeholder="3330339886347" min="1000000000000" required>
			</div>
		</div>	
    </div>

	<div class="row">
		<div class="form-group" id="input9"> 
		
			<label class="control-label col-sm-4" for="designation">Department</label>
			<div class="col-sm-7" >
			<select class="form-control" name="department">
				<option value="">NULL</option>            
				<?php
               	include('..\dbcon.php');
				$get_dept= "select * from departments";
				$run_dept = mysqli_query($con,$get_dept);
				
				while($row_dept=mysqli_fetch_array($run_dept)) {
					
				$dept_no= $row_dept['dept_no'];
				$dept_name = $row_dept['dept_name'];
				
				echo"<option value='$dept_no'>$dept_name</option>";
				
				}
				
				?>
			</select>
			</div>
		</div>	
    </div>
	
	<div class="row">
		<div class="form-group" id="input10"> 
		
			<label class="control-label col-sm-4" for="designation">Working Zone</label>
			<div class="col-sm-7" >
			<select class="form-control" name="location">
				<option value="">NULL</option>            
				<?php
               	include('..\dbcon.php');
				$get_loc= "select * from locations";
				$run_loc = mysqli_query($con,$get_loc);
				
				while($row_loc=mysqli_fetch_array($run_loc)) {
					
				$loc_no= $row_loc['location_no'];
				$loc_name = $row_loc['loc_name'];
				
				echo"<option value='$loc_no'>$loc_name</option>";
				
				}
				
				?>
			</select>
			</div>
		</div>	
    </div>
	<div class="row">
		<div class="form-group" id="input11"> 
		
			<label class="control-label col-sm-4" for="phone">Salary</label>
			<div class="col-sm-7" >
			<input type="number" class="form-control" name="salary" id="salary" placeholder="R.S 4000" min="13000" max="120000" required>
			</div>
		</div>	
    </div>

    <div class="form-group">
		<div class="row">
			<div class="col-sm-offset-4 col-sm-7">
			<button type="submit" name="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
			 </div>
		</div>
    </div>
	</form>
	</div>	
		</div>
		
		<div class="col-sm-3">
	
		
		</div>
	</div>
</div>
</body>
</html>
<?php
include('..\dbcon.php');

if(isset($_POST['submit']))
	{
     $fname=test_input($_POST['fname']);
	 $lname=test_input($_POST['lname']);
	 $DoB=test_input($_POST['date']);
	 $gender=test_input($_POST['gender']);
	 $dept=test_input($_POST['department']);
	 $location=test_input($_POST['location']);
	 $phone=test_input($_POST['phone']);
	 $cnic=test_input($_POST['cnic']);
	 $hiredate=test_input($_POST['hiredate']);
	 $jtitle=test_input($_POST['jobtitle']);
	 $salary=test_input($_POST['salary']);
	 $emp_no;
		 $sql="Insert INTO employees ( first_name,last_name, birth_date, gender,phone_no,cnic,salary,hire_date) VALUES ( '$fname','$lname','$DoB','$gender','$phone','$cnic','$salary','$hiredate')";
		
	 $result=mysqli_query($con, $sql);
	 if(!$result)
	 	 echo "Error: " . $sql . "<br>" . mysqli_error($con);
	 $sql= "select emp_no from employees where (cnic='$cnic' )";
				$run = mysqli_query($con,$sql);
				
				if($run){
				$rows=mysqli_num_rows($run);
				if($rows>0)
				while($row = mysqli_fetch_assoc($run))
					$emp_no=$row['emp_no'];
					
				}
		 $emp_no ;
		 $sql="Insert INTO loc_emp (emp_no,location_no) values ('$emp_no','$location')"; 
		$result=mysqli_query($con, $sql);
		if(!$result)
				echo  "Error: " . $sql . "<br>" . mysqli_error($con);
	 
	 
		 $sql="Insert INTO titles(emp_no,title) values('$emp_no','$jtitle')"; 
		$result=mysqli_query($con, $sql);
		if(!$result)
				 echo "Error: " . $sql . "<br>" . mysqli_error($con);
	 
		 $sql="Insert INTO dept_emp(emp_no,dept_no) values('$emp_no','$dept')"; 
		$result=mysqli_query($con, $sql);
		if(!$result)
		 echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	 ?>