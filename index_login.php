
<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<?php 
	include('connection.php');
	include('controller.php');
	//include('style.php');
?>


<?php
						
	if(isset($_POST['bejelentkezes'])){
		
		$login_felh_nev = $_POST['login_felh'];
		$login_jelszo = $_POST['login_jelszo'];
		
		$adminf = "admin";
		$adminj = "adminho";							
		
		$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
		WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
		
		$login_user = mysqli_query($conn, $login_sql);
		$count_loggedinuser = mysqli_num_rows($login_user);
		
		
		$login_user = mysqli_query($conn, $login_sql);
		$count_loggedinuser = mysqli_num_rows($login_user);
				
						
		//ha újra megpróbálnánk bejelentkezni
						
		/*
		$login_again = "SELECT * from belepes WHERE felhasznalo_nev = '".$login_felh_nev."' AND jelszo = '".$login_jelszo."'";
		$query_user = mysqli_query($conn, $login_again);
		$count_user = mysqli_num_rows($query_user);
		*/
		
		if(mysqli_num_rows($login_user) == 0){
			
			echo '<tr>
				<td height = "33px" id = "styleofwords7a">Hibás felhasználónév/jelszó!</td>
			</tr>';
		}
			
		
		else if(mysqli_num_rows($login_user) == 1){
			
			$sql = "INSERT INTO belepes
			(felhasznalo_nev, jelszo) 
			VALUES('".$login_felh_nev."','".$login_jelszo."');";
			
			mysqli_query($conn, $sql);
			
			if($login_felh_nev == $adminf && $login_jelszo == $adminj){
				echo '<tr>
						<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz...</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adatok_modositasa.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Új jelszó</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_torlese.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Felhasználói fiók törlése</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>';
					
					header("refresh: 2; url = index.php");
			}
			
			else{
				
				echo '<tr>
						<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz...</a></font></td>
					</tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_modosit.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
						style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Új jelszó</a></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>';	

					header("refresh: 2;url = index.php");
			}
		}
	}
?>