<?php 
	require('db.con.php');
	$error_msg="";
	if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = $_POST['password'];

		$query = "SELECT * FROM `user` WHERE email = '{$email}' AND password = '{$password}'";
		$result1 = mysqli_query($con, $query) or die('Query Failed');
		if(mysqli_num_rows($result1) > 0){
			while ($row1 = mysqli_fetch_assoc($result1)){
				$_SESSION['EMAIL'] = $row1['email'];
			    $_SESSION['USER_ID'] = $row1['id'];
			    $_SESSION['USER_NAME'] = $row1['username'];
		    	
		    	header("Location:http://localhost/student_management_system/admin/index.php");
				die();
			    
			}
		}
		else{
			$error_msg =  "<div class='alert alert-danger mt-2'>Please insert valid email and password !</div>";
		}

	}
	mysqli_close($con);

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

	
	<div class="container">
		<h2 class="text-center mt-sm-3">Welcome To Student Management System</h2>
		<div class="form-data row">
			<div class="col-sm-5">
				<form action="" method="POST">
					<h4 class="text-center p-4">Admin Login Form</h4>
					
					<table class="table table-bordered">
					<tr>
						<td>
						<input type="email" name="email" placeholder="Enter email address" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>
						<input type="password" name="password" placeholder="Enter password" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>
							<input class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px; font-weight: 600;" type="submit" name="submit" value="Submit">
							
								<?php if(isset($error_msg)) echo $error_msg; ?>
							
						</td>
					</tr>
					<tr>
						<td>
							<a class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px; font-weight: 500;" href="../index.php"><i class="fa fa-long-arrow-left" style="margin-right: 20px; box-sizing: border-box;" aria-hidden="true"></i> Back to home</a>
						</td>
					</tr>
					<tr>
						<td class="text-center">
							<div class="form-group">
								<p>Don't Have An Account ? Please <a href="registration.php">Sign Up....</a></p>
							</div>
						</td>
					</tr>
					
				</table>
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