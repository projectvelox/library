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
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Log Students</h4>
	      </div>
	      <div class="modal-body">
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
				  <hr>
				  <p id="error"></p>
			    </div>
			  </div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary log">Log Student</button>
	      </div>
	    </div>

	  </div>
	</div>

	<div class="container">
		<br> 
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Today's Logs</li>        
		</ol> 
		<h2>Student Logs for <?php echo "<b>".date('l\, F jS\, Y ')."</b>"; ?></h2>
		<div class="text-right">
			<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Log Students <span class="glyphicon glyphicon-plus"></span></button>
		</div>
		<hr>
		<h3>Incomplete Student Logs</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Department</th>
					<th>Course</th>
					<th>Time In</th>
					<th>Time Out</th>
				</tr>
				<?php
					$i = 0;
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%r') AS converted_in,logs.* FROM logs WHERE log_out IS NULL AND DATE(log_in) = CURDATE() ORDER BY id DESC");
						while($row = mysqli_fetch_array($result))
						{
							$i++;
							echo "<tr>";
							echo "<td>" . $i . ".</td>";
							echo "<td>" . $row['student_id'] ."</td>";
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['department'] . "</td>";
							echo "<td>" . $row['course'] . "</td>";
							echo "<td>" . $row['converted_in'] . "</td>";
							echo "<td><button class='btn btn-sm btn-info logout' data-id='".$row['id']."'>Log Out</button></td>";
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
					<th>Department</th>
					<th>Course</th>
					<th>Time In</th>
					<th>Time Out</th>
				</tr>
				<?php
					$i = 0;
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%r') AS converted_in,DATE_FORMAT(log_out, '%r') AS converted_out,logs.* FROM logs WHERE log_out IS NOT NULL AND DATE(log_in) = CURDATE() ORDER BY id DESC");
						while($row = mysqli_fetch_array($result))
						{
							$i++;
							echo "<tr>";
							echo "<td>" . $i . ".</td>";
							echo "<td>" .  $row['student_id'] . "</td>";
							echo "<td>" . $row['name'] . "</td>";
							echo "<td>" . $row['department'] . "</td>";
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

		$(document).on("click", ".logout", function() { 
			var id = $(this).data('id');
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					id:id,
					action:"update-status"
				},
			    }).then(function(data) {
			    	alert("Successfully Logged Student Out");
			    	location.reload();
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