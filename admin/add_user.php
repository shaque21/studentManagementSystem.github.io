<?php  

require("db.con.php") ;
$error_msg = "";
$error_msg_user = "";
$success_msg = "";

if(isset($_POST['submit'])){
	$name =  mysqli_real_escape_string($con,$_POST['name']);
	$email =  mysqli_real_escape_string($con,$_POST['email']);
	$input_username =  mysqli_real_escape_string($con,$_POST['username']);
	$p =  $_POST['password'];
	$cp =  $_POST['conPassword'];
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
	  $file_name = $input_username.'.'.$file_name;

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
	
	$user_sql = "SELECT *  FROM `user` WHERE `username` = '{$input_username}'";
	$result_sql = mysqli_query($con, $user_sql) OR die("Username Query Failed.");
	if(mysqli_num_rows($result_sql) > 0){
		$error_msg_user = "<p style='color: red;'> *This username already taken ! please try another username.</p>";

	}
	else if($p != $cp){
		$error_msg = "<p style='color: red;'> *Password not matched !</p>";
	}
	else{
		$sql = "INSERT INTO `user`(`name`, `username`, `email`, `password`, `photo`) VALUES (
			'{$name}','{$input_username}','{$email}','{$p}','{$file_name}')";

		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:http://localhost/student_management_system/admin/all_user.php");
			exit;
			
		}
		mysqli_close($con);
	}
		
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add User Form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	
	<div class="container">
		<h1 class="text-center mt-sm-2">Welcome To Student Management System</h1>
		<div class="form-data row">
			<div class="col-sm-8">
				<form style="padding: 40px;margin-top: 15px;" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
					<h2 class="text-center">User Registration Form</h2>
					<div  class="form-group">
						<label class="font-weight-bold" for="name">Name : </label>
						<input type="text" name="name" placeholder="Enter Name" class="form-control" required id="name">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="email">Email : </label>
						<input type="email" name="email" placeholder="Enter Email" class="form-control" required id="email">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="username">Username : </label>
						<input type="text" name="username" placeholder="Enter Username" class="form-control" required id="username">
						<?php if (isset($error_msg_user)) {echo $error_msg_user;}  ?>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="password">Password : </label>
						<input type="password" name="password" placeholder="Enter Password" class="form-control" required id="password">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="conPassword">Confirm Password : </label>
						<input type="password" name="conPassword" placeholder="Enter Confirm Password" class="form-control" required id="conPassword">
						<?php if (isset($error_msg)) {echo $error_msg;}  ?>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="photo">Photo : </label>
						<input type="file" name="photo" class="form-control" required id="photo">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Registration" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px; font-weight: 600;">
					</div>
				</form>
			</div>
		</div>
		<footer id="footer">
			<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
		</footer>
	</div>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>