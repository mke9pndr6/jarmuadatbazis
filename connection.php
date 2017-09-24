

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->
 

<!-- connection to database -->

<?php

	/*
	
	session_start();
	if ( false == mysqli_select_db($conn, "jarmuadatbazis" )  ) {
		return null;
	}
	
	else{
		//echo "Successfully connected";
		// Starting Session
		
		
		
		// Storing Session
		$user_check = $_SESSION['user_check'];
		// SQL Query To Fetch Complete Information Of User
		$ses_sql = mysqli_query($conn, "select felhasznalo_nev from belepes where felhasznalo_nev = '$user_check'");
		$row = mysqli_fetch_assoc($ses_sql);
		$login_session = $row['felhasznalo_nev'];
		
		if(!isset($login_session)){
			mysqli_close($conn); // Closing Connection
			
		}
		
	}*/
	/*
	$conn = mysqli_connect("localhost", "root", "") or die("Failed to connect");
	
	$db = mysqli_select_db($conn, "jarmuadatbazis");
	session_start();// Starting Session
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');
	// Storing Session
	$user_check = $_SESSION['felhasznalo_nev'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql = mysqli_query($conn,"select felhasznalo_nev from belepes where felhasznalo_nev = '$felhasznalo_nev'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['felhasznalo_nev'];
	return $conn;
	if(!isset($login_session)){
		mysqli_close($conn); // Closing Connection
		echo "<script type='text/javascript'>  window.location='index.php'; </script>"; // Redirecting To Home Page
	}

*/?>

<?php
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$conn = mysqli_connect("localhost", "root", "");
		// Selecting Database
		$db = mysqli_select_db($conn,"jarmuadatbazis");
		session_start();// Starting Session
		mysqli_query($conn, 'SET NAMES UTF-8');
		mysqli_query($conn, 'SET character_set_results=utf8');
		mysqli_set_charset($conn, 'utf8');
		// Storing Session
		$user_check=$_SESSION['login_user'];
		// SQL Query To Fetch Complete Information Of User
		$ses_sql=mysqli_query($conn, "select felhasznalo_nev from belepes where felhasznalo_nev='$user_check'");
		$row = mysqli_fetch_assoc($ses_sql);
		$login_session = $row['felhasznalo_nev'];
		if(!isset($login_session)){
			mysqli_close($conn); // Closing Connection
			echo "<script type='text/javascript'>  window.location='index.php'; </script>"; // Redirecting To Home Page
		}
?>



