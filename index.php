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
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Change Password</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form-horizontal">
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="course">Username</label>
			    <div class="col-sm-9"> 
			      <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="course">Current Password:</label>
			    <div class="col-sm-9"> 
			      <input type="password" class="form-control" id="password_1" placeholder="Enter current password for security purpose">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="course">New Password:</label>
			    <div class="col-sm-9"> 
			      <input type="password" class="form-control" id="password_2" placeholder="Enter new password">
			    </div>
			  </div>
			  <p class="text-center" id="error"></p>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary change" >Confirm</button>
	      </div>
	    </div>

	  </div>
	</div>
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
			<li class="active">Management</li>        
		</ol>
		<div class="dashboard-container">
			<div class="dashboard-icons"><a href="today-logs.php">
				<img src="images/icons/manual.png" class="img-responsive">
				<h4 class='text-center'><small>Today's Logs</small></h4></a>
			</div>

			<div class="dashboard-icons"><a href="logs.php">
				<img src="images/icons/manual.png" class="img-responsive">
				<h4 class='text-center'><small>Log Students</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="registration.php">
				<img src="images/icons/student.png" class="img-responsive">
				<h4 class='text-center'><small>Registration Page</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="sections.php">
				<img src="images/icons/section.png" class="img-responsive">
				<h4 class='text-center'><small>Add Section</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="profile.php" target="_new">
				<img src="images/icons/profile.png" class="img-responsive">
				<h4 class='text-center'><small>Open Profile</small></h4></a>
			</div>
		</div>

		<br>
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Printable Reports</li>        
		</ol>
		<div class="dashboard-container">
			<div class="dashboard-icons"><a href="daily-logs.php">
				<img src="images/icons/day.png" class="img-responsive">
				<h4 class='text-center'><small>Daily Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="monthly-logs.php">
				<img src="images/icons/month.png" class="img-responsive">
				<h4 class='text-center'><small>Monthly Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="yearly-logs.php">
				<img src="images/icons/year.png" class="img-responsive">
				<h4 class='text-center'><small>Yearly Logs</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="departments.php">
				<img src="images/icons/departments.png" class="img-responsive">
				<h4 class='text-center'><small>By Departments</small></h4></a>
			</div>
		</div>

	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).on("click", ".change", function() { 
			var username = document.getElementById('username').value;
			var password_1 = document.getElementById('password_1').value;
			var password_2 = document.getElementById('password_2').value;
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					username:username,
					password_1:password_1,
					password_2:password_2,
					action:"change_password"
				},
			    }).then(function(data) {
			    	if(data == 'Fail') {
			    		$("#error").removeClass("green");
			    		$("#error").addClass("red");
			    		document.getElementById('error').innerHTML = "The password you entered is incorrect";
			    	}
			    	else {
			    		$("#error").removeClass("red");
			    		$("#error").addClass("green");
			    		document.getElementById('error').innerHTML = "Successfully changed the password for this account";
			    	}
			    });
		});
		$("#myModal").on("hidden.bs.modal", function () {
		   location.reload();
		});
	</script>
</body>
</html>