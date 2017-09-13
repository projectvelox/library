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
		.navbar-inverse {
		    background-color: rgba(255, 255, 255, 0);
		    border-color: rgba(8, 8, 8, 0);
		}
		h4 small { color: #ef8304; }
		.red { color: red; }
		.green { color: green; }
	</style>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top"> 
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">Henry Luce III Library</a>
		    </div>
		    <div id="navbar"  class="navbar-collapse collapse navbar-right">
		      	<ul class="nav navbar-nav">
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $name ?><span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="index.php">Dashboard</a></li>
			            <li role="separator" class="divider"></li>
			            <li class="dropdown-header">Account</li>
			            <li><a data-toggle="modal" data-target="#myModal">Settings</a></li>
			            <li><a href="logout.php">Logout</a></li>
			          </ul>
			        </li>
		        </ul>
		    </div>
		  </div>
		</nav>
		<br><br><h2 class="text-center" style="color: #fff;"><b>Henry Luce III Library RFID-Based Sentry System</b></h2>
		<br>
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="departments.php">Departments</a></li>
			<li class="active"><?= $department; ?></li>        
		</ol>
		<div class="dashboard-container">
			<div class="dashboard-icons"><a href="specific-daily-logs.php?name=<?=$department; ?>">
				<img src="images/icons/day.png" class="img-responsive">
				<h4 class='text-center'><small>Daily Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="specific-monthly-logs.php?name=<?=$department; ?>">
				<img src="images/icons/month.png" class="img-responsive">
				<h4 class='text-center'><small>Monthly Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="specific-yearly-logs.php?name=<?=$department; ?>">
				<img src="images/icons/year.png" class="img-responsive">
				<h4 class='text-center'><small>Yearly Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="specific-registered-student.php?name=<?=$department; ?>">
				<img src="images/icons/profile.png" class="img-responsive">
				<h4 class='text-center'><small>Registered Student</small></h4></a>
			</div>
		</div>

	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>