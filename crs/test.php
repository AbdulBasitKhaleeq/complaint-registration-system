<?php
include "dbcon.php";
$result=mysqli_query($con,"select fname from applicants");
						while($user=mysqli_fetch_array($result)){
							echo $fname=$user['fname'];
						}

?>