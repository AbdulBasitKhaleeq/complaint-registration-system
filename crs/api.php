<?php

include "dbcon.php";

if(isset( $_POST['tag'])){
			$tag = $_POST['tag'];	
			$response = array("tag" => $tag, "error" => FALSE);
	
			if($tag=='registerApplicant'){
				
				$fname  = $_POST['fname'];
				$cnic 	= $_POST['cnic'];
				$email 	= $_POST['email'];
				$password 	= $_POST['password'];
				$contact_no = $_POST['contact_no'];
				$location	=$_POST['location'];
				
				$sql="SELECT * FROM applicants WHERE cnic = $cnic";
				 $result=mysqli_query($con,$sql);
				
				if(mysqli_num_rows($result)>0){
						$response["error"] = TRUE;
						$response["error_msg"] = "User already exist";
						echo json_encode($response);
				}
			else{
					$insertApplicant="INSERT INTO applicants(fname,contact_No,cnic,email,pass_word,location_no) values('$fname','$contact_no' ,'$cnic', '$email','$password','$location')";
					$resulte = mysqli_query($con,$insertApplicant);
					if($resulte){
						 $app_id = mysqli_insert_id($con);
						
						$resultf=mysqli_query($con,"select * from applicants where app_id='$app_id'");
						
						$user=mysqli_fetch_array($resultf);
						$response["error"] = FALSE;
						//$response["app_id"] = $app_id;
						$response["user"]["id"] = $user['app_id'];
						$response["user"]["fname"] = $user['fname'];
						$response["user"]["email"] = $user['email'];
						$response["user"]["cnic"] = $user['cnic'];
						$response["user"]["contact_No"] = $user['contact_No'];
						$response["user"]["location_no"] = $user['location_no'];
						echo json_encode($response);
					}
					else{
						$response["error"] = TRUE;
						$response["error_msg"] = "Error occured in Registration";
						echo json_encode($response);
						}
					
				}
				
				
			}	
			else if($tag=='registeredComplaints'){
				$app_id=$_POST['app_id'];
				$getter="select complaint_no, complaint_date, complaint_status, photo1 from complaints where app_id='$app_id'";
				$allcoms=mysqli_query($con,$getter);
				if($allcoms){
					$response["error"] = FALSE;
					$response["count"]=mysqli_num_rows($allcoms);
					$i=0;
				while($com=mysqli_fetch_array($allcoms)){
							
							$response["com$i"]["com_no"] =$com['complaint_no'];
							$response["com$i"]["complaint_date"] = $com['complaint_date'];
							$response["com$i"]["complaint_status"] = $com['complaint_status'];
							$response["com$i"]["photo"] = $com['photo1'];
							$i++;
							
					}
				echo json_encode($response);
				}
				else{
						$response["error"] = TRUE;
						$response["error_msg"] = "Error occured in getting complaint ro there is no data";
						echo json_encode($response);
						}
			}
				
			else if($tag=='registerComplaint' ){
				$app_id=$_POST['app_id'];
				$cnic=$_POST['cnic'];
				$details  = $_POST['details'];
				$dept 	= $_POST['dept'];
				$address=$_POST['address'];
				$district =$_POST['dist'];
				$photo1=$_POST['photo1'];
				$photo2=$_POST['photo2'];
				$applicantslocation=$_POST['location'];
				$latitude=$_POST['latitude'];
				$logitude=$_POST['logitude'];
				$sql="SELECT app_id FROM applicants WHERE cnic = '$cnic'";
				//$result=mysqli_query($con,$sql);
				//if(mysqli_num_rows($result)>0)
					if($app_id!="" && $cnic!="")
					{
					
							//	$applicant=mysqli_fetch_array($result);
								//$app_id=$applicant['app_id'];
								
								$sql="INSERT INTO complaints(complaint_details,complaint_date,complaint_status,dept_no,app_id)values
									('$details',NOW(),'Qeued','$dept','$app_id')";
										$complaint_result=mysqli_query($con,$sql);
									
									if($complaint_result){
												
										$complaint_no = mysqli_insert_id($con);
										$res=mysqli_query($con,"select * from complaints where complaint_no='$complaint_no'");
										$com=mysqli_fetch_array($res);
										//print_r($com);
										$response["error"] = FALSE;
										$response["com"]["com_no"] =$complaint_no;
										$response["com"]["complaint_details"] = $com['complaint_details'];
										$response["com"]["complaint_date"] = $com['complaint_date'];
										$response["com"]["complaint_status"] = $com['complaint_status'];
										$response["com"]["dept_no"] = $com['dept_no'];
										$response["com"]["app_id"] = $com['app_id'];
										echo json_encode($response);
											
											
									
									}else{
											$response["error"] = TRUE;
										$response["error_msg"] = "Error occured in complaint Registration";
										echo json_encode($response);
										}
				}
			}
			else if($tag=='login' ){
				$cnic  = $_POST['cnic'];
				$pass 	= $_POST['password'];
				$sql="SELECT * from applicants where cnic='$cnic' and pass_word='$pass'";
				$res=mysqli_query($con,$sql);
				
				$rows=mysqli_num_rows($res);
				if($rows==1)
				{
						$appli=mysqli_fetch_array($res);
						
						$response["error"] = FALSE;
						//$response["app"]=$appli['app_id'];
						$response["app"]["cnic"] =$appli['cnic'];
						$response["app"]["name"] = $appli['fname'];
						$response["app"]["id"] = $appli['app_id'];
						echo json_encode($response);
				}
				else{
						$response["error"] = TRUE;
						$response["error_msg"] = "Error occured in login ";
						echo json_encode($response);
				}
			}
			else{
				
				
			}
			
}
else{
	$response["error"] = TRUE;
	$response["error_msg"] = "Required parameter ";
	
	echo json_encode($response);
}


?>