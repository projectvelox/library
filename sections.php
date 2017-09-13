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
	<div class="container">
	<br> 
	<ol class="breadcrumb">
		<li><a href="index.php">Dashboard</a></li>
		<li class="active">Add a Section</li>        
	</ol>
	<h2>Library Sections</h2><hr>
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<form class="form-horizontal">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="section">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="section" placeholder="Enter a section name">
			      <br><p id="error"></p>
			      <hr><p class="error"></p><button type="button" class="btn add">Add a Library Section</button>
			    </div>
			  </div>
			</form>
		</div>
		<div class="col-xs-12 col-md-8">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Section Name</th>
						<th>Daily Records</th>
						<th>Monthly Records</th>
						<th>Yearly Records</th>
					</tr>
					<?php 
						$i=0;
						$results = mysqli_query($con, "SELECT * FROM section ORDER BY name ASC");
						foreach($results as $row) {
							$i++;
							echo '<tr>';
							echo '<td>'.$i.'</td>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td><a class="btn btn-sm btn-primary" href="specific-day-section.php?name='.$row['name'].'">View</a></td>';
							echo '<td><a class="btn btn-sm btn-primary" href="specific-month-section.php?name='.$row['name'].'">View</a></td>';
							echo '<td><a class="btn btn-sm btn-primary" href="specific-year-section.php?name='.$row['name'].'">View</a></td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>

	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">


		$(document).on("click", ".add", function() { 
			var section = document.getElementById('section').value;

			if(section === " " || section === ""){
				document.getElementById('error').innerHTML = "Fill Up Everything First!";
				$("#error").removeClass("text-success");
				$("#error").addClass("text-danger");
			}
			else {
				document.getElementById('error').innerHTML = "Successfully Added!";
			    $("#error").removeClass("text-danger");
				$("#error").addClass("text-success");
				//alert(student_id + " " + name + " " + department + " " + course + " " + " " + section + " " + student_id.length);
				$.ajax({type:"POST",url:"ajax.php",
				data: {
					section:section,
					action:"add-section"
				},
			    }).then(function(data) {
			    	document.getElementById('error').innerHTML = "Successfully Added!";
			    	$("#error").removeClass("text-danger");
					$("#error").addClass("text-success");
			    });


			}
		});
	</script>
</body>
</html>