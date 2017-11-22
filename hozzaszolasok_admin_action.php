<?php
		
	include('connection.php');
	$comments = "SELECT * FROM hozzaszolasok ORDER BY datum DESC";
	$getComments = mysqli_query($conn, $comments);
	
	$allcomments = "SELECT * from hozzaszolasok";
	$commResult = mysqli_query($conn, $allcomments);
	$count_comments = mysqli_num_rows($commResult);
	
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