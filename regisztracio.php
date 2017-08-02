<<<<<<< HEAD

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
	<head>
		<title>
			Regisztráció
		</title>
		
		<script type = "text/javascript">
			$(document).ready(function(){
				$("ul#menu div").click(function(){
					$(this).parent().find("ul").slideDown("slow");
				});
			});
		</script>
		
		<style type="text/css">
			  
			  input[type="checkbox"]:required:invalid + label { color: red;}
			  input[type="checkbox"]:required:valid + label { color: white; }
		</style>
		
		<style>
		  input{
			  border-radius:8px;
			  -moz-border-radius:8px;
			  -webkit-border-radius:8px;
			  margin: 0px;
		   }
		   
		</style>
		
	</head>
		<body id = "bgStyle">
			
				<div id = "container">
				<ul id = "menu">
					<li>
						<a href="autok.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getCars = mysqli_fetch_assoc($listMotors)){
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="jarmuvek.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								$AllVehicles = new Vehicles();
								$AllVehicles->ListVehicles();
								$listVehicles = $AllVehicles->ListVehicles();
								
								while($getCars = mysqli_fetch_assoc($listVehicles)){
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listVehicles);
							?>
						</div>
					</li>
					<li><a href="index.php">Kezdőlap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
					<li><a href="regisztracio.php">Regisztráció</a></li>
					<li><a href="belepes.php">Belépés</a></li>
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
			</br>
			</br>
			
			
			<div align = "center">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<tr>
					<td height = "33px" id = "styleofwords2a"><font id = "styleofwords2a">Regisztráljon oldalunkra!</font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords5"><font id = "styleofwords6">
					A<font id = "styleofwords4"> *</font>-gal jelölt mezők kitöltése kötelező!</font></td>
				</tr>
			</table>
			
			
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<form method = "POST" action = "" enctype = "multipart/form-data" name = "register">
				
			<!--felhasználói fiók adatai-->
				
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td width = "60%" height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Felhasználói fiók adatai</font></td>
						<td width = "40%" height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
				</table>
			</div>
			
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
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
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Személyes adatok</font></td>
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
						<td height = "33px" id = "styleofwords7" >Személyi igazolvány száma<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "szig" size = "45" required /></td>
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
						<td height = "33px" id = "styleofwords10" >Email<font id = "styleofwords8a"/></td>
						<td height = "33px" id = "styleofwords11"><input type = "email" style="height:26px;" name = "emailcim" size = "45" /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Telefonszám<font id = "styleofwords8a"/></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "tel" size = "45" placeholder = "+36/06 nélkül adja meg, pl: 709999999"/></td>
					</tr>
					
					<!-- lakcím adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Lakcím adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Irányítószám<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "iranyitoszam" size = "45" placeholder = "" required /></td>
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
						<tr>
							<td height = "33px" width = "90%" id = "styleofwords7" ><input id ="field_terms" type="checkbox" required name = "terms">
								<label for="field_terms">Elolvastam és elfogadom a felhasználói feltételeket.</label></td>
							<td height = "33px" width = "10%" id = "styleofwords7"></td>
						</tr>
						<tr>
						
						
						<!-- Regisztráció helyességének az ellenőrzése -->
						
						<?php
							if(isset($_POST['regisztracio'])){
		
								//session_start();
								
								$felhasznalo = $_POST['felh_nev'];
								$jelszo1 = $_POST['jelszo_egy'];
								$jelszo2 = $_POST['jelszo_ketto'];
								
								$v_nev = $_POST['vezeteknev'];
								$k_nev = $_POST['keresztnev'];
								$szig = $_POST['szig'];
								$anyja_v = $_POST['anyjavezetek'];
								$anyja_k = $_POST['anyjakereszt'];
								$email = $_POST['emailcim'];
								$telszam = $_POST['tel'];
								
								$ir = $_POST['iranyitoszam'];
								$varos = $_POST['varos'];
								$utca = $_POST['utca'];
								$hazszam = $_POST['hazszam'];
								
								$szulhely = $_POST['szuletesi_hely'];
								$szulido = $_POST['szuletesi_ido'];
								
								$query_user = mysqli_query($conn, "SELECT felhasznalo_nev FROM Felhasznalo WHERE felhasznalo_nev = '$felhasznalo'");
								$count_user = mysqli_num_rows($query_user);
								$query_idnumber = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE szemelyig_szam = '$szig'");
								$count_idnumber = mysqli_num_rows($query_idnumber);
								$query_email = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE email = '$email'");
								$count_email = mysqli_num_rows($query_email);
								
								//helyes regisztrációhoz szükséges adatok ellenőrzése
								
								if($jelszo1 == $jelszo2 && (!$count_email > 0) && (!$count_idnumber > 0) && (!$count_user > 0)){
									
									$sql = "INSERT INTO felhasznalo
											(felhasznalo_nev, jelszo, vezetek_nev, kereszt_nev,
											szemelyig_szam, anyja_vnev, anyja_knev, email, telszam, ir_szam,
											varos, utca, hazszam, szuletesi_hely, szuletesi_ido) 
											VALUES('$felhasznalo','$jelszo1','$v_nev'
											,'$k_nev','$szig','$anyja_v','$anyja_k','$email','$telszam','$ir',
											'$varos','$utca','$hazszam','$szulhely','$szulido');";
									
									mysqli_query($conn, $sql);
									echo '<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a2">Sikeres regisztráció! Üdvözöljük, '.$felhasznalo.'!</td>
													<td height = "33px" id = "styleofwords7a2"></td>
												</tr>
											</table>
										</div>';
									//header("refresh:6; url = index.php");
								}
								
								//felhasználónév ellenőrzése
								
								
								if($count_user > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a">A megadott felhasználónév már használatban van!</td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
								
								
								//szig.szám ellenőrzése
								
								if($count_idnumber > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7b">A megadott személyi igazolvány szám már használatban van!</td>
													<td height = "33px" id = "styleofwords7b"></td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
		
								//email ellenőrzése
								
								if($count_email > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7c">A megadott email már használatban van!</td>
													<td height = "33px" id = "styleofwords7c"></td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
								
								//jelszavak ellenőrzése
								
								if($jelszo1 != $jelszo2){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7d">A két jelszó nem egyezik meg!</td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
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
							<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
							<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href='index.php';">Mégsem</td></button>
						</tr>
					</table>
				</div>
				</form>
			</table>
			</div>

			</br>
			</br>
			</br>
			</br>

	</body>
=======

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
	<head>
		<title>
			Regisztráció
		</title>
		
		<script type = "text/javascript">
			$(document).ready(function(){
				$("ul#menu div").click(function(){
					$(this).parent().find("ul").slideDown("slow");
				});
			});
		</script>
		
		<style type="text/css">
			  
			  input[type="checkbox"]:required:invalid + label { color: red;}
			  input[type="checkbox"]:required:valid + label { color: white; }
		</style>
		
		<style>
		  input{
			  border-radius:8px;
			  -moz-border-radius:8px;
			  -webkit-border-radius:8px;
			  margin: 0px;
		   }
		   
		</style>
		
	</head>
		<body id = "bgStyle">
			
				<div id = "container">
				<ul id = "menu">
					<li>
						<a href="autok.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getCars = mysqli_fetch_assoc($listMotors)){
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="jarmuvek.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								$AllVehicles = new Vehicles();
								$AllVehicles->ListVehicles();
								$listVehicles = $AllVehicles->ListVehicles();
								
								while($getCars = mysqli_fetch_assoc($listVehicles)){
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listVehicles);
							?>
						</div>
					</li>
					<li><a href="index.php">Kezdőlap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
					<li><a href="regisztracio.php">Regisztráció</a></li>
					<li><a href="belepes.php">Belépés</a></li>
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
			</br>
			</br>
			
			
			<div align = "center">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<tr>
					<td height = "33px" id = "styleofwords2a"><font id = "styleofwords2a">Regisztráljon oldalunkra!</font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords5"><font id = "styleofwords6">
					A<font id = "styleofwords4"> *</font>-gal jelölt mezők kitöltése kötelező!</font></td>
				</tr>
			</table>
			
			
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<form method = "POST" action = "" enctype = "multipart/form-data" name = "register">
				
			<!--felhasználói fiók adatai-->
				
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td width = "60%" height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Felhasználói fiók adatai</font></td>
						<td width = "40%" height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
				</table>
			</div>
			
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
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
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Személyes adatok</font></td>
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
						<td height = "33px" id = "styleofwords7" >Személyi igazolvány száma<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "szig" size = "45" required /></td>
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
						<td height = "33px" id = "styleofwords10" >Email<font id = "styleofwords8a"/></td>
						<td height = "33px" id = "styleofwords11"><input type = "email" style="height:26px;" name = "emailcim" size = "45" /></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Telefonszám<font id = "styleofwords8a"/></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "tel" size = "45" placeholder = "+36/06 nélkül adja meg, pl: 709999999"/></td>
					</tr>
					
					<!-- lakcím adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Lakcím adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Irányítószám<font id = "styleofwords8">*</font></td>
						<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "iranyitoszam" size = "45" placeholder = "" required /></td>
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
						<tr>
							<td height = "33px" width = "90%" id = "styleofwords7" ><input id ="field_terms" type="checkbox" required name = "terms">
								<label for="field_terms">Elolvastam és elfogadom a felhasználói feltételeket.</label></td>
							<td height = "33px" width = "10%" id = "styleofwords7"></td>
						</tr>
						<tr>
						
						
						<!-- Regisztráció helyességének az ellenőrzése -->
						
						<?php
							if(isset($_POST['regisztracio'])){
		
								//session_start();
								
								$felhasznalo = $_POST['felh_nev'];
								$jelszo1 = $_POST['jelszo_egy'];
								$jelszo2 = $_POST['jelszo_ketto'];
								
								$v_nev = $_POST['vezeteknev'];
								$k_nev = $_POST['keresztnev'];
								$szig = $_POST['szig'];
								$anyja_v = $_POST['anyjavezetek'];
								$anyja_k = $_POST['anyjakereszt'];
								$email = $_POST['emailcim'];
								$telszam = $_POST['tel'];
								
								$ir = $_POST['iranyitoszam'];
								$varos = $_POST['varos'];
								$utca = $_POST['utca'];
								$hazszam = $_POST['hazszam'];
								
								$szulhely = $_POST['szuletesi_hely'];
								$szulido = $_POST['szuletesi_ido'];
								
								$query_user = mysqli_query($conn, "SELECT felhasznalo_nev FROM Felhasznalo WHERE felhasznalo_nev = '$felhasznalo'");
								$count_user = mysqli_num_rows($query_user);
								$query_idnumber = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE szemelyig_szam = '$szig'");
								$count_idnumber = mysqli_num_rows($query_idnumber);
								$query_email = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE email = '$email'");
								$count_email = mysqli_num_rows($query_email);
								
								//helyes regisztrációhoz szükséges adatok ellenőrzése
								
								if($jelszo1 == $jelszo2 && (!$count_email > 0) && (!$count_idnumber > 0) && (!$count_user > 0)){
									
									$sql = "INSERT INTO felhasznalo
											(felhasznalo_nev, jelszo, vezetek_nev, kereszt_nev,
											szemelyig_szam, anyja_vnev, anyja_knev, email, telszam, ir_szam,
											varos, utca, hazszam, szuletesi_hely, szuletesi_ido) 
											VALUES('$felhasznalo','$jelszo1','$v_nev'
											,'$k_nev','$szig','$anyja_v','$anyja_k','$email','$telszam','$ir',
											'$varos','$utca','$hazszam','$szulhely','$szulido');";
									
									mysqli_query($conn, $sql);
									echo '<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a2">Sikeres regisztráció! Üdvözöljük, '.$felhasznalo.'!</td>
													<td height = "33px" id = "styleofwords7a2"></td>
												</tr>
											</table>
										</div>';
									//header("refresh:6; url = index.php");
								}
								
								//felhasználónév ellenőrzése
								
								
								if($count_user > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a">A megadott felhasználónév már használatban van!</td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
								
								
								//szig.szám ellenőrzése
								
								if($count_idnumber > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7b">A megadott személyi igazolvány szám már használatban van!</td>
													<td height = "33px" id = "styleofwords7b"></td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
		
								//email ellenőrzése
								
								if($count_email > 0){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7c">A megadott email már használatban van!</td>
													<td height = "33px" id = "styleofwords7c"></td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
												<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href="index.php";">Mégsem</td></button>
											</tr>
										</table>
									</div>
								</form>');
								}
								
								//jelszavak ellenőrzése
								
								if($jelszo1 != $jelszo2){
									die('<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7d">A két jelszó nem egyezik meg!</td>
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
												<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
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
							<td width = "50%"><input type = "submit" class = "input" value = "Regisztráció" name = "regisztracio" /></td>
							<td width = "50%"><button class = "button" href = "index.php" align = "center" onclick = "location.href='index.php';">Mégsem</td></button>
						</tr>
					</table>
				</div>
				</form>
			</table>
			</div>

			</br>
			</br>
			</br>
			</br>

	</body>
>>>>>>> fed72e5b877d400556efbd66123dbe15bcccede4
</html>