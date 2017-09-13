<?php $section = $_REQUEST['name']; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ACCESS | Henry Luce III Library RFID-Based Sentry System</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="images/logo.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"/> 
</head>
<body onload="start()" style="height: auto;">
	<div class="container">
		<h2 class="text-center"><b><?=$section?>'s <?=$_GET['month']?> Logs</b></h2>

		<h3>Incomplete Student Logs</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Course and Year</th>
					<th>Time In</th>
					<th>Time Out</th>
				</tr>
				<?php
					$i = 0;
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$month = $_GET['month'];
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%M %e, %Y %H:%i %p') AS converted_in,logs.* FROM logs WHERE section='$section' AND log_out IS NULL AND CONCAT(MONTHNAME(log_in), ' ', YEAR(log_in)) = '$month'");
						while($row = mysqli_fetch_array($result))
						{
							$i++;
							echo "<tr>";
							echo "<td>" . $i . ".</td>";
							echo "<td>".$row['student_id']."</td>";
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['course'] . "</td>";
							echo "<td>" . $row['converted_in'] . "</td>";
							echo "<td>Not Yet</td>";
							echo "</tr>";
						}
						echo "</table>";
						mysqli_close($con);
				?>
			</table>
		</div>
		<hr>

		<h3>Completed Student Logs</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Course and Year</th>
					<th>Time In</th>
					<th>Time Out</th>
				</tr>
				<?php
					$i = 0;
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%M %e, %Y %H:%i %p') AS converted_in,DATE_FORMAT(log_out, '%M %e, %Y %H:%i %p') AS converted_out,logs.* FROM logs WHERE section='$section' AND log_out IS NOT NULL AND CONCAT(MONTHNAME(log_in), ' ', YEAR(log_in)) = '$month'");
						while($row = mysqli_fetch_array($result))
						{
							$i++;
							echo "<tr>";
							echo "<td>" . $i . ".</td>";
							echo "<td>".$row['student_id']."</td>";
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['course'] . "</td>";
							echo "<td>" . $row['converted_in'] . "</td>";
							echo "<td>" . $row['converted_out'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
						mysqli_close($con);
				?>
			</table>
		</div>
	</div>
	<script type="text/javascript">	function start() { 	window.print(); } </script>
</body>
</html>