

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
		session_start();// Starting Session
		mysqli_query($conn, 'SET NAMES UTF-8');
		mysqli_query($conn, 'SET character_set_results=utf8');
		mysqli_set_charset($conn, 'utf8');
		
		// Storing Session
		$user_check = $_SESSION['user_check'];
		// SQL Query To Fetch Complete Information Of User
		//$ses_sql = mysqli_query("select felhasznalo_nev from belepes where felhasznalo_nev = '$felhasznalo_nev'", $conn);
		//$row = mysqli_fetch_assoc($ses_sql);
		//$login_session = $row['username'];
		//if(!isset($login_session)){
		//mysqli_close($conn); // Closing Connection
		//header('Location: index.php'); // Redirecting To Home Page
		//}	
	}

?>




<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<!-- connection to database -->

<?php
/*
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root", "");
		// Selecting Database
		if ( false == mysqli_select_db($conn, "jarmuadatbazis" )  ) {
			return null;
		}
		else{
			$db = mysqli_select_db($connection, "jarmuadatbazis");
			session_start();// Starting Session
			// Storing Session
			$user_check = $_SESSION['felhasznalo_nev'];
			// SQL Query To Fetch Complete Information Of User
			$ses_sql = mysqli_query("select felhasznalo_nev from belepes where felhasznalo_nev = '$felhasznalo_nev'", $connection);
			$row = mysqli_fetch_assoc($ses_sql);
			$login_session = $row['username'];
			if(!isset($login_session)){
			mysqli_close($connection); // Closing Connection
			header('Location: index.php'); // Redirecting To Home Page
			}
		}
*/
?>

