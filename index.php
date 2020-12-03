

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student Management System</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div class="container">
		<div class="d-flex justify-content-end mt-sm-2">
			<a class="btn btn-primary" style="font-weight: 600;" href="admin/login.php">Login Admin</a>
		</div>
		<h2 class="text-center mt-sm-3">Welcome To Student Management System</h2>
		<div class="form-data row">
			<div class="col-sm-6">
				<form action="" method="POST">
				<table class="table table-bordered">
					<tr>
						<td colspan="2" class="text-center font-weight-bold"><h2>Student Information</h2></td>
					</tr>
					<tr>
						<td class="font-weight-bold"><label for="choose">Choose Semester</label></td>
						<td>
							<select class="form-control" name="choose" id="choose" required>
								<option value="">Select Semester</option>
								<option value="1">1st</option>
								<option value="2">2nd</option>
								<option value="3">3rd</option>
								<option value="4">4th</option>
								<option value="5">5th</option>
								<option value="6">6th</option>
								<option value="7">7th</option>
								<option value="8">8th</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="font-weight-bold"><label for="roll">Roll</label></td>
						<td>
							<input type="text" name="roll" id="roll" placeholder="Enter Roll [min 7 digit from 0 to 9]" class="form-control" pattern="[0-9]{7}" required>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input class="btn btn-primary btn-block text-uppercase" type="submit" name="submit" style="letter-spacing: 1px; font-weight: 600;" value="Show-Info"></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
		<?php 

if(isset($_POST['submit'])){
	require("admin/db.con.php");
	$roll = $_POST['roll'];
	$sql = "SELECT * FROM `student_info` WHERE roll = '{$roll}'";
	$result = mysqli_query($con, $sql) OR die("Query Failed");
	if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
		
?>
		<div class="row mt-3">
			<div class="col-sm-8 offset-sm-2">
				<div class="table-responsive">
					<table class="table table-bordered">
							<tr>
								<td rowspan="5" class="text-center"><img style="height: 150px;width: 150px;" src="admin/upload/<?php echo $row['photo']; ?>" alt=""></td>
							</tr>
							<tr>
								<td>Name</td>
								<td><?php echo $row['name']; ?></td>
							</tr>
							<tr>
								<td>Semester</td>
								<td><?php echo $row['semester']; ?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><?php echo $row['city']; ?></td>
							</tr>
							<tr>
								<td>Contact Info</td>
								<td><?php echo $row['mobile']; ?></td>
							</tr>
					</table>
				</div>
			</div>
		</div>
	<?php }
	else{
		echo '<div class="alert alert-danger col-sm-6 offset-3" role="alert">
					No Records found!!!
				</div>';
	}

	} ?>
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
