<?php
require("header.php");
require("sidebar.php");
$error_msg = "";
$error_msg_user = "";
$success_msg = "";
if(isset($_POST['submit'])){
	$name =  mysqli_real_escape_string($con,$_POST['name']);
	$roll =  mysqli_real_escape_string($con,$_POST['roll']);
	$address =  mysqli_real_escape_string($con,$_POST['address']);
	$mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
	$semester =  mysqli_real_escape_string($con,$_POST['semester']);
	
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
	
		$sql = "INSERT INTO `student_info`(`name`, `roll`, `semester`, `city`, `mobile`, `photo`) VALUES (
			'{$name}','{$roll}','{$semester}','{$address}','{$mobile}','{$file_name}')";
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:add_student.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
		
}
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-plus-circle  mr-3" aria-hidden="true"></i>ADD STUDENT <small class="text-secondary">Add Student</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle  mr-3" aria-hidden="true"></i>Add Student</li>
				<li class="ml-4"><a href="index.php"><i class="fa fa-tachometer mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="all_student.php"><i class="fa fa-globe mr-1" aria-hidden="true"></i> All Students</a></li>
			</ol>
		</nav>

				<?php
				//Check for success flag in get query param
				$ok = isset($_GET['ok']);
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success" role="alert">
					Data Inserted Successfully..
				</div>';
				}
				?>
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">
				<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					<div  class="form-group">
						<label class="font-weight-bold" for="name">Student Name : </label>
						<input type="text" name="name" placeholder="Enter Student Name" class="form-control" required id="name">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="roll">Student Roll : </label>
						<input type="text" name="roll" id="roll" placeholder="Enter Roll [min 8 digit from 0 to 9]" class="form-control" pattern="[0-9]{7}" required>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="address">Address : </label>
						<input type="text" name="address" placeholder="Enter Student's Address" class="form-control" required id="address">
						<?php if (isset($error_msg_user)) {echo $error_msg_user;}  ?>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="mobile">Mobile : </label>
						<input type="text" name="mobile" placeholder="0 1 *********" class="form-control" required id="mobile" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="semester">Semester : </label>
						<select class="form-control" name="semester" id="semester" required>
							<option value="">Select Semester</option>
							<option value="1st">1st</option>
							<option value="2nd">2nd</option>
							<option value="3rd">3rd</option>
							<option value="4th">4th</option>
							<option value="5th">5th</option>
							<option value="6th">6th</option>
							<option value="7th">7th</option>
							<option value="8th">8th</option>
						</select>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="photo">Photo : </label>
						<input type="file" name="photo" class="form-control" required id="photo">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Student" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>
<!-- main content end -->
<!-- main content end -->
<?php require("footer.php"); ?>