<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> UPDATE USER <small class="text-secondary">Update My Profile</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update User</li>
				<li class="ml-4"><a href="index.php"><i class="fa fa-tachometer mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-3"><a href="profile.php"><i class="fa fa-user mr-1" aria-hidden="true"></i> Profile</a></li>
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
				<!-- fetch data from database and show on input field -->
				<?php
					if(isset($_GET['eid'])){
					$id = base64_decode($_GET['eid']);
					$sql1 = "SELECT * FROM `user` WHERE `id` = '{$id}'";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						while ($row = mysqli_fetch_assoc($result1)) {
						
				?>
				<form action="save_edit_profile.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					
					<div  class="form-group">
						<label style="font-weight: 600;" for="name">Name : </label>
						<input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter Name" class="form-control" required id="name">
						<input type="hidden" name="id" hidden value="<?php echo $row['id']; ?>" placeholder="Enter Student Name" class="form-control" required id="name">
					</div>
					<div  class="form-group">
						<label style="font-weight: 600;" for="username">Username : </label>
						<input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter Username" class="form-control" required id="username">
					</div>
					<div  class="form-group">
						<label style="font-weight: 600;" for="email">Email : </label>
						<input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email" class="form-control" required id="email">
					</div>
					
					<div class="form-group">
						<input type="submit" name="submit" value="Update Profile" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
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