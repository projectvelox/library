<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1);

	include('library.php');
	$library = new library; 
?>

<!DOCTYPE html>
<html>
<head>
	<?php $library->head(); ?>		
</head>
<style type="text/css">
		body { 
			background: url(images/slider/bg.jpg);
		    background-repeat: no-repeat;
		    background-size: cover;
		}
		h4 small { color: #ef8304; }
	</style>
<body>
	<div class="container">
		<br><h2 style="color: #fff"><span class="glyphicon glyphicon-log-in"></span> Admin Login</h2><hr>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<form class="form-horizontal" action="login.php" method="post">
			  <div class="form-group">
			    <label style="color: #fff" class="control-label col-sm-2" for="username">Username:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label style="color: #fff" class="control-label col-sm-2" for="password">Password:</label>
			    <div class="col-sm-10"> 
			      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Login</button>
			    </div>
			  </div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h4  style="margin-top: 0px; color: #fff">Friendly Reminder:</h4>
			<h4><small>To keep the students from manipulating the data, we have taken safety precautions. Please enter the username and password that was given to you by and Admin to continue using the system.<small></h4>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</body>
</html>