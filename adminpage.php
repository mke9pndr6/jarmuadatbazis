

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
					<li>
						<a href="adminpage.php">Kezdőlap</a>
						<div align = "center">
							<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_hozzaadasa.php";'>Autók hozzáadása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_modositasa.php";'>Autók módosítása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_torlese.php";'>Autók törlése</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_hozzaadasa.php";'>Motorok hozzáadása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_modositasa.php";'>Motorok módosítása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_torlese.php";'>Motorok törlése</td></button>
								</tr>
							</table>
						</div>
					</li>
					
					<li><a href="kereses.php">Keresés</a></li>
					<li><a href="regisztracio.php">Regisztráció</a></li>
					<li>
						<a href="belepes.php">Belépés</a>
							<form method = "POST" action = "index.php" enctype = "multipart/form-data" name = "login_index">
								<div align = "center">
									<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
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
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="regisztracio.php";'>Még nem regisztrált?</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="regisztracio.php";'>Elfelejtette jelszavát?</td></button>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
										</tr>
										
										<?php
								
											if(isset($_POST['bejelentkezes_dropdown'])){
										
												$login_felh_nev = $_POST['login_felh'];
												$login_jelszo = $_POST['login_jelszo'];
												
												$adminf = "admin";
												$adminj = "admin";
												
												$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
												WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
												
												$login_user = mysqli_query($conn, $login_sql);
												$count_loggedinuser = mysqli_num_rows($login_user);
												
												if(mysqli_num_rows($login_user) == 0){
													
													echo '<tr>
														<td height = "33px" id = "styleofwords7a">Hibás felhasználónév/jelszó!</td>
													</tr>';
												}
													
												
												if(mysqli_num_rows($login_user) == 1){
													
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
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">tovább a kínálathoz!</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';
													}
													
													else{
														
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">tovább a kínálathoz!</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';										
													}
												}
													
											}
									
										?>
										
										</table>
										<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
											<tr>
												<td width = "100%"><input type = "submit" class = "inputlog" value = "Bejelentkezés" name = "bejelentkezes_dropdown" /></td>
											</tr>
										</table>
									</div>
						</form>
					</li>
						
					</li>
				</ul>
				<div style = "clear:both"></div>
			</div>
			</br>
			</br>
			</br>
		
		</body>
	</table>
</html>