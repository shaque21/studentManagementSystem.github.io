<?php 
require("db.con.php");
				if(isset($_POST['submit'])){
					$name = $_SESSION['USER_NAME'];
					if (isset($_FILES['photo'])) {
					  $errors= array();
					  $file_name = $_FILES['photo']['name'];
					  $file_size =$_FILES['photo']['size'];
					  $file_tmp =$_FILES['photo']['tmp_name'];
					  $file_type=$_FILES['photo']['type'];
					  $file_name = strtolower($file_name);
					  $file_ext=explode('.',$file_name);
					  $file_ext = end($file_ext);
					  $extensions= array("jpeg","jpg","png");
					  $file_name = $name.'.'.$file_ext;

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
					$pic_sql = "UPDATE `user` SET `photo`='{$file_name}' WHERE `username` = '{$name}'";
					$result_pic = mysqli_query($con,$pic_sql) OR die("Query Failed.");
					if($result_pic){
						header("Location:http://localhost/student_management_system/admin/profile.php");
					}
				}

				 ?>