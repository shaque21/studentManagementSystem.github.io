<?php
require("header.php");
require("sidebar.php");
$error_msg = "";
$success_msg = "";
if(isset($_POST['save'])){

		$old = $_POST['oldp'];
		$new = $_POST['newp'];
		$cp = $_POST['cp'];
		if($old == "" || $new == "" || $cp == ""){
			$error_msg= "<div class='alert alert-danger mt-sm-2'>
						All Fields are required !!
					</div>";
		}
		else{
			$sql = "SELECT `password` FROM `user` WHERE id = '{$_SESSION['USER_ID']}'";
			$result = mysqli_query($con, $sql) OR die("Query Failed.");
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)) {
				if($old == $row['password']){
					if($new == $cp){
							$query = "UPDATE `user` SET `password`='{$new}' WHERE `id`='{$_SESSION['USER_ID']}'";
							$result1 = mysqli_query($con, $query) OR die("Query Failed.");
							if($result1){
								$success_msg= "<div class='alert alert-success mt-sm-2'>
						Password Updated Successfully !!.
					</div>";
								}
						}
						else{
								$error_msg="<div class='alert alert-danger mt-sm-2'>New and Confirm password is not matched !!.</div>";
							}
				}
				else{
						$error_msg= "<div class='alert alert-danger mt-sm-2'>Incurrect current password !!.</div>";
					}
				}
				
			}
			
		}
	}
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-key mr-1" aria-hidden="true"></i> UPDATE PASSWORD <small class="text-secondary">Update My Profile Password</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-key mr-1" aria-hidden="true"></i>Update Password</li>
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
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					<h3 class="text-center text-primary mb-sm-2">Update Password</h3>
					<div class="form-group">
						<label for="password">Current Password :</label>
						<input type="password" class="form-control" placeholder="Enter current password" id="old-password" name="oldp" required>
					</div>
					<div class="form-group">
						<label for="password">New Password :</label>
						<input type="password" class="form-control" placeholder="Enter new password" id="new-password" required name="newp">
					</div>
					<div class="form-group">
						<label for="password">Confirm Password :</label>
						<input type="password" class="form-control" placeholder="Confirm password" id="con-password" required name="cp">
					</div>
					<input type="submit" value="Update Password" name="save" class="btn btn-primary btn-block"/>
					
					<?php echo $error_msg; ?>
					<?php echo $success_msg; ?>
					
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