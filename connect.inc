<?php
	date_default_timezone_set("Asia/Bangkok");
	$conn= mysqli_connect("localhost","username","password","table") or die("Error: " . mysqli_error($conn));
	mysqli_query($conn, "SET NAMES 'utf8' "); 
?>
