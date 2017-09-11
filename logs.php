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
	<style type="text/css">
		.bordify {
			border: 1px solid #eee;
		    padding: 15px 15px;
		}
	</style>
</head>
<body>
	<div class="container">
	<br> 
	<ol class="breadcrumb">
		<li><a href="index.php">Dashboard</a></li>
		<li class="active">Log Student</li>        
	</ol>
	<h2>Log Students</h2><hr>
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<form class="form-horizontal">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="student_id">Id Number:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="student_id" placeholder="Enter Student Id / Alumni Id / Faculty Id">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control studentname" id="name" placeholder="Enter Student Name / Alumni Name / Faculty Name (e.g Firstname Middlename Lastname)">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="course">Department</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control studentdepartment" id="department" placeholder="Enter Department">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="course">Course:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control studentcourse" id="course" placeholder="Enter Course / Alumni / Faculty (e.g Bachelor of Science in Computer Science / Alumni / Faculty)">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="section">Section:</label>
			    <div class="col-sm-10"> 
				  <select class="form-control" id="section">
				  	<option selected disabled>Select a section</option>
				  	<?php 
				  		$test = mysqli_query($con,"SELECT * FROM section");
				  		foreach($test as $rows){
				  			echo '<option data-section="'.$rows['name'].'">'.$rows['name'].'</option>';
				  		}
				  	?>
				  </select>
				  <br><button type="button" class="btn btn-primary log">Log Students</button><hr>
				  <p id="error"></p>
			    </div>
			  </div>
			</form>
		</div>
		<div class="col-xs-12 col-md-4">
			<h3>Instructions</h3>
			<p>Just fill up the fields below; Start with the Student Id, then click anywhere below to search if you are already registered in the database. It is recommended that you register to the system first if you are not registered yet.</p>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="bordify text-center">
						<h5>Students Entries / Hr:</h5>
						<?php 
							$record = mysqli_query($con, "SELECT COUNT(*) AS counted FROM logs GROUP BY HOUR(log_in) ORDER BY id DESC LIMIT 1");
							$row=mysqli_fetch_assoc($record);
							echo '<h2>'.$row['counted'].'</h2>';
						?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="bordify text-center">
						<h5>Students Entries / Day:</h5>
						<?php 
							$record = mysqli_query($con, "SELECT COUNT(*) AS counted FROM logs GROUP BY DAY(log_in) ORDER BY id DESC LIMIT 1");
							$row=mysqli_fetch_assoc($record);
							echo '<h2>'.$row['counted'].'</h2>'; 
						?>
					</div>
				</div>
			</div> 

		</div>
	</div>

	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#student_id').change(function(){
			var student_id = document.getElementById('student_id').value;		   
		  	
		  	$.ajax({type:"POST",url:"ajax.php",
		   		data: {
		   			student_id:student_id,
		   			action: "automate"
		   		},
			    }).then(function(data) {
			    	 $('.studentname').val(data);
			    });

			$.ajax({type:"POST",url:"ajax.php",
		   		data: {
		   			student_id:student_id,
		   			action: "automate-course"
		   		},
			    }).then(function(data) {
			    	 $('.studentcourse').val(data);
			    }); 

			$.ajax({type:"POST",url:"ajax.php",
		   		data: {
		   			student_id:student_id,
		   			action: "automate-department"
		   		},
			    }).then(function(data) {
			    	 $('.studentdepartment').val(data);
			    });      

		});

		$(document).on("click", ".log", function() { 
			var student_id = document.getElementById('student_id').value;
			var name = document.getElementById('name').value;
			var department = document.getElementById('department').value;
			var course = document.getElementById('course').value;
			var section = $('select#section').find(':selected').data('section');

			if(student_id === " " || student_id.length != "10" || name === " " || department === " " || course === " " || section === " " ){
				document.getElementById('error').innerHTML = "Fill Up Everything First!";
				$("#error").removeClass("text-success");
				$("#error").addClass("text-danger");
			}
			else {
				//alert(student_id + " " + name + " " + department + " " + course + " " + " " + section + " " + student_id.length);
				$.ajax({type:"POST",url:"ajax.php",
				data: {
					student_id:student_id,
					name:name,
					department:department,
					course:course,
					section:section,
					action:"log-students"
				},
			    }).then(function(data) {
			    	alert("Successfully Logged Students");
			    	resetAllValues();
			    	$("#error").removeClass("text-danger");
					$("#error").addClass("text-success");
			    });

			}
			
			function resetAllValues() {
			  $('.form-horizontal').find('input:text').val('');
			}

		});
	</script>
</body>
</html>