<?php 

require("db.con.php");
if(isset($_POST['submit'])){
	$eid = $_POST['id'];
	$name =  mysqli_real_escape_string($con,$_POST['name']);
	$roll =  mysqli_real_escape_string($con,$_POST['roll']);
	$address =  mysqli_real_escape_string($con,$_POST['address']);
	$mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
	$semester =  mysqli_real_escape_string($con,$_POST['semester']);
	
	if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old-image'];
  }
  else {
    $errors= array();
    $file_name = $_FILES['new-image']['name'];
    $file_size =$_FILES['new-image']['size'];
    $file_tmp =$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $file_name = strtolower($file_name);
    $file_ext=explode('.',$file_name);
    $file_ext = end($file_ext);
    $extensions= array("jpeg","jpg","png");
    $file_name = $name.'.'.$file_name;

    if(in_array($file_ext,$extensions) === false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors) == true){
       move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
       print_r($errors);
       die();
    }
  }
	
		$sql = "UPDATE `student_info` SET `name`='{$name}',`roll`='{$roll}',`semester`='{$semester}',`city`='{$address}',`mobile`='{$mobile}',`photo`='{$file_name}' WHERE `id` = '{$eid}'";
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:update_student.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
		
}
 ?>