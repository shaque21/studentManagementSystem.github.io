<?php 
	session_start();
	$host ="localhost";
	$uname ="root";
	$pass ="";
	$dbname ="student_management_system";
	$con = mysqli_connect("$host", "$uname", "$pass", "$dbname") OR die("Connection failed." . mysqli_connect_error());

 ?>