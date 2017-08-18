

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->




<?php 
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
			Kezdőlap
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
						
										echo '<form method = "POST" action = "autok.php" enctype = "multipart/form-data" name = "login_index">
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
									echo '<form method = "POST" action = "motorok.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getMotors['id'].'" name = "click_on_motor" />
										</form>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="hozzaszolasok.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								
								echo '<a href = "osszes_auto.php">Autók</a>';
								
								echo '<a href = "osszes_jarmu.php">Motorok</a>';
							
							?>
						</div>
					</li>
					<li><a href="fooldal.php">Nyitólap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
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
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim.php";'>Kölcsönzéseim</td></button>
										</tr>
					
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="felhasznalo_torlese.php";'>Fiók törlése</td></button>
										</tr>
										
										
										<?php
								
											if(isset($_POST['kijelentkezes_dropdown'])){
										
												$login_felh_nev = $_POST['login_felh'];
												$login_jelszo = $_POST['login_jelszo'];
												
												$adminf = "admin";
												$adminj = "adminho";
												
												$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
												WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
												
												$login_user = mysqli_query($conn, $login_sql);
												$count_loggedinuser = mysqli_num_rows($login_user);
												
												
												//ha újra megpróbálnánk bejelentkezni
												
												$login_again = "SELECT * from belepes WHERE felhasznalo_nev = '".$login_felh_nev."' AND jelszo = '".$login_jelszo."'";
												$query_user = mysqli_query($conn, $login_again);
												$count_user = mysqli_num_rows($query_user);
												
												
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
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adminpage.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz!</a></font></td>
															</tr>
															
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Új jelszó</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adatok_modositasa.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_torlese.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Fiók törlése</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';	
															//header("refresh 2; url = admin_main.php");
													}
													
													else{
														
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center; padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz!</a></font></td>
															</tr>
															
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Új jelszó!</a></font></td>
															</tr>

															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_torlese.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Fiók törlése</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';	
															//header("refresh: 2;url = admin_main.php");
													}
												}
												
											}
									
										?>
										
										</table>
										<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
										<form method = "POST" action = "fooldal.php" enctype = "multipart/form-data" name = "login_index">
											<tr>
												<td width = "100%"><input style = "text-align: left; padding: 4;"type = "submit" class = "inputlog" value = "Kijelentkezés" name = "kijelentkezes_dropdown" /></td>
											</tr>
										</form>
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
			<form method = "POST" action = "adatok_modositasa.php" enctype = "multipart/form-data" name = "update_user">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<tr>
					<td height = "33px" id = "styleofwords2a" style = "width: 100%;"><font id = "styleofwords2a">Felhasználói fiók adatainak a módosítása</font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords5"><font id = "styleofwords6">
					A<font id = "styleofwords4"> *</font>-gal jelölt mezők kitöltése kötelező!</font></td>
				</tr>
				
			</table>
			<div align = "center">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
			
			<!--felhasználói fiók adatai-->
				
					<tr>
						<td width = "100%" height = "33px" id = "styleofwords2" >
						<font id = "styleofwords2">Felhasználói fiók adatai</font></td>
						<td width = "40%" height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Felhasználónév<font id = "styleofwords12">*</font></td>
						<td height = "33px" id = "styleofwords11"><input type = "text" 
						style="height:26px;" name = "felh_nev" size = "45" placeholder = "Adjon meg egy felhaszálónevet..." required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Jelszó<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "password" 
						style="height:26px;" name = "jelszo_egy" size = "45" placeholder = "Adjon meg egy jelszót..." required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Jelszó újra<font id = "styleofwords12">*</font></td>
						<td height = "33px" id = "styleofwords11"><input type = "password" 
						style="height:26px;" name = "jelszo_ketto" size = "45" placeholder = "Adja meg újra jelszavát..." required /></td>
					</tr>
					
				<!--személyes adatok-->
					<tr>
						<td height = "33px" id = "styleofwords2" >
						<font id = "styleofwords2">Személyes adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Vezetéknév<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "vezeteknev" size = "45" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Keresztnév<font id = "styleofwords12">*</font></td>
						<td height = "33px" id = "styleofwords11"><input type = "text" style="height:26px;" name = "keresztnev" size = "45" height = "20" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Anyja vezetékneve<font id = "styleofwords12">*</font></td>
						<td height = "33px" id = "styleofwords11"><input type = "text" style="height:26px;" name = "anyjavezetek" size = "45" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Anyja keresztneve<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "anyjakereszt" size = "45" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Telefonszám<font id = "styleofwords8a"/></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px; width: 100%;" name = "tel" size = "45" placeholder = "+36/06 nélkül adja meg, pl: 709999999"/></td>
					</tr>
					
					<!-- lakcím adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Lakcím adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Irányítószám<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px; width: 100%;" name = "iranyitoszam" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Város<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "varos" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Utca<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "utca" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Házszám<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "hazszam" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Születési adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					
					<!-- születési adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords7" >Születési hely<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input class = "inputForm" type = "text" style="height:26px;" name = "szuletesi_hely" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Születési idő<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "date" style="height:25px; width: 100%;" name = "szuletesi_ido" size = "45" placeholder = "" required /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7"></td>
						<td height = "33px" id = "styleofwords7"></td>
					</tr>
				</table>
				<div align = "center">
					<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
						
						
						
						<!-- Regisztráció helyességének az ellenőrzése -->
						
						<?php
							if(isset($_POST['felh_modosit'])){
		
								//session_start();
								
								$felhasznalo = $_POST['felh_nev'];
								$jelszo1 = $_POST['jelszo_egy'];
								$jelszo2 = $_POST['jelszo_ketto'];
								$v_nev = $_POST['vezeteknev'];
								$k_nev = $_POST['keresztnev'];
								$anyja_v = $_POST['anyjavezetek'];
								$anyja_k = $_POST['anyjakereszt'];
								$telszam = $_POST['tel'];
								
								$ir = $_POST['iranyitoszam'];
								$varos = $_POST['varos'];
								$utca = $_POST['utca'];
								$hazszam = $_POST['hazszam'];
								
								$email_ures = "";
								$szulhely = $_POST['szuletesi_hely'];
								$szulido = $_POST['szuletesi_ido'];
								
								$query_user = mysqli_query($conn, "SELECT felhasznalo_nev FROM Felhasznalo WHERE felhasznalo_nev = '".$felhasznalo."'
								AND jelszo = '".$jelszo1."'");
								$count_user = mysqli_num_rows($query_user);
	
								if($count_user == 1){
									
									if($jelszo1 == $jelszo2){
										
										$updateuser_sql = "UPDATE felhasznalo SET jelszo ='".$jelszo1."', vezetek_nev ='".$v_nev."', kereszt_nev ='".$k_nev."',
										anyja_vnev ='".$anyja_v."', anyja_knev ='".$anyja_k."', telszam ='".$telszam."', ir_szam ='".$ir."', varos ='".$varos."',
										utca ='".$utca."', hazszam ='".$hazszam."', szuletesi_hely ='".$szulhely."', szuletesi_ido ='".$szulido."'
										WHERE felhasznalo_nev = '".$felhasznalo."'";
										
										$updateUser = mysqli_query($conn, $updateuser_sql);
										
										echo '<div align = "center">
												<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
													<tr>
														<td height = "33px" id = "styleofwords7a2" style = "padding: 0; text-align: center;">Az adatok módosítása sikeresen megtörtént, '.$felhasznalo.'!</td>
														<td height = "33px" id = "styleofwords7a2"></td>
													</tr>
													<tr>
														<td height = "33px" id = "styleofwords7"></td>
														<td height = "33px" id = "styleofwords7"></td>
													</tr>
													<tr>
														<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
														style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Új jelszó</a></font></td>
														<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
														style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center"></a></font></td>
													</tr>
												</table>
											</div>';
									}
									
									else{
										
										die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7d" style = "padding: 0; text-align: center;">A két jelszó nem egyezik meg!</td>
													<td height = "33px" id = "styleofwords7d"></td>
												</tr>
											</table>
										</div>
										<div align = "center">
										<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
											<tr>
												<td height = "33px" id = "styleofwords7"></td>
												<td height = "33px" id = "styleofwords7"></td>
											</tr>
											<tr>
												<td width = "50%"><input type = "submit" class = "input" value = "Adatok módosítása" name = "felh_modosit" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
							}
								
					
								
								
							else if($count_user == 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a" style = "padding: 0; text-align: center;">Hibás felhasznalónév - jelszó páros!</td>
													<td height = "33px" id = "styleofwords7a"></td>
												</tr>
											</table>
										</div>
										<div align = "center">
										<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
											<tr>
												<td height = "33px" id = "styleofwords7"></td>
												<td height = "33px" id = "styleofwords7"></td>
											</tr>
											<tr>
												<td width = "50%"><input type = "submit" class = "input" value = "Adatok módosítása" name = "felh_modosit" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
							}
						?>
						
						
					<table>
				</div>
				<div align = "center">
					<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
						<tr>
							<td height = "33px" id = "styleofwords7"></td>
							<td height = "33px" id = "styleofwords7"></td>
						</tr>
						<tr>
							<td width = "50%"><input type = "submit" class = "input" value = "Adatok módosítása" name = "felh_modosit" /></td>
							<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href='index.php';">Mégsem</td></button>
						</tr>
					</table>
				</div>
				</form>
			</table>
			</div>
			</div>
			</br>
			</br>
			</br>
			</br>
			</div>
			</form>
		</div>
	</body>
</html>