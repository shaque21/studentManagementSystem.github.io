<?php 

require("header.php");
require("sidebar.php");

 ?>
				<!-- main content start -->
				<div class="col-sm-9 p-4">
					<div class="content">
						<h2 class="text-primary"><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Dashboard <small class="text-secondary">Statistics Overview</small></h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Dashboard</li>
							</ol>
						</nav>
						<!-- fetch all data from student and user table -->
						<?php 

						$sql = "SELECT * FROM `user`";
						$user_result = mysqli_query($con,$sql) OR die("User Query Failed");
						$total_user = mysqli_num_rows($user_result);
						$sql_student = "SELECT * FROM `student_info`";
						$student_result = mysqli_query($con,$sql_student) OR die("User Query Failed");
						$total_student = mysqli_num_rows($student_result);
						 ?>
						<div class="row">
							<div class="col-md-4 card-section">
								<div class="card text-center">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fa fa-globe  mr-3" aria-hidden="true"></i> Students
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Students</h5>
										<p class="card-text">
											<?php 
										
										if($total_student < 10){
											$total_student = '0'.$total_student;
										}
										echo $total_student; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="all_student.php" class="btn btn-primary">View All Students <i class="fa fa-arrow-right" style="font-weight: 400;" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 card-section">
								<div class="card text-center">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fa fa-users  mr-3" aria-hidden="true"></i> Users
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Users</h5>
										<p class="card-text"><?php 
										
										if($total_user < 10){
											$total_user = '0'.$total_user;
										}
										echo $total_user; 
										?>
											
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="all_user.php" class="btn btn-primary">View All Users <i class="fa fa-arrow-right" style="font-weight: 400;" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<hr class="my-4">
					<h4>New Student</h4>
					<div class="table-responsive">
						<table id="example" class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Roll</th>
									<th>Semester</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Photo</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sql1 = "SELECT * FROM `student_info` ORDER BY `id` DESC";
								$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
								if(mysqli_num_rows($result1) > 0){
									$i=1;
									?>
								<tr>
									<?php while ($row1 = mysqli_fetch_assoc($result1)) {
									   ?>
									<td><?php
									if($i < 10){
										$i = '0'.$i;
									}
									echo $i;
									  ?></td>
									<td><?php echo $row1['name']; ?></td>
									<td><?php echo ucwords($row1['roll']); ?></td>
									<td><?php echo $row1['semester']; ?></td>
									<td><?php echo $row1['mobile']; ?></td>
									<td><?php echo ucwords($row1['city']); ?></td>
									<td style="height: 100px; width: 100px;" class="text-center"><img style="width: 80%; height: 80%;" src="upload/<?php echo $row1['photo']; ?>" alt=""></td>
								</tr>

							<?php
							$i++; }
						}?>
							</tbody>
						</table>
					</div>

					<footer id="footer" class="mt-5">
						<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
					</footer>
				</div>
				<!-- main content end -->

<?php require("footer.php"); ?>