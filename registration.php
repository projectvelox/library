<?php 
	include('session.php');
	include('library.php');
	$library = new library; 

    if(!isset($_SESSION['login_user'])){
      header("location:login-page.php");
    }
    $con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess"); 
?>
<!DOCTYPE html>
<html>
<head>
	<?php $library->head(); ?>
	<script src="js/donut/raphael-min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/donut/morris-0.4.1.min.js"></script>	
</head>
<body>
	<div class="container">
		<br> 
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Registration Page</li>        
		</ol>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<form class="form-horizontal">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="student_id">Id Number:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="student_id" placeholder="Enter ID Number">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="lastname">Last Name:</label>
				    <div class="col-sm-9"> 
				      <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="firstname">First Name:</label>
				    <div class="col-sm-9"> 
				      <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="middlename">Middle Name:</label>
				    <div class="col-sm-9"> 
				      <input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="department">Department:</label>
				    <div class="col-sm-9"> 
					  <select class="form-control" id="department">
					  	<option selected disabled>Select a department</option>
					  	<?php 
					  		$result = mysqli_query($con,"SELECT * FROM departments ORDER BY department ASC");
					  		foreach($result as $row){
					  			echo '<option data-department="'.$row['department'].'">'.$row['department'].'</option>';
					  		}
					  	?>
					  </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="course">Course:</label>
				    <div class="col-sm-9"> 
				      <select class="form-control" id="course" disabled>
				      	<option selected disabled>Choose a department first</option>
					  </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="schoolyear">School Year:</label>
				    <div class="col-sm-9"> 
				    <input type="text" class="form-control" id="schoolyear" disabled value="<?php echo date("Y").'-'.date('Y', strtotime('+1 year'));;?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="semester">Semester:</label>
				    <div class="col-sm-9"> 
					  <select class="form-control" id="semester">
					  	<option selected disabled>Select a semester</option>
					  	<option>1st Semester</option>
					  	<option>2nd Semester</option>
					  	<option>Summer</option>
					  </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="uid">RFID UID Number:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="uid" placeholder="Enter RFID UID Number">
				    </div>
				  </div>
				  <div class="form-group">
				  	<label for="fileToUpload" class="control-label col-sm-3">Profile Photo</label><br />
      				<div class="col-sm-9">
      					<input id="file" type="file" name="file" style="margin-top: -13px;" />
			      	</div>
				  </div>
				  <div class="text-right">
				  	<button type="button" class="btn btn-primary register">Register Record</button>
				  </div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h2>Registration Page</h2>
				<p>Please fill up the fields indicated on the left so that the data of the member inputted will be saved to the database.</p><hr>
				<h2>Records</h2>
				<a href="student-records.php" style="display: block; margin-bottom: -30px;">View Records</a>
				<div id="donut-example-2" style="width: 19em !important; margin: 0px auto;"> </div>

			</div>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">

		function uploadFile(){
		  var input = document.getElementById("file");
		  file = input.files[0];
		  if(file != undefined){
		    formData= new FormData();
		    if(!!file.type.match(/image.*/)){
		      var student_id = document.getElementById("student_id");
		      formData.append("image", file, student_id.value + '.jpg');
		      $.ajax({
		        url: "uploads.php",
		        type: "POST",
		        data: formData,
		        processData: false,
		        contentType: false
		    	}).then(function(data) {
				    alert(data);
		      });
		    } else { alert('Not a valid image!'); }
		  	} else { alert('Input something!'); }
		}

		$('#department').change(function(){
		   	var department = $('select#department').find(':selected').data('department');
			$.ajax({type:"POST",url:"ajax.php",
		   		data: {
		   			department:department,
		   			action: "retrieve_course"
		   		},
			    }).then(function(data) {
				    $('#course').prop('disabled', false);
			    	$('#course').html(data);
			    }); 
		});				 

		$(document).on("click", ".register", function() { 
			var student_id = document.getElementById('student_id').value;
			var lastname = document.getElementById('lastname').value;
			var firstname = document.getElementById('firstname').value;
			var middlename = document.getElementById('middlename').value;
			var department = $('select#department').find(':selected').data('department');
			var course = $('select#course').find(':selected').data('course');
			var schoolyear = document.getElementById('schoolyear').value;
			var semester = document.getElementById('semester').value;
			var uid = document.getElementById('uid').value;
			var name = firstname + " " + middlename + " " + lastname;
		
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					student_id:student_id,
					lastname:lastname,
					firstname:firstname,
					middlename:middlename,
					department:department,
					course:course,
					schoolyear:schoolyear,
					semester:semester,
					uid:uid,
					action:"register-students"
				},
			    }).then(function(data) {
			    	uploadFile();
			    	alert("Successfully Registered " + name + " to the Database!" );
			    	location.reload();
			    }); 
		});
		
	</script>
	<script>
		Morris.Donut({
		  element: 'donut-example-2',
		  data: [
		  	<?php
		  		$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess"); 
				$result1 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear != "Faculty" AND courseyear != "Alumni")');
				$result2 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear = "Alumni")');
				$result3 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear = "Faculty")');
				$result4 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear = "Staff")');
	      		$students=mysqli_fetch_assoc($result1);
				$alumni=mysqli_fetch_assoc($result2);
				$faculty=mysqli_fetch_assoc($result3);
				$staff=mysqli_fetch_assoc($result4);
	      		echo "{label: 'Students', value: ".$students['counted']."},{label: 'Alumni', value: ".$alumni['counted']."},{label: 'Faculty', value: ".$faculty['counted']."},{label: 'Staffs', value: ".$staff['counted']."}";
      		?>
		  ]
		}); 
	</script>
</body>
</html>

<!-- Unedited or Undocumented Code -->
<!-- 
$result1 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear != "Faculty" AND courseyear != "Alumni")');
$students=mysqli_fetch_assoc($result1);

$result2 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear = "Alumni")');
$alumni=mysqli_fetch_assoc($result2);

$result3 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students WHERE department IS NOT NULL AND (courseyear = "Faculty")');
$faculty=mysqli_fetch_assoc($result3);

$result4 = mysqli_query($con,'SELECT COUNT(*) AS counted FROM students');
$total=mysqli_fetch_assoc($result4);

echo "<h3><small>Students Registered: " . $students['counted']. "</small></h3>";
echo "<h3><small>Alumni Registered: " . $alumni['counted'] . "</small></h3>";
echo "<h3><small>Faculty Registered: " . $faculty['counted'] . "</small></h3>";
echo "<h3><small>Total Registered: " . $total['counted'] . "</small></h3>"; 
-->