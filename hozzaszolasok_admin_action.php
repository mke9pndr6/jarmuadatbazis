<?php
		
	include('connection.php');
	$comments = "SELECT * FROM hozzaszolasok";
	$getComments = mysqli_query($conn, $comments);

	if (mysqli_num_rows($getComments) > 0){
		while($row = mysqli_fetch_assoc($getComments)){
			if(isset($_GET[$row["id"]])){
			$deletesql = "DELETE FROM hozzaszolasok WHERE id = '".$row["id"]."'";
			mysqli_query($conn, $deletesql);

			echo $deletesql;
			}
		}
	}
	
	header("location: hozzaszolasok_admin.php");
?>