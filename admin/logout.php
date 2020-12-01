<?php 

	require("db.con.php");
	session_start();
	session_unset();

  	session_destroy();

	header("Location:http://localhost/student_management_system/admin/login.php");
	die();

 ?>