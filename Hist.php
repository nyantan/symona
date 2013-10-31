<?php
	$con = mysqli_connect("10.0.3.19","peter","abc123","my_db");

	
	if (mysqli_connect_errno($con))
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
?>