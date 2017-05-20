<?php 

		include('..\dbcon.php');
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$contact=$_POST['contact'];
		$cnic=$_POST['cinc'];
		$address=$_POST['address'];
		$loc_no=$_POST['loc_no'];
		
		$sql="insert into applicants (fname,lname,contact_No,cnic,address,loc_no) values('$fname','$lname','$contact_no','$cnic','$address','$loc_no')";
		$result=mysqli_query($con, $sql);
		if($result)
			echo "entered details";
		else  
			echo"unable to enter details";
?>