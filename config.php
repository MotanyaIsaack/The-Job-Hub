<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "Isaamille2017";
	$dbname = "job_application_system";

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to connect to localhost");

	if ($connect == false) {
		# code...
		die("Could not connect." .mysqli_error(link));
	} 
	// else{
	// 	echo "Connection Succesful";
	// }

?>