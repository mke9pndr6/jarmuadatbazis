<?php
/*
	//session_start(); // Starting Session
	//include('connection.php');
	$error = '';
	
	if(isset($_POST['bejelentkezes'])){	
		
		$login_felh_nev = $_POST['login_felh'];
		$login_jelszo = $_POST['login_jelszo'];
		
		$adminf = "admin";
		$adminj = "admin";							
		
		$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
		WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
		echo $login_sql;
		
		$login_user = mysqli_query($conn, $login_sql);
		$count_loggedinuser = mysqli_num_rows($login_user);
		
		$login_user = mysqli_query($conn, $login_sql);
		$count_loggedinuser = mysqli_num_rows($login_user);
								
		
		if(mysqli_num_rows($login_user) == 0){
			$error = '<tr>
				<td height = "33px" id = "styleofwords7a" style = "text-align: center; padding: 0;">Hibás felhasználónév vagy jelszó!</td>
			</tr>';
			
		}
			
		
		else if(mysqli_num_rows($login_user) == 1){
			
			$sql = "INSERT INTO belepes
			(felhasznalo_nev, jelszo) 
			VALUES('".$login_felh_nev."','".$login_jelszo."');";
			
			mysqli_query($conn, $sql);
			
			if($login_felh_nev == $adminf && $login_jelszo == $adminj){
				$_SESSION['login_user'] = $login_felh_nev; // Initializing Session
				header("url = adminpage.php");
				
			}
			
			else{
				$_SESSION['login_user']= $login_felh_nev; // Initializing Session
				header("url = fooldal.php");
			}
		}
	}
	
*/
?>

						
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
			$error = "Hibás a felhasználónév vagy a jelszó!";
		}
		mysqli_close($conn); // Closing Connection
	}

?>