<?php 
	include('session.php');
	include('library.php');
	$library = new library; 

    if(!isset($_SESSION['login_user'])){
      header("location:login-page.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<?php $library->head(); ?>
</head>
<body onload="start()" style="height: auto;">
	<div class="container">
		<h2 class="text-center">Student Logs for <?php echo "<b>".date('l\, F jS\, Y ')."</b>"; ?></h2>

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
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%r') AS converted_in,logs.* FROM logs WHERE log_out IS NULL AND DATE(log_in) = CURDATE()");
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
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%r') AS converted_in,DATE_FORMAT(log_out, '%r') AS converted_out,logs.* FROM logs WHERE log_out IS NOT NULL AND DATE(log_in) = CURDATE()");
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