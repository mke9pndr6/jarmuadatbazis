

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->




<?php 
	ob_start();
	include('connection.php');
	include('controller.php');
	//include('style.css');
?>

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'/>
		
	<head>
		<title>
			Fiók törlése
		</title>
		
		<script type = "text/javascript">
			$(document).ready(function(){
				$("ul#menu div").click(function(){
					$(this).parent().find("ul").slideDown("slow");
				});
			});
		</script>
		
		<script>
				function loginMessage() {
					alert("Kérjük jelentkezzen be a kölcsönzéshez!");
				}
				
				function loginComment() {
					alert("Kérjük jelentkezzen be, hogy tudjon hozzászólást írni!");
				}
		</script>
		
		
	</head>
	
		<body id = "bgStyle">
				
				<div id = "container">
				<ul id = "menu">
					<li>
						<a href="autok_osszes.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<form method = "GET" action = "autok.php" enctype = "multipart/form-data" name = "click_on_car">
											<input type = "submit" value = "'.$getCars['id'].'" name = "click_on_car" />
										</form>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok_osszes.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getMotors = mysqli_fetch_assoc($listMotors)){
									echo '<form method = "GET" action = "motorok.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getMotors['id'].'" name = "click_on_motor" />
										</form>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="hozzaszolasok.php">Vélemények</a>
					</li>
					<li><a href="fooldal.php">Nyitólap</a>
					</li>
					<li><a href="kereses.php">Keresés</a>
					</li>
					<li>
						<a href="felhasznalo_profil.php">Profilom</a>
								<div align = "center">
									<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
										
										<tr>
											<td width = "100%" align = "center"><button class = "buttonlog" align = "left" onclick = 'location.href="adatok_modositasa.php";'>Adatok módosítása</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="jelszo_modosit.php";'>Új jelszó</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_auto.php";'>Autós kölcsönzéseim</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_motor.php";'>Motoros kölcsönzéseim</td></button>
										</tr>
					
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="felhasznalo_torlese.php";'>Fiók törlése</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kijelentkezes.php";'>Kijelentkezés</td></button>
										</tr>
									</table>
								</div>
	
				</ul>
				<div style = "clear:both"></div>
			</div>
			
			
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			
						<div align = "center">
				<form method = "POST" action = "felhasznalo_torlese.php" enctype = "multipart/form-data" name = "motor_update">
					<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
						<tr>
							<td height = "0px"  width = "90%" id = "styleofwords2a"><font id = "styleofwords2a">Felhasználó fiók törlése</font></td>
							<td height = "0px"  width = "10%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
						<tr>
							<td height = "33px" id = "styleofwords7" >Felhasználónév<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" 
							style="height:26px;" name = "felhasznalo_nev" size = "45" placeholder = "Adja meg felhasználónevét..." required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Jelszó<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input  type = "password"  
							style="height:26px;" name = "password" size = "45" placeholder = "Adja meg a jelszavát..." required/>
						
							</td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Jelszó újra<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input  type = "password"  
							style="height:26px;" name = "password_again" size = "45" placeholder = "Adja meg újra a jelszavát..." required/>
						
							</td>
						</tr>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
						<tr>
						</table>
						
						<?php
							
							if(isset($_POST['felh_torles'])){
								
								$felhasznalo_nev = $_POST['felhasznalo_nev'];
								$password = $_POST['password'];
								$password_again = $_POST['password_again'];
						
								//ellenőrizzük a régi jelszó helyességét
								
								$query_pass = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE jelszo = '".$password."'
								AND felhasznalo_nev = '".$felhasznalo_nev."'");
								$count_pass = mysqli_num_rows($query_pass);
								
								
								//ha helyes jelszót - felhasználónév párost adunk meg
								if($count_pass == 1){
									//ha az új jelszavak megegyeznek
									if($password == $password_again){
										
										echo '<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a2"></td>
													<td height = "33px" id = "styleofwords7a2" style = "padding: 0; text-align: center;"> A következő felhasználót töröltük az adatbázisunkból: '.$felhasznalo_nev.'</td>
												</tr>
											</table>
										</div>';
										
										$delete_loggedin_user = "DELETE FROM belepes WHERE felhasznalo_nev = '".$felhasznalo_nev."'";
										mysqli_query($conn, $delete_loggedin_user);
										$deleteuser_sql = "DELETE FROM `felhasznalo` WHERE `felhasznalo`.`felhasznalo_nev` = '".$felhasznalo_nev."'";
										mysqli_query($conn, $deleteuser_sql);
										
										header("refresh: 2; url = index.php");
										ob_end_flush();
									}
									
									//ha a megadott jelszavak nem egyeznek meg, akkor hibaüzenet
									if($password != $password_again){
										die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a" style = "padding: 0; text-align: center;">Az új jelszavak nem egyeznek meg!</td>
													<td height = "33px" id = "styleofwords7a"></td>
												</tr>
												<tr>
													<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
												</tr>
											</table>
										</div>
										<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td width = "100%"><input type = "submit" class = "input" value = "Fiók törlése" name = "felh_torles" /></td>
												</tr>
											</table>
										</div>');
									}
								}
								
								//ha helytelen a régi jelszó - felhasználónév páros, akkor hibaüzenet
								if($count_pass == 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a" style = "padding: 0; text-align: center;">Helytelenül adta meg felhasználói adatait!</td>
													<td height = "33px" id = "styleofwords7a"></td>
												</tr>
												<tr>
													<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
												</tr>
											</table>
										</div>
										<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td width = "100%"><input type = "submit" class = "input" value = "Fiók törlése" name = "felh_torles" /></td>
												</tr>
											</table>
										</div>');
								}
							}
						?>		
								
						
						<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Fiók törlése" name = "felh_torles" /></td>
							</tr>
						</table>	
				</form>
			</div
			