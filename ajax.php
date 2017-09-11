<?php 
	$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");	

	if($_POST["action"]=="update-status"){
		$id = $_POST['id'];
		$sql = "UPDATE logs SET log_out=CURRENT_TIMESTAMP() WHERE id=$id";
		$result = mysqli_query($con,$sql);
	}

	if($_POST["action"]=="add-section"){
		$section = $_POST['section'];
		$sql = "INSERT INTO section(name) VALUES ('$section')";
		$result = mysqli_query($con,$sql);
	}

	if($_POST["action"]=="log-students"){
		$student_id = $_POST['student_id'];
		$name = $_POST['name'];
		$department = $_POST['department'];
		$course = $_POST['course'];
		$section = $_POST['section'];

		$sql = "INSERT INTO logs(student_id, name, department, course, log_in, section) VALUES ('$student_id', '$name', '$department', '$course', CURRENT_TIMESTAMP(), '$section')";
		$result = mysqli_query($con,$sql);
	}

	if($_POST["action"]=="automate"){
		$student_id = $_POST['student_id'];

		$sql = "SELECT * FROM students WHERE id_number='$student_id'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);

		echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
	}

	if($_POST["action"]=="automate-course"){
		$student_id = $_POST['student_id'];

		$sql = "SELECT * FROM students WHERE id_number='$student_id'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);

		echo $row['courseyear'];
	}

	if($_POST["action"]=="automate-department"){
		$student_id = $_POST['student_id'];

		$sql = "SELECT * FROM students WHERE id_number='$student_id'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);

		echo $row['department'];
	}

	if($_POST["action"]=="register-students"){
		$student_id = $_POST['student_id'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$department = $_POST['department'];
		$course = $_POST['course'];
		$schoolyear = $_POST['schoolyear'];
		$semester = $_POST['semester'];
		$uid = $_POST['uid'];

		$sql = "INSERT INTO students(id_number,lastname, firstname, middlename, department, courseyear, schoolyear, semester, uid) VALUES ('$student_id', '$lastname', '$firstname', '$middlename', '$department', '$course', '$schoolyear', '$semester', '$uid')";
		$result = mysqli_query($con,$sql);
	}

	if($_POST["action"]=="retrieve_course") {
		$department = $_POST['department'];
		$results = mysqli_query($con,"SELECT * FROM course_list WHERE department='$department' ORDER BY course ASC");
		echo "<option selected disabled>Select a course</option>";	
		while($row = mysqli_fetch_array($results))
		{
			$course = $row['course'];
			echo "<option data-course='".$course."'>".$course."</option>";
		}
	}

	if($_POST["action"]=="change_password") {
		$username = $_POST['username'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$results = mysqli_query($con,"SELECT * FROM accounts WHERE username='$username' AND password='$password_1'");
		if(mysqli_num_rows($results) == 1){
			$results = mysqli_query($con,"UPDATE accounts SET password='$password_2' WHERE username='$username' AND password='$password_1'");
			echo "Success";
		}
		else { echo "Fail"; }
	}
?>