<?php 
	include('session.php');
	include('library.php');
	$library = new library; 

    if(!isset($_SESSION['login_user'])){
      header("location:login-page.php");
    }

    $department = $_REQUEST['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php $library->head(); ?>	
</head>
<body>
	<br>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="departments.php">Departments</a></li>
			<li><a href="specific-department.php?name=<?=$department?>"><?=$department;?></a></li>
			<li class="active">Registered Students</li>        
		</ol>
		<h2>List of Registered Members</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>ID Number</th>
					<th>Name</th>
					<th>Department</th>
					<th>Course</th>
					<th>RFID UID Number</th>
				</tr>
				<?php
					$i = 0;
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT * FROM students WHERE department ='$department' ORDER BY courseyear, lastname, firstname, middlename ASC ");
						while($row = mysqli_fetch_array($result))
						{
							$i++;
							echo "<tr>";
							echo "<td>" . $i . ".</td>";
							echo "<td>" . $row['id_number']."</td>";
							echo "<td>" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] ."</td>";
							echo "<td>" . $row['department'] . "</td>";
							echo "<td>" . $row['courseyear'] . "</td>";
							echo "<td>" . $row['uid'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
						mysqli_close($con);
				?>
			</table>
		</div><br><br>
		<p class="text-center">Updated Records as of <?php echo "<strong>".date('l\, F jS\, Y ')."</strong>"; ?></p>
	</div>
</body>
</html>