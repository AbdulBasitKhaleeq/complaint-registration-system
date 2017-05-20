<?php
include('..\dbcon.php');
//$con is from dbcon file.
 
//print_r($id);
echo $id=$_GET['id'];
 echo $sql= " UPDATE complaints SET complaint_status = 'Completed' WHERE complaint_no = '$id'";
$complaint_result=mysqli_query($con,$sql);
									
									if($complaint_result){
										echo "good";
									}	 
// }

?>