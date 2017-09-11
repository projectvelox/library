<?php 
	date_default_timezone_set('Asia/Manila'); 
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
<style type="text/css">
	body { background: url('images/slider/2.png'); background-repeat: no-repeat; background-size: cover; }
	.jumbotron { padding: 10px 0px; text-align: center; background-color: #0080b1;}
	.jumbotron h1 { color: #fff; }
	.image-container { height: 400px; padding: 10px; }
</style>
<body>
	<div class="jumbotron">
	<h1>Central Philippine University</h1>
	</div>
	<div class="container" style="margin-top: 50px;">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="image-container">
				<?php
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT student_id FROM logs WHERE log_out IS NOT NULL ORDER BY id DESC LIMIT 1");
					foreach($result as $row){
						echo '<img src="images/uploads/'.$row['student_id'].'.jpg" class="center-block img-responsive" style="border: 3px solid #828282; height: 100%;">'; 
					}
				?>
				</div>	
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php
					$con = mysqli_connect("localhost","libraryaccess","libraryaccess","libraryaccess");
					$result = mysqli_query($con,"SELECT DATE_FORMAT(log_in, '%r') AS converted_in,DATE_FORMAT(log_out, '%r') AS converted_out,logs.* FROM logs WHERE log_out IS NOT NULL ORDER BY id DESC LIMIT 1");
					foreach($result as $row){

						/* This is what I will do for now just in case they want to change what to see */
						/* Depending on their category whether or not they are a faculty or alumni or student */

						/*if($row['course']=='Faculty') { 
							echo '<h1 style="font-size: 50px;">Faculty Profile</h1>'; 
							echo '<h3>'.$row['student_id'].'</h3>';
							echo '<h3>'.$row['name'].'</h3>';
							echo '<h3>College of Computer Studies</h3>';
							echo '<h3>'.$row['course'].'</h3><br>';
							echo '<h4>Time In: <strong>'.$row['converted_in'].'</strong></h4>';
							echo '<h4>Time Out: <strong>'.$row['converted_out'].'</strong></h4>';
						}

						if($row['course']=='Alumni') {
							echo '<h1 style="font-size: 50px;">Alumni Profile</h1>'; 
							echo '<h3>'.$row['student_id'].'</h3>';
							echo '<h3>'.$row['name'].'</h3>';
							echo '<h3>College of Computer Studies</h3>';
							echo '<h3>'.$row['course'].'</h3><br>';
							echo '<h4>Time In: <strong>'.$row['converted_in'].'</strong></h4>';
							echo '<h4>Time Out: <strong>'.$row['converted_out'].'</strong></h4>';
						}

						else {
							echo '<h1 style="font-size: 50px;">Student Profile</h1>'; 
							echo '<h3>'.$row['student_id'].'</h3>';
							echo '<h3>'.$row['name'].'</h3>';
							echo '<h3>College of Computer Studies</h3>';
							echo '<h3>'.$row['course'].'</h3><br>';
							echo '<h4>Time In: <strong>'.$row['converted_in'].'</strong></h4>';
							echo '<h4>Time Out: <strong>'.$row['converted_out'].'</strong></h4>';
						}*/
						
						// The Blocked Code Below is the Simplified Version						 
						if($row['course']=='Faculty') { echo '<h1 style="font-size: 50px;">Faculty Profile</h1>'; }
						if($row['course']=='Alumni') { echo '<h1 style="font-size: 50px;">Alumni Profile</h1>'; }
						else if ($row['course']!='Alumni' && $row['course']!='Faculty'){ echo '<h1 style="font-size: 50px;">Student Profile</h1>'; }
						echo '<h3>'.$row['student_id'].'</h3>';
						echo '<h3>'.$row['name'].'</h3>';
						echo '<h3>College of Computer Studies</h3>';
						echo '<h3>'.$row['course'].'</h3><br>';
						echo '<h4>Time In: <strong>'.$row['converted_in'].'</strong></h4>';
						echo '<h4>Time Out: <strong>'.$row['converted_out'].'</strong></h4>';
					}
				?>	
			</div>
		</div>
		<br><br>
		<h4 class="text-center"><?php echo "<b>".date('l\, F jS\, Y h:i A')."</b>"; ?></h4>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		   setInterval( function(){
		   	 location.reload();
		   } , 5000);
		});
	</script>
</body>
</html>