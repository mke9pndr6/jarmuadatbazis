

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

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'>
	<head>
		<title>
			Kezdőlap
		</title>
		
	</head>
	
		<body id = "bgStyle">
			
			</br>
			</br>
			</br>
			</br>
			</br>
			
			<div align = "center">
				<form method = "POST" action = "index.php" enctype = "multipart/form-data" name = "login">
					<table align = "center" width = "38.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0"
					style = "border-radius: 22 22 0 0;">
						<tr>
							<td height = "33px" id = "styleofwords2a"><font id = "styleofwords2a">Jelentkezzen be a kölcsönzéshez!</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Felhasználónév</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px; width: 100%;" name = "login_felh" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Jelszó</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords9"><input type = "password" style="height:26px; width: 100%;" name = "login_jelszo" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "regisztracio.php" id = "styleofword2"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Még nem regisztrált?</a></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "regisztracio.php" id = "styleofword2"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Elfelejtette jelszavát?</a></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
						</tr>
						
						<?php
						
							if(isset($_POST['bejelentkezes'])){
								
								$login_felh_nev = $_POST['login_felh'];
								$login_jelszo = $_POST['login_jelszo'];
								
								$adminf = "admin";
								$adminj = "admin";							
								
								$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
								WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
								
								
								$login_user = mysqli_query($conn, $login_sql);
								$count_loggedinuser = mysqli_num_rows($login_user);
								
								
								$login_user = mysqli_query($conn, $login_sql);
								$count_loggedinuser = mysqli_num_rows($login_user);
										
												
								//ha újra megpróbálnánk bejelentkezni
												
								$login_again = "SELECT * from belepes WHERE felhasznalo_nev = '".$login_felh_nev."' AND jelszo = '".$login_jelszo."'";
								$query_user = mysqli_query($conn, $login_again);
								$count_user = mysqli_num_rows($query_user);
								

								/*
								if($count_user == 1){
									//akkor hibaüzenet jelenjen meg
									echo '<tr>
											<td height = "33px" id = "styleofwords7a" style = "padding: 0; text-align: center;" >Már bejelentkezett!</td>
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
											
											
								}	
								*/
								
								if(mysqli_num_rows($login_user) == 0){
									
									echo '<tr>
										<td height = "33px" id = "styleofwords7a" style = "text-align: center; padding: 0;">Hibás felhasználónév/jelszó!</td>
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
												<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adminpage.php" id = "styleofword2"
												style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz...</a></font></td>
											</tr>
		
											<tr>
												<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
											</tr>';
											
											header("refresh: 10; url = adminpage.php");
									}
									
									else{
										
										echo '<tr>
												<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
											</tr>
											<tr>
												<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "fooldal.php" id = "styleofword2"
												style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz...</a></font></td>
											</tr>
											<tr>
												<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
											</tr>';	
											header("refresh: 10; url = fooldal.php");
									}
								}
									
							}
							
						?>
						</table>
						<table align = "center" width = "38.25%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Bejelentkezés" name = "bejelentkezes" /></td>
							</tr>
						</table>
					</table>
				</form>
			</div>		
	</body>
</html>