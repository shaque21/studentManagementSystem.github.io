<?php
require("db.con.php");
$sql = "SELECT * FROM `student_info` WHERE roll = '{$roll}'";
$result = mysqli_query($con, $sql) OR die("Query Failed");
$output = "";
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	$output = '<table class="table table-bordered">
				<tr>
						<td rowspan="5" class="text-center"><img src="upload/{$row["photo"]}" alt=""></td>
				</tr>
				<tr>
						<td>Name</td>
						<td>{$row["name"]}</td>
				</tr>
				<tr>
						<td>Semester</td>
						<td>{$row["semester"]}</td>
				</tr>
				<tr>
						<td>Address</td>
						<td>{$row["city"]}</td>
				</tr>
				<tr>
						<td>Contact Info</td>
						<td>{$row["mobile"]}</td>
				</tr>
			</table>';
	mysqli_close($con);
	echo $output;
}
?>