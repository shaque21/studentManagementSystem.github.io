<?php 

require("db.con.php");
if(!isset($_SESSION['USER_NAME'])){
	header("Location:login.php");
	die();
}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SMS Dashboard</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<!-- header section start -->
		<section id="header" class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" style="    text-transform: uppercase;
					font-weight: 600;
					letter-spacing: 1px;
					color: #fff;
					background-color: #007bff;
					padding: 5px 15px;
					box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
				}" href="index.php">Student Management System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary" href="profile.php">
								<i class="fa fa-user-circle-o" aria-hidden="true"></i>
								Welcome <?php echo  $_SESSION['USER_NAME'];?>
							</a>
						</li>
						
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary" href="add_user.php">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
								Add User
							</a>
						</li>
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary" href="profile.php">
								<i class="fa fa-user" aria-hidden="true"></i>
								Profile
							</a>
						</li>
						
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary text-danger" href="logout.php">
								<i class="fa fa-power-off" aria-hidden="true"></i>
								Logout
							</a>
						</li>
						
					</ul>
				</div>
			</nav>
		</section>
		<!-- header section end -->
		<!-- content section start -->
		<div id="main-content" class="container">
			<div class="row">