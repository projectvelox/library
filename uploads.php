<?php
	$dir = "images/uploads/";
	$target_file = $dir . $_FILES["image"]["name"];

	echo $target_file;
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
?>