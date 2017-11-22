

						
<?php

	session_start();
	$error = '';
	
	if(isset($_POST['bejelentkezes'])){
		
		$conn = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($conn, "jarmuadatbazis");
		
		$login_felh_nev = $_POST['login_felh'];
		$login_jelszo = $_POST['login_jelszo'];
		
		$adminf = "admin";
		$adminj = "admin";
		
		$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
		WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
		$login_user = mysqli_query($conn, $login_sql);
		$count_loggedinuser = mysqli_num_rows($login_user);
		
		if($count_loggedinuser == 1){
			
			$sql = "INSERT INTO belepes
			(felhasznalo_nev, jelszo) 
			VALUES('".$login_felh_nev."','".$login_jelszo."');";
			mysqli_query($conn, $sql);
			
			if($login_felh_nev == $adminf && $login_jelszo == $adminj){
				$_SESSION['login_user']= $login_felh_nev;
				header("location: adminpage.php");
			}
			
			else{
				$_SESSION['login_user']= $login_felh_nev;
				header("location: fooldal.php");
			} 
		}
		
		else{
			$error = "<font color = '#FA5858'>Hibás a felhasználónév vagy a jelszó!</font>";
		}
		mysqli_close($conn); // Closing Connection
	}

?>