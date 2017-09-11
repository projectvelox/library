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
	<style type="text/css">
		body { 
			background: url(images/slider/bg.jpg);
		    background-repeat: no-repeat;
		    background-size: cover;
		}
		.breadcrumb {
		    background-color: rgba(0, 0, 0, 0.52);
		    border-radius: 0px;
		}
		h4 small { color: #ef8304; }
	</style>
	<div class="container">
		<br>
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="departments.php">Departments</a></li>
			<li><a href="specific-department.php?name=<?=$department?>"><?=$department;?></a></li>
			<li class="active">Monthly Logs</li>        
		</ol>
		<div class="dashboard-container">
			<?php 
				$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
				$result = mysqli_query($con,"SELECT CONCAT(MONTHNAME(log_in), ' ', YEAR(log_in)) AS monthly FROM logs WHERE department='$department' GROUP BY CONCAT(MONTHNAME(log_in), ' ', YEAR(log_in)) ORDER BY MONTHNAME(log_in), YEAR(log_in) ASC");
				foreach($result as $row){
					echo'<div class="dashboard-icons"><a href="detailed-monthly-logs.php?month='.$row['monthly'].'">';
					echo'<img src="images/icons/month.png" class="img-responsive">';
					echo'<h4 class="text-center"><small>'.$row['monthly'].' Logs</small></h4></a>';
					echo'</div>';
				}
			?>
		</div>

	</div>
</body>
</html>