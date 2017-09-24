<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<!-- connection to database -->

<?php
	
	$conn = mysqli_connect("localhost", "root", "") or die("Failed to connect");
	
	if ( false == mysqli_select_db($conn, "jarmuadatbazis" )  ) {
		return null;
	}
	
	else{
		//echo "Successfully connected";
		mysqli_query($conn, 'SET NAMES UTF-8');
		mysqli_query($conn, 'SET character_set_results=utf8');
		mysqli_set_charset($conn, 'utf8');
	
		return $conn;
	}	
?>