<?php 

require("db.con.php");
if(isset($_POST['submit'])){
	$eid = $_POST['id'];
	$name =  mysqli_real_escape_string($con,$_POST['name']);
	$u_name =  mysqli_real_escape_string($con,$_POST['username']);
	$email =  mysqli_real_escape_string($con,$_POST['email']);
	
	
	
		$sql = "UPDATE `user` SET `username` = '{$u_name}', `name` = '{$name}', `email` = '{$email}' WHERE `id` = '{$eid}'";
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:http://localhost/student_management_system/admin/edit_profile.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
		
}
 ?>