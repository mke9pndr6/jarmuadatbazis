<?php
	include("connection.php");
	$delete_user_from_login_table = "DELETE FROM `belepes` WHERE `belepes`.`felhasznalo_nev` = '".$login_session."'";
	$delete_user = mysqli_query($conn, $delete_user_from_login_table);
	
	session_start();
	
	if(session_destroy()) {// Destroying All Sessions
		
		header("Location: index.php"); // Redirecting To Home Page
	}
?>

