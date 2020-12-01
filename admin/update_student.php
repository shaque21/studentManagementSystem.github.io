<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> UPDATE STUDENT <small class="text-secondary">Update Student</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update Student</li>
				<li class="ml-4"><a href="index.php"><i class="fa fa-tachometer mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-3"><a href="all_student.php"><i class="fa fa-globe  mr-1" aria-hidden="true"></i> All Students</a></li>
			</ol>
		</nav>
		<?php
				//Check for success flag in get query param
				if(isset($_GET['ok'])){
				$ok = $_GET['ok'];
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success text-center" role="alert">
						Data Updated Successfully.
				</div>';
				}
			}
		?>
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">
				<?php
					if(isset($_GET['eid'])){
					$id = base64_decode($_GET['eid']);
					$sql1 = "SELECT * FROM `student_info` WHERE `id` = '{$id}'";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						while ($row = mysqli_fetch_assoc($result1)) {
						
				?>
				<form action="save-update.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					
					<div  class="form-group">
						<label class="font-weight-bold" for="name">Student Name : </label>
						<input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter Student Name" class="form-control" required id="name">
						<input type="hidden" name="id" hidden value="<?php echo $row['id']; ?>" placeholder="Enter Student Name" class="form-control" required id="name">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="roll">Student Roll : </label>
						<input type="text" name="roll" value="<?php echo $row['roll']; ?>" id="roll" placeholder="Enter Roll [min 8 digit from 0 to 9]" class="form-control" pattern="[0-9]{7}" required>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="address">Address : </label>
						<input type="text" name="address" value="<?php echo $row['city']; ?>" placeholder="Enter Student's Address" class="form-control" required id="address">
						<?php if (isset($error_msg_user)) {echo $error_msg_user;}  ?>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="mobile">Mobile : </label>
						<input type="text" name="mobile" placeholder="0 1 *********" class="form-control" required id="mobile" value="<?php echo $row['mobile']; ?>" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="semester">Semester : </label>
						<select class="form-control" name="semester" id="semester" required>
							<option value="">Select Semester</option>
							<option <?php echo $row['semester']=='1st'?'selected':''; ?> value="1st">1st</option>
							<option <?php echo $row['semester']=='2nd'?'selected':''; ?> value="2nd">2nd</option>
							<option <?php echo $row['semester']=='3rd'?'selected':''; ?> value="3rd">3rd</option>
							<option <?php echo $row['semester']=='4th'?'selected':''; ?> value="4th">4th</option>
							<option <?php echo $row['semester']=='5th'?'selected':''; ?> value="5th">5th</option>
							<option <?php echo $row['semester']=='6th'?'selected':''; ?> value="6th">6th</option>
							<option <?php echo $row['semester']=='7th'?'selected':''; ?> value="7th">7th</option>
							<option <?php echo $row['semester']=='8th'?'selected':''; ?> value="8th">8th</option>
						</select>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="photo">Photo : </label>
						<input type="file" name="new-image" class="form-control" required id="new-image">
						<img  src="upload/<?php echo $row['photo']; ?>" height="150px">
						<input type="file" name="old-image" class="form-control" hidden id="old-image">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update Student" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
					</div>
					
				</form>
				<?php
				}
				}
				} ?>
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