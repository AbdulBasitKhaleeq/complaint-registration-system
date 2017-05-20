<?php
session_start();
if(isset($_POST['submit']))
{    $email=test_input($_POST['username']);
	 $password=test_input($_POST['password']);
	 
				if($email=='admin'&& $password=='seecs@123'){	 		
				$_SESSION['password']= ['seecs@123'];
				$_SESSION['email']= 'admin';
				$_SESSION['admin']= 'admin';
				header("Location:adminpanel/index.php");}
			
}
else{
	header("Location:index.php");
}
					
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>