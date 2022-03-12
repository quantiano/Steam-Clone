<?php
	date_default_timezone_set("Asia/Bangkok");
	$conn= mysqli_connect("localhost","root","","css326") or die("Error: " . mysqli_error($conn));
	mysqli_query($conn, "SET NAMES 'utf8' "); 
?>
